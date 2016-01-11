<?php
namespace Wandu\Modelr;

use PHPUnit_Framework_TestCase;
use Mockery;
use Wandu\Modelr\Stubs\Item;

class ModelTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testConstruct()
    {
        $item = new Item();

        $this->assertAttributeEquals(['level' => 100,], 'values', $item);
        $this->assertAttributeEmpty('repository', $item);
    }

    public function testConstructWithRepo()
    {
        $mockRepo = Mockery::mock(Repository::class);

        $item = new Item($mockRepo);

        $this->assertAttributeEquals(['level' => 100,], 'values', $item);
        $this->assertAttributeSame($mockRepo, 'repository', $item);
    }

    public function testToArrayAndJson()
    {
        $item = new Item();

        $this->assertEquals(['level' => 100,], $item->toArray());
        $this->assertJson('{"level":100}', $item->toJson());
    }

    public function testFromDatabase()
    {
        $item = new Item();
        $item->fromArray([
            'level' => 50,
            'username' => 'wan2land',
            'registered' => '2015-04-05 11:10:12'
        ]);

        $this->assertEquals([
            'username' => 'wan2land',
            'level' => 50,
            'registered' => '2015-04-05 11:10:12',
        ], $item->toArray());
    }
}
