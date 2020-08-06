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
use App\Models\EmployeeModel;

class Employee extends BaseController
{
    /**
     * @var EmployeeModel
     */
    private $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }

    public function index()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $data['employees'] = $this->employeeModel->findAll();

        return view('admin/view_employee', $data);
    }

    public function add()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        if ($this->request->getPost('buttonSubmit')) {
            $this->validation->setRuleGroup('addemp');
            if ($this->validation->withRequest($this->request)->run()) {
                $data = $this->request->getPost();
                $this->employeeModel->insertEmployee($data);
                $this->session->setFlashdata('message', 'Employee Successfully Created.');

                return redirect('admin/employee');
            }
        }

        return view('admin/view_addemployee');
    }

    public function edit($cid)
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        if ($this->request->getPost('buttonSubmit')) {
            $this->validation->setRuleGroup('editemp');

            if ($this->validation->withRequest($this->request)->run()) {
                $this->employeeModel->updateEmployee($cid, $this->request->getPost());

                return redirect('admin/employee');
            }
        }

        $data = [
            'userRow' => $this->employeeModel->find($cid),
        ];

        return view('admin/view_editemployee', $data);
    }

    public function delete($cid)
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $this->employeeModel->delete($cid);
        $this->session->setFlashdata('message', 'Employee Successfully deleted.');

        return redirect('admin/employee');
    }
}
