<?php


namespace App\Container;


use App\Entity;
use App\Repository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RepoContainer
{
    /**
     * @var EntityManager $em
     */
    protected $em;

    /**
     * @var ContainerInterface $container
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->em = $container->get('doctrine.orm.default_entity_manager');
    }

    /**
     * Get user repository
     *
     * @return Repository\UserRepository
     */
    public function getUserRepository()
    {
        return $this->em->getRepository(Entity\User::class);
    }
}