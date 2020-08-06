<?php

/*
 * This file is part of the Rent Car project.
 * (c) Kahla Anouar <kahla.anoir@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Controllers;

use App\Models\ManufacturerModel;
use App\Models\ModelModel;
use App\Models\VehicleModel;
use Config\Services;

class Pages extends BaseController
{
    private $vehicle;
    private $manufacturer;
    private $car;

    /**
     * @var \CodeIgniter\View\Parser
     */
    private $parser;

    public function __construct()
    {
        $this->vehicle = new VehicleModel();
        $this->manufacturer = new ManufacturerModel();
        $this->car = new ModelModel();
        $this->parser = Services::parser();
    }

    public function index()
    {
        $data['vehicles'] = $this->vehicle->getLatest();
        $data['featured'] = $this->vehicle->getFeatured();
        $data['manufacturers'] = $this->manufacturer->findAll();
        $data['models'] = $this->car->getAllModels();

        return view('public/view_index', $data);
    }

    public function show($vehicle_id)
    {
        $data['vehicle'] = $this->vehicle->getById($vehicle_id);

        return view('public/view_single.php', $data);
    }
}
