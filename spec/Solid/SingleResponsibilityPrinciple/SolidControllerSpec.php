<?php

namespace spec\Solid\SingleResponsibilityPrinciple;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Solid\SingleResponsibilityPrinciple\EntitiesBundle\PostRepository;

class SolidControllerSpec extends ObjectBehavior
{
    public function let(EngineInterface $templating, PostRepository $repository)
    {
        $this->beConstructedWith($templating, $repository);
    }

    public function it_gets_a_post(EngineInterface $templating, PostRepository $repository)
    {
        $repository->getOnePost(2)->shouldBeCalled();
        $templating->renderResponse(Argument::cetera())->shouldBeCalled();
        $this->simpleAction(2);
    }
}
