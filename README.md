# Breadcrumb
I wrote this to use in Laravel applications, but kept it loosely coupled so it can be used in any PHP application. The example view file uses blade template syntax but can easily be translated to straight up php or other templating engine.

# To use within Laravel:

To install run:

```composer require jameron/breadcrumb```

Add to config/app.php

add the service provider:

~~~~
'providers' => [
    // ...
    Jameron\Breadcrumb\Providers\BreadcrumbServiceProvider::class,
],
~~~~

add the facade to the aliases:

~~~~
'aliases' => [
    // ...
    'Breadcrumb' => Jameron\Breadcrumb\Breadcrumb::class,
],
~~~~

In your controller:
~~~~
use Breadcrumb;
use Illuminate\Http\Request;

class ResourceController extends Controller
{

    protected $home_route;

    public function __construct()
    {
        $this->home_route = ['title'=>'home','url'=>'/home'];
    }

    public function index(Request $request)
    {

        $breadcrumb = (new Breadcrumb($request->path(), $this->home_route))->build();

        return view('resource.index', compact('breadcrumb'));

    }
}
~~~~

Include the view partial into your layout or view file where you want the breadcrumb to appear.

E.g.
@include('partials.utils.breadcrumb', ['items' => $breadcrumb])

in your breadcrumb partial add the following:

~~~~
<ol class="breadcrumb">
	@foreach($items as $item)
	<li>@if(!$item['active'])<a href="{!! $item['link'] !!}"@if($item['active']) class="active"@endif>@endif{!! $item['title'] !!}@if(!$item['active'])</a>@endif</li>
	@endforeach
</ol>
~~~~


## License

This breadcrumb is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
