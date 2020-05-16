<?php
/**
 * Methods for deal with User
 *
 * @package   App\Manager
 * @version   0.0.1
 * @author    Rayzen-dev <rayzen.dev@gmail.com>
 * @copyright 2020 MineShit
 */

namespace App\Manager;


use App\Entity\User;

/**
 * Class UserManager
 */
class UserManager extends BaseManager
{


    /**
     * Update or create a user
     *
     * @param User $user User to create or update.
     *
     * @return array
     */
    public function saveUser(User $user): array
    {
        $password = null;
        $errors   = [];

        // Check if plainPassword is set for update the password account.
        if (null !== $user->getPlainPassword() && '' !== $user->getPlainPassword()) {
            $encoder  = $this->sc->getService('security.password_encoder');
            $password = $encoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
        }

        // If database does not have a user, we force this one to be an administrator.
        if (true === empty($this->rc->getUserRepository()->checkIfDatabaseHasUser())) {
            $user->setRoles(['ROLE_ADMIN']);
            $user->setIsActive(true);
        }

        try {
            $this->persistEntity($user, true);
        } catch (\Exception $exception) {
            $errors[] = $exception->getMessage();
        }

        return $errors;

    }//end saveUser()


}//end class
