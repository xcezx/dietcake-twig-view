<?php
/**
 * @runTestsInSeparateProcesses
 */
class TwigViewTest extends \PHPUnit_Framework_TestCase
{
    private $controller;

    public function setUp()
    {
        $this->controller = new Controller('demo');
        $this->controller->view = new TwigView($this->controller);
    }

    public function testRender01()
    {
        $this->controller->render('hello');
        $this->assertTag(array('tag' => 'title', 'content' => 'Lorem ipsum...'), $this->controller->output);
        $this->assertTag(array('tag' => 'h1', 'content' => 'Hello World'), $this->controller->output);
    }

    public function testRender02()
    {
        $this->controller->render('demo/hello');
        $this->assertTag(array('tag' => 'title', 'content' => 'Lorem ipsum...'), $this->controller->output);
        $this->assertTag(array('tag' => 'h1', 'content' => 'Hello World'), $this->controller->output);
    }

    public function testRender03()
    {
        $this->controller->action = 'hello';
        $this->controller->render();
        $this->assertTag(array('tag' => 'title', 'content' => 'Lorem ipsum...'), $this->controller->output);
        $this->assertTag(array('tag' => 'h1', 'content' => 'Hello World'), $this->controller->output);
    }

    public function testRender04()
    {
        $this->controller->set('name', 'John Doe');
        $this->controller->render('hello');
        $this->assertTag(array('tag' => 'title', 'content' => 'Lorem ipsum...'), $this->controller->output);
        $this->assertTag(array('tag' => 'h1', 'content' => 'Hello John Doe'), $this->controller->output);
    }

    public function testRender05()
    {
        $this->controller->set(array('name' => 'Jane Doe'));
        $this->controller->render('hello');
        $this->assertTag(array('tag' => 'title', 'content' => 'Lorem ipsum...'), $this->controller->output);
        $this->assertTag(array('tag' => 'h1', 'content' => 'Hello Jane Doe'), $this->controller->output);
    }
}
