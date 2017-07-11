<?php

namespace Jameron;

class Breadcrumb
{
    /**
     * The route path to current page, excluding domain. e.g. /path/to/current/page
     */
    protected $trail;

    /**
     * Prepends route to beginning of breadcrumb.
     * e.g. home would result in breacrumb path /home/path/to/current/page
     */
    protected $start;

    /**
     * Formatted array of all links in breadcrumb.
     */
    protected $items;

    /**
     * Constructor for Breadcrumb.
     *
     * @param array $trail
     * @param string $start
     * @return void
     */
    public function __construct($trail = null, $start = null)
    {
        $this->trail = ($trail) ? $trail : [];
        $this->start = ($start) ? str_replace('/', '', $start) : '';
        $this->items = [];
    }

    /**
     * Returns a formatted array for the breadcrumb view partial.
     *
     * @return array
     */
    public function build()
    {
        // path to page
        $path = '';
        $active = false;
        $crumbs = explode('/', $this->trail);

        if (! empty($this->start)) {
            if ($this->start['url'] == $this->trail) {
                $active = true;
            }

            $this->items[] = [
                'link' => '/'.$this->start,
                'title' => ucfirst($this->start),
                'active' => $active,
                ];
        }

        $total_number_of_crumbs = count($crumbs);
        foreach ($crumbs as $key => $crumb) {
            $path .= '/'.$crumb;
            if ($key == $total_number_of_crumbs - 1) {
                $active = true;
            }

            $this->items[] = [
                'link' => $path,
                'title' => ucwords(str_replace('-', ' ', str_replace('_', ' ', $crumb))),
                'active' => $active,
                ];
        }

        return $this->items;
    }
}
