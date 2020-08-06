<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
        'errors_list' => '_errors_list'
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

    public $addcat = [
        'name' => [
            'label' => 'Categoey Name',
            'rules' => 'required|is_unique[categories.cat_name]'
        ]
    ];

    public $editcat = [
        'name' => [
            'label' => 'Categoey Name',
            'rules' => 'required'
        ]
    ];

    public $editemp = [
        'first_name' => [
            'label' => 'First Name',
            'rules' => 'required'
        ],
        'last_name' => [
            'label' => 'Last Name',
            'rules' => 'required'
        ],
        'address' => [
            'label' => 'Address',
            'rules' => 'required'
        ],
        'mobile' => [
            'label' => 'Mobile',
            'rules' => 'required'
        ]
    ];

    public $addemp = [
        'email' => [
            'label' => 'Email',
            'rules' => 'required|is_unique[users.email]'
        ],
        'first_name' => [
            'label' => 'First Name',
            'rules' => 'required'
        ],
        'last_name' => [
            'label' => 'Last Name',
            'rules' => 'required'
        ],
        'address' => [
            'label' => 'Address',
            'rules' => 'required'
        ],
        'mobile' => [
            'label' => 'Mobile',
            'rules' => 'required'
        ]
    ];

    public $customer = [
        'c_email' => [
            'label' => 'Email',
            'rules' => 'permit_empty|valid_email|is_unique[customer.c_email]'
        ],
        'cf_name' => [
            'label' => 'First Name',
            'rules' => 'required'
        ],
        'cl_name' => [
            'label' => 'Last Name',
            'rules' => 'required'
        ],
        'c_mobile' => [
            'label' => 'Mobile',
            'rules' => 'required'
        ]
    ];

    public $rent = [
        'cf_name' => [
            'label' => 'First Name',
            'rules' => 'required'
        ],
        'cl_name' => [
            'label' => 'Last Name',
            'rules' => 'required'
        ],
        'c_mobile' => [
            'label' => 'Mobile',
            'rules' => 'required|trim'
        ],
        's_price' => [
            'label' => 'Selling Price',
            'rules' => 'required|numeric|greater_than[1]'
        ],
        'w_end' => [
            'label' => 'Warranty End date',
            'rules' => 'required'
        ],
        'v_id' => [
            'label' => 'Vehicle Id',
            'rules' => 'required'
        ],
    ];

    public $vehicle = [
        'manufacturer_id' => ['label' => 'Manufacturer', 'rules' => 'required'],
        'model_id' => ['label' => 'Model', 'rules' => 'required'],
        'category' => ['label' => 'Category ', 'rules' => 'required'],
        'mileage' => ['label' => 'Mileage', 'rules' => 'required'],
        'add_date' => ['label' => 'Adding Date', 'rules' => 'required'],
        'gear' => ['label' => 'Gear', 'rules' => 'required'],
        'seats' => ['label' => 'Number of Seats', 'rules' => 'required'],
        'tank' => ['label' => 'Tank capacity', 'rules' => 'required'],
        'e_no' => ['label' => 'Engine No', 'rules' => 'required'],
        'v_color' => ['label' => 'Color', 'rules' => 'required'],
    ];
}
