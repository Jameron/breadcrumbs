<?php

namespace Jameron\Breadcrumb;

class Breadcrumb
{
    /**
     * The route path to current page, excluding domain. e.g. /path/to/current/page
     */
    protected $route  = [];

    /**
     * Formatted array of all links in breadcrumb.
     */
    protected $crumbs = [];

    /**
     * Constructor for Breadcrumb.
     *
     * @param array $route
     * @param array $start
     * @return void
     */
    public function __construct($route = null)
    {
        $this->setRoute($route);
        $this->build();
    }

    /**
     * Returns a formatted array for the breadcrumb view partial.
     *
     * @return array
     */
    public function build()
    {
        $path = '';
        $active = false;
        $this->route = trim($this->route, '/');
        $crumbs = explode('/', $this->route);
        $total_number_of_crumbs = count($crumbs);

        foreach ($crumbs as $key => $crumb) {
            $path .= '/'.$crumb;
            if ($key == $total_number_of_crumbs - 1) {
                $active = true;
            }

            $this->addCrumb([
                'url' => $path,
                'title' => ucwords(str_replace('-', ' ', str_replace('_', ' ', $crumb))),
                'active' => $active,
            ]);
        }

    }

    public function output()
    {
        return $this->crumbs;
    }

    /**
     * Add a crumb to the crumbs array
     *
     * @return void;
     */
    public function addCrumb($crumb, $key=null)
    {
        $this->crumbs[] = $crumb;

        /*
         *if($key && $key <= count($this->crumbs)) {
         *    $this->crumbs[$key] = $crumb;
         *}
         */
    }

    /**
     * Set the current route
     *
     * @return void;
     */
    public function setRoute($route) 
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Convert the collection to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        //return $this->toJson();
    }

    /**
     * Get the collection of items as JSON.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        //return json_encode($this->crumbs, $options);
    }
}
