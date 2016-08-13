<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\DealerRequest as StoreRequest;
use App\Http\Requests\DealerRequest as UpdateRequest;

class DealerCrudController extends CrudController {

	public function __construct() {
        parent::__construct();

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Dealer");
        $this->crud->setRoute("admin/dealer");
        $this->crud->setEntityNameStrings('dealer', 'dealers');

        $this->crud->addColumn([
                                'name' => 'name',
                                'label' => 'Name'
                            ]);
        $this->crud->addColumn([
                                'name' => 'email',
                                'label' => 'Email'
                            ]);
        $this->crud->addColumn([
                                'label' => "City",
                                'type' => 'select',
                                'name' => 'city_id',
                                'entity' => 'city',
                                'attribute' => 'city_name',
                                'model' => "App\Models\City"
                            ]);
        $this->crud->addColumn([
                                'label' => "Province",
                                'type' => 'select',
                                'name' => 'province_id',
                                'entity' => 'province',
                                'attribute' => 'province_name',
                                'model' => "App\Models\Province"
                            ]);
        $this->crud->addColumn([
                                'name' => 'postal_code',
                                'label' => 'Postal Code'
                            ]);
        $this->crud->addColumn([
                                'name' => 'featured',
                                'label' => 'Featured'
                            ]);

        $this->crud->addField([    // TEXT
                                'name' => 'name',
                                'label' => 'Dealer Name',
                                'type' => 'text',
                            ]);
        $this->crud->addField([    // TEXT
                                'name' => 'email',
                                'label' => 'Email',
                                'type' => 'email',
                            ]);
        $this->crud->addField([    // SELECT
                                'label' => "City",
                                'type' => 'select2',
                                'name' => 'city_id',
                                'entity' => 'city',
                                'attribute' => 'city_name',
                                'model' => "App\Models\City"
                            ]);
        $this->crud->addField([    // SELECT
                                'label' => "Province",
                                'type' => 'select2',
                                'name' => 'province_id',
                                'entity' => 'province',
                                'attribute' => 'province_name',
                                'model' => "App\Models\Province"
                            ]);
        $this->crud->addField([    // TEXT
                                'name' => 'postal_code',
                                'label' => 'Postal Code',
                                'type' => 'text',
                            ]);
        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

		//$this->crud->setFromDb();

		// ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']);
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though: 
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable(); 

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

	public function store(StoreRequest $request)
	{
		return parent::storeCrud();
	}

	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}
}
