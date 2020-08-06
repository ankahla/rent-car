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
use App\Entities\Vehicle;
use App\Models\CustomerModel;
use App\Models\InvoiceModel;
use App\Models\ManufacturerModel;
use App\Models\ModelModel;
use App\Models\VehicleModel;
use Dompdf\Dompdf;

class Vehicles extends BaseController
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

    /**
     * @var ManufacturerModel
     */
    private $manufacturerModel;

    /**
     * @var Dompdf
     */
    private $dompdf;

    /**
     * @var InvoiceModel
     */
    private $invoiceModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
        $this->manufacturerModel = new ManufacturerModel();
        $this->modelModel = new ModelModel();
        $this->vehicleModel = new VehicleModel();
        $this->invoiceModel = new InvoiceModel();
        $this->dompdf = new Dompdf();

        helper('form');
    }

    public function index()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $data['udata'] = $this->session->userdata;
        $data['vehicles'] = $this->vehicleModel->getAll();
        $data['manufacturers'] = $this->manufacturerModel->findAll();
        $data['models'] = $this->modelModel->getAllModels();
        $data['categories'] = $this->vehicleModel->getCategories();

        return view('admin/view_vehicle', $data);
    }

    public function show($id)
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $vehicle = $this->vehicleModel->getById($id);
        $data['vehicle'] = $vehicle;

        return view('admin/view_show_vehicle', $data);
    }

    public function edit($id)
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $vehicle = $this->vehicleModel->find($id);

        if ('POST' === $this->request->getMethod(true)) {
            $this->vehicleModel->update($id, $this->getFormVehicle($vehicle));

            return redirect('admin/vehicles');
        }
        $data['vehicle'] = $vehicle;
        $data['manufacturers'] = $this->manufacturerModel->findAll();
        $data['models'] = $this->modelModel->getAllModels();
        $data['categories'] = $this->vehicleModel->getCategories();

        return view('admin/view_edit_vehicle', $data);
    }

    public function mileage($id)
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $data['udata'] = $this->session->get();
        $vehicle = $this->vehicleModel->getById($id);

        if ('POST' === $this->request->getMethod(true)) {
            $mileage = $this->request->getPost('mileage');
            $delta = $mileage - $vehicle['mileage'];

            if ($delta > 0) {
                $vehicle['mileage_counter'] += $delta;
            }

            $this->vehicleModel->updateMileAge($id, $mileage, $vehicle['mileage_counter']);
            $this->session->setFlashdata('message', 'Kilométrage mis à jour.');

            return redirect('admin/vehicles');
        }
        $data['vehicle'] = $vehicle;

        return view('admin/view_edit_mileage', $data);
    }

    public function lastControlAt($id)
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $data['udata'] = $this->session->userdata;

        if ('POST' === $this->request->getMethod(true)) {
            $lastControlAt = $this->request->getPost('last_control_at');

            $lastControlAt = \DateTime::createFromFormat('d/m/Y', $lastControlAt);

            $this->vehicleModel->updateLastControlDate($id, $lastControlAt->format('Y-m-d'));
            $this->session->setFlashdata('message', 'Date dernier contrôle mis à jour.');

            return redirect('admin/vehicles');
        }
        $vehicle = $this->vehicleModel->getById($id);

        if ($vehicle['last_control_at'] && '0000-00-00' !== $vehicle['last_control_at']) {
            $lastControlAt = new \DateTime($vehicle['last_control_at']);
            $vehicle['last_control_at'] = $lastControlAt->format('d/m/Y');
        } else {
            $vehicle['last_control_at'] = '';
        }
        $data['vehicle'] = $vehicle;

        return view('admin/view_edit_control_date', $data);
    }

    public function insuranceDate($id)
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $data['udata'] = $this->session->userdata;

        if ('POST' === $this->request->getMethod(true)) {
            $insuranceDate = $this->request->getPost('insurance_date');

            $insuranceDate = \DateTime::createFromFormat('d/m/Y', $insuranceDate);

            $this->vehicleModel->updateInsuranceDate($id, $insuranceDate->format('Y-m-d'));
            $this->session->setFlashdata('message', 'Date assurance mis à jour.');

            return redirect('admin/vehicles');
        }
        $vehicle = $this->vehicleModel->getById($id);

        if ($vehicle['insurance_date'] && '0000-00-00' !== $vehicle['insurance_date']) {
            $insuranceDate = new \DateTime($vehicle['insurance_date']);
            $vehicle['insurance_date'] = $insuranceDate->format('d/m/Y');
        } else {
            $vehicle['insurance_date'] = '';
        }
        $data['vehicle'] = $vehicle;

        return view('admin/view_edit_insurance_date', $data);
    }

    public function resetMileageCounter($id)
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $redirect = $this->request->getGet('redirect');
        $redirect = $redirect ? $redirect : 'admin/vehicles';
        $this->vehicleModel->resetMileAgeCounter($id);

        return redirect($redirect);
    }

    public function invoice($id, $mode = 'html')
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $vehicle = $this->customerModel->getFullDataById($id);

        $invoiceId = substr(($vehicle['invoice_id'] ? $vehicle['invoice_id'] : $id) + 1000000, 1);
        $startDate = new \DateTime($vehicle['w_start']);
        $endDate = new \DateTime($vehicle['w_end']);
        $interval = $startDate->diff($endDate);
        $days = $interval->days ? $interval->days : 1;
        // TVA 19%
        $tax = 19;
        $rentPricePerDayExcluVat = $vehicle['selling_price'] / (1 + ($tax / 100));
        // timbre fiscal
        $stampTax = 0.600;
        $subTotal = $rentPricePerDayExcluVat * $days;
        $total = $subTotal * (1 + ($tax / 100)) + $stampTax;
        $totalLabel = $this->priceToString($total);

        $data = [
            'vehicle' => $vehicle,
            'invoiceId' => $invoiceId,
            'startDate' => $startDate->format('d/m/Y H:i'),
            'endDate' => $endDate->format('d/m/Y H:i'),
            'days' => $days,
            'rentPricePerDayExcluVat' => $rentPricePerDayExcluVat,
            'subTotal' => $subTotal,
            'tax' => $tax,
            'stampTax' => $stampTax,
            'total' => $total,
            'totalLabel' => $totalLabel,
        ];

        if ('html' === $mode) {
            return view('admin/view_invoice', $data);
        } elseif ('pdf' === $mode) {
            $this->dompdf->setPaper('A4');
            $this->dompdf->loadHtml(view('admin/partials/admin_invoice', $data));
            $this->dompdf->render();
            $this->dompdf->stream('facture_'.$invoiceId.'.pdf');
        }
    }

    public function sell()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        if ('POST' === $this->request->getMethod(true)) {
            $cid = $this->request->getPost('vehicle_id');
            $cdata['cid'] = $cid;

            $vehicleId = $this->request->getPost('v_id');
            $sPrice = $this->request->getPost('s_price');
            $wStart = $this->request->getPost('w_start');
            $wStart = (new \DateTime())->createFromFormat('d/m/Y H:i', $wStart)->format('Y-m-d H:i:00');
            $wEnd = $this->request->getPost('w_end');
            $wEnd = (new \DateTime())->createFromFormat('d/m/Y H:i', $wEnd)->format('Y-m-d H:i:00');
            $paymentType = $this->request->getPost('payment_type');

            if ($this->request->getPost('buttonSubmits')) {
                $this->validation->setRuleGroup('rent');

                if (false === $this->validation->withRequest($this->request)->run()) {
                    $data['vRow'] = $this->vehicleModel->get($cid);

                    return view('admin/view_sell', $data);
                }
                $cf_name = $this->request->getPost('cf_name');
                $cl_name = $this->request->getPost('cl_name');
                $c_email = $this->request->getPost('c_email');
                $c_mobile = $this->request->getPost('c_mobile');

                $customerId = $this->customerModel->create($cf_name, $cl_name, ($c_email ? $c_email : ''), $c_mobile);
                $invoiceId = $this->invoiceModel->create($customerId, $vehicleId);
                $this->customerModel->linkVehicle($vehicleId, $customerId, $invoiceId, $wStart, $wEnd, $paymentType);
                $this->vehicleModel->linkToCustomer($vehicleId, $sPrice, $wStart);

                return redirect('admin/vehicles');
            } elseif ($this->request->getPost('buttonSubmitExist')) {
                $customerId = $this->request->getPost('c_id');
                $this->vehicleModel->linkToCustomer($vehicleId, $sPrice, $wStart);
                $invoiceId = $this->invoiceModel->create($customerId, $vehicleId);
                $this->customerModel->linkVehicle($vehicleId, $customerId, $invoiceId, $wStart, $wEnd, $paymentType);

                return redirect('admin/vehicles');
            }
            $cdata['customers'] = $this->customerModel->findAll();

            return view('admin/view_sell', $cdata);
        }

        return redirect('admin/vehicles');
    }

    public function add()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        if ($this->request->getPost('buttonSubmit')) {
            $this->validation->setRuleGroup('vehicle');

            if (false === $this->validation->withRequest($this->request)->run()) {
                $this->showVehicleForm();
            } else {
                $v = $this->getFormVehicle(new Vehicle());
                $this->vehicleModel->insertVehicle($v);
                $this->session->setFlashdata('message', 'Voiture ajoutée avec succès.');

                return redirect('admin/vehicles');
            }
        } else {
            return redirect('admin/vehicles');
        }
    }

    private function getFormVehicle(Vehicle $v): Vehicle
    {
        $v->Id = $this->request->getPost('id');
        $v->manufacturer_id = $this->request->getPost('manufacturer_id');
        $v->model_id = $this->request->getPost('model_id');
        $v->category = $this->request->getPost('category');
        $v->buying_price = $this->request->getPost('b_price') ?? 0;
        $v->mileage = $this->request->getPost('mileage');
        $v->add_date = $this->request->getPost('add_date');
        $v->status = 'available';
        $v->registration_year = $this->request->getPost('registration_year') ?? date('Y') - 1;
        $v->insurance_id = $this->request->getPost('insurance_id');
        $v->insurance_date = $this->request->getPost('insurance_date');
        $v->insurer = $this->request->getPost('insurer');
        $v->gear = $this->request->getPost('gear');
        $v->doors = $this->request->getPost('doors') ?? 4;
        $v->seats = $this->request->getPost('seats');
        $v->tank = $this->request->getPost('tank');
        $v->engine_no = $this->request->getPost('e_no');
        $v->chesis_no = $this->request->getPost('c_no');
        $v->user_id = $this->request->getPost('id');
        $v->color = $this->request->getPost('v_color');
        $v->featured = $this->request->getPost('featured');
        $v->last_control_at = $this->request->getPost('last_control_at');

        if ($fileName = $this->upload('image')) {
            $v->image = $fileName;
        }

        if ($fileName = $this->upload('front_frame_image')) {
            $v->front_frame_image = $fileName;
        }

        if ($fileName = $this->upload('back_frame_image')) {
            $v->back_frame_image = $fileName;
        }

        return $v;
    }

    public function newVehicle()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        return $this->showVehicleForm();
    }

    private function showVehicleForm($data = [])
    {
        $data['manufacturers'] = $this->manufacturerModel->findAll();
        $data['models'] = $this->modelModel->getAllModels();
        $data['categories'] = $this->vehicleModel->getCategories();

        return view('admin/view_add_vehicle', $data);
    }

    public function deleteVehicle()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        if ('POST' === $this->request->getMethod(true)) {
            $id = $this->request->getPost('vehicle_id');
            $this->vehicleModel->delete($id);
            $this->session->setFlashdata('message', 'Véhicule supprimé avec succès.');

            return redirect('admin/vehicles');
        }

        return redirect('admin/vehicles');
    }

    public function deleteReservation()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        if ('POST' === $this->request->getMethod(true)) {
            $vehicleId = $this->request->getPost('v_id');
            $customerId = $this->request->getPost('c_id');

            $redirect = $this->request->getPost('redirect');
            $redirect = $redirect ? $redirect : 'admin/vehicles/soldlist';

            $this->vehicleModel->unlinkCustomer($vehicleId);
            $this->customerModel->unlinkVehicle($customerId);

            $this->session->setFlashdata('message', 'Réservation supprimé avec succès.');

            return redirect($redirect);
        }

        return redirect('admin/vehicles/soldlist');
    }

    public function soldList()
    {
        if (!$this->isAdmin()) {
            return redirect('login');
        }

        $data['cus'] = $this->customerModel->customerList();

        return view('admin/view_sold', $data);
    }

    private function priceToString($a)
    {
        $convert = explode('.', $a);
        if (isset($convert[1]) && '' !== $convert[1]) {
            $converta = str_pad($convert[1], 3, 0);

            return $this->priceToString($convert[0]).' dinars'.' et '.$this->priceToString($converta).' millimes';
        }
        if ($a < 0) {
            return 'moins '.$this->priceToString(-$a);
        }
        if ($a < 17) {
            switch ($a) {
                case 0:
                    return '';
                case 1:
                    return 'un';
                case 2:
                    return 'deux';
                case 3:
                    return 'trois';
                case 4:
                    return 'quatre';
                case 5:
                    return 'cinq';
                case 6:
                    return 'six';
                case 7:
                    return 'sept';
                case 8:
                    return 'huit';
                case 9:
                    return 'neuf';
                case 10:
                    return 'dix';
                case 11:
                    return 'onze';
                case 12:
                    return 'douze';
                case 13:
                    return 'treize';
                case 14:
                    return 'quatorze';
                case 15:
                    return 'quinze';
                case 16:
                    return 'seize';
            }
        } elseif ($a < 20) {
            return 'dix-'.$this->priceToString($a - 10);
        } elseif ($a < 100) {
            if (0 === $a % 10) {
                switch ($a) {
                    case 20:
                        return 'vingt';
                    case 30:
                        return 'trente';
                    case 40:
                        return 'quarante';
                    case 50:
                        return 'cinquante';
                    case 60:
                        return 'soixante';
                    case 70:
                        return 'soixante-dix';
                    case 80:
                        return 'quatre-vingt';
                    case 90:
                        return 'quatre-vingt-dix';
                }
            } elseif (1 === substr($a, -1)) {
                if (((int) ($a / 10) * 10) < 70) {
                    return $this->priceToString((int) ($a / 10) * 10).'-et-un';
                } elseif (71 === $a) {
                    return 'soixante-et-onze';
                } elseif (81 === $a) {
                    return 'quatre-vingt-un';
                } elseif (91 === $a) {
                    return 'quatre-vingt-onze';
                }
            } elseif ($a < 70) {
                return $this->priceToString($a - $a % 10).'-'.$this->priceToString($a % 10);
            } elseif ($a < 80) {
                return $this->priceToString(60).'-'.$this->priceToString($a % 20);
            } else {
                return $this->priceToString(80).'-'.$this->priceToString($a % 20);
            }
        } elseif (100 === $a) {
            return 'cent';
        } elseif ($a < 200) {
            return $this->priceToString(100).' '.$this->priceToString($a % 100);
        } elseif ($a < 1000) {
            return $this->priceToString((int) ($a / 100)).' '.$this->priceToString(100).' '.$this->priceToString($a % 100);
        } elseif (1000 === $a) {
            return 'mille';
        } elseif ($a < 2000) {
            return $this->priceToString(1000).' '.$this->priceToString($a % 1000).' ';
        } elseif ($a < 1000000) {
            return $this->priceToString((int) ($a / 1000)).' '.$this->priceToString(1000).' '.$this->priceToString($a % 1000);
        } elseif (1000000 === $a) {
            return 'millions';
        } elseif ($a < 2000000) {
            return $this->priceToString(1000000).' '.$this->priceToString($a % 1000000).' ';
        } elseif ($a < 1000000000) {
            return $this->priceToString((int) ($a / 1000000)).' '.$this->priceToString(1000000).' '.$this->priceToString($a % 1000000);
        }
    }
}
