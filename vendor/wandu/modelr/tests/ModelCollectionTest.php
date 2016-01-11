<?php
namespace Wandu\Modelr;

use PHPUnit_Framework_TestCase;
use Mockery;
use Wandu\Modelr\Stubs\Item;

class ModelCollectionTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testToArray()
    {
        $item1 = Mockery::mock(Item::class);
        $item1->shouldReceive('toArray')->andReturn(['username' => 'hello', 'password' => '12341234']);

        $collection = new ModelCollection([$item1]);

        $this->assertEquals([
            ['username' => 'hello', 'password' => '12341234']
        ], $collection->toArray());
        $this->assertEquals(json_encode([
            ['username' => 'hello', 'password' => '12341234']
        ]), $collection->toJson());
    }
}
