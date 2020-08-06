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
use App\Models\EmployeeModel;
use App\Models\ManufacturerModel;
use App\Models\ModelModel;
use App\Models\VehicleModel;
use Config\Services;

class Dashboard extends BaseController
{
    /**
     * @var VehicleModel
     */
    private $vehicleModel;

    /**
     * @var EmployeeModel
     */
    private $employeeModel;

    /**
     * @var ManufacturerModel
     */
    private $manufacturer;

    /**
     * @var ModelModel
     */
    private $car;

    /**
     * @var \CodeIgniter\View\Parser
     */
    private $parser;

    /**
     * @var CustomerModel
     */
    private $customerModel;

    public function __construct()
    {
        $this->vehicleModel = new VehicleModel();
        $this->customerModel = new CustomerModel();
        $this->employeeModel = new EmployeeModel();
        $this->manufacturer = new ManufacturerModel();
        $this->car = new ModelModel();
        $this->parser = Services::parser();

        helper('form');
    }

    public function index()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $data['vehicles'] = $this->vehicleModel->getAll();
        $data['vehiclesBack'] = $this->customerModel->customerList(true);
        $data['customers'] = $this->customerModel->customerList();
        $data['manufacturers_group'] = $this->vehicleModel->getAllByManufacturer();
        $data['manufacturers_group_sold'] = $this->vehicleModel->getAllByManufacturerSold();

        $data['employees'] = $this->employeeModel->findAll();
        $data['user'] = $this->session->get();

        $graphData = [];

        foreach ($data['customers'] as $vehicle) {
            $startDate = new \DateTime($vehicle['w_start']);
            $endDate = new \DateTime($vehicle['w_end']);
            $GainMonth = $endDate->format('m');
            $GainYear = $endDate->format('Y');
            $BuyingMonth = (new \DateTime($vehicle['add_date']))->format('m');
            $BuyingYear = (new \DateTime($vehicle['add_date']))->format('Y');

            $interval = $startDate->diff($endDate);
            $days = $interval->days ? $interval->days : 1;
            $price = $days * $vehicle['selling_price'];

            $graphData[$BuyingYear][$BuyingMonth]['buying'] = $graphData[$BuyingYear][$BuyingMonth]['buying'] ?? 0;
            $graphData[$GainYear][$GainMonth]['gain'] = $graphData[$GainYear][$GainMonth]['gain'] ?? 0;
            $graphData[$BuyingYear][$BuyingMonth]['buying'] += $vehicle['buying_price'];
            $graphData[$GainYear][$GainMonth]['gain'] += $price;
        }
        $data['graphData'] = $graphData;
        $data['currentYear'] = date('Y');

        return view('admin/view_index', $data);
    }
}
