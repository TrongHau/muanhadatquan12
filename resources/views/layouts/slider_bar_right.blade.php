<?php
use App\Library\Helpers;
global $province;
global $noibat;
?>
@include('cache.province')
@include('cache.tin_noi_bat')
<div class="main-r">
        <div class="boxsearch-right box1-right">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span>
                Tìm kiếm nhà đất
            </div>
            <div class="detail_R">
                <div class="row_timkiemR clearfix">
                    <label>Địa điểm</label>
                    <div class="divipt">
                        <input size="18" maxlength="30" class="ipt1" placeholder="Nhập vào từ khóa hoặc mã tin" name="address" id="title_article" type="text" />            </div>
                </div>
                <div class="row_timkiemR clearfix">
                    <label>Loại tin rao</label>
                    <div class="divipt">
                        <select id="search-advance-method" class="advance-options" name="Property[typeSearch]">
                            <option value="">Chọn loại tin rao</option>
                            <option value="nha-dat-ban">Nhà đất bán</option>
                            <option value="nha-dat-cho-thue">Nhà cho thuê</option>
                            <option value="nha-dat-can-mua">Nhà đất cần mua</option>
                            <option value="nha-dat-can-thue">Nhà đất cần thuê</option>
                            <option value="du-an-quan-12">Dự án quận 12</option>
                        </select>
                    </div>
                </div>
                <div class="row_timkiemR clearfix">
                    <label>Tỉnh, thành phố</label>
                    <div class="divipt">
                        <select class="advance-options select-province" id="select-province">
                            <option value="-1">-- Chọn Tỉnh/Thành phố --</option>
                            @foreach($province as $item)
                                <option value="{{$item['id']}}">{{$item['_name']}}</option>
                            @endforeach
                        </select>           </div>
                </div>
                <div class="row_timkiemR clearfix">
                    <label>Quận, huyện</label>
                    <div class="divipt">
                        <select class="advance-options select-district">
                            <option value="-1" class="advance-options">-- Chọn Quận/Huyện --</option>
                        </select>
                    </div>
                </div>

                <div class="row_timkiemR clearfix">
                    <label>Phường, xã</label>
                    <div class="divipt">
                        <select class="advance-options select-ward">
                            <option value="-1" class="advance-options">-- Chọn Phường/Xã --
                            </option>
                        </select>
                    </div>
                </div>

                <div class="row_timkiemR clearfix">
                    <label>Đường, phố</label>
                    <div class="divipt">
                        <select class="advance-options select-street">
                            <option value="-1" class="advance-options">-- Chọn Đường/Phố --</option>
                        </select>
                    </div>
                </div>

                <div class="row_timkiemR clearfix">
                    <label>Theo diện tích</label>
                    <div class="divipt">
                        <select id="search-advance-area" class="advance-options">
                            <option value="-1" class="advance-options" style="min-width: 168px;">-- Chọn diện tích --
                            </option>
                            <option value="0" class="advance-options" style="min-width: 168px;">Chưa xác định</option>
                            <option value="1" class="advance-options" style="min-width: 168px;">&lt;= 30
                                m2
                            </option>
                            <option value="2" class="advance-options" style="min-width: 168px;">30 - 50
                                m2
                            </option>
                            <option value="3" class="advance-options" style="min-width: 168px;">50 - 80
                                m2
                            </option>
                            <option value="4" class="advance-options" style="min-width: 168px;">80 - 100
                                m2
                            </option>
                            <option value="5" class="advance-options" style="min-width: 168px;">100 - 150
                                m2
                            </option>
                            <option value="6" class="advance-options" style="min-width: 168px;">150 - 200
                                m2
                            </option>
                            <option value="7" class="advance-options" style="min-width: 168px;">200 - 250
                                m2
                            </option>
                            <option value="8" class="advance-options" style="min-width: 168px;">250 - 300
                                m2
                            </option>
                            <option value="9" class="advance-options" style="min-width: 168px;">300 - 500
                                m2
                            </option>
                            <option value="10" class="advance-options" style="min-width: 168px;">&gt;= 500
                                m2
                            </option>
                        </select>           </div>
                </div>
                <div class="row_timkiemR clearfix">
                    <label>Theo mức giá</label>
                    <div class="divipt">
                        <select class="advance-options" id="search-advance-price">
                            <option value="-1" class="advance-options">-- Chọn mức giá --</option>
                            <option value="0" class="advance-options">Thỏa thuận</option>
                            <option value="1" class="advance-options">&lt; 500 triệu</option>
                            <option value="2" class="advance-options">500 - 800 triệu</option>
                            <option value="3" class="advance-options">800 triệu - 1 tỷ</option>
                            <option value="4" class="advance-options">1 - 2 tỷ</option>
                            <option value="5" class="advance-options">2 - 3 tỷ</option>
                            <option value="6" class="advance-options">3 - 5 tỷ</option>
                            <option value="7" class="advance-options">5 - 7 tỷ</option>
                            <option value="8" class="advance-options">7 - 10 tỷ</option>
                            <option value="9" class="advance-options">10 - 20 tỷ</option>
                            <option value="10" class="advance-options">20 - 30 tỷ</option>
                            <option value="11" class="advance-options">&gt; 30 tỷ</option>
                        </select>            </div>
                </div>
                <div class="row_timkiemR clearfix">
                    <label>Số phòng ngủ</label>
                    <div class="divipt">
                        <select id="search-advance-bed_room" class="advance-options">
                            <option value="-1" class="advance-options" style="min-width: 168px;">-- Chọn số phòng ngủ --</option>
                            <option value="0" class="advance-options" style="min-width: 168px;">Không xác định </option>
                            <option value="1" class="advance-options" style="min-width: 168px;">1+</option>
                            <option value="2" class="advance-options" style="min-width: 168px;">2+</option>
                            <option value="3" class="advance-options" style="min-width: 168px;">3+</option>
                            <option value="4" class="advance-options" style="min-width: 168px;">4+</option>
                            <option value="5" class="advance-options" style="min-width: 168px;">5+</option>
                        </select>            </div>
                </div>
                <div class="row_timkiemR clearfix">
                    <label>Theo số toilet</label>
                    <div class="divipt">
                        <select id="search-advance-toilet" class="advance-options">
                            <option value="-1" class="advance-options" style="min-width: 168px;">-- Chọn số toilet --</option>
                            <option value="0" class="advance-options" style="min-width: 168px;">Không xác định </option>
                            <option value="1" class="advance-options" style="min-width: 168px;">1+</option>
                            <option value="2" class="advance-options" style="min-width: 168px;">2+</option>
                            <option value="3" class="advance-options" style="min-width: 168px;">3+</option>
                            <option value="4" class="advance-options" style="min-width: 168px;">4+</option>
                            <option value="5" class="advance-options" style="min-width: 168px;">5+</option>
                        </select>            </div>
                </div>
                <div class="row_timkiemR clearfix">
                    <label>Theo hướng nhà</label>
                    <div class="divipt">
                        <select id="search-advance-ddlHomeDirection" class="advance-options">
                            <option value="-1" style="min-width: 168px;">-- Chọn hướng nhà --</option>
                            <option value="KXĐ" class="advance-options" style="min-width: 168px;">KXĐ</option>
                            <option value="Đông" class="advance-options" style="min-width: 168px;">Đông</option>
                            <option value="Tây" class="advance-options" style="min-width: 168px;">Tây</option>
                            <option value="Nam" class="advance-options" style="min-width: 168px;">Nam</option>
                            <option value="Bắc" class="advance-options" style="min-width: 168px;">Bắc</option>
                            <option value="Đông-Bắc" class="advance-options" style="min-width: 168px;">Đông-Bắc</option>
                            <option value="Tây-Bắc" class="advance-options" style="min-width: 168px;">Tây-Bắc</option>
                            <option value="Tây-Nam" class="advance-options" style="min-width: 168px;">Tây-Nam</option>
                            <option value="Đông-Nam" class="advance-options" style="min-width: 168px;">Đông-Nam</option>
                        </select>            </div>
                </div>
                <div class="row_timkiemR clearfix text-center">
                    <input type="submit" onclick="searchAdvance()" value="Tìm kiếm" class="btn-sb">
                </div>
            </div>
        </div>
        <script>
            function searchAdvance() {
                if(!$('#search-advance-method').val()) {
                    alertModal('Vui lòng chọn loại nhà đất tìm kiếm');
                    return false;
                }
                window.location.href = window.location.origin + '/tim-kiem-nang-cao/' + $('#search-advance-method').val()+ '/-1/' + ($('.select-province').val() ?  $('.select-province').val() : -1) + '/' + ($('.select-district').val() ? $('.select-district').val() : -1) + '/' + ($('.select-ward').val() ? $('.select-ward').val() : -1) + '/' + ($('.select-street').val() ? $('.select-street').val() : -1) + '/' + $('#search-advance-area').val() + '/' + $('#search-advance-price').val() + '/' + $('#search-advance-bed_room').val() + '/' + $('#search-advance-toilet').val() + '/' + $('#search-advance-ddlHomeDirection').val()+ '/' + $('#title_article').val();
            }
            <?php
            if(isset($method)) {
            if($province_id > 0) {
            ?>
            $(document).ready(function() {
                document.getElementById('select-province').value = '<?php echo $province_id ?>';
                getDistrict('<?php echo $province_id ?>', '<?php echo $district_id ?>', '<?php echo $ward_id ?>', '<?php echo $street_id ?>');
                <?php
                if($district_id > 0) {
                ?>
                getWard(' <?php echo $district_id ?>', ' <?php echo $ward_id ?>', '<?php echo $street_id ?>');
                <?php
                }
                ?>
            });
            <?php
            }
            ?>
            document.getElementById('search-advance-method').value = '<?php echo $method ?>';
            document.getElementById('search-advance-area').value = '<?php echo $area ?>';
            document.getElementById('search-advance-price').value = '<?php echo $price ?>';
            document.getElementById('search-advance-bed_room').value = '<?php echo $bed_room ?>';
            document.getElementById('search-advance-toilet').value = '<?php echo $toilet ?>';
            document.getElementById('search-advance-ddlHomeDirection').value = '<?php echo $ddlHomeDirection ?>';
            <?php
            }

            ?>
        </script>
        <div class="box2-adv-right">

        <div class="banner_R">

            <a target="_blank" href="http://muabandatbinhduong.vn/">
                <img src="upload/cms/28/1460347680_28_dat_binh_duong.gif" alt="Bottom" />
            </a>
        </div>
        <div class="banner_R">

            <a target="_blank" href="http://www.datmyphuocgiare.com/">
                <img src="upload/cms/29/1460348718_29_dat-binh-duong-gia-re.png" alt="Bottom" />
            </a>
        </div>



    </div>

    <div class="box1-right">
        <div class="tit_C">
            <span class="icon_star_xanh"></span>
            TIN TỨC NHÀ ĐẤT MỚI NHẤT
        </div>
        <div class="detail_R">
            <ul class="bxslider clearfix">
                @foreach($noibat as $key => $item)
                    <li>
                        <div class="slideShowItems">
                            <a  href="/{{$item['slug_category']}}/{{$item['slug']}}"><img src="{{$item['image'] ? '/'.$item['image'] : PATH_LOGO_DEFAULT}}" alt="{{$item['title']}}"/></a>
                            <div class="des-life">
                                <h3 class="tit_slide"><a title="" href="/{{$item['slug_category']}}/{{$item['slug']}}">{{$item['title']}}</a></h3>
                                <span class="datetime">{{date('d/m/Y', strtotime($item['created_at']))}}</span>
                                <p><p><strong>{{mb_substr($item['short_content'], 0, LIMIT_SHORT_CONTENT, "utf-8")}}</strong></p>
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="box2-adv-right facebook">
        <!-- <div class="fb-page" data-href="https://www.facebook.com/batdongsantiengiang" data-height="245px" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/batdongsantiengiang"><a href="https://www.facebook.com/batdongsantiengiang">Bất Động Sản Tiền Giang</a></blockquote></div></div> -->
        <!--<div class="fb-page" data-href="https://www.facebook.com/batdongsantiengiang/" data-height="245px" data-width="310" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/batdongsantiengiang/"><a href="https://www.facebook.com/batdongsantiengiang/">Bất Động Sản Tiền Giang</a></blockquote></div></div>-->
    </div>
    <div class="banner_R">
        <!--<div class="pas uiBoxLightblue bottomborder"><div class="uiHeader"><div class="clearfix uiHeaderTop"><div><h3 class="uiHeaderTitle">Chúng tôi trên Google+</h3></div></div></div></div>-->
        <!--<div class="g-plus" data-action="followers" data-height="290" data-href="https://plus.google.com/b/103868662179098059359?prsrc=2" data-source="blogger:blog:followers" data-width="290"></div>-->
    </div>
</div>