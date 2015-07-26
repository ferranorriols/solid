<?php

namespace Solid\LiskovSubstitutionPrinciple\NoSolid;

use Solid\LiskovSubstitutionPrinciple\BrowserDriverInterface;

class Browser
{
    protected $browserDriver;

    public function __construct(BrowserDriverInterface $browserDriver)
    {
        $this->browserDriver = $browserDriver;
    }

    public function go($url)
    {
        $this->browserDriver->boot();
        $this->browserDriver->visit($url);
    }
}
