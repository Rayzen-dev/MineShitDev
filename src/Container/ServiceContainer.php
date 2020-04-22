<?php


namespace App\Container;


use Symfony\Component\DependencyInjection\ContainerInterface;

class ServiceContainer
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $parameter
     * @return mixed
     */
    public function getParameter(string $parameter)
    {
        return $this->container->getParameter($parameter);
    }
    /**
     * @param string $identifier
     * @param array $stringsArray
     * @return mixed
     */
    public function translate(string $identifier, array $stringsArray = [])
    {
        return $this->container->get('translator')->trans( $identifier, $stringsArray );
    }
}