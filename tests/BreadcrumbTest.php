<?php
use PHPUnit\Framework\TestCase;

use PHPAddons\UI\Breadcrumb;

class BreadcrumbTest extends TestCase
{
    public function testPhpunit()
    {
        $bc = new Breadcrumb('/test/1/edit');

        $this->assertEquals($bc[0]['title'], 'test1');
    }
}
