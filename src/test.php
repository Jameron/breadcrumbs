<?php namespace Jameron;
require_once '../vendor/autoload.php';
use Jameron\Breadcrumb;


echo 'test';
$bc = new Breadcrumb('test/route');
echo 'test';
echo var_dump($bc->build());
