<?php
use PHPUnit\Framework\TestCase;

require_once 'vendor/autoload.php';

class BreadcrumbTest extends TestCase
{
    public function testPhpunit()
    {
        $bc = new \Jameron\Breadcrumb('test/1/edit');
        $bc = $bc->build();
        $this->assertEquals($bc[0]['title'], 'Test');
    }
}
