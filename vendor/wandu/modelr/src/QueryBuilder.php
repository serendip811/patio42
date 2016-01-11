<?php
namespace Wandu\Modelr;

class QueryBuilder
{
    /** @var string */
    protected $name;

    /** @var Connection */
    protected $connection;

    /** @var null|Repository */
    protected $repository;

    /** @var array */
    protected $valuesToFind = [];

    /** @var array */
    protected $valuesToOrder = [];

    /** @var array */
    protected $valuesToLimit = null;

    /** @var array */
    protected $bindingValues = [];

    /**
     * @param string $name
     * @param Connection $connection
     * @param Repository $repository
     */
    public function __construct($name, Connection $connection, Repository $repository = null)
    {
        $this->name = $name;
        $this->connection = $connection;
        $this->repository = $repository;
    }

    /**
     * @param array $valuesToFind
     * @return self
     */
    public function where(array $valuesToFind)
    {
        foreach ($this->toDatabaseFilter($valuesToFind) as $key => $target) {
            $uniqueKey = $this->getUniqueKey($key);
            if (!is_array($target)) {
                $target = ['=', $target];
            }
            $this->bindingValues[$uniqueKey] = $target[1];
            $this->valuesToFind[$uniqueKey] = "`{$key}` {$target[0]} {$uniqueKey}";
        }
        return $this;
    }

    /**
     * @param array $valuesToOrder
     * @return self
     */
    public function orderBy(array $valuesToOrder = [])
    {
        $this->valuesToOrder = [];
        foreach ($valuesToOrder as $key => $value) {
            if (is_int($key)) {
                $this->valuesToOrder[] = "`{$value}`";
            } else {
                $this->valuesToOrder[] = "`{$key}` " . ($value ? "ASC" : "DESC");
            }
        }
        return $this;
    }

    /**
     * @param int $limit1
     * @param int $limit2
     * @return self
     */
    public function limit($limit1, $limit2 = null)
    {
        $this->valuesToLimit = [$limit1];
        if (isset($limit2)) {
            $this->valuesToLimit[] = $limit2;
        }
        return $this;
    }

    /**
     * @return int
     */
    public function count()
    {
        $result = $this->oneAsArray(['count(*) as `count`']);
        return $result['count'];

    }
    /**
     * @return bool
     */
    public function exist()
    {
        return !is_null($this->oneAsArray(['1']));
    }

    /**
     * @return null|Model
     */
    public function one()
    {
        $row = $this->oneAsArray();
        if (!isset($row)) {
            return null;
        }
        return $this->repository->create($this->fromDatabaseFilter($row));
    }

    /**
     * @return ModelCollection
     */
    public function all()
    {
        $collection = new ModelCollection();
        foreach ($this->allAsArray() as $row) {
            $collection->push($this->repository->create($this->fromDatabaseFilter($row)));
        }
        return $collection;
    }

    /**
     * @param array $columnsToSelect
     * @return array|null
     */
    public function oneAsArray($columnsToSelect = ['*'])
    {
        $this->limit(1);
        return $this->connection->fetch(
            $this->getSelectQuery($columnsToSelect),
            $this->getBindingValues()
        );
    }

    /**
     * @param array $columnsToSelect
     * @return array
     */
    public function allAsArray($columnsToSelect = ['*'])
    {
        return $this->connection->fetchAll(
            $this->getSelectQuery($columnsToSelect),
            $this->getBindingValues()
        );
    }

    /**
     * @param array $valuesToInsert
     */
    public function insert(array $valuesToInsert)
    {
        $bindingValues = [];
        $insertValues = [];
        foreach ($this->toDatabaseFilter($valuesToInsert) as $key => $name) {
            $uniqueKey = ':' . $key;
            $bindingValues[$uniqueKey] = $name;
            $insertValues[$uniqueKey] = "`{$key}`";
        }
        $this->connection->query(
            "INSERT INTO `{$this->name}`(". implode(",", array_values($insertValues)) . ")" .
            " VALUES(" . implode(",", array_keys($insertValues)) .")",
            $bindingValues
        );
    }

    /**
     * @param array $columnsToSelect
     * @return string
     */
    protected function getSelectQuery($columnsToSelect = ['*'])
    {
        return "SELECT ". implode(',', $columnsToSelect) ." FROM `{$this->name}`"
            .$this->getPartialWhereQuery()
            .$this->getPartialOrderByQuery()
            .$this->getPartialLimitQuery();
    }

    public function update($valuesToHandle)
    {
        $valuesToUpdate = [];
        foreach ($this->toDatabaseFilter($valuesToHandle) as $key => $name) {
            $uniqueKey = $this->getUniqueKey($key);
            $this->bindingValues[$uniqueKey] = $name;
            $valuesToUpdate[$uniqueKey] = "`{$key}`={$uniqueKey}";
        }
        $setQuery = '';
        if (count($valuesToUpdate)) {
            $setQuery = " SET ".implode(',', $valuesToUpdate);
        }
        $this->connection->query(
            "UPDATE `{$this->name}`"
            .$setQuery
            .$this->getPartialWhereQuery()
            .$this->getPartialOrderByQuery()
            .$this->getPartialLimitQuery(),
            $this->getBindingValues()
        );
    }

    public function delete()
    {
        $this->connection->query(
            "DELETE FROM `{$this->name}`"
            .$this->getPartialWhereQuery()
            .$this->getPartialOrderByQuery()
            .$this->getPartialLimitQuery(),
            $this->getBindingValues()
        );
    }

    public function paginate($page = 1, $limit = 10)
    {
        $this->limit(($page - 1) * $limit, $limit);
        return $this->all();
    }

    /**
     * @return string
     */
    public function getPartialWhereQuery()
    {
        if (count($this->valuesToFind)) {
            return " WHERE ".implode(' AND ', $this->valuesToFind);
        }
        return '';
    }

    /**
     * @return string
     */
    public function getPartialLimitQuery()
    {
        if (isset($this->valuesToLimit)) {
            return " LIMIT ".implode(',', $this->valuesToLimit);
        }
        return '';
    }

    /**
     * @return string
     */
    public function getPartialOrderByQuery()
    {
        if (count($this->valuesToOrder)) {
            return " ORDER BY ".implode(',', $this->valuesToOrder);
        }
        return '';
    }

    /**
     * @return array
     */
    public function getBindingValues()
    {
        return $this->bindingValues;
    }

    /**
     * @param string $baseKey
     * @return string
     */
    protected function getUniqueKey($baseKey)
    {
        $key = ':'. $baseKey;
        for ($i = 0; isset($this->bindingValues[$key]); $i++) {
            $key = ":{$baseKey}{$i}";
        }
        return $key;
    }

    /**
     * @param array $arrayToDatabase
     * @return array
     */
    public function toDatabaseFilter(array $arrayToDatabase)
    {
        if (!isset($this->repository)) {
            return $arrayToDatabase;
        }
        return $this->repository->toDatabaseFilter($arrayToDatabase);
    }

    /**
     * @param array $arrayFromDatabase
     * @return array
     */
    public function fromDatabaseFilter(array $arrayFromDatabase)
    {
        if (!isset($this->repository)) {
            return $arrayFromDatabase;
        }
        return $this->repository->fromDatabaseFilter($arrayFromDatabase);
    }
}
