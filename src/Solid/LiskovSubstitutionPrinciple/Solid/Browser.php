<?php

namespace Solid\LiskovSubstitutionPrinciple\Solid;

class Browser
{
    protected $browserDriver;

    public function __construct(AdapterBrowser $browserDriver)
    {
        $this->browserDriver = $browserDriver;
    }

    public function go($url)
    {
        $this->browserDriver->boot();
        $this->browserDriver->visit($url);
    }
}
