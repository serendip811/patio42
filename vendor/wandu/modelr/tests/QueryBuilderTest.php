<?php
namespace Wandu\Modelr;

use PHPUnit_Framework_TestCase;
use Mockery;

class QueryBuilderTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testInsert()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('query')->once()->with(
            'INSERT INTO `test`(`hello`,`blabla`) VALUES(:hello,:blabla)',
            [':hello' => 'world', ':blabla' => 'um']
        );

        $builder = new QueryBuilder('test', $mockConnection);
        $builder->insert([
            'hello' => 'world',
            'blabla' => 'um'
        ]);
    }

    public function testOneWithNull()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetch')->once()->with(
            'SELECT * FROM `test` WHERE `hello` = :hello AND `blabla` = :blabla LIMIT 1',
            [':hello' => 'world', ':blabla' => 'um']
        )->andReturn(null);

        $builder = new QueryBuilder('test', $mockConnection);
        $builder->where([
            'hello' => 'world',
            'blabla' => 'um'
        ])->one();
    }

    public function testOne()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetch')->once()->andReturn([
            'username' => 'foo'
        ]);
        $mockRepository = Mockery::mock(Repository::class);
        $mockRepository->shouldReceive('create');
        $mockRepository->shouldReceive('toDatabaseFilter')->once()
            ->with([
                'hello' => 'world',
                'blabla' => 'um'
            ])->andReturn([
                'hello' => 'world',
                'blabla' => 'um'
            ]);
        $mockRepository->shouldReceive('fromDatabaseFilter')->once()
            ->with([
                'username' => 'foo'
            ])->andReturn([
                'username' => 'foo'
            ]);

        $builder = new QueryBuilder('test', $mockConnection, $mockRepository);
        $builder->where([
            'hello' => 'world',
            'blabla' => 'um'
        ])->one();
    }

    public function testAllWithNull()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetch')->once()->with(
            'SELECT * FROM `test` WHERE `hello` > :hello AND `blabla` like :blabla LIMIT 1',
            [':hello' => 'world', ':blabla' => '%um%']
        )->andReturn(null);

        $builder = new QueryBuilder('test', $mockConnection);
        $builder->where([
            'hello' => ['>', 'world'],
            'blabla' => ['like', '%um%']
        ])->one();
    }

    public function testExtendWhereQuery()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetchAll')->once()->with(
            'SELECT * FROM `test` WHERE `hello` = :hello AND `blabla` = :blabla',
            [':hello' => 'world', ':blabla' => 'um']
        )->andReturn([]);

        $builder = new QueryBuilder('test', $mockConnection);
        $builder->where([
            'hello' => 'world',
            'blabla' => 'um'
        ])->all();
    }

    public function testAll()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetchAll')->once()->andReturn([
            ['username' => 'foo'],
            ['username' => 'bar']
        ]);
        $mockRepository = Mockery::mock(Repository::class);
        $mockRepository->shouldReceive('create');
        $mockRepository->shouldReceive('toDatabaseFilter')->once()
            ->with([
                'hello' => 'world',
                'blabla' => 'um'
            ])->andReturn([
                'hello' => 'world',
                'blabla' => 'um'
            ]);
        $mockRepository->shouldReceive('fromDatabaseFilter')->once()
            ->with(['username' => 'foo'])
            ->andReturn(['username' => 'foo']);
        $mockRepository->shouldReceive('fromDatabaseFilter')->once()
            ->with(['username' => 'bar'])
            ->andReturn(['username' => 'bar']);

        $builder = new QueryBuilder('test', $mockConnection, $mockRepository);
        $builder->where([
            'hello' => 'world',
            'blabla' => 'um'
        ])->all();
    }

    public function testCount()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetch')->once()->with(
            'SELECT count(*) as `count` FROM `test` LIMIT 1',
            []
        )->andReturn(['count' => 20]);

        $builder = new QueryBuilder('test', $mockConnection);
        $this->assertEquals(20, $builder->count());
    }

    public function testExist()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetch')->once()->with(
            'SELECT 1 FROM `test` LIMIT 1',
            []
        )->andReturn([1]);

        $builder = new QueryBuilder('test', $mockConnection);
        $this->assertEquals(true, $builder->exist());
    }

    public function testNoExist()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetch')->once()->with(
            'SELECT 1 FROM `test` LIMIT 1',
            []
        )->andReturn(null);

        $builder = new QueryBuilder('test', $mockConnection);
        $this->assertEquals(false, $builder->exist());
    }

    public function testUpdate()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('query')->once()->with(
            'UPDATE `test` SET `hello`=:hello0,`updated`=:updated WHERE `hello` = :hello AND `other` = :other',
            [':hello' => 'world', ':other' => 'um', ':hello0' => 'fixed world',':updated' => 'true']
        )->andReturn(null);

        $builder = new QueryBuilder('test', $mockConnection);
        $builder->where([
            'hello' => 'world',
            'other' => 'um'
        ])->update([
            'hello' => 'fixed world',
            'updated' => 'true'
        ]);
    }


    public function testDelete()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('query')->once()->with(
            'DELETE FROM `test` WHERE `hello` = :hello AND `blabla` = :blabla',
            [':hello' => 'world', ':blabla' => 'um']
        )->andReturn(null);

        $builder = new QueryBuilder('test', $mockConnection);
        $builder->where([
            'hello' => 'world',
            'blabla' => 'um'
        ])->delete();
    }

    public function testLimitAndOrderBy()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('getName')->andReturn('test');

        $builder = new QueryBuilder('test', $mockConnection);

        $this->assertEquals('', $builder->getPartialLimitQuery());

        $builder->limit(1);

        $this->assertEquals(' LIMIT 1', $builder->getPartialLimitQuery());

        $builder->limit(1,2);

        $this->assertEquals(' LIMIT 1,2', $builder->getPartialLimitQuery());
    }

    public function testOrderBy()
    {
        $mockConnection = Mockery::mock(Connection::class);

        $builder = new QueryBuilder('test', $mockConnection);

        $this->assertEquals('', $builder->getPartialOrderByQuery());

        $builder->orderBy(['hello']);

        $this->assertEquals(' ORDER BY `hello`', $builder->getPartialOrderByQuery());

        $builder->orderBy(['hello', 'world']);

        $this->assertEquals(' ORDER BY `hello`,`world`', $builder->getPartialOrderByQuery());

        $builder->orderBy(['hello' => false, 'world']);

        $this->assertEquals(' ORDER BY `hello` DESC,`world`', $builder->getPartialOrderByQuery());

        $builder->orderBy(['hello', 'world' => true]);

        $this->assertEquals(' ORDER BY `hello`,`world` ASC', $builder->getPartialOrderByQuery());

        $builder->orderBy(['hello' => false, 'world' => true]);

        $this->assertEquals(' ORDER BY `hello` DESC,`world` ASC', $builder->getPartialOrderByQuery());
    }
}
