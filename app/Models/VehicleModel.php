<?php

/*
 * This file is part of the Rent Car project.
 * (c) Kahla Anouar <kahla.anoir@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Models;

use App\Entities\Vehicle;
use CodeIgniter\Model;

class VehicleModel extends Model
{
    const OIL_CHANGE_KM = 10000;
    const INSURANCE_THRESHOLD = 358;
    const CONSTROL_THRESHOLD = 180;

    protected $table = 'vehicles';
    protected $primaryKey = 'vehicle_id';
    protected $returnType = \App\Entities\Vehicle::class;
    protected $allowedFields = [
        'featured',
        'image',
        'front_frame_image',
        'back_frame_image',
        'manufacturer_id',
        'model_id',
        'category',
        'buying_price',
        'mileage',
        'add_date',
        'status',
        'selling_price',
        'sold_date',
        'insurance_id',
        'insurance_date',
        'last_control_at',
        'insurer',
        'gear',
        'doors',
        'seats',
        'tank',
        'engine_no',
        'chesis_no',
        'user_id',
        'registration_year',
        'color',
        'mileage_counter',
    ];

    public function insertVehicle(Vehicle $vehicle)
    {
        $insuranceDateObject = $vehicle->insurance_date ? (\DateTime::createFromFormat('d/m/Y', $vehicle->insurance_date)) : null;
        $lastControlObject = $vehicle->last_control_at ? (\DateTime::createFromFormat('d/m/Y', $vehicle->last_control_at)) : null;
        $vehicle->insurance_date = $insuranceDateObject ? $insuranceDateObject->format('Y-m-d') : '';
        $vehicle->last_control_at = $lastControlObject ? $lastControlObject->format('Y-m-d') : date('Y-m-d');
        $vehicle->add_date = date('c');

        $this->insert($vehicle);
    }

    public function updateVehicle($vehicle)
    {
        $this->where('vehicle_id', $vehicle->getId());

        $insuranceDateObject = $vehicle->getInsuranceDate() ? (\DateTime::createFromFormat('d/m/Y', $vehicle->getInsuranceDate())) : null;
        $lastControlObject = $vehicle->getLastControlAt() ? (\DateTime::createFromFormat('d/m/Y', $vehicle->getLastControlAt())) : null;
        $insuranceDate = $insuranceDateObject ? $insuranceDateObject->format('Y-m-d') : '';
        $lastControlAt = $lastControlObject ? $lastControlObject->format('Y-m-d') : date('Y-m-d');

        $data = [
            'featured' => $vehicle->isFeatured(),
            'manufacturer_id' => $vehicle->getManufacturerId(),
            'model_id' => $vehicle->getModelId(),
            'category' => $vehicle->getCategory(),
            'buying_price' => $vehicle->getBuyingPrice(),
            'mileage' => $vehicle->getMileage(),
            'add_date' => $vehicle->getAddDate(),
            'status' => $vehicle->getStatus(),
            'insurance_id' => $vehicle->getInsuranceId(),
            'insurance_date' => $insuranceDate,
            'last_control_at' => $lastControlAt,
            'insurer' => $vehicle->getInsurer(),
            'gear' => $vehicle->getGear(),
            'doors' => $vehicle->getDoors(),
            'seats' => $vehicle->getSeats(),
            'tank' => $vehicle->getTank(),
            'engine_no' => $vehicle->getEngineNo(),
            'chesis_no' => $vehicle->getChesisNo(),
            'user_id' => $vehicle->getUserId(),
            'registration_year' => $vehicle->getRegistrationYear(),
            'color' => $vehicle->getColor(),
        ];

        if ($vehicle->getImage()) {
            $data['image'] = $vehicle->getImage();
        }

        if ($vehicle->getFrontFrameImage()) {
            $data['front_frame_image'] = $vehicle->getFrontFrameImage();
        }

        if ($vehicle->getBackFrameImage()) {
            $data['back_frame_image'] = $vehicle->getBackFrameImage();
        }

        $this->update('vehicles', $data);
    }

    public function getCategories()
    {
        return [
            ['name' => 'Berline'],
            ['name' => 'Break'],
            ['name' => 'Berline Compacte'],
            ['name' => 'Cabriolet'],
            ['name' => 'Citadine'],
            ['name' => 'Compacte'],
            ['name' => 'Compacte Elite'],
            ['name' => '4x4'],
            ['name' => 'Economique'],
            ['name' => 'Economique Elite'],
            ['name' => 'Familiale'],
            ['name' => 'Grande Routière'],
            ['name' => 'Intermédiaire'],
            ['name' => 'Luxe'],
            ['name' => 'Mini'],
            ['name' => 'Mini Elite'],
            ['name' => 'Mini & éco'],
            ['name' => 'Minibus'],
            ['name' => 'Monospace'],
            ['name' => 'Routière'],
            ['name' => 'Spéciale'],
            ['name' => 'Sport'],
            ['name' => 'SUV'],
            ['name' => 'Tout terrain'],
            ['name' => 'Très Grand'],
        ];
    }

    public function getAll($onlyControlAlert = false)
    {
        $this->resetQuery();

        // $result = $this->get('vehicles');
        $this->select('*,vehicles.vehicle_id as vehicle_id, w_end < NOW() as must_return, insurance_date != "0000-00-00" AND DATEDIFF(NOW(), insurance_date) > '.self::INSURANCE_THRESHOLD.' AS insurance_alert, mileage_counter > '.self::OIL_CHANGE_KM.' AS oil_must_change, last_control_at != "0000-00-00" AND DATEDIFF(NOW(), last_control_at) > '.self::CONSTROL_THRESHOLD.' AS control_alert', false)
            ->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id', 'inner')
            ->join('models', 'models.id = vehicles.model_id', 'inner')
            ->join('customer', 'customer.vehicle_id = vehicles.vehicle_id', 'left');

        if ($onlyControlAlert) {
            $this->having('control_alert = 1');
        }

        return $this->findAll();
    }

    public function getAllByManufacturer()
    {
        $this->resetQuery();

        $this->select('*, COUNT(manufacturer_id) as total')
            ->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id', 'inner')
            ->groupBy('manufacturer_id')
            ->orderBy('total', 'desc');

        return $this->findAll();
    }

    public function getAllByManufacturerSold()
    {
        $this->resetQuery()
            ->select('*, COUNT(manufacturer_id) as total')
            ->where('status', 'sold')
            ->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id', 'inner')
            ->groupBy('manufacturer_id')
            ->orderBy('total', 'desc');

        return $this->findAll();
    }

    public function getLatest()
    {
        $this->resetQuery();

        $this->select('*')
            ->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id', 'inner')
            ->join('models', 'models.id = vehicles.model_id', 'inner')
            ->orderBy('vehicle_id', 'desc')
            ->limit(4);

        return $this->findAll();
    }

    public function getFeatured()
    {
        $this->resetQuery();

        $this->select('*');
        $this->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id', 'inner');
        $this->join('models', 'models.id = vehicles.model_id', 'inner');
        $this->where('featured', 1);
        $this->orderBy('vehicle_id', 'desc');
        $this->limit(4);

        return $this->findAll();
    }

    public function getById($id)
    {
        $this->resetQuery();

        $this
            ->select('*, vehicles.vehicle_id as v_id')
            ->join('customer', 'customer.vehicle_id = vehicles.vehicle_id', 'left')
            ->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id', 'inner')
            ->join('models', 'models.id = vehicles.model_id', 'inner')
            ->where('vehicles.vehicle_id', $id);

        $result = $this->first();

        return reset($result);
    }

    public function updateMileAge($id, $mileage, $mileageCounter)
    {
        $this->update($id, [
            'mileage' => $mileage,
            'mileage_counter' => $mileageCounter,
        ]);
    }

    public function updateInsuranceDate($id, $insuranceDate)
    {
        $this->update($id, [
            'insurance_date' => $insuranceDate,
        ]);
    }

    public function updateLastControlDate($id, $lastControlAt)
    {
        $this->update($id, [
            'last_control_at' => $lastControlAt,
        ]);
    }

    public function resetMileAgeCounter($id)
    {
        $this->update($id, [
            'mileage_counter' => 0,
        ]);
    }

    public function linkToCustomer($vId, $sPrice, $w_start)
    {
        $data = [
               'status' => 'sold',
               'selling_price' => $sPrice,
               'sold_date' => $w_start,
        ];

        $this->update($vId, $data);
    }

    public function unlinkCustomer($vehicleId)
    {
        $data = [
           'status' => 'available',
           'selling_price' => null,
           'sold_date' => null,
        ];

        $this->update($vehicleId, $data);
    }
}
