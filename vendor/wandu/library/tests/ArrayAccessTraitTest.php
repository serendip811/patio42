<?php
namespace Wandu\Library;

use ArrayAccess;
use PHPUnit_Framework_TestCase;
use Mockery;

class ArrayAccessTraitTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testOffsetGetAndSet()
    {
        $objectArray = new ArrayAccessImpl();

        $this->assertNull($objectArray['willBeSet']);

        $objectArray['willBeSet'] = "now this has the text";
        $this->assertEquals("now this has the text", $objectArray['willBeSet']);
    }

    public function testOffsetUnset()
    {
        $objectArray = new ArrayAccessImpl();

        $objectArray['willBeDeleted'] = "this will be deleted!";
        unset($objectArray['willBeDeleted']);

        $this->assertNull($objectArray['willBeDeleted']);
    }

    public function testOffsetExists()
    {
        $objectArray = new ArrayAccessImpl();

        $this->assertFalse(isset($objectArray['willBeSet']));

        $objectArray['willBeSet'] = "now this has the text";

        $this->assertTrue(isset($objectArray['willBeSet']));
    }
}

class ArrayAccessImpl implements ArrayAccess
{
    use ArrayAccessTrait;
}
