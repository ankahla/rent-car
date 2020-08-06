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
use App\Models\ManufacturerModel;

class Manufacturer extends BaseController
{
    /**
     * @var ManufacturerModel
     */
    private $manufacturerModel;

    public function __construct()
    {
        $this->manufacturerModel = new ManufacturerModel();
        helper('form');
    }

    public function index()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $data['manufacturers'] = $this->manufacturerModel->findAll();

        return view('admin/view_manufacturers', $data);
    }

    public function addManufacturer()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        if ($this->request->getPost('submit')) {
            $manufacturer_name = $this->request->getPost('manufacturer_name');
            $this->session->setFlashdata('message', 'Nouvelle marque ajouté avec succès.');
            $this->manufacturerModel->insertManufacturer($manufacturer_name);
        }

        return redirect('admin/manufacturers');
    }

    public function updateManufacturer()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        if ($this->request->getPost('submit')) {
            $manufacturer_name = $this->request->getPost('manufacturer_name');
            $id = $this->request->getPost('id');
            $this->session->setFlashdata('message', 'Mise à jour effectué avec succès.');
            $this->manufacturerModel->updateManufacturer($id, $manufacturer_name);
        }

        return redirect('admin/manufacturers');
    }

    public function deleteManufacturer($cid)
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $this->manufacturerModel->delete($cid);
        $this->session->setFlashdata('message', 'Manufacturer Successfully Deleted.');

        return redirect('admin/manufacturers');
    }
}
