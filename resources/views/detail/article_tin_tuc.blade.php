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
    <meta name="keywords" content="{{$article->title}}">
    <meta name="description" content="{{$article->short_content}}">
    <link rel="canonical" href="{{url()->current()}}" />
    <link rel="image_src" href="{{env('APP_URL') . ($article->image ? '/'.$article->image : PATH_LOGO_DEFAULT)}}" />
    <meta name="title" content="{{$article->title}}{{$tagRelate}}" />
    <meta property="og:image" content="{{env('APP_URL') . ($article->image ? '/'.$article->image : PATH_LOGO_DEFAULT)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:title" content="{{$article->title}}" />
    <meta property="og:description" content="{{$article->short_content}}" />
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="{{time()}}" />
@endsection
@extends('layouts.app')
@section('content')
    <div class="main-l">
        <ul class="breadcrumb">
            <li><a href="http://muanhadatquan12.com">Trang Chủ</a></li>
            <li>Thông tin chi tiết Bán gấp Căn nhà Mặt tiền đường Hà huy giáp DT 15X70 nở hậu giá 31 tỷ</li>
        </ul>

        <div class="box1-left">
            <h1 class="tieude_nhadat">Bán gấp Căn nhà Mặt tiền đường Hà huy giáp DT 15X70 nở hậu giá 31 tỷ</h1>
            <div class="box_C">
                <ul class="info_no2">
                    <li>
                        <label>Khu vực:</label>
                        <span><a href="http://muanhadatquan12.com/du-an/khu-biet-thu-nha-pho-cao-cap-tai-quan-12">Nhà-Đất Quận 12 nhà quận 12 tại KHU BIỆT THỰ, NHÀ PHỐ CAO CẤP TẠI QUẬN 12</a> - Quận 12, TP.HCM</span>
                    </li>
                </ul>
                <ul class="info_no1 clearfix">
                    <li><label>Giá:</label><span><b class="camcam">
                    31 Tỷ                </b></span></li>
                    <!-- <li><label>Lượt xem:</label><span><b class="camcam">3800</b></span></li> -->
                    <li><label>Diện tích:</label><span><b class="camcam">927 m2</b></span></li>
                    <li><label class="da_xacthuc"></label><span>Thông tin tài khoản đã được xác thực</span></li>
                </ul>
            </div>

        </div>

        <div class="box_C">
            <ul class="next_link">
                <li><a href="#dacdiembds">Đặc điểm nhà đất</a></li>
                <li><a href="#tienich_xungquanh">Tiện ích trong khu vực</a></li>
                <li><a href="#tinrao_lienquan">Các tin rao nhà đất liên quan</a></li>
            </ul>
        </div>
        <div class="tit_C">
            <span class="icon_star_xanh"></span>
            Thông tin mô tả
        </div>

        <div class="detail_R">
            <div class="save_print clearfix">
                <!-- <a href="" class="share_news" title="Chia sẻ tin">Chia sẻ tin</a> -->
                <span style="float:left; margin-right:10px">Chia sẻ tin</span>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <!-- <div class="addthis_sharing_toolbox"></div> -->
                <a href="#" onclick="
window.open(
  'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('http://muanhadatquan12.com/nha-dat/ban-gap-can-nha-mat-tien-duong-ha-huy-giap-dt-15x70-no-hau-gia-31-ty'),
  'facebook-share-dialog',
  'width=626,height=436');
return false;"><img src="/assets/72fcf7d5/img/ico-fb.png" alt="facebook"></a>
                <a href="https://plus.google.com/share?url={http://muanhadatquan12.com/nha-dat/ban-gap-can-nha-mat-tien-duong-ha-huy-giap-dt-15x70-no-hau-gia-31-ty}" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="https://www.gstatic.com/images/icons/gplus-32.png" alt="Share on Google+"></a>

            </div>

            <div class="document">
                <p></p><h3><strong>Bán hết tài sản bên Việt Nam để đi sang Mỹ định cư với con gái, Cần bán gấp trước tháng 4&nbsp;năm 2018&nbsp;nên ưu tiên khách liên hệ trước và thiện chí.</strong></h3>

                <p style="text-align: center;"><img alt="nha-quan-12-can-ban" src="http://muanhadatquan12.com/upload/ckimage/images/new%20doc%2078_1.jpg" style="width: 500px; height: 378px;"></p>

                <p><strong>Diện tích:</strong> 15X70.5 ( Nở hậu ) , Diện tích đất thổ cư là 927,1 m2, Diện tích căn nhà là 781,4 m2 ( Nhà cấp IV )</p>

                <p><strong>Giá bán: 31 tỷ</strong></p>

                <p><strong>Vị trí</strong> nền đất nằm trên mặt tiền đường Hà Huy Giáp đối diện với Khu Du Lịch Bến Xưa, sát bên với quận Gò vấp, chỉ cách nhau Cầu An Lộc.</p>

                <p>Vì ở vị trí cực kỳ đẹp và rất thuận lợi cho việc du chuyển nên rất tiện để xây nhà xưởng, Showroom hay mở làm cái gì cũng tốt.</p>

                <p><strong>Mọi chi tiết xin liên hệ: 0985.678.311 gặp Thanh Tân</strong></p>
                <p></p>
            </div>

            <div class="lienhe_nguoiban">
                <ul>
                    <li><b style="color:green">Liên hệ người bán</b></li>
                    <li><b>Nhà Đất Quận 12</b></li>
                    <li>Điện thoại:<b class="camcam"> 0985678311</b></li>
                    <li>Địa chỉ:  Hà Huy Giáp, Hồ Chí Minh, Quận 12, Việt Nam</li>
                    <li>Email:kinhdoanh.diaocvanxuan@gmail.com</li>
                </ul>
            </div>


            <div class="tit_C" id="dacdiembds">
                <span class="icon_star_xanh"></span>
                Đặc điểm bất động sản
            </div>
            <div class="detail_R">
                <div class="document">
                    <p>Nhà-Đất Quận 12 nhà quận 12 tại dự án KHU BIỆT THỰ, NHÀ PHỐ CAO CẤP TẠI QUẬN 12, Quận 12, TP.HCM, giá thương lượng,diện tích 927,
                        Địa chỉ của bất động sản : 8 Hà Huy Giáp, Hồ Chí Minh, Quận 12, Việt Nam, Quận 12, TP.HCM. Thuộc dự án: KHU BIỆT THỰ, NHÀ PHỐ CAO CẤP TẠI QUẬN 12                <!-- Lần cập nhật gần đây nhất là vào : -->
                    </p>
                    <ul class="thongsonha clearfix">
                        <li>Mã tin: 427675</li>

                        <li>Ngày đăng tin: 11/06/2016</li>
                        <li>Ngày hết hạn: 01/02/2018</li>
                        <li>Giá: 31 Tỷ</li>
                        <li>Diện tích: 927 m2</li>
                        <li>Diện tích khuôn viên: 12.5X70.5X18.12</li>
                        <li>Diện tích xây dựng: 12.5X70.5X18.12</li>
                        <li>Pháp lý: Sổ Hồng</li>
                        <li>Vị trí: </li>
                        <li>Số phòng ngủ: 0</li>
                        <li>Số phòng khách: 0</li>
                        <li>Số phòng bếp: 0</li>
                        <li>Có ban công: Không</li>
                    </ul>
                </div>
            </div>

            <div class="box_C" id="tienich_xungquanh">
                <div class="tit_C">
                    <span class="icon_star_xanh"></span>
                    Tiện ích xung quanh
                </div>
                <div class="tabbds">
                    <ul id="tabs" class="nav nav-tabs tab-listing" data-tabs="tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">Vị trí nhà đất</a></li>
                        <!-- <li><a href="#tab2" data-toggle="tab">Video</a></li> -->
                    </ul>
                    <div id="my-tab-content" class="tab-content">
                        <div class="tab-pane active clearfix" id="tab1">
                            <div id="map-canvas" class="map" style="background-color: rgb(229, 227, 223); position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"><div tabindex="0" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;http://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;"><div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -207, -166);"><div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 512px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 512px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="width: 32px; height: 47px; overflow: hidden; position: absolute; left: -50px; top: -50px; z-index: 0;"><img alt="" src="/themes/thosannhadat/img/map-icon.png" draggable="false" style="position: absolute; left: 0px; top: 0px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 32px; height: 47px;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -207, -166);"><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 512px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 512px; top: 256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 0px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -207, -166);"><div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26094!3i15387!4i256!2m3!1e0!2sm!3i463172184!2m3!1e2!6m1!3e5!3m14!2svi!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;token=4960" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26095!3i15387!4i256!2m3!1e0!2sm!3i463172124!2m3!1e2!6m1!3e5!3m14!2svi!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;token=45734" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26093!3i15387!4i256!2m3!1e0!2sm!3i463172184!2m3!1e2!6m1!3e5!3m14!2svi!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;token=112282" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26093!3i15386!4i256!2m3!1e0!2sm!3i463172184!2m3!1e2!6m1!3e5!3m14!2svi!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;token=7285" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 512px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26096!3i15387!4i256!2m3!1e0!2sm!3i463172124!2m3!1e2!6m1!3e5!3m14!2svi!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;token=69483" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26094!3i15386!4i256!2m3!1e0!2sm!3i463172184!2m3!1e2!6m1!3e5!3m14!2svi!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;token=31034" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 512px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26096!3i15386!4i256!2m3!1e0!2sm!3i463172076!2m3!1e2!6m1!3e5!3m14!2svi!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;token=124283" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i26095!3i15386!4i256!2m3!1e0!2sm!3i463172076!2m3!1e2!6m1!3e5!3m14!2svi!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;token=100534" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div class="gm-style-pbc" style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0; transition-duration: 0.8s;"><p class="gm-style-pbt">Sử dụng ctrl + cuộn để thu phóng bản đồ</p></div><div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;"><div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><div title="Viet Nam" style="width: 32px; height: 47px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: -50px; top: -50px; z-index: 0;"><img alt="" src="/themes/thosannhadat/img/map-icon.png" draggable="false" style="position: absolute; left: 0px; top: 0px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 32px; height: 47px;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div></div><iframe aria-hidden="true" frameborder="0" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;" src="about:blank"></iframe><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" rel="noopener" href="https://maps.google.com/maps?ll=10.891042,106.686151&amp;z=15&amp;t=m&amp;hl=vi&amp;gl=US&amp;mapclient=apiv3" title="Mở khu vực này trong Google Maps (mở cửa sổ mới)" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img alt="" src="http://maps.gstatic.com/mapfiles/api-3/images/google4_hdpi.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 300px; height: 180px; position: absolute; left: 168px; top: 65px;"><div style="padding: 0px 0px 10px; font-size: 16px;">Dữ liệu Bản đồ</div><div style="font-size: 13px;">Dữ liệu bản đồ ©2019 Google</div><button draggable="false" title="Đóng" aria-label="Đóng" type="button" class="gm-ui-hover-effect" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: absolute; cursor: pointer; user-select: none; top: 0px; right: 0px; width: 37px; height: 37px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%206.41L17.59%205%2012%2010.59%206.41%205%205%206.41%2010.59%2012%205%2017.59%206.41%2019%2012%2013.41%2017.59%2019%2019%2017.59%2013.41%2012z%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="pointer-events: none; display: block; width: 13px; height: 13px; margin: 12px;"></button></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 215px; bottom: 0px; width: 142px;"><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="text-decoration: none; cursor: pointer; display: none;">Dữ liệu Bản đồ</a><span>Dữ liệu bản đồ ©2019 Google</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Dữ liệu bản đồ ©2019 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 114px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/vi_US/help/terms_maps.html" target="_blank" rel="noopener" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Điều khoản sử dụng</a></div></div><button draggable="false" title="Chuyển đổi chế độ xem toàn màn hình" aria-label="Chuyển đổi chế độ xem toàn màn hình" type="button" class="gm-control-active gm-fullscreen-control" style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; top: 0px; right: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%20018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"></button><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_blank" rel="noopener" title="Báo cáo lỗi trong bản đồ đường hoặc hình ảnh đến Google" href="https://www.google.com/maps/@10.8910417,106.6861509,15z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Báo cáo một lỗi bản đồ</a></div></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="40" controlheight="113" style="margin: 10px; user-select: none; position: absolute; bottom: 127px; right: 40px;"><div class="gmnoprint" controlwidth="40" controlheight="81" style="position: absolute; left: 0px; top: 32px;"><div draggable="false" style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 40px; height: 81px;"><button draggable="false" title="Phóng to" aria-label="Phóng to" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23333%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23111%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"></button><div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); top: 0px;"></div><button draggable="false" title="Thu nhỏ" aria-label="Thu nhỏ" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"></button></div></div><div style="position: absolute; left: 20px; top: 0px;"></div><div class="gmnoprint" controlwidth="40" controlheight="40" style="display: none; position: absolute;"><div style="width: 40px; height: 40px;"><button draggable="false" title="Xoay bản đồ 90 độ" aria-label="Xoay bản đồ 90 độ" type="button" class="gm-control-active" style="background: none rgb(255, 255, 255); display: none; border: 0px; margin: 0px 0px 32px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 40px; height: 40px; top: 0px; left: 0px; overflow: hidden; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"></button><button draggable="false" title="Nghiêng bản đồ" aria-label="Nghiêng bản đồ" type="button" class="gm-tilt gm-control-active" style="background: none rgb(255, 255, 255); display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 40px; height: 40px; top: 0px; left: 0px; overflow: hidden; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;"></button></div></div></div></div></div><div style="background-color: white; font-weight: 500; font-family: Roboto, sans-serif; padding: 15px 25px; box-sizing: border-box; top: 5px; border: 1px solid rgba(0, 0, 0, 0.12); border-radius: 5px; left: 50%; max-width: 375px; position: absolute; transform: translateX(-50%); width: calc(100% - 10px); z-index: 1;"><div><img alt="" src="http://maps.gstatic.com/mapfiles/api-3/images/google_gray.svg" draggable="false" style="padding: 0px; margin: 0px; border: 0px; height: 17px; vertical-align: middle; width: 52px; user-select: none;"></div><div style="line-height: 20px; margin: 15px 0px;"><span style="color: rgba(0, 0, 0, 0.87); font-size: 14px;">Trang này không thể tải Google Maps đúng cách.</span></div><table style="width: 100%;"><tr><td style="line-height: 16px; vertical-align: middle;"><a href="https://developers.google.com/maps/documentation/javascript/error-messages?utm_source=maps_js&amp;utm_medium=degraded&amp;utm_campaign=keyless#api-key-and-billing-errors" target="_blank" rel="noopener" style="color: rgba(0, 0, 0, 0.54); font-size: 12px;">Bạn có sở hữu trang web này không?</a></td><td style="text-align: right;"><button class="dismissButton">OK</button></td></tr></table></div></div>
                        </div>
                        <!-- <div class="tab-pane clearfix" id="tab2">
                            chèn video ở đây (Chức năng này đang được cập nhật).
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="tit_C" id="tinrao_lienquan">
                <span class="icon_star_xanh"></span>
                Các tin rao Nhà-Đất Quận 12 nhà quận 12 tương tự
            </div>
            <div id="media" class="list-view">
                <ul class="clearfix">


                    <div class="box_nhadatban  clearfix">
                        <span class="star_vipDB"></span>

                        <div class="tit_nhadatban">
                            <h4><a href="http://muanhadatquan12.com/nha-dat/ban-nha-mat-tien-duong-huynh-thi-hai-q12-tp-hcm" title=""> BÁN NHÀ MẶT TIỀN ĐƯỜNG HUỲNH THỊ...</a></h4>
                        </div>
                        <div class="detail_nhadatban">
                            <div class="img_nhadatban">
                                <a href="http://muanhadatquan12.com/nha-dat/ban-nha-mat-tien-duong-huynh-thi-hai-q12-tp-hcm"><img alt="" src="http://muanhadatquan12.com/upload/property/991/155x112/1554691904_991_Ban-nha-mat-tien.jpg"></a>
                                <span class="masotin">MST: 558157</span>
                            </div>
                            <div class="text_nhadatban">
                                <div class="info_nhadatban">
                                    <ul>
                                        <li><span class="datetime">Tin <span class="timecolor">9:51AM | 08/04/2019</span></span></li>
                                        <li>Diện tích: <span class="saleboldtext">64m² </span></li>
                                        <li>Khu vực: <span class="saleboldtext">Quận 12, TP.HCM</span></li>
                                    </ul>
                                </div>
                                <div class="contact_nhadatban">
                                    <ul>
                                        <li>
                                            <a coords="10.8700011,106.540999" class="bt_map" data-hasqtip="true"></a>                                       </li>
                                        <li class="gia"><strong class="camcam">6 Tỷ</strong></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="description_nhadatban">
                                Đang cần bán nhanh giá đầu tư căn nhà mặt tiền đường Huỳnh Thị Hai Phường Tân Chánh Hiệp...            </div>
                        </div>
                    </div>

                    <div class="box_nhadatban  clearfix">

                        <div class="tit_nhadatban">
                            <h4><a href="http://muanhadatquan12.com/nha-dat/ban-nha-rieng-1-tret-2-lau-gan-duong-le-van-khuong-3-ty-800" title=""> Bán nhà riêng 1 trệt 2 lầu gần Đường...</a></h4>
                        </div>
                        <div class="detail_nhadatban">
                            <div class="img_nhadatban">
                                <a href="http://muanhadatquan12.com/nha-dat/ban-nha-rieng-1-tret-2-lau-gan-duong-le-van-khuong-3-ty-800"><img alt="" src="http://muanhadatquan12.com/upload/property/926/155x112/1534083095_926_IMG_0543.jpg"></a>
                                <span class="masotin">MST: 642977</span>
                            </div>
                            <div class="text_nhadatban">
                                <div class="info_nhadatban">
                                    <ul>
                                        <li><span class="datetime">Tin <span class="timecolor">9:11PM | 12/08/2018</span></span></li>
                                        <li>Diện tích: <span class="saleboldtext">56m² </span></li>
                                        <li>Khu vực: <span class="saleboldtext">Quận 12, TP.HCM</span></li>
                                    </ul>
                                </div>
                                <div class="contact_nhadatban">
                                    <ul>
                                        <li>
                                            <a coords="10.8700011,106.540999" class="bt_map" data-hasqtip="true"></a>                                       </li>
                                        <li class="gia"><strong class="camcam">3,80 Tỷ</strong></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="description_nhadatban">
                                Tôi cần bán căn nhà 4m dài 14m, 2 lầu, 3 P. Ngủ, 1 P. Thờ, 3WC, bên dưới nhà là...            </div>
                        </div>
                    </div>

                    <div class="box_nhadatban  clearfix">

                        <div class="tit_nhadatban">
                            <h4><a href="http://muanhadatquan12.com/nha-dat/ban-dat-tho-cu-quan-12-goc-2-mat-tien-an-phu-dong-03-phuong-an-phu-dong" title=""> Bán Đất thổ cư Quận 12 Góc 2 Mặt...</a></h4>
                        </div>
                        <div class="detail_nhadatban">
                            <div class="img_nhadatban">
                                <a href="http://muanhadatquan12.com/nha-dat/ban-dat-tho-cu-quan-12-goc-2-mat-tien-an-phu-dong-03-phuong-an-phu-dong"><img alt="" src="http://muanhadatquan12.com/upload/property/896/155x112/1532168925_896_37377513_2028909413799688_2860035086231797760_n.jpg"></a>
                                <span class="masotin">MST: 305032</span>
                            </div>
                            <div class="text_nhadatban">
                                <div class="info_nhadatban">
                                    <ul>
                                        <li><span class="datetime">Tin <span class="timecolor">5:28PM | 21/07/2018</span></span></li>
                                        <li>Diện tích: <span class="saleboldtext">156m² </span></li>
                                        <li>Khu vực: <span class="saleboldtext">Quận 12, TP.HCM</span></li>
                                    </ul>
                                </div>
                                <div class="contact_nhadatban">
                                    <ul>
                                        <li>
                                            <a coords="10.8700011,106.540999" class="bt_map" data-hasqtip="true"></a>                                       </li>
                                        <li class="gia"><strong class="camcam">4250 </strong></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="description_nhadatban">
                                Bán Đất thổ cư Quận 12 Góc 2 Mặt Tiền An Phú Đông 03 Phường An Phú Đông

                                Liên Hệ:...            </div>
                        </div>
                    </div>

                    <div class="box_nhadatban  clearfix">

                        <div class="tit_nhadatban">
                            <h4><a href="http://muanhadatquan12.com/nha-dat/ban-gap-nha-quan-12-duong-thanh-xuan-25-phuong-thanh-xuan-gan-cau-sat-sap" title=""> Bán gấp nhà quận 12 đường thạnh xuân...</a></h4>
                        </div>
                        <div class="detail_nhadatban">
                            <div class="img_nhadatban">
                                <a href="http://muanhadatquan12.com/nha-dat/ban-gap-nha-quan-12-duong-thanh-xuan-25-phuong-thanh-xuan-gan-cau-sat-sap"><img alt="" src="/themes/thosannhadat/images/155x112.png"></a>
                                <span class="masotin">MST: 145842</span>
                            </div>
                            <div class="text_nhadatban">
                                <div class="info_nhadatban">
                                    <ul>
                                        <li><span class="datetime">Tin <span class="timecolor">8:25AM | 18/07/2018</span></span></li>
                                        <li>Diện tích: <span class="saleboldtext">56m² </span></li>
                                        <li>Khu vực: <span class="saleboldtext">Quận 12, TP.HCM</span></li>
                                    </ul>
                                </div>
                                <div class="contact_nhadatban">
                                    <ul>
                                        <li>
                                            <a coords="10.8700011,106.540999" class="bt_map" data-hasqtip="true"></a>                                       </li>
                                        <li class="gia"><strong class="camcam">2850 </strong></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="description_nhadatban">
                                Bán gấp nhà quận 12 đường thạnh xuân 25 phường thạnh xuân Gần cầu sắt sập

                                &nbsp;Liên hệ...            </div>
                        </div>
                    </div>

                    <div class="box_nhadatban  clearfix">

                        <div class="tit_nhadatban">
                            <h4><a href="http://muanhadatquan12.com/nha-dat/nha-mat-tien-xo-viet-nghe-tinh-45-x-34-gia-13-ty-p25-q-binh-thanh" title=""> Nhà mặt tiền Xô Viết Nghệ Tĩnh 4,5 x...</a></h4>
                        </div>
                        <div class="detail_nhadatban">
                            <div class="img_nhadatban">
                                <a href="http://muanhadatquan12.com/nha-dat/nha-mat-tien-xo-viet-nghe-tinh-45-x-34-gia-13-ty-p25-q-binh-thanh"><img alt="" src="/themes/thosannhadat/images/155x112.png"></a>
                                <span class="masotin">MST: 875866</span>
                            </div>
                            <div class="text_nhadatban">
                                <div class="info_nhadatban">
                                    <ul>
                                        <li><span class="datetime">Tin <span class="timecolor">9:17AM | 26/06/2018</span></span></li>
                                        <li>Diện tích: <span class="saleboldtext">150m² </span></li>
                                        <li>Khu vực: <span class="saleboldtext">Quận Bình Thạnh, TP.HCM</span></li>
                                    </ul>
                                </div>
                                <div class="contact_nhadatban">
                                    <ul>
                                        <li>
                                            <a coords="10.8700011,106.540999" class="bt_map" data-hasqtip="true"></a>                                       </li>
                                        <li class="gia"><strong class="camcam">Thỏa thuận</strong></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="description_nhadatban">
                                Nhà mặt tiền Xô Viết Nghệ Tĩnh 4,5 x 34 = 150m2 giá 13 tỷ, P.25, Q. Bình Thạnh.

                                - Nhà sạch,...            </div>
                        </div>
                    </div></ul>
                <div class="results-wrap clearfix"><div class="summary"></div>
                    <div class="pager clearfix"><ul class="pager" id="yw0"><li class="first hidden"><a href="/nha-dat/ban-gap-can-nha-mat-tien-duong-ha-huy-giap-dt-15x70-no-hau-gia-31-ty">&lt;&lt;</a></li>
                            <li class="previous hidden"><a href="/nha-dat/ban-gap-can-nha-mat-tien-duong-ha-huy-giap-dt-15x70-no-hau-gia-31-ty"></a></li>
                            <li class="page selected"><a href="/nha-dat/ban-gap-can-nha-mat-tien-duong-ha-huy-giap-dt-15x70-no-hau-gia-31-ty">1</a></li>
                            <li class="page"><a href="/nha-dat/ban-gap-can-nha-mat-tien-duong-ha-huy-giap-dt-15x70-no-hau-gia-31-ty?Property_page=2">2</a></li>
                            <li class="page"><a href="/nha-dat/ban-gap-can-nha-mat-tien-duong-ha-huy-giap-dt-15x70-no-hau-gia-31-ty?Property_page=3">3</a></li>
                            <li class="next"><a href="/nha-dat/ban-gap-can-nha-mat-tien-duong-ha-huy-giap-dt-15x70-no-hau-gia-31-ty?Property_page=2"></a></li>
                            <li class="last"><a href="/nha-dat/ban-gap-can-nha-mat-tien-duong-ha-huy-giap-dt-15x70-no-hau-gia-31-ty?Property_page=16">&gt;&gt;</a></li></ul></div></div><div class="keys" style="display:none" title="/nha-dat/ban-gap-can-nha-mat-tien-duong-ha-huy-giap-dt-15x70-no-hau-gia-31-ty"><span>991</span><span>926</span><span>896</span><span>886</span><span>794</span></div>
            </div>            </div>
    </div>
    @include('layouts.slider_bar_right', ['titleArticle' => $titleArticle, 'key' => $key])
@endsection
@section('contentJS')

@endsection