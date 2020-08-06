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
use App\Models\ModelModel;

class Model extends BaseController
{
    /**
     * @var ManufacturerModel
     */
    private $manufacturerModel;

    /**
     * @var ModelModel
     */
    private $modelModel;

    public function __construct()
    {
        $this->manufacturerModel = new ManufacturerModel();
        $this->modelModel = new ModelModel();

        helper('form');
    }

    public function index()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $data['manufacturers'] = $this->manufacturerModel->findAll();
        $data['models'] = $this->modelModel->getAllModels();

        return view('admin/view_car_model', $data);
    }

    public function addEditModel()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        if ($this->request->getPost('buttonSubmit')) {
            $id = $this->request->getPost('id');
            $model_name = $this->request->getPost('model_name');
            $manufacturer_id = $this->request->getPost('manufacturer_id');
            $description = $this->request->getPost('model_description');

            if ($id) {
                $this->modelModel->updateModel($id, $model_name, $manufacturer_id, $description);
                $this->session->setFlashdata('message', 'Modèle mis à jour avec succès.');
            } else {
                $this->modelModel->insertmodel($model_name, $manufacturer_id, $description);
                $this->session->setFlashdata('message', 'Modèle ajouté avec succès.');
            }
        }

        return redirect('admin/car_model');
    }

    public function deleteModel($cid)
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $this->modelModel->delete($cid);
        $this->session->setFlashdata('message', 'Modèle supprimé avec succès.');

        return redirect('admin/car_model');
    }
}
