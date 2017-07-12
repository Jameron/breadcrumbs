<?php
use PHPUnit\Framework\TestCase;

require_once 'vendor/autoload.php';

class BreadcrumbTest extends TestCase
{

    private $bc;

    public function setUp() {
        $this->bc = new \Jameron\Breadcrumb();
    }

    public function tearDown() {
        $this->bs = null;
    }

    public function testBreadcrumb()
    {
        $route = '/test/1/edit';

        $this->bc->setRoute($route);
        $breadcrumbs = $this->bc->build();

        $this->assertEquals($breadcrumbs[0]['title'], 'Test');
    }

    public function testWithStart()
    {
        $route = '/test/1/edit';
        $start = [
            'title' => 'Home',
            'url' => '/'
        ];

        $this->bc->setRoute($route);
        $this->bc->setStart($start);
        $breadcrumbs = $this->bc->build();

        $this->assertEquals($breadcrumbs[0]['title'], 'Home');

    }
}
