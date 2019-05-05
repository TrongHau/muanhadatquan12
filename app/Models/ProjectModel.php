<?php

namespace App\Models;

use DB;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class ProjectModel extends Model
{
    use CrudTrait;
    use Sluggable, SluggableScopeHelpers;
    protected $table = 'project';
    protected $primaryKey = 'id';
    protected $fillable = ['_name', '_province_id', '_district_id', '_lat', '_lng', 'gallery_image', 'content', 'slug', 'address', 'area', 'status', 'price_from', 'owner', 'views'];
    // The slug is created automatically from the "title" field if no slug exists.
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_name',
            ],
        ];
    }
    public function getSlugOrNameAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->_name;
    }
}
