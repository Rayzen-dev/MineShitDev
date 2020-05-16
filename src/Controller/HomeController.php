<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends BaseController
{


    /**
     * Homepage of application
     *
     * @param HttpFoundation\Request $request Request instance.
     *
     * @return HttpFoundation\Response
     *
     * @Route(
     *     "/",
     *     name = "homepage",
     *     methods = { "GET" }
     * )
     */
    public function indexAction(HttpFoundation\Request $request)
    {
        return $this->render('home/index.html.twig');

    }//end indexAction()
}