<?php


namespace App\Controller;


use App\Container\ManagerContainer;
use App\Container\ServiceContainer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{

    protected $mc;
    protected $sc;

    public function __construct(ManagerContainer $mc, ServiceContainer $sc)
    {
        $this->mc = $mc;
        $this->sc = $sc;
    }

    /**
     * Check if session allowed to access page
     *
     * @param string $role
     * @return bool
     */
    protected function checkAccess(string $role)
    {
        return $this->container->get('security.authorization_checker')->isGranted(ucwords($role));
    }
}