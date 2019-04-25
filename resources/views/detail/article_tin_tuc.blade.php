<?php
use App\Library\Helpers;
use Jenssegers\Agent\Agent;
global $all_tin_tuc_moi;
$Agent = new Agent();
?>
@section('meta')
    <base href="{{env('APP_URL')}}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta name="author" content="Bat Dong San Company">
    <meta name="copyright" content="{{env('APP_DOMAIN')}}" />
    <meta name="revisit-after" content="7 Days">
    <meta name="keywords" content="{{implode(';', explode(' ', $article->title))}}">
    <meta name="description" content="{{$article->title}}, {{$article->province}}, {{$article->district}}{{$article->project ? ', dự án '.$article->project : ''}}{{$article->area ? ', Diện tích sử dụng riêng: '.$article->area.'m2' : ''}}{{$article->bed_room ? ', có tới '.$article->bed_room.' phòng ngủ' : ''}}
    {{$article->toilet ? ', có tới '.$article->toilet.' toilet' : ''}}{{$article->contact_name ? ', liên hệ '.$article->contact_name : ''}}{{$article->contact_phone ? ', số điện thoại '.$article->contact_phone : ''}}{{$article->floor ? ', số tầng '.$article->floor : ''}}">
    <link rel="canonical" href="{{url()->current()}}" />
    <link rel="image_src" href="{{env('APP_URL')}}{{$article->gallery_image ? Helpers::file_path($article->id, ($typeOf == 'lease' ? PUBLIC_ARTICLE_LEASE : PUBLIC_ARTICLE_BUY), true).json_decode($article->gallery_image)[0] : THUMBNAIL_DEFAULT }}" />
    <meta name="title" content="{{$article->title}}" />
    <meta property="og:image" content="{{env('APP_URL')}}{{$article->gallery_image ? Helpers::file_path($article->id, ($typeOf == 'lease' ? PUBLIC_ARTICLE_LEASE : PUBLIC_ARTICLE_BUY), true).json_decode($article->gallery_image)[0] : THUMBNAIL_DEFAULT }}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:title" content="{{$article->title}}" />
    <meta property="og:description" content="{{$article->title}}, {{$article->province}}, {{$article->district}}{{$article->project ? ', dự án '.$article->project : ''}}{{$article->area ? ', Diện tích sử dụng riêng: '.$article->area.'m2' : ''}}{{$article->bed_room ? ', có tới '.$article->bed_room.' phòng ngủ' : ''}}
    {{$article->toilet ? ', có tới '.$article->toilet.' toilet' : ''}}{{$article->contact_name ? ', liên hệ '.$article->contact_name : ''}}{{$article->contact_phone ? ', số điện thoại '.$article->contact_phone : ''}}{{$article->floor ? ', số tầng '.$article->floor : ''}}" />
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="{{time()}}" />
@endsection
<?php
if($article->method_article == 'Nhà đất cần mua') {
    $searchMethod = 'nha-dat-can-mua';
}elseif($article->method_article == 'Nhà đất cần thuê') {
    $searchMethod = 'nha-dat-can-thue';
}elseif($article->method_article == 'Nhà đất bán') {
    $searchMethod = 'nha-dat-ban';
}elseif($article->method_article == 'Nhà đất cho thuê') {
    $searchMethod = 'nha-dat-cho-thue';
}
?>
@extends('layouts.app')
@section('content')
    <link rel="stylesheet" type="text/css" href="/css/slidershow.css">
    <div class="main-l">
        <div class="box1-left">
            <h1 class="tieude_nhadat">{{$article->title}}</h1>
        </div>
        <div class="detail_R">
            <div class="document">
                <?php echo $article->content ?>
            </div>
        </div>
    </div>
    @include('layouts.slider_bar_right')
@endsection
@section('contentJS')
    <style>
        .info_no1 li label, .info_no1 li .camcam {
            font-size: 14px;
        }
        .document img {
            width: 100%!important;
            margin-top: 5px;
            margin-bottom: 5px;
        }
    </style>
@endsection