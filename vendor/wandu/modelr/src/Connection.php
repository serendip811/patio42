<?php
namespace Wandu\Modelr;

use Pdo;
use RuntimeException;
use PDOStatement;

class Connection
{
    /**
     * @param array $config
     * @return Connection
     */
    public static function factory(array $config)
    {
        $config += [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => null,
            'username' => null,
            'password' => null,
        ];

        return new static(
            new Pdo(
                "mysql:host={$config['host']};charset=utf8;dbname={$config['database']};",
                $config['username'],
                $config['password']
            )
        );
    }

    /** @var Pdo */
    private $pdo;

    /**
     * @param Pdo $pdo
     */
    public function __construct(Pdo $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param string $query
     * @param array $bindValues
     * @return self
     * @throws RuntimeException
     */
    public function query($query, array $bindValues = [])
    {
        $this->generatePDOStatement($query, $bindValues);
        return $this;
    }

    /**
     * @param $query
     * @param array $bindValues
     * @param int $fetchStyle
     * @return array|null
     * @throws RuntimeException
     */
    public function fetch($query, array $bindValues = [], $fetchStyle = Pdo::FETCH_ASSOC)
    {
        $result = $this->generatePDOStatement($query, $bindValues)->fetch($fetchStyle);
        return ($result !== false) ? $result : null;
    }

    /**
     * @param $query
     * @param array $bindValues
     * @param int $fetchStyle
     * @return array
     * @throws RuntimeException
     */
    public function fetchAll($query, array $bindValues = [], $fetchStyle = Pdo::FETCH_ASSOC)
    {
        $result = $this->generatePDOStatement($query, $bindValues)->fetchAll($fetchStyle);
        return ($result !== false) ? $result : [];
    }

    /**
     * @param $query
     * @param array $bindValues
     * @param int $fetchStyle
     * @return \Generator
     */
    public function fetchAsGenerator($query, array $bindValues = [], $fetchStyle = Pdo::FETCH_ASSOC)
    {
        $statement = $this->generatePDOStatement($query, $bindValues);
        while ($row = $statement->fetch($fetchStyle)) {
            yield $row;
        }
    }

    /**
     * @return string
     */
    public function getLastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

    /**
     * @param string $query
     * @param array $bindValues
     * @return PDOStatement
     * @throws RuntimeException
     */
    public function generatePDOStatement($query, array $bindValues = [])
    {
        $statement = $this->pdo->prepare($query);
        if ($statement->execute($bindValues)) {
            return $statement;
        }
        $errorInformation = $statement->errorInfo();
        throw new RuntimeException("DB Error, {$errorInformation[2]}. Query is \"{$query}\"", $errorInformation[1]);
    }
}
