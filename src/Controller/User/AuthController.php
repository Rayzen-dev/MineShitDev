<?php


namespace App\Controller\User;


use App\Controller\BaseController;
use App\Entity\User;
use App\Form\Auth\RegistrationType;
use Symfony\Component\HttpFoundation;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends BaseController
{
    /**
     * @Route(
     *     "/login",
     *     name = "login",
     *     methods = {"GET", "POST"}
     * )
     */
    public function loginAction()
    {

    }

    /**
     * @param HttpFoundation\Request $request
     * @Route(
     *     "/register",
     *     name = "register",
     *     methods = {"GET", "POST"}
     * )
     * @return HttpFoundation\Response
     */
    public function registerAction(HttpFoundation\Request $request): HttpFoundation\Response
    {
        $user = new User();
        $registrationForm = $this->createForm(RegistrationType::class, $user);
        $registrationForm->handleRequest($request);

        if ($registrationForm->isSubmitted()) {
            $fromNavbar = false;

            if ($registrationForm->isValid()) {

            }
        }

        return $this->render('auth/registration.html.twig', [
            'form' => $registrationForm->createView(),
        ]);
    }
}