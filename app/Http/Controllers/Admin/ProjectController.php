<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\app\Http\Requests\CrudRequest as StoreRequest;
use Backpack\CRUD\app\Http\Requests\CrudRequest as UpdateRequest;
use App\User;
use App\Models\ArticleForLeaseModel;
use App\Models\ArticleForBuyModel;
use App\Http\Controllers\SyncController;
use Storage;
use Illuminate\Support\Facades\Input;
use App\Models\ProjectModel;
use App\Library\Helpers;


class ProjectController extends CrudController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Models\ProjectModel");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/project');
        $this->crud->setEntityNameStrings('Dự án', 'Thêm dự án quận 12');
        $this->crud->orderBy('_name', 'desc');

        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
//        $this->crud->addColumn([
//                                'name' => 'created_at',
//                                'label' => 'Date',
//                                'type' => 'date',
//        ]);
        $this->crud->addClause('where', '_province_id', '=', 1);
        $this->crud->addClause('where', '_district_id', '=', 13);
        $this->crud->enableBulkActions();
        $this->crud->addBulkDeleteButton();
        $this->crud->addColumn([
            'name'  => 'id',
            'label' => 'ID',
        ]);
        $this->crud->addColumn([
            'name' => '_name',
            'label' => 'Tên dự án',
        ]);
        $this->crud->addField([
            'name' => '_name',
            'label' => 'Tên dự án',
            'type' => 'text',
            'placeholder' => 'Nhập tên dự quận 12',
        ]);
    }

    public function store(StoreRequest $request)
    {
        $this->crud->hasAccessOrFail('create');
        // fallback to global request instance
        if (is_null($request)) {
            $request = \Request::instance();
        }

        // replace empty values with NULL, so that it will work with MySQL strict mode on
        foreach ($request->input() as $key => $value) {
            if (empty($value) && $value !== '0') {
                $request->request->set($key, null);
            }
        }
        // insert item in the db
        Input::merge(['_province_id' => 1, '_district_id' => 13]);
        $item = $this->crud->create($request->except(['save_action', '_token', '_method', 'current_tab']));
        $item->_province_id = 1;
        $item->_district_id = 13;
        $item->save();
        $this->data['entry'] = $this->crud->entry = $item;

        // show a success message
        \Alert::success(trans('backpack::crud.insert_success'))->flash();

        // save the redirect choice for next time
        $this->setSaveAction();
        $sync = new SyncController();
        $sync->ProjectWard12();
        return $this->performSaveAction($item->getKey());
    }

    public function destroy($id)
    {
        $this->crud->hasAccessOrFail('delete');

        // get entry ID from Request (makes sure its the last ID for nested resources)
        $sync = new SyncController();
        $sync->ProjectWard12();
        $id = $this->crud->getCurrentEntryId() ?? $id;
        return $this->crud->delete($id);
    }

    public function update(UpdateRequest $request)
    {
        $this->crud->hasAccessOrFail('update');

        // fallback to global request instance
        if (is_null($request)) {
            $request = \Request::instance();
        }

        // replace empty values with NULL, so that it will work with MySQL strict mode on
        foreach ($request->input() as $key => $value) {
            if (empty($value) && $value !== '0') {
                $request->request->set($key, null);
            }
        }

        // update the row in the db
        $item = $this->crud->update($request->get($this->crud->model->getKeyName()),
            $request->except('save_action', '_token', '_method', 'current_tab'));
        $this->data['entry'] = $this->crud->entry = $item;

        // show a success message
        \Alert::success(trans('backpack::crud.update_success'))->flash();

        // save the redirect choice for next time
        $this->setSaveAction();
        $sync = new SyncController();
        $sync->ProjectWard12();
        return $this->performSaveAction($item->getKey());
    }
}
