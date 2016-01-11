<?php
namespace Wandu\Template;

use PHPUnit_Framework_TestCase;
use Mockery;

class ManagerTest extends PHPUnit_Framework_TestCase
{
    public function testSimpleRender()
    {
        $engine = new Manager(__DIR__."/fixtures");
        $this->assertEquals("hello world\n", $engine->render('hello-world'));

        try {
            $engine->render('_not_exists_file_');
            $this->fail();
        } catch (FileNotFoundException $e) {
            $this->assertEquals(
                'cannot find the file : '.__DIR__."/fixtures/_not_exists_file_.php",
                $e->getMessage()
            );
        }
    }

    public function testRenderWithValues()
    {
        $engine = new Manager(__DIR__."/fixtures");
        $this->assertEquals("hello wani!\n", $engine->render('hello-who', ['who' => 'wani']));
    }

    public function testRenderWithLoad()
    {
        $engine = new Manager(__DIR__."/fixtures");
        $contents = <<<EOD
<header>this is title</header>
<main>this is jicjjang!
</main>
<footer>this is footer</footer>
EOD;

        $this->assertEquals($contents, $engine->render('main-header-footer', ['who' => 'jicjjang']));
    }

    public function testRenderWithLayout()
    {
        $engine = new Manager(__DIR__."/fixtures");
        $contents = <<<EOD
<header>this is title</header>
<main>this is jicjjang from layout!
</main>
EOD;

        $this->assertEquals($contents, $engine->render('main-layout', ['who' => 'jicjjang']));
    }

    public function testComplicationExample()
    {
        $engine = new Manager(__DIR__."/fixtures");
        $contents = <<<EOD
<header>title from full-layout:)</header>
<aside><ul>
    <li>menu1</li>
    <li>menu2</li>
</ul>
</aside>
<main>This is complicated website example.
Hello, I'm wan2land.
</main><footer>from phpunit</footer>

EOD;

        $this->assertEquals(
            $contents,
            $engine->render('complication', ['name' => 'wan2land', 'title' => 'from phpunit'])
        );
    }
}
