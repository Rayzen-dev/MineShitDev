<?php
/**
 * Service Container
 *
 * @package   App\Manager
 * @version   0.0.1
 * @author    Rayzen-dev <rayzen.dev@gmail.com>
 * @copyright 2020 MineShit
 */

namespace App\Container;


use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ServiceContainer
 */
class ServiceContainer
{

    /**
     * Container interface
     *
     * @var ContainerInterface
     */
    private $container;


    /**
     * ServiceContainer constructor.
     *
     * @param ContainerInterface $container Container injection dependency.
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

    }//end __construct()


    /**
     * Return an instance of service by name
     *
     * @param string $name Name of service.
     *
     * @return mixed
     */
    public function getService(string $name)
    {
        return $this->container->get($name);

    }//end getService()


    /**
     * Get parameter by name from paramters.yml
     *
     * @param string $parameter Parameter name.
     *
     * @return mixed
     */
    public function getParameter(string $parameter)
    {
        return $this->container->getParameter($parameter);

    }//end getParameter()


    /**
     * Get the translated sentence
     *
     * @param string $identifier   Key of sentence.
     * @param array  $stringsArray None.
     *
     * @return string
     */
    public function translate(string $identifier, array $stringsArray=[])
    {
        return $this->container->get('translator')->trans($identifier, $stringsArray);

    }//end translate()


}//end class
