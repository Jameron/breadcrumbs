<?php

namespace Jameron\Breadcrumb;

class Breadcrumb
{
    /**
     * The route path to current page, excluding domain. e.g. /path/to/current/page
     */
    protected $route  = [];

    /**
     * Prepends route to beginning of breadcrumb.
     * e.g. home would result in breacrumb path /home/path/to/current/page
     */
    protected $start = [];

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
    public function __construct($route = null, $start = null)
    {
        $this->setRoute($route);
        $this->setStart($start);
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

        $this->setBreadcrumbStart($this->start);

        $total_number_of_crumbs = count($crumbs);

        foreach ($crumbs as $key => $crumb) {
            $path .= '/'.$crumb;
            if ($key == $total_number_of_crumbs - 1) {
                $active = true;
            }

            $this->addCrumb([
                'link' => $path,
                'title' => ucwords(str_replace('-', ' ', str_replace('_', ' ', $crumb))),
                'active' => $active,
            ]);
        }

        return $this->crumbs;
    }

    /**
     * Add a crumb to the crumbs array
     *
     * @return void;
     */
    public function addCrumb($crumb)
    {
        $this->crumbs[] = $crumb;
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
     * Set the breadcrumb start
     *
     * @return void;
     */
    public function setStart($start) 
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Add the start to the beginning of the crumb
     *
     * @return void;
     */
    private function setBreadcrumbStart($start) 
    {
        if (count($start)) {
            $active = false;
            if ($start['url'] == $this->route) {
                $active = true;
            }

            $this->addCrumb([
                'link' => '/'.str_replace('/', '', $start['url']),
                'title' => ucfirst($start['title']),
                'active' => $active,
            ]);
        }
    }


    /**
     * Convert the collection to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        $this->build();
        return $this->toJson();
    }

    /**
     * Get the collection of items as JSON.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->crumbs, $options);
    }
}
