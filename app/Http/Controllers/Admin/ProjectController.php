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
use Illuminate\Http\Request;
use App\Http\Requests;

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
        $this->crud->orderBy('updated_at', 'desc');

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
        $this->crud->addField([
            'name' => 'slug',
            'label' => 'Slug (URL)',
            'type' => 'text',
            'hint' => 'Sẽ được tạo tự động từ tiêu đề của bạn, nếu để trống.',
            // 'disabled' => 'disabled'
        ]);
        $this->crud->addField([
            'name' => 'area',
            'label' => 'Diện tích',
            'type' => 'text',
            'hint' => 'Đơn vị sẽ được tính theo m2',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4',
            ],
        ]);
        $this->crud->addField([
            'name' => 'price_from',
            'label' => 'Giá từ',
            'type' => 'text',
            'hint' => 'Null: Hiển thị đang cập nhật',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4',
            ],
        ]);
        $this->crud->addField([
            'label' => 'Tiến độ',
            'type' => 'select_from_array',
            'name' => 'status',
            'options' => ['Đang cập nhật' => 'Đang cập nhật', 'Đang thi công' => 'Đang thi công', 'Đã hoàn thành' => 'Đã hoàn thành'],
            'allows_null' => false,
            'default' => 'Đang cập nhật',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4',
            ],
        ]);
        $this->crud->addField([
            'name' => 'address',
            'label' => 'Địa chỉ',
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);
        $this->crud->addField([
            'name' => 'owner',
            'label' => 'Chủ đầu tư',
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);

        $this->crud->addField([    // WYSIWYG
            'name' => 'content',
            'label' => 'Nội dung',
            'type' => 'ckeditor',
            'placeholder' => 'Your textarea text here',
        ]);
        $this->crud->addField([    // WYSIWYG
            'name' => 'gallery_image',
            'type' => 'hidden',
        ]);
        $this->crud->setCreateView('vendor.backpack.project.create');
        $this->crud->setEditView('vendor.backpack.project.edit');
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
        if($request->upload_images) {
            $imgs = [];
            foreach($request->upload_images as $item2) {
                $fileName = $item->id.'-'.$item2;
                Storage::disk('public')->move(SOURCE_DATA_TEMP.$item2, Helpers::file_path($item->id, SOURCE_DATA_PROJECT, true).$fileName);
                Storage::disk('public')->move(SOURCE_DATA_THUMBNAIL.$item2, Helpers::file_path($item->id, SOURCE_DATA_PROJECT, true).THUMBNAIL_PATH.$fileName);
                $imgs[] = $fileName;
            }
            $item->gallery_image = json_encode($imgs);
        }

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
        $project = $item;
        $olDataImgs = (array)json_decode($project->gallery_image);
        if($request->remove_imgs) {
            $arrImg = explode('|', $request->remove_imgs);
            foreach ($arrImg as $item2) {
                Storage::disk('public')->delete(Helpers::file_path($project->id, SOURCE_DATA_PROJECT, true).$item2);
                Storage::disk('public')->delete(Helpers::file_path($project->id, SOURCE_DATA_PROJECT, true).THUMBNAIL_PATH.$item2);
            }
        }
        if($request->upload_images) {
            $imgs = [];
            foreach($request->upload_images as $item2) {
                if(!in_array($item2, $olDataImgs)) {
                    $fileName = $project->id.'-'.$item2;
                    Storage::disk('public')->move(SOURCE_DATA_TEMP.$item2, Helpers::file_path($project->id, SOURCE_DATA_PROJECT, true).$fileName);
                    Storage::disk('public')->move(SOURCE_DATA_THUMBNAIL.$item2, Helpers::file_path($project->id, SOURCE_DATA_PROJECT, true).THUMBNAIL_PATH.$fileName);
                }else{
                    $fileName = $item2;
                }
                $imgs[] = $fileName;
            }
            $project->gallery_image = json_encode($imgs);
            $project->save();
        }


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
