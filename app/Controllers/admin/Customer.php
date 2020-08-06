<?php

/*
 * This file is part of the Rent Car project.
 * (c) Kahla Anouar <kahla.anoir@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\ModelModel;
use App\Models\VehicleModel;

class Customer extends BaseController
{
    /**
     * @var CustomerModel
     */
    private $customerModel;

    /**
     * @var ModelModel
     */
    private $modelModel;

    /**
     * @var VehicleModel
     */
    private $vehicleModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
        $this->modelModel = new ModelModel();
        $this->vehicleModel = new VehicleModel();

        helper('form');
    }

    public function index()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $data['customers'] = $this->customerModel->findAll();

        return view('admin/view_customers', $data);
    }

    public function add()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        if ('POST' === $this->request->getMethod(true)) {
            $this->validation->setRuleGroup('customer');

            if ($this->validation->withRequest($this->request)->run()) {
                $cf_name = $this->request->getPost('cf_name');
                $cl_name = $this->request->getPost('cl_name');
                $c_mobile = $this->request->getPost('c_mobile');
                $c_address = $this->request->getPost('c_address');
                $cin = $this->request->getPost('cin');
                $driveLicenseNumber = $this->request->getPost('drive_license_number');

                $cinFile = $this->upload('cin_file');
                $driveLicenseFile = $this->upload('drive_license_file');

                $this->customerModel->insertCustomer('', $cf_name, $cl_name, $c_mobile, $cin, $c_address, $driveLicenseNumber, $cinFile, $driveLicenseFile);

                return redirect('admin/customer');
            }
        }

        return view('admin/view_add_customer');
    }

    public function edit($id)
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $customer = $this->customerModel->find($id);

        if ('post' !== $this->request->getMethod()) {
            $data['customer'] = $customer;

            return view('admin/view_edit_customer', $data);
        }
        $f_name = $this->request->getPost('cf_name');
        $l_name = $this->request->getPost('cl_name');
        $u_mobile = $this->request->getPost('c_mobile');
        $u_address = $this->request->getPost('c_address');
        $email = $this->request->getPost('c_email');
        $cin = $this->request->getPost('cin');
        $id = $this->request->getPost('c_id');
        $driveLicenseNumber = $this->request->getPost('drive_license_number');

        $cinFile = $this->upload('cin_file');
        $driveLicenseFile = $this->upload('drive_license_file');

        $this->customerModel->updateCustomer($f_name, $l_name, $u_mobile, $u_address, $email, $cin, $id, $cinFile, $driveLicenseFile, $driveLicenseNumber);

        if ($cinFile) {
            $this->deleteFile($customer['cin_file']);
        }

        if ($driveLicenseFile) {
            $this->deleteFile($customer['drive_license_file']);
        }

        return redirect('admin/customer');
    }

    public function show($id)
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $data['customer'] = $this->customerModel->find($id);

        return view('admin/view_show_customer', $data);
    }

    public function delete($id)
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $customer = $this->customerModel->find($id);
        $vehicleId = $customer['vehicle_id'];
        $this->deleteFile($customer['cin_file']);
        $this->deleteFile($customer['drive_license_file']);

        $this->vehicleModel->unlinkCustomer($vehicleId);
        $this->customerModel->delete($id);
        $this->session->setFlashdata('message', 'Client supprimé avec succès.');

        return redirect('admin/customer');
    }
}
