<?php

namespace spec\Solid\DependencyInversionPrinciple\NoSolid;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Persisters\Entity\EntityPersister;
use Doctrine\ORM\UnitOfWork;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PostRepositorySpec extends ObjectBehavior
{
    public function it_gets_one_post_with_the_given_id(
        EntityManager $em,
        ClassMetadata $classMetadata,
        UnitOfWork $unitOfWork,
        EntityPersister $entityPersister
    ) {
        $classMetadata->name = 'postRepository';
        $this->beConstructedWith($em, $classMetadata);
        $em->getUnitOfWork()->willReturn($unitOfWork);
        $unitOfWork->getEntityPersister('postRepository')->willReturn($entityPersister);
        $entityPersister->load(['id' => 3], Argument::cetera())->shouldBeCalled();

        $this->getOnePost(3);
    }
}
