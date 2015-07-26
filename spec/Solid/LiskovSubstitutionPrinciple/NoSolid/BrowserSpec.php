<?php

namespace spec\Solid\LiskovSubstitutionPrinciple\NoSolid;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Solid\LiskovSubstitutionPrinciple\NoSolid\Guzzle;

class BrowserSpec extends ObjectBehavior
{
    public function it_goes_to_the_url(
        Guzzle $guzzle
    ) {
        $this->beConstructedWith($guzzle);
        //We call a method that we didn't expect for Guzzle. Refused Bequest.
        $guzzle->boot()->shouldBeCalled();
        $guzzle->visit('url')->shouldBeCalled();
        $this->go('url');
    }
}
