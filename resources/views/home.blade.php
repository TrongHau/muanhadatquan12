<?php
use App\Library\Helpers;
use Jenssegers\Agent\Agent;
global $noibat;
$Agent = new Agent();
?>
@section('meta')
    <base href="{{env('APP_URL')}}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta name="author" content="Bat Dong San Company">
    <meta name="copyright" content="{{env('APP_DOMAIN')}}" />
    <meta name="revisit-after" content="7 Days">
    <meta name="keywords" content="Nhà đất Quận 12, bán đất quận 12, bán nhà quận 12, nha dat quan 12, mua ban nha dat, dat nen quan 12; batdongsan; rao ban bat dong san; bds; bat dong san Ho Chi Minh; bat dong san Ha Noi; cap nhat bat dong san; thu bat dong san; mua dat; thue dat; can thue nha; can thue dat">
    <meta name="description" content="Nhà đất bán, Bán căn hộ chung cư, Bán nhà biệt thự, liền kề, Bán nhà mặt phố, Bán đất nền dự án, Bán đất, Nhà đất cho thuê, Cho thuê căn hộ chung cư,
        Cho thuê nhà riêng, Cho thuê nhà mặt phố, Cho thuê nhà trọ, phòng trọ, Cho thuê văn phòng, Cho thuê kho, nhà xưởng, đất, Mua nhà riêng, Cần thuê kho, nhà xưởng, đất, Cần thuê nhà trọ, phòng trọ, Tất cả các loại đất bán">
    <link rel="canonical" href="{{url()->current()}}" />
    <link rel="image_src" href="{{env('APP_URL') . THUMBNAIL_DEFAULT}}" />
    <meta name="title" content="Chuyên Mua Bán Nhà đất Quận 12 giá rẻ," />
    <meta property="og:image" content="{{env('APP_URL') . THUMBNAIL_DEFAULT}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:title" content="Bất Động Sản Company" />
    <meta property="og:description" content="batdongsan; rao ban bat dong san; bds; bat dong san Ho Chi Minh; bat dong san Ha Noi; cap nhat bat dong san; thu bat dong san; mua dat; thue dat; can thue nha; can thue dat">
    <meta name="description" content="Nhà đất bán, Bán căn hộ chung cư, Bán nhà biệt thự, liền kề, Bán nhà mặt phố, Bán đất nền dự án, Bán đất, Nhà đất cho thuê, Cho thuê căn hộ chung cư,
        Cho thuê nhà riêng, Cho thuê nhà mặt phố, Cho thuê nhà trọ, phòng trọ, Cho thuê văn phòng, Cho thuê kho, nhà xưởng, đất, Mua nhà riêng, Cần thuê kho, nhà xưởng, đất, Cần thuê nhà trọ, phòng trọ, Tất cả các loại đất bán" />
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="{{time()}}" />
@endsection
@extends('layouts.app')
@section('content')
    <div class="main-l">
        <div class="box1-left">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span>
                NHÀ ĐẤT BÁN MỚI NHẤT
            </div>
            <div class='groupbox clearfix' style="margin-bottom: 5px;">
                <div id="media" class="list-view">
                    <ul class="clearfix">
                        @foreach($articleForLease_lease as $key => $item)
                            <div class="box_NDnoibat" style="height: 115px;">
                                <div class="img_NDnoibat">
                                    <a href="/{{$item->prefix_url.'-bds-'.$item->id}}"><img alt="{{$item['title']}}" src="{{$item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_LEASE, true).THUMBNAIL_PATH.json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT }}"></a>
                                    <span class="iconHot"></span>
                                    <span class="theloai">{{$item['type_article']}}</span>
                                </div>
                                <div class="text_NDnoibat">
                                    <ul>
                                        <li>
                                            <h3><a href="/{{$item->prefix_url.'-bds-'.$item->id}}" title="{{$item['title']}}">{{ mb_substr($item['title'],0 , HOME_SUBSTRING, "utf-8")}}...</a></h3>
                                        </li>
                                        <li>DT:{{($item->area_from != null && $item->area_to != null) ? ($item->area_from. ' - ' .$item->area_to.' m²') : ($item->area ? $item->area.' m²' : 'Chưa xác định')}} | Giá:<span class="camcam">{{($item->price_from != null && $item->price_to != null) ? ($item->price_from. ' - ' .$item->price_to.' '.$item->ddlPriceType) : ($item->price_real == 0 ? 'Thỏa thuận' : $item->price.' '.$item->ddlPriceType)}}</span></li>
                                        <li><a class="link_blue"
                                               href="/tim-kiem-nang-cao/nha-dat-ban/-1/-1/{{$item->district_id}}/-1/-1/-1/-1/-1/-1/-1"
                                               title="Bán nhà riêng tại {{$item->district}}">{{$item->district}}</a>, <a
                                                    class="link_blue"
                                                    href="/tim-kiem-nang-cao/nha-dat-ban/-1/{{$item->province_id}}/-1/-1/-1/-1/-1/-1/-1/-1"
                                                    title="Bán nhà riêng tại {{$item->province}}">{{$item->province}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                    <div class='results-wrap clearfix'><div class="summary"></div>
                        <div class="pager clearfix"><ul class="pager" id="yw0"><li class="first hidden"><a href="nha-dat.html"><<</a></li>
                                <li class="page selected"><a href="{{env("APP_URL")}}/nha-dat-ban?page=1">1</a></li>
                                <li class="page"><a href="{{env("APP_URL")}}/nha-dat-ban?page=2">2</a></li>
                                <li class="page"><a href="{{env("APP_URL")}}/nha-dat-ban?page=3">3</a></li>
                                <li class="next"><a href="{{env("APP_URL")}}/nha-dat-ban?page=4"></a></li>
                                <li class=""><a href="{{env("APP_URL")}}/nha-dat-ban?page=2">>></a></li></ul></div></div>
                </div>    </div>
        </div>
        <style>
            .results-wrap{
                margin-bottom: 20px;
            }
        </style>
        <div class="box1-left">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span>
                TIN NHÀ ĐẤT CHO THUÊ
            </div>
            <div class='groupbox clearfix' style="margin-bottom: 5px;">
                <div id="media" class="list-view">
                    <ul class="clearfix">
                        @foreach($articleForLease_buy as $key => $item)
                            <div class="box_NDnoibat" style="height: 115px;">
                                <div class="img_NDnoibat">
                                    <a href="/{{$item->prefix_url.'-bds-'.$item->id}}"><img alt="{{$item['title']}}" src="{{$item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_LEASE, true).THUMBNAIL_PATH.json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT }}"></a>
                                    <span class="iconHot"></span>
                                    <span class="theloai">{{$item['type_article']}}</span>
                                </div>
                                <div class="text_NDnoibat">
                                    <ul>
                                        <li>
                                            <h3><a href="/{{$item->prefix_url.'-bds-'.$item->id}}" title="{{$item['title']}}">{{ mb_substr($item['title'],0 , HOME_SUBSTRING, "utf-8")}}...</a></h3>
                                        </li>
                                        <li>DT:{{($item->area_from != null && $item->area_to != null) ? ($item->area_from. ' - ' .$item->area_to.' m²') : ($item->area ? $item->area.' m²' : 'Chưa xác định')}} | Giá:<span class="camcam">{{($item->price_from != null && $item->price_to != null) ? ($item->price_from. ' - ' .$item->price_to.' '.$item->ddlPriceType) : ($item->price_real == 0 ? 'Thỏa thuận' : $item->price.' '.$item->ddlPriceType)}}</span></li>
                                        <li><a class="link_blue"
                                               href="/tim-kiem-nang-cao/nha-dat-cho-thue/-1/-1/{{$item->district_id}}/-1/-1/-1/-1/-1/-1/-1"
                                               title="Bán nhà riêng tại {{$item->district}}">{{$item->district}}</a>, <a
                                                    class="link_blue"
                                                    href="/tim-kiem-nang-cao/nha-dat-cho-thue/-1/{{$item->province_id}}/-1/-1/-1/-1/-1/-1/-1/-1"
                                                    title="Bán nhà riêng tại {{$item->province}}">{{$item->province}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                    <div class='results-wrap clearfix'><div class="summary"></div>
                        <div class="pager clearfix"><ul class="pager" id="yw0">
                                <li class="page selected"><a href="{{env("APP_URL")}}/nha-dat-cho-thue?page=1">1</a></li>
                                <li class="page"><a href="{{env("APP_URL")}}/nha-dat-cho-thue?page=2">2</a></li>
                                <li class="page"><a href="{{env("APP_URL")}}/nha-dat-cho-thue?page=3">3</a></li>
                                <li class="next"><a href="{{env("APP_URL")}}/nha-dat-cho-thue?page=4"></a></li>
                                <li class=""><a href="{{env("APP_URL")}}/nha-dat-cho-thue?page=2">>></a></li></ul></div></div>
                </div>    </div>
        </div>

        <style>
            .results-wrap{
                margin-bottom: 20px;
            }
        </style>
        <div class="box1-left">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span>
                TIN NHÀ ĐẤT CẦN MUA
            </div>
            <div class='groupbox clearfix' style="margin-bottom: 5px;">
                <div id="media" class="list-view">
                    <ul class="clearfix">
                        @foreach($articleForBuy_lease as $key => $item)
                            <div class="box_NDnoibat" style="height: 115px;">
                                <div class="img_NDnoibat">
                                    <a href="/{{$item->prefix_url.'-bds-'.$item->id}}"><img alt="{{$item['title']}}" src="{{$item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_BUY, true).THUMBNAIL_PATH.json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT }}"></a>
                                    <span class="iconHot"></span>
                                    <span class="theloai">{{$item['type_article']}}</span>
                                </div>
                                <div class="text_NDnoibat">
                                    <ul>
                                        <li>
                                            <h3><a href="/{{$item->prefix_url.'-bds-'.$item->id}}" title="{{$item['title']}}">{{ mb_substr($item['title'],0 , HOME_SUBSTRING, "utf-8")}}...</a></h3>
                                        </li>
                                        <li>DT:{{($item->area_from != null && $item->area_to != null) ? ($item->area_from. ' - ' .$item->area_to.' m²') : ($item->area ? $item->area.' m²' : 'Chưa xác định')}} | Giá:<span class="camcam">{{($item->price_from != null && $item->price_to != null) ? ($item->price_from. ' - ' .$item->price_to.' '.$item->ddlPriceType) : ($item->price_real == 0 ? 'Thỏa thuận' : $item->price.' '.$item->ddlPriceType)}}</span></li>
                                        <li><a class="link_blue"
                                               href="/tim-kiem-nang-cao/nha-dat-can-mua/-1/-1/{{$item->district_id}}/-1/-1/-1/-1/-1/-1/-1"
                                               title="Bán nhà riêng tại {{$item->district}}">{{$item->district}}</a>, <a
                                                    class="link_blue"
                                                    href="/tim-kiem-nang-cao/nha-dat-can-mua/-1/{{$item->province_id}}/-1/-1/-1/-1/-1/-1/-1/-1"
                                                    title="Bán nhà riêng tại {{$item->province}}">{{$item->province}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                    <div class='results-wrap clearfix'><div class="summary"></div>
                        <div class="pager clearfix"><ul class="pager" id="yw0">
                                <li class="page selected"><a href="{{env("APP_URL")}}/nha-dat-can-mua?page=1">1</a></li>
                                <li class="page"><a href="{{env("APP_URL")}}/nha-dat-can-mua?page=2">2</a></li>
                                <li class="page"><a href="{{env("APP_URL")}}/nha-dat-can-mua?page=3">3</a></li>
                                <li class="next"><a href="{{env("APP_URL")}}/nha-dat-can-mua?page=4"></a></li>
                                <li class=""><a href="{{env("APP_URL")}}/nha-dat-can-mua?page=2">>></a></li></ul></div></div>
                </div>    </div>
        </div>

        <style>
            .results-wrap{
                margin-bottom: 20px;
            }
        </style>

        <div class="box1-left">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span>
                TIN NHÀ ĐẤT CẦN THUÊ
            </div>
            <div class='groupbox clearfix'>
                <div id="media" class="list-view">
                    <ul class="clearfix">
                        @foreach($articleForBuy_buy as $key => $item)
                            <div class="box_NDnoibat" style="height: 115px;">
                                <div class="img_NDnoibat">
                                    <a href="/{{$item->prefix_url.'-bds-'.$item->id}}"><img alt="{{$item['title']}}" src="{{$item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_BUY, true).THUMBNAIL_PATH.json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT }}"></a>
                                    <span class="iconHot"></span>
                                    <span class="theloai">{{$item['type_article']}}</span>
                                </div>
                                <div class="text_NDnoibat">
                                    <ul>
                                        <li>
                                            <h3><a href="/{{$item->prefix_url.'-bds-'.$item->id}}" title="{{$item['title']}}">{{ mb_substr($item['title'],0 , HOME_SUBSTRING, "utf-8")}}...</a></h3>
                                        </li>
                                        <li>DT:{{($item->area_from != null && $item->area_to != null) ? ($item->area_from. ' - ' .$item->area_to.' m²') : ($item->area ? $item->area.' m²' : 'Chưa xác định')}} | Giá:<span class="camcam">{{($item->price_from != null && $item->price_to != null) ? ($item->price_from. ' - ' .$item->price_to.' '.$item->ddlPriceType) : ($item->price_real == 0 ? 'Thỏa thuận' : $item->price.' '.$item->ddlPriceType)}}</span></li>
                                        <li><a class="link_blue"
                                               href="/tim-kiem-nang-cao/nha-dat-can-thue/-1/-1/{{$item->district_id}}/-1/-1/-1/-1/-1/-1/-1"
                                               title="Bán nhà riêng tại {{$item->district}}">{{$item->district}}</a>, <a
                                                    class="link_blue"
                                                    href="/tim-kiem-nang-cao/nha-dat-can-thue/-1/{{$item->province_id}}/-1/-1/-1/-1/-1/-1/-1/-1"
                                                    title="Bán nhà riêng tại {{$item->province}}">{{$item->province}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                    <div class='results-wrap clearfix'><div class="summary"></div>
                        <div class="pager clearfix"><ul class="pager" id="yw0">
                                <li class="page selected"><a href="{{env("APP_URL")}}/nha-dat-can-thue?page=1">1</a></li>
                                <li class="page"><a href="{{env("APP_URL")}}/nha-dat-can-thue?page=2">2</a></li>
                                <li class="page"><a href="{{env("APP_URL")}}/nha-dat-can-thue?page=3">3</a></li>
                                <li class="next"><a href="{{env("APP_URL")}}/nha-dat-can-thue?page=4"></a></li>
                                <li class=""><a href="{{env("APP_URL")}}/nha-dat-can-thue?page=2">>></a></li></ul></div></div>
                </div>    </div>
        </div>

        <style>
            .results-wrap{
                margin-bottom: 20px;
            }
        </style>
        <div class="muatin_noibat">
            <!-- <a href="#" data-toggle="modal" data-target="#myModal">Mua tin nổi bật ngay tại đây</a> -->
        </div>
        <div class="box1-left">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span>
                CÓ THỂ BẠN CHƯA BIẾT
            </div>
            <div class="child_C">
                <p><span style="color:#008000;"><em>Nơi đăng tin mua b&aacute;n tất cả c&aacute;c loại đất nền, nh&agrave; phố, căn hộ, biệt thự hay cho thu&ecirc; tốt nhất. Đặc biệt l&agrave; nơi chuy&ecirc;n ph&acirc;n phối mua b&aacute;n đất nền quận 12 Tp HCM v&agrave; <a href="http://muabandatbinhduong.vn/39/can-mua-dat-my-phuoc-3-binh-duong">mua đất Mỹ Phước</a> B&igrave;nh Dương.<strong> Li&ecirc;n hệ: 0985.678.311 Mr T&acirc;n</strong></em></span></p>
            </div>
        </div>
    </div>
    @include('layouts.slider_bar_right')
@endsection

@section('contentJS')

@endsection