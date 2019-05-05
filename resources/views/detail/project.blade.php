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
    <meta name="keywords" content="{{implode(';', explode(' ', $project->_name))}}">
    <meta name="description" content="{{$project->_name}}, {{$project->address}}">
    <link rel="canonical" href="{{url()->current()}}" />
    <link rel="image_src" href="{{env('APP_URL')}}{{$project->gallery_image ? Helpers::file_path($project->id, PUBLIC_PROJECT, true).json_decode($project->gallery_image)[0] : THUMBNAIL_DEFAULT }}" />
    <meta name="title" content="{{$project->_name}}" />
    <meta property="og:image" content="{{env('APP_URL')}}{{$project->gallery_image ? Helpers::file_path($project->id, PUBLIC_PROJECT, true).json_decode($project->gallery_image)[0] : THUMBNAIL_DEFAULT }}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:title" content="{{$project->_name}}" />
    <meta property="og:description" content="{{$project->_name}}, {{$project->address}}" />
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="{{time()}}" />
@endsection
@extends('layouts.app')
@section('content')
    <link rel="stylesheet" type="text/css" href="/css/slidershow.css">
    <div class="main-l">
        <div class="tit_C">
            <span class="icon_star_xanh"></span>
            {{$project->_name}} {{$project->address ?? 'Đang cập nhật'}}
        </div>

        <div class="detail_R">
            <div class="document">
                <?php echo str_replace("\r\n", '<br/>', $project->content) ?>
                @if($project->gallery_image)
                    <div class="pm-mota">
                        Thông hình ảnh
                    </div>
                    <div class="slideshow-container">
                        <?php
                        $gallery = json_decode($project->gallery_image);
                        $MaxImgs = count($gallery);
                        ?>
                        @foreach($gallery as $key => $item)
                            <div class="mySlides fade">
                                <div class="numbertext">{{++$key}} / {{$MaxImgs}}</div>
                                <img height="502px" src="{{Helpers::file_path($project->id, PUBLIC_PROJECT, true).$item}}" style="width:100%">
                            </div>
                        @endforeach
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                    <br>

                    <div style="display: inline-block;text-align:left;">
                        @foreach(json_decode($project->gallery_image) as $key => $item)
                            <div class="dot" onclick="currentSlide({{++$key}})">
                                <img src="{{Helpers::file_path($project->id, PUBLIC_PROJECT, true).THUMBNAIL_PATH.$item}}" />
                            </div>
                        @endforeach
                    </div>
                    <script>
                        var slideIndex = 1;
                        showSlides(slideIndex);

                        function plusSlides(n) {
                            showSlides(slideIndex += n);
                        }

                        function currentSlide(n) {
                            showSlides(slideIndex = n);
                        }

                        function showSlides(n) {
                            var i;
                            var slides = document.getElementsByClassName("mySlides");
                            var dots = document.getElementsByClassName("dot");
                            if (n > slides.length) {slideIndex = 1}
                            if (n < 1) {slideIndex = slides.length}
                            for (i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" active", "");
                            }
                            slides[slideIndex-1].style.display = "block";
                            dots[slideIndex-1].className += " active";
                        }
                    </script>
                    <style>
                        .fade {
                            opacity: 1;
                        }
                    </style>
                @endif
            </div>
        </div>
        @if(count($articleRelate))
        <div class="tit_C" id="dacdiembds">
            <span class="icon_star_xanh"></span>
            Tin rao bất động sản thuộc dự án {{$project->_name}}
        </div>
        <div class="boxfull clearfix">
            <div id="media" class="list-view">
                <ul class="clearfix">
                    @foreach($articleRelate->toArray() as $item)
                        <div class="box_nhadatban  vipdb clearfix" style="border: 1px solid #D6D2C8!important;">
                            <span class="star_vipDB"></span>

                            <div class="tit_nhadatban">
                                <h4><a href="/{{$item['prefix_url'].'-bds-'.$item['id']}}" title="{{$item['title']}}">
                                        <span style="color: #266fb5">{{$item['title']}}</span>		</a></h4>
                            </div>
                            <div class="detail_nhadatban">
                                <div class="img_nhadatban">
                                    <a href="/{{$item['prefix_url'].'-bds-'.$item['id']}}">
                                        <img alt="" src="{{$item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_LEASE, true).THUMBNAIL_PATH.json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT }}">
                                    </a>
                                    <!-- <span class="masotin">Mã Tin: 748404</span>     -->
                                </div>
                                <div class="text_nhadatban">
                                    <div class="info_nhadatban">
                                        <br/>
                                        <ul>
                                            <li><span class="datetime">Tin <span class="timecolor">{{date('h:iA | d/m/Y', strtotime($item['created_at']))}}</span></span></li>
                                            <li>Diện tích: <span class="saleboldtext">{{$item['area'] ? number_format($item['area']).' m²' : 'Chưa xác định'}}</span></li>
                                            <li>Khu vực:  @if($item['ward_id'])
                                                    <span class="saleboldtext">
                                                            @if($item['street_id'] && $item['ward_id'])
                                                            <a class="link_blue"
                                                               href="/tim-kiem-nang-cao/nha-dat-ban/-1/1/13/{{$item['ward_id']}}/{{$item['street_id']}}"
                                                               title="Bán nhà riêng tại đường {{$item['street']}}">Đường {{$item['street']}}</a>,
                                                        @endif
                                                        <a class="link_blue"
                                                           href="/tim-kiem-nang-cao/nha-dat-ban/-1/1/13/{{$item['ward_id']}}"
                                                           title="Bán nhà riêng tại {{$item['ward']}}">{{$item['ward']}}</a>
                                                        </span>
                                                @else
                                                    <span class="saleboldtext"><a class="link_blue"
                                                                                  href="/tim-kiem-nang-cao/nha-dat-ban/-1/1/13"
                                                                                  title="Bán nhà riêng tại {{$item['district']}}">{{$item['district']}}</a>
                                                            , <a class="link_blue"
                                                                 href="/tim-kiem-nang-cao/nha-dat-ban/-1/1"
                                                                 title="Bán nhà riêng tại {{$item['province']}}">{{$item['province']}}</a>
                                                        </span>
                                                @endif</li>
                                        </ul>
                                    </div>
                                    <div class="contact_nhadatban">
                                        <ul>
                                            <li>
                                                <a coords="10.8700011,106.540999" class="bt_map" data-hasqtip="true"></a>										</li>
                                            <li class="gia"><strong class="camcam">{{$item['price_real'] == 0 ? 'Thỏa thuận' : number_format($item['price']).' '.$item['ddlPriceType']}}</strong></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="description_nhadatban"><?php echo substr($item['content_article'], 0, LIMIT_SHORT_CONTENT).'...' ?></div>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
    @include('layouts.slider_bar_right')
@endsection
@section('contentJS')
    <style>
        .info_no1 li label, .info_no1 li .camcam {
            font-size: 14px;
        }
    </style>
@endsection