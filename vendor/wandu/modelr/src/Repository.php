<?php
namespace Wandu\Modelr;

use Countable;
use RuntimeException;

abstract class Repository implements Countable
{
    /** @var string */
    protected $name;

    /** @var Connection */
    protected $connection;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return Model
     */
    public function factory()
    {
        throw new RuntimeException('"factory" method must be inherited!');
    }

    /**
     * @return QueryBuilder
     */
    public function getQueryBuilder()
    {
        return new QueryBuilder($this->name, $this->connection, $this);
    }

    /**
     * @param array $valuesToCreate
     * @return Model
     */
    public function create(array $valuesToCreate)
    {
        return $this->factory()->fromArray($valuesToCreate);
    }

    /**
     * @param Model $model
     * @return self
     */
    public function store(Model $model)
    {
        $this->insert($model->toArray());
        $model->offsetSet($model->getPrimaryKey(), $this->connection->getLastInsertId());
        return $this;
    }

    /**
     * @param string $primaryKey
     * @return Model
     */
    public function get($primaryKey)
    {
        $model = $this->factory();
        return $this->where([$model->getPrimaryKey() => $primaryKey])->one();
    }

    /**
     * @param Model $model
     * @return self
     */
    public function modify(Model $model)
    {
        $primaryKey = $model->getPrimaryKey();
        $valuesToUpdate = $model->toArray();
        unset($valuesToUpdate[$primaryKey]);

        $this->where([$primaryKey => $model[$primaryKey]])->update($valuesToUpdate);
        return $this;
    }

    /**
     * @param Model $model
     * @return self
     */
    public function destroy(Model $model)
    {
        $primaryKey = $model->getPrimaryKey();
        $this->where([$primaryKey => $model[$primaryKey]])->delete();
        unset($model[$primaryKey]);
        return $this;
    }

    // QueryBuilder map functions

    /**
     * @param array $valuesToFind
     * @return QueryBuilder
     */
    public function where(array $valuesToFind)
    {
        return $this->getQueryBuilder()->where($valuesToFind);
    }

    /**
     * @param array $valuesToOrder
     * @return QueryBuilder
     */
    public function orderBy(array $valuesToOrder = [])
    {
        return $this->getQueryBuilder()->orderBy($valuesToOrder);
    }

    /**
     * @param $limit1
     * @param null $limit2
     * @return QueryBuilder
     */
    public function limit($limit1, $limit2 = null)
    {
        return $this->getQueryBuilder()->limit($limit1, $limit2);
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->getQueryBuilder()->count();
    }

    /**
     * @return bool
     */
    public function exist()
    {
        return $this->getQueryBuilder()->exist();
    }

    /**
     * @param array $columnsToSelect
     * @return null|Model
     */
    public function one($columnsToSelect = ['*'])
    {
        return $this->getQueryBuilder()->one($columnsToSelect);
    }

    /**
     * @param array $columnsToSelect
     * @return ModelCollection
     */
    public function all($columnsToSelect = ['*'])
    {
        return $this->getQueryBuilder()->all($columnsToSelect);
    }

    /**
     * @param array $columnsToSelect
     * @return array|null
     */
    public function oneAsArray($columnsToSelect = ['*'])
    {
        return $this->getQueryBuilder()->oneAsArray($columnsToSelect);
    }

    /**
     * @param array $columnsToSelect
     * @return array
     */
    public function allAsArray($columnsToSelect = ['*'])
    {
        return $this->getQueryBuilder()->allAsArray($columnsToSelect);
    }

    /**
     * @param array $valuesToInsert
     */
    public function insert(array $valuesToInsert)
    {
        $this->getQueryBuilder()->insert($valuesToInsert);
    }

//    // dangerous..
//    public function delete()
//    {
//        $this->getQueryBuilder()->delete();
//    }

    /**
     * @param array $arrayToDatabase
     * @return array
     */
    public function toDatabaseFilter(array $arrayToDatabase)
    {
        return $arrayToDatabase;
    }

    /**
     * @param array $arrayFromDatabase
     * @return array
     */
    public function fromDatabaseFilter(array $arrayFromDatabase)
    {
        return $arrayFromDatabase;
    }
}
