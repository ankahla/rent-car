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

class InvoiceModel extends Model
{
    protected $table = 'invoice';
    protected $allowedFields = [
        'customer_id',
        'vehicle_id',
    ];

    public function create($customerId, $vehicleId)
    {
        $this->insert(
            [
                'customer_id' => $customerId,
                'vehicle_id' => $vehicleId,
            ]
        );

        return $this->getInsertID();
    }
}
