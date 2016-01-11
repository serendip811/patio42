<?php
namespace Wandu\Modelr;

use PHPUnit_Framework_TestCase;
use Mockery;
use Wandu\Modelr\Stubs\Item;
use Wandu\Modelr\Stubs\ItemRepository;

class RepositoryTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testStore()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('query')
            ->once()
            ->with(
                "INSERT INTO `wandu_example`(`hello`) VALUES(:hello)",
                [':hello' => 'world']
            );
        $mockConnection->shouldReceive('getLastInsertId')
            ->once()
            ->andReturn(30);

        $mockModel = Mockery::mock(Model::class);
        $mockModel->shouldReceive('toArray')
            ->once()
            ->andReturn(['hello' => 'world']);
        $mockModel->shouldReceive('getPrimaryKey')
            ->once()
            ->andReturn('id');
        $mockModel->shouldReceive('offsetSet')
            ->once()
            ->with('id', 30);

        $repo = new ItemRepository($mockConnection);

        // insert return $repo
        $this->assertSame($repo, $repo->store($mockModel));
    }

    public function testCreate()
    {
        $mockConnection = Mockery::mock(Connection::class);

        $repo = new ItemRepository($mockConnection);

        // insert return $repo
        $model = $repo->create([
            'username' => 'wan2land',
            'password' => '12341234'
        ]);

        $this->assertInstanceOf(Model::class, $model);
        $this->assertEquals('wan2land', $model['username']);
        $this->assertEquals('12341234', $model['password']);
    }

    public function testGet()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetch')
            ->once()
            ->with("SELECT * FROM `wandu_example` WHERE `id` = :id LIMIT 1", [':id' => '30'])
            ->andReturn([]);

        $repo = new ItemRepository($mockConnection);

        // select return $model
        $this->assertInstanceOf(Model::class, $repo->get(30));
    }

    public function testModify()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('query')
            ->once()
            ->with(
                "UPDATE `wandu_example` SET `hello`=:hello WHERE `id` = :id",
                [':hello' => 'updated string', ':id' => '30']
            );

        $mockModel = Mockery::mock(Model::class);
        $mockModel->shouldReceive('toArray')
            ->once()
            ->andReturn(['id' => '30', 'hello' => 'updated string']);
        $mockModel->shouldReceive('getPrimaryKey')
            ->once()
            ->andReturn('id');
        $mockModel->shouldReceive('offsetGet')
            ->once()
            ->with('id')
            ->andReturn(30);

        $repo = new ItemRepository($mockConnection);

        // update return $repo
        $this->assertSame($repo, $repo->modify($mockModel));
    }

    public function testDestroy()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('query')
            ->once()
            ->with(
                "DELETE FROM `wandu_example` WHERE `id` = :id",
                [':id' => '30']
            );

        $mockModel = Mockery::mock(Model::class);
        $mockModel->shouldReceive('getPrimaryKey')
            ->once()
            ->andReturn('id');
        $mockModel->shouldReceive('offsetGet')
            ->once()
            ->with('id')
            ->andReturn(30);
        $mockModel->shouldReceive('offsetUnset')
            ->once()
            ->with('id');

        $repo = new ItemRepository($mockConnection);

        // delete return $repo
        $this->assertSame($repo, $repo->destroy($mockModel));
    }

    public function testCount()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetch')
            ->twice()
            ->with("SELECT count(*) as `count` FROM `wandu_example` LIMIT 1", [])
            ->andReturn(['count' => 218]);

        $repo = new ItemRepository($mockConnection);

        $this->assertEquals(218, count($repo));
        $this->assertEquals(218, $repo->count());
    }

    public function testExistAndReturnTrue()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetch')
            ->once()
            ->with(
                "SELECT 1 FROM `wandu_example` WHERE `hello` = :hello LIMIT 1",
                [':hello' => 'foo']
            )
            ->andReturn(['something']);

        $repo = new ItemRepository($mockConnection);

        $this->assertTrue($repo->where(['hello' => 'foo'])->exist());
    }

    public function testExistAndReturnFalse()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetch')
            ->once()
            ->with(Mockery::any(), Mockery::any())
            ->andReturn(null);

        $repo = new ItemRepository($mockConnection);

        $this->assertFalse($repo->where(['hello' => 'foo'])->exist());
    }

    public function testOrderBy()
    {
        $mockConnection = Mockery::mock(Connection::class);

        $repo = new ItemRepository($mockConnection);

        $queryBuilder = $repo->orderBy(['abc' => true]);

        $this->assertInstanceOf(QueryBuilder::class, $queryBuilder);
        $this->assertAttributeEquals(['`abc` ASC'], 'valuesToOrder', $queryBuilder);
    }

    public function testLimit()
    {
        $mockConnection = Mockery::mock(Connection::class);

        $repo = new ItemRepository($mockConnection);

        $queryBuilder = $repo->limit(10, 3);

        $this->assertInstanceOf(QueryBuilder::class, $queryBuilder);
        $this->assertAttributeEquals([10, 3], 'valuesToLimit', $queryBuilder);
    }

    public function testExists()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetch')->once()
            ->with('SELECT 1 FROM `wandu_example` LIMIT 1', [])->andReturn(1);
        $repo = new ItemRepository($mockConnection);

        $this->assertTrue($repo->exist());
    }

    public function testOne()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetch')->once()
            ->with('SELECT * FROM `wandu_example` LIMIT 1', [])->andReturn(['username' => 'wan2land']);
        $repo = new ItemRepository($mockConnection);

        $model = $repo->one();

        $this->assertInstanceOf(Item::class, $model);
        $this->assertEquals('wan2land', $model['username']);
    }

    public function testOneAsArray()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetch')->once()
            ->with('SELECT * FROM `wandu_example` LIMIT 1', [])->andReturn(['username' => 'wan2land']);
        $repo = new ItemRepository($mockConnection);

        $this->assertEquals(['username' => 'wan2land'], $repo->oneAsArray());
    }

    public function testAll()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetchAll')->once()
            ->with('SELECT * FROM `wandu_example`', [])->andReturn([['username' => 'wan2land']]);
        $repo = new ItemRepository($mockConnection);

        $model = $repo->all();

        $this->assertInstanceOf(ModelCollection::class, $model);
        $this->assertEquals('wan2land', $model[0]['username']);
    }

    public function testAllAsArray()
    {
        $mockConnection = Mockery::mock(Connection::class);
        $mockConnection->shouldReceive('fetchAll')->once()
            ->with('SELECT * FROM `wandu_example`', [])->andReturn([['username' => 'wan2land']]);
        $repo = new ItemRepository($mockConnection);

        $this->assertEquals([['username' => 'wan2land']], $repo->allAsArray());
    }


//    public function testPagination()
//    {
//        // return array
//        $mockConnection = Mockery::mock(Connection::class);
//        $mockConnection->shouldReceive('fetchAll')
//            ->once()
//            ->with(
//                "SELECT * FROM `wandu_example` WHERE `username`=:username",
//                [':username' => 'world']
//            )
//            ->andReturn([
//                ['id' => 1, 'username' => 'world'],
//                ['id' => 2, 'username' => 'username']
//            ]);
//
//        $repo = new ItemRepository($mockConnection);
//
//        $rows = $repo->pagination(['username' => 'world']);
//        $this->assertInstanceOf(ModelCollection::class, $rows);
//        foreach ($rows as $row) {
//            $this->assertInstanceOf(Model::class, $row);
//        }
//
//        // return []
//        $mockConnection = Mockery::mock(Connection::class);
//        $mockConnection->shouldReceive('fetchAll')->once()->andReturn([]);
//
//        $repo = new ItemRepository($mockConnection);
//
//        // blank collection
//        $this->assertEquals(new ModelCollection(), $repo->pagination(['username' => 'world']));
//    }
}
