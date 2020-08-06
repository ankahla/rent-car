<?php

/*
 * This file is part of the Rent Car project.
 * (c) Kahla Anouar <kahla.anoir@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class model_invoice extends CI_Model
{
    public function insert($customerId, $vehicleId)
    {
        $data = [
               'customer_id' => $customerId,
               'vehicle_id' => $vehicleId,
            ];

        $this->db->insert('invoice', $data);
    }

    public function all()
    {
        $result = $this->db->get('invoice');

        return $result->result_array();
    }

    public function get($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get('invoice');

        return $result->row_array();
    }

    public function update($id, $customerId, $vehicleId)
    {
        $data = [
               'customer_id' => $customerId,
               'vehicle_id' => $vehicleId,
        ];

        $this->db->where('id', $id);
        $this->db->update('invoice', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('invoice');
    }
}
