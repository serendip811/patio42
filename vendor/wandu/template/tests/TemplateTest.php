<?php
namespace Wandu\Template;

use PHPUnit_Framework_TestCase;
use Mockery;

class TemplateTest extends PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $file = new File(__DIR__.'/fixtures/hello-world.php');

        $this->assertAttributeEquals(__DIR__.'/fixtures/hello-world.php', 'fileName', $file);

        try {
            new File(__DIR__ . '/fixtures/unknown');
            $this->fail();
        } catch (FileNotFoundException $e) {
            $this->assertEquals(
                'cannot find the file : '. __DIR__ .'/fixtures/unknown',
                $e->getMessage()
            );
        }
    }

    public function testSetValues()
    {
        $file = new File(__DIR__.'/fixtures/hello-world.php');

        $file->setValues([
            'foo' => 'foo string',
            'bar' => 'bar string'
        ]);

        $this->assertAttributeEquals([
            'foo' => 'foo string',
            'bar' => 'bar string'
        ], 'values', $file);

        // merged
        $file->setValues([
            'bar' => 'changed bar string',
            'baz' => 'baz string'
        ]);

        $this->assertAttributeEquals([
            'foo' => 'foo string',
            'bar' => 'changed bar string',
            'baz' => 'baz string'
        ], 'values', $file);
    }


}
