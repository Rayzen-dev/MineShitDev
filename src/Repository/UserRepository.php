<?php
/**
 * Queries for User's table
 *
 * @package   App\Repository
 * @version   0.0.1
 * @author    Rayzen-dev <rayzen.dev@gmail.com>
 * @copyright 2020 MineShit
 */

namespace App\Repository;

/**
 * Class UserRepository
 */
class UserRepository extends BaseRepository
{

    /**
     * Check if database contains at least one user.
     *
     * @return array|null
     */
    public function checkIfDatabaseHasUser()
    {
        $res = $this->createQueryBuilder('u')
            ->select('u.id')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        return $res;
    }

}//end class
