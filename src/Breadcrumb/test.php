<?php namespace Jameron;

use Jameron\Breadcrumb\Breadcrumb;

require_once '../../vendor/autoload.php';

ini_set('display_errors', 1);

echo $bc = new Breadcrumb('/test/route', ['title'=>'Home', 'url'=>'test']);

    /*
     *->setRoute('/test/route/')
     *->setStart(
     *    [
     *        'title'=>'test',
     *        'url'=>'tset'
     *    ]);
     */
?>
