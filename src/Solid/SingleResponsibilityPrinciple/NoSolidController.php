<?php

namespace Solid\SingleResponsibilityPrinciple;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NoSolidController extends Controller
{
    public function simpleAction($id)
    {
        $posts = $this->getDoctrine()
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('p')
            ->from('EntitiesBundle:Post', 'p')
            ->andWhere('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute()
        ;

        return $this->render('WHVBlogBundle:Blog:post.html.twig', [
                'post'        => current($posts),
                'current_url' => '',
                'from'        => 'post',
            ]
        );
    }
}