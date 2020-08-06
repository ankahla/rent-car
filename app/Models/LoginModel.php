<?php

/*
 * This file is part of the Rent Car project.
 * (c) Kahla Anouar <kahla.anoir@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'users';

    public function login($email, $password)
    {
        $this
            ->where('email', $email)
            ->where('password', $password);

        $query = $this->get();

        if (\count($results = $query->getResultObject())) {
            return $results;
        }

        return false;
    }
}
