<?php

namespace Solid\LiskovSubstitutionPrinciple\NoSolid;

use Solid\LiskovSubstitutionPrinciple\BrowserDriverInterface;
use Solid\LiskovSubstitutionPrinciple\Driver\Selenium as DriverSelenium;

class Selenium implements BrowserDriverInterface
{
    protected $selenium;
    protected $browser;

    public function __construct(DriverSelenium $selenium, $browser)
    {
        $this->selenium = $selenium;
        $this->browser = $browser;
    }

    public function boot()
    {
        $this->selenium->startBrowser($this->browser);
    }

    public function visit($url)
    {
        $this->selenium->visitUrl($url);
    }
}
