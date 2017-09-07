<?php
use PHPUnit\Framework\TestCase;
use Jameron\Breadcrumb\Breadcrumb;

require_once 'vendor/autoload.php';

class BreadcrumbTest extends TestCase
{

    private $bc;

    public function setUp() {
        $this->bc = new Breadcrumb();
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
            'url' => '/',
            'title' => 'Home'
        ];

        $this->bc->setRoute($route);
        $this->bc->setStart($start);
        $breadcrumbs = $this->bc->build();

        $this->assertEquals($breadcrumbs[0]['title'], 'Home');

    }

    public function testAddCrumb()
    {
        $route = '/test/1/edit';

        $this->bc->setRoute($route);

        /*
         *$this->bc->addCrumb([
         *    'url'   => '/test/1/new-test',
         *    'title' => 'NewTest'
         *]);
         */

        $breadcrumbs = $this->bc->build();
        
        print_r($breadcrumbs);

        $this->assertEquals($breadcrumbs[3]['title'], 'NewTest');
    }
}
