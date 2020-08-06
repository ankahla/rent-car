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

class ManufacturerModel extends Model
{
    protected $table = 'manufacturers';
    protected $allowedFields = [
        'manufacturer_name',
        'manufacturer_logo',
    ];

    public function insertManufacturer($manufacturer_name, $manufacturer_logo = '')
    {
        $data = [
            'manufacturer_name' => $manufacturer_name,
            'manufacturer_logo' => $manufacturer_logo,
        ];

        $this->insert($data);
    }

    public function updateManufacturer($id, $manufacturer_name, $manufacturer_logo = '')
    {
        $data = [
            'manufacturer_name' => $manufacturer_name,
        ];

        if ($manufacturer_logo) {
            $data['manufacturer_logo'] = $manufacturer_logo;
        }

        $this->update($id, $data);
    }
}
