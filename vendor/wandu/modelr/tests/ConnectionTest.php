<?php
namespace Wandu\Modelr;

use PHPUnit_Framework_TestCase;
use Mockery;
use RuntimeException;

class ConnectionTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testGeneratePDOStatementWithSuccess()
    {
        $mockPdoStatement = Mockery::mock(\PDOStatement::class);
        $mockPdoStatement->shouldReceive('execute')->with([
            ':id' => 'blabla'
        ])->andReturn(true);

        $mockPdo = Mockery::mock(\PDO::class);
        $mockPdo->shouldReceive('prepare')->with('SELECT * FROM `test` WHERE `id`=:id')->andReturn($mockPdoStatement);

        $connector = new Connection($mockPdo);
        $connector->generatePDOStatement('SELECT * FROM `test` WHERE `id`=:id', [
            ':id' => 'blabla'
        ]);
    }

    public function testGeneratePDOStatementWithFail()
    {
        $mockPdoStatement = Mockery::mock(\PDOStatement::class);
        $mockPdoStatement->shouldReceive('execute')->with([
            ':id' => 'blabla'
        ])->andReturn(false); // fail
        $mockPdoStatement->shouldReceive('errorInfo')->andReturn([0, 1, 'blabla']);

        $mockPdo = Mockery::mock(\PDO::class);
        $mockPdo->shouldReceive('prepare')->with('SELECT * FROM `test` WHERE `id`=:id')->andReturn($mockPdoStatement);

        $connector = new Connection($mockPdo);
        try {
            $connector->generatePDOStatement('SELECT * FROM `test` WHERE `id`=:id', [':id' => 'blabla']);
            $this->fail();
        } catch (RuntimeException $e) {
            $this->assertEquals('DB Error, blabla. Query is "SELECT * FROM `test` WHERE `id`=:id"', $e->getMessage());
        }
    }
}
