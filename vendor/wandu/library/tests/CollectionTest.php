<?php
namespace Wandu\Library;

use ArrayAccess;
use PHPUnit_Framework_TestCase;
use Mockery;

class CollectionTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testConstruct()
    {
        $this->assertEquals(new Collection(), new Collection([]));
    }

    public function testIterate()
    {
        $collection = new Collection(['aaa', 'bbb', 'ccc']);

        foreach ($collection as $key => $item)
        {
            switch ($key) {
                case 0:
                    $this->assertEquals('aaa', $item);
                    break;
                case 1:
                    $this->assertEquals('bbb', $item);
                    break;
                case 2:
                    $this->assertEquals('ccc', $item);
                    break;
            }
        }
    }

    public function testToArray()
    {
        $collection = new Collection(['aaa', 'bbb', 'ccc']);
        $this->assertEquals(['aaa', 'bbb', 'ccc'], $collection->toArray());
        $this->assertEquals('["aaa","bbb","ccc"]', $collection->toJson());
    }

    public function testStack()
    {
        $collection = new Collection();

        $collection->push('hello?');

        $this->assertEquals('hello?', $collection->pop());
    }

    public function testStackByShift()
    {
        $collection = new Collection();

        $collection->unshift('hello?');

        $this->assertEquals('hello?', $collection->shift());
    }
}
