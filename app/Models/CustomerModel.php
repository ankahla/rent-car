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

class CustomerModel extends Model
{
    const TAX_STAMP = 0.600;

    protected $table = 'customer';
    protected $primaryKey = 'c_id';
    protected $allowedFields = [
        'c_email',
        'cf_name',
        'cl_name',
        'c_mobile',
        'cin',
        'c_address',
        'drive_license_number',
        'cin_file',
        'drive_license_file',
        'vehicle_id',
        'w_start',
        'w_end',
    ];

    public function insertCustomer($u_email, $f_name, $l_name, $u_mobile, $cin, $u_address, $driveLicenseNumber, $cinFile = '', $driveLicenseFile = '')
    {
        $data = [
               'c_email' => $u_email,
               'cf_name' => $f_name,
               'cl_name' => $l_name,
               'c_mobile' => $u_mobile,
               'cin' => $cin,
               'c_address' => $u_address,
               'drive_license_number' => $driveLicenseNumber,
               'cin_file' => $cinFile,
               'drive_license_file' => $driveLicenseFile,
            ];

        $this->insert($data);
    }

    public function customerList($onlyExpired = false)
    {
        $this
            ->resetQuery()
            ->select('*')
            ->select('(DATEDIFF(w_end, w_start) * selling_price + '.self::TAX_STAMP.') as totalPrice')
            ->join('vehicles', 'customer.vehicle_id = vehicles.vehicle_id', 'inner')
            ->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id', 'inner')
            ->join('models', 'models.id = vehicles.model_id', 'inner');

        if ($onlyExpired) {
            $this->where('w_end < NOW()');
        }

        return $this->findAll();
    }

    public function getFullDataById($id)
    {
        $this->select('*');
        $this->join('vehicles', 'customer.vehicle_id = vehicles.vehicle_id', 'inner');
        $this->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id', 'inner');
        $this->join('models', 'models.id = vehicles.model_id', 'inner');
        $this->where('customer.c_id', $id);
        $this->limit(1);

        return $this->first();
    }

    public function updateCustomer($f_name, $l_name, $u_mobile, $u_address, $email, $cin, $id, $cinFile, $driveLicenseFile, $driveLicenseNumber)
    {
        $data = [
            'cf_name' => $f_name,
            'cl_name' => $l_name,
            'c_mobile' => $u_mobile,
            'c_email' => $email,
            'cin' => $cin,
            'c_address' => $u_address,
            'drive_license_number' => $driveLicenseNumber,
        ];

        if ($cinFile) {
            $data['cin_file'] = $cinFile;
        }

        if ($driveLicenseFile) {
            $data['drive_license_file'] = $driveLicenseFile;
        }

        $this->update($id, $data);
    }

    public function unlinkVehicle($customerId)
    {
        $cdata = [
            'vehicle_id' => null,
            'w_start' => null,
            'w_end' => null,
        ];

        $this->update($customerId, $cdata);
    }

    public function linkVehicle($vId, $cId, $invoiceId, $wStart, $wEnd, $paymentType, $cPass = '1234')
    {
        $this->update($cId, [
            'vehicle_id' => $vId,
            'w_start' => $wStart,
            'w_end' => $wEnd,
            'payment_type' => $paymentType,
            'c_pass' => $cPass,
            'invoice_id' => $invoiceId,
        ]);
    }

    public function create($cfName, $clName, $cEmail, $cMobile, $cPass = '1234'): int
    {
        $this->insert([
            'cf_name' => $cfName,
            'cl_name' => $clName,
            'c_email' => $cEmail,
            'c_mobile' => $cMobile,
            'c_pass' => $cPass,
        ]);

        return $this->getInsertID();
    }
}
