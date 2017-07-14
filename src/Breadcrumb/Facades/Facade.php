<?php 

namespace Jameron\Breadcrumb\Facades;

use Illuminate\Support\Facades\Facade;

class BreadcrumbFacade extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'breadcrumb'; }

}
