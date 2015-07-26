<?php

namespace spec\Solid\SingleResponsibilityPrinciple;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Solid\SingleResponsibilityPrinciple\EntitiesBundle\Post;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\DependencyInjection\ContainerInterface;

class NoSolidControllerSpec extends ObjectBehavior
{
    public function it_gets_a_post(
        ContainerInterface $container,
        EntityManager $em,
        QueryBuilder $builder,
        AbstractQuery $query,
        Post $post,
        EngineInterface $templating,
        Registry $registry
    ) {
        $this->setContainer($container);
        $container->has('doctrine')->willReturn(true);
        $container->has('templating')->willReturn(true);
        $container->get('templating')->willReturn($templating);
        $container->get('doctrine')->willReturn($registry);
        $registry->getEntityManager()->willReturn($em);
        $em->createQueryBuilder()->willReturn($builder);
        $builder->select('p')->willReturn($builder);
        $builder->from('EntitiesBundle:Post', 'p')->willReturn($builder);
        $builder->andWhere('p.id = :id')->willReturn($builder);
        $builder->setParameter('id', 3)->willReturn($builder);
        $builder->getQuery()->willReturn($query);
        $query->execute()->willReturn($post);
        $templating->renderResponse(Argument::cetera())->shouldBeCalled();

        $this->simpleAction(3);
    }
}
