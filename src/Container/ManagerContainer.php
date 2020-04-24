<?php
/**
 * Manager container
 *
 * @package   App\Manager
 * @version   0.0.1
 * @author    Rayzen-dev <rayzen.dev@gmail.com>
 * @copyright 2020 MineShit
 */

namespace App\Container;


use App\Manager;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ManagerContainer
 */
class ManagerContainer
{

    /**
     * Container interface
     *
     * @var ContainerInterface $container
     */
    private $container;


    /**
     * ManagerContainer constructor.
     *
     * @param ContainerInterface $container Container interface.
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

    }//end __construct()


    /**
     * Get the entity manager.
     *
     * @return EntityManager
     */
    public function getEntityManager(): EntityManager
    {
        return $this->container->get('doctrine.orm.default_entity_manager');

    }//end getEntityManager()


    /**
     * Get UserManager Class
     *
     * @return Manager\UserManager
     */
    public function getUserManager(): Manager\UserManager
    {
        return $this->container->get(Manager\UserManager::class);

    }//end getUserManager()


}//end class
