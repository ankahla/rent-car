<?php

/*
 * This file is part of the Rent Car project.
 * (c) Kahla Anouar <kahla.anoir@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity;

class User extends Entity
{
    protected $attributes = [
        'id' => null,
        'su' => 0,
        'type' => 'employee',
        'position' => null,
        'email' => null,
        'password' => null,
        'first_name' => null,
        'last_name' => null,
        'gender' => null,
        'birthday' => null,
        'mobile' => null,
        'address' => null,
    ];
}
