<?php namespace Jameron;
require_once '../vendor/autoload.php';
use Jameron\Breadcrumb;


$bc = new Breadcrumb('/test/route');
echo print_r($bc->build());
