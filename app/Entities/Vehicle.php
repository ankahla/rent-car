<?php

/*
 * This file is part of the Rent Car project.
 * (c) Kahla Anouar <kahla.anoir@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity;

/**
 * Class Vehicle.
 *
 * @method setId($id)
 * @method setFeatured($featured)
 * @method setImage($image)
 * @method setManufacturerId($manufacturerId)
 * @method setModelId($modelId)
 * @method setCategory($category)
 * @method setBuyingPrice($buyingPrice)
 * @method setMileage($mileage)
 * @method setAddDate($addDate)
 * @method setStatus($status)
 * @method setRegistrationYear($registrationYear)
 * @method setInsuranceId($insuranceId)
 * @method setInsuranceDate($insuranceDate)
 * @method setInsurer($insurer)
 * @method setGear($gear)
 * @method setDoors($doors)
 * @method setSeats($seats)
 * @method setTank($tank)
 * @method setEngineNo($engineNo)
 * @method setChesisNo($chesisNo)
 * @method setUserId($userId)
 * @method setColor($color)
 * @method setFrontFrameImage($frontFrameImage)
 * @method setBackFrameImage($backFrameImage)
 * @method setLastControlAt($lastControlAt)
 */
class Vehicle extends Entity
{
    protected $attributes = [
        'id' => null,
        'featured' => null,
        'image' => null,
        'manufacturer_id' => null,
        'model_id' => null,
        'category' => null,
        'buying_price' => null,
        'mileage' => null,
        'addDate' => null,
        'status' => null,
        'registration_year' => null,
        'insurance_id' => null,
        'insurance_date' => null,
        'insurer' => null,
        'gear' => null,
        'doors' => null,
        'seats' => null,
        'tank' => null,
        'engine_no' => null,
        'chesis_no' => null,
        'user_id' => null,
        'color' => null,
        'front_frame_image' => null,
        'back_frame_image' => null,
        'last_control_at' => null,
    ];

    public $id;
}
