<?php

namespace spec\Solid\LiskovSubstitutionPrinciple\Solid;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Solid\LiskovSubstitutionPrinciple\Solid\AdapterBrowser;


class BrowserSpec extends ObjectBehavior
{

    public function it_goes_to_the_url(
        AdapterBrowser $browser
    ) {
        $this->beConstructedWith($browser);
        //We call a method that we didn't expect for Guzzle. Refused Bequest.
        $browser->boot()->shouldBeCalled();
        $browser->visit('url')->shouldBeCalled();
        $this->go('url');
    }
}
