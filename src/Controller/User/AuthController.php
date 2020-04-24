<?php
/**
 * Auth Controller
 *
 * @package   App\Manager
 * @version   0.0.1
 * @author    Rayzen-dev <rayzen.dev@gmail.com>
 * @copyright 2020 MineShit
 */

namespace App\Controller\User;


use App\Controller\BaseController;
use App\Entity\User;
use App\Form\Auth\RegistrationType;
use Symfony\Component\HttpFoundation;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AuthController
 */
class AuthController extends BaseController
{


    /**
     * Login action page
     *
     * @Route(
     *     "/login",
     *     name = "login",
     *     methods = {"GET", "POST"}
     * )
     *
     * @return void
     */
    public function loginAction()
    {

    }//end loginAction()


    /**
     * Method for registration
     *
     * @param HttpFoundation\Request $request Request instance.
     *
     * @return HttpFoundation\Response
     *
     * @Route(
     *     "/register",
     *     name = "register",
     *     methods = {"GET", "POST"}
     * )
     */
    public function registerAction(HttpFoundation\Request $request): HttpFoundation\Response
    {
        $user             = new User();
        $registrationForm = $this->createForm(RegistrationType::class, $user);
        $registrationForm->handleRequest($request);

        if (true === $registrationForm->isSubmitted()) {
            $fromNavbar = false;

            if (true === $registrationForm->isValid()) {
                $manager = $this->mc->getUserManager();

                $errors = $manager->saveUser($user);
            }
        }

        return $this->render(
            'auth/registration.html.twig',
            [
                'form' => $registrationForm->createView(),
            ]
        );

    }//end registerAction()


}//end class
