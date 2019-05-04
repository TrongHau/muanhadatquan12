<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use DB;

class ProjectModel extends Model
{
    use CrudTrait;
    public $timestamps = false;
    protected $table = 'project';
    protected $primaryKey = 'id';
    protected $fillable = ['_name', '_province_id', '_district_id', '_lat', '_lng', 'gallery_image', 'content'];
}
