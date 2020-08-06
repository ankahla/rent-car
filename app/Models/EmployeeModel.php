<?php

/*
 * This file is part of the Rent Car project.
 * (c) Kahla Anouar <kahla.anoir@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'users';
    protected $returnType = User::class;

    protected $allowedFields = [
        'email',
        'first_name',
        'last_name',
        'birthday',
        'position',
        'type',
        'password',
        'mobile',
        'gender',
        'address',
    ];

    public function insertEmployee($data)
    {
        $this->insert($this->processData($data));
    }

    private function processData($data)
    {
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = md5($data['password']);
        }

        return $data;
    }

    public function updateEmployee($id, $data)
    {
        $this->where('(su != 1)');
        $this->update($id, $this->processData($data));
    }

    public function deleteEmployee($id)
    {
        $this->where('(su != 1)');
        $this->delete($id);
    }
}
