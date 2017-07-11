# Breadcrumb
I wrote this to use in Laravel applications, but kept it loosely coupled so it can be used in any PHP application. The example view file uses blade template syntax but can easily be translated to straight up php or other templating engine.

# To use within Laravel:

Put Breadcrumb.php in app directory 

Run:
```composer dump-autoload```

In your controller:
~~~~
use App\Breadcrumb;
use Illuminate\Http\Request;

class ResourceController extends Controller
{

    protected $home_route;

    public function __construct()
    {
        $this->home_route = 'home';
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


## License

This breadcrumb is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
