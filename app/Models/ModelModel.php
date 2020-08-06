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

class ModelModel extends Model
{
    protected $table = 'models';
    protected $allowedFields = [
        'model_name',
        'manufacturer_id',
        'model_description',
    ];

    public function getAllmodels()
    {
        $this
            ->resetQuery()
            ->select('models.*, manufacturers.manufacturer_name')
            ->join('manufacturers', 'models.manufacturer_id = manufacturers.id');

        return $this->findAll();
    }

    public function insertmodel($modelName, $manufacturerId, $description)
    {
        $data = [
               'model_name' => $modelName,
               'manufacturer_id' => $manufacturerId,
               'model_description' => $description,
        ];

        $this->insert($data);
    }

    public function updateModel($id, $name, $manufacturerId, $description)
    {
        $data = [
            'model_name' => $name,
            'manufacturer_id' => $manufacturerId,
            'model_description' => $description,
        ];

        $this->update($id, $data);
    }
}
