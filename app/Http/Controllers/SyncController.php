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
use App\Models\ProjectModel;
use Backpack\NewsCRUD\app\Models\Article;
use Backpack\NewsCRUD\app\Models\Category;
use Storage;
use DB;
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
    public function ProjectWard12() {

        // tin nỗi bật
        $noibat = [];
        $project = ProjectModel::select('id', '_name')->where('_province_id', 1)->where('_district_id', 13)->orderBy('_name', 'asc')->get()->toArray();

        file_put_contents(resource_path().'/views/cache/project_ward_12.blade.php',
            '<?php 
if ( !ENV(\'IN_PHPBB\') )
{
    die(\'Hacking attempt\');
    exit;
}
global $projectWard12;
$projectWard12 = ' . var_export($project, true) . ';
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
    public function updateProjectSlideBar() {
        $articleForLease = ArticleForLeaseModel::select('ward', 'ward_id', DB::raw('count(*) as total'))
            ->where('method_article', 'Nhà đất bán')
            ->where('end_news', '>=', time())
            ->where('aprroval', APPROVAL_ARTICLE_PUBLIC)
            ->where('ward', '!=', '')
            ->orderBy('created_at', 'desc')
            ->groupBy('ward', 'ward_id')->get();
        file_put_contents(resource_path().'/views/cache/ward_slide_bar.blade.php',
            '<?php 
if ( !ENV(\'IN_PHPBB\') )
{
    die(\'Hacking attempt\');
    exit;
}
global $wardSlideBar;
$wardSlideBar = ' . var_export($articleForLease->toArray(), true) . ';
?>');

        return response(['Ok']);
    }
}
