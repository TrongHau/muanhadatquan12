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
            <div class="box_C">
                <ul class="info_no2">
                    <li>
                        <label>Khu vực:</label>
                        @if($article->ward_id)
                            <span>
                                @if($article->street_id && $article->ward_id)
                                    <a class="link_blue"
                                       href="/tim-kiem-nang-cao/nha-dat-ban/-1/1/13/{{$article->ward_id}}/{{$article->street_id}}"
                                       title="Bán nhà riêng tại đường {{$article->street}}">Đường {{$article->street}}</a>,
                                @endif
                                <a class="link_blue"
                                   href="/tim-kiem-nang-cao/nha-dat-ban/-1/1/13/{{$article->ward_id}}"
                                   title="Bán nhà riêng tại {{$article->ward}}">{{$article->ward}}</a>
                            </span>
                        @else
                            <span><a class="link_blue"
                                   href="/tim-kiem-nang-cao/nha-dat-ban/-1/1/13"
                                   title="Bán nhà riêng tại {{$article->district}}">{{$article->district}}</a>
                                , <a class="link_blue"
                                     href="/tim-kiem-nang-cao/nha-dat-ban/-1/1"
                                     title="Bán nhà riêng tại {{$article->province}}">{{$article->province}}</a>
                            </span>
                        @endif
                    </li>
                </ul>
                <ul class="info_no1 clearfix">
                    <li><label>Giá:</label><span><b class="camcam">{{($article->ddlPriceType == 'thỏa thuận' || !$article->price) ? 'Thỏa thuận' : ($article->price.' '.$article->ddlPriceType)}}
                            </b></span></li>
                    <!-- <li><label>Lượt xem:</label><span><b class="camcam">3800</b></span></li> -->
                    <li><label>Diện tích:</label><span><b class="camcam">{{$article->area ? $article->area.' m²' : 'Chưa xác định'}}</b></span></li>
                    <li><label class="da_xacthuc"></label><span>Thông tin tài khoản đã được xác thực</span></li>
                </ul>
            </div>

        </div>

        <div class="tit_C">
            <span class="icon_star_xanh"></span>
            Thông tin mô tả
        </div>

        <div class="detail_R">
            <div class="document">
                <?php echo str_replace("\r\n", '<br/>', $article->content_article) ?>
                @if($article->gallery_image)
                    <div class="pm-mota">
                        Thông hình ảnh
                    </div>
                    <div class="slideshow-container">
                        <?php
                        $preFixImage = $typeOf == 'lease' ? PUBLIC_ARTICLE_LEASE : PUBLIC_ARTICLE_BUY;
                        $gallery = json_decode($article->gallery_image);
                        $MaxImgs = count($gallery);
                        ?>
                        @foreach($gallery as $key => $item)
                            <div class="mySlides fade">
                                <div class="numbertext">{{++$key}} / {{$MaxImgs}}</div>
                                <img height="502px" src="{{Helpers::file_path($article->id, $preFixImage, true).$item}}" style="width:100%">
                            </div>
                        @endforeach
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                    <br>

                    <div style="display: inline-block;text-align:left;">
                        @foreach(json_decode($article->gallery_image) as $key => $item)
                            <div class="dot" onclick="currentSlide({{++$key}})">
                                <img src="{{Helpers::file_path($article->id, $preFixImage, true).THUMBNAIL_PATH.$item}}" />
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
            <div class="lienhe_nguoiban">
                <ul>
                    <li><b style="color:green">Liên hệ người bán</b></li>
                    <li><b>{{$article->contact_name}}</b></li>
                    <li>Điện thoại:<b class="camcam"> {{$article->contact_phone}}</b></li>
                    <li>Địa chỉ:  {{$article->address}}</li>
                    <li>Email: {{$article->contact_email}}</li>
                </ul>
            </div>


            <div class="tit_C" id="dacdiembds">
                <span class="icon_star_xanh"></span>
                Đặc điểm bất động sản
            </div>
            <div class="detail_R">
                <div class="document">
                    <ul class="thongsonha clearfix">
                        <li>Ngày đăng tin: {{date('h:iA | d/m/Y', strtotime($article->created_at))}}</li>
                        <li>Mã tin: {{$article->id}}</li>
                        <li>Giá: {{($article->price_from && $article->price_to) ? $article->price_from .' - '. $article->price_to . ' '.$article->ddlPriceType : 'Thỏa thuận'}}</li>
                        <li>Diện tích: {{($article->area_from && $article->area_to) ? $article->area_from .' - '. $article->area_to .' m²' : 'Chưa xác định'}}</li>
                        @if($article->bed_room)
                            <li>Số phòng ngủ: {{$article->bed_room}}</li>
                        @endif
                        @if($article->toilet)
                            <li>Số toilet: {{$article->toilet}}</li>
                        @endif
                        @if($article->facade)
                            <li>Mặt tiền: {{$article->facade}}</li>
                        @endif
                        @if($article->land_width)
                            <li>Đường vào (m): {{$article->land_width}}</li>
                        @endif

                        @if($article->ddlHomeDirection)
                            <li>Hướng nhà: {{$article->ddlHomeDirection}}</li>
                        @endif

                        @if($article->ddl_bacon_direction)
                            <li>Hướng ban công: {{$article->ddl_bacon_direction}}</li>
                        @endif
                        @if($article->floor)
                            <li>Số tầng: {{$article->floor}}</li>
                        @endif
                        @if($article->furniture)
                            <li>Nội thất: {{$article->furniture}}</li>
                        @endif
                    </ul>
                </div>
            </div>
            @if(count($relateArticle))
            <div class="tit_C" id="tinrao_lienquan">
                <span class="icon_star_xanh"></span>
                Các tin rao {{$article->method_article}} tại {{$article->ward}}
            </div>
            <div id="media" class="list-view">
                <ul class="clearfix">
                    @foreach($relateArticle as $item)
                        <div class="box_nhadatban  clearfix">
                            <span class="star_vipDB"></span>

                            <div class="tit_nhadatban">
                                <h4><a href="/{{$item['prefix_url'].'-bds-'.$item['id']}}" title="{{$item['title']}}" title="">{{$item['title']}}</a></h4>
                            </div>
                            <div class="detail_nhadatban">
                                <div class="img_nhadatban">
                                    <a href="/{{$item['prefix_url'].'-bds-'.$item['id']}}" title="{{$item['title']}}"><img alt="" src="{{$item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_LEASE, true).THUMBNAIL_PATH.json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT }}"></a>
                                    <span class="masotin">MST: {{$item['id']}}</span>
                                </div>
                                <div class="text_nhadatban">
                                    <div class="info_nhadatban">
                                        <ul>
                                            <li><span class="datetime">Tin <span class="timecolor">{{date('h:iA | d/m/Y', strtotime($item['created_at']))}}</span></span></li>
                                            <li>Diện tích: <span class="saleboldtext">{{$item['area'] ? $item['area'].' m²' : 'Chưa xác định'}}</span></li>
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
                                                <a coords="10.8700011,106.540999" class="bt_map" data-hasqtip="true"></a>                                       </li>
                                            <li class="gia"><strong class="camcam">{{$item['price_real'] == 0 ? 'Thỏa thuận' : $item['price'].' '.$item['ddlPriceType']}}</strong></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="description_nhadatban">
                                    Đang cần bán nhanh giá đầu tư căn nhà mặt tiền đường Huỳnh Thị Hai Phường Tân Chánh Hiệp...            </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
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