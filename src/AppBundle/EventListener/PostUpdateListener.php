<?php

namespace AppBundle\EventListener;

use AppBundle\Entity\Artist;
use AppBundle\Entity\Music;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Orm\Route;
use Symfony\Cmf\Component\Routing\RouteObjectInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PostUpdateListener
{

    protected $container;

    public function __construct(ContainerInterface $container) // this is @service_container

    {
        $this->container = $container;
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $entityManager = $args->getObjectManager();
        $contentRepository = $this->container->get('cmf_routing.content_repository');

        if ((!$entity instanceof Artist) && (!$entity instanceof Music)) {
            return;
        }

        if (count($entity->getRoutes())) {
            $route = $entity->getRoute();
        } else {
            $route = new Route();
        }

        if ($entity instanceof Artist) {
            $route->setName($entity->getPath());
            $route->setStaticPrefix('/' . $entity->getPath() . '/');
            $route->setDefault(RouteObjectInterface::CONTENT_ID, $contentRepository->getContentId($entity));
            $route->setContent($entity);
        }

        if ($entity instanceof Music) {
            $route->setName($entity->getArtist()->getPath() . '/' . $entity->getLink());
            $route->setStaticPrefix('/' . $entity->getArtist()->getPath() . '/' . $entity->getLink() );
            $route->setDefault(RouteObjectInterface::CONTENT_ID, $contentRepository->getContentId($entity));
            $route->setContent($entity);
        }

        if (!count($entity->getRoutes())) {
            $entity->addRoute($route);
        }

        $entityManager->persist($entity);
        $entityManager->flush();

    }

}
