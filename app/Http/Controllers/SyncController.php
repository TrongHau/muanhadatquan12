<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\Helpers;
use App\Library\UploadHandler;
use Illuminate\Support\Facades\Auth;
use  App\Models\DistrictModel;
use  App\Models\ProvinceModel;
use  App\Models\StreetModel;
use  App\Models\WardModel;
use Illuminate\Support\Facades\Hash;
use  App\User;
use App\Models\ArticleForLeaseModel;
use App\Models\ArticleForBuyModel;
use App\Models\TypeModel;
use Backpack\NewsCRUD\app\Models\Article;
use Backpack\NewsCRUD\app\Models\Category;
use Storage;
use Illuminate\Filesystem\Filesystem;

class SyncController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function Province(Request $request, $position = null, $title = null, $id = null) {
        $province = ProvinceModel::get()->toArray();
        file_put_contents(resource_path().'/views/cache/province.blade.php',
            '<?php 
if ( !ENV(\'IN_PHPBB\') )
{
    die(\'Hacking attempt\');
    exit;
}
global $province;
    
$province = ' . var_export($province, true) . ';
?>');

        return response(['Ok']);
    }
    public function articleForBuyDetail(Request $request, $position = null, $title = null, $id = null) {

    }
    public function homeTinTuc() {

        // tin nỗi bật
        $noibat = [];
        $article = Article::select('category_id', 'title', 'slug', 'views', 'image', 'short_content', 'created_at')->where('status', PUBLISHED_ARTICLE)->where('featured', 1)->orderBy('id', 'desc')->limit(10)->get();
        foreach($article as $key => $item) {
            $noibat[$key] = $item->toArray();
            $category = $item->category->first();
            $noibat[$key]['slug_category'] = $category->slug;
            $noibat[$key]['category_parent_id'] = $category->parent_id;
        }

        file_put_contents(resource_path().'/views/cache/tin_noi_bat.blade.php',
            '<?php 
if ( !ENV(\'IN_PHPBB\') )
{
    die(\'Hacking attempt\');
    exit;
}
global $noibat;
$noibat = ' . var_export($noibat, true) . ';
?>');

        return response(['Ok']);
    }
    public function deleteFolderTemp() {
        $files = Storage::allFiles('public/temp/');
        if($files) {
            foreach ($files as $item) {
                Storage::delete($item);
            }
        }
    }
}
