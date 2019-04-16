<?php
use App\Library\Helpers;
$mySelf = Auth::user();
global $province;
?>
@extends('layouts.app')
@section('content')
    @include('user.left_sidebar_avatar', ['mySelf' => $mySelf])
    <div class="main-l main-l1">
        <div class="box1-left">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span>
                @if(isset($article->id))
                   Chỉnh sửa tin rao bán, cho thuê nhà đất
                @else
                   Đăng tin rao bán, cho thuê nhà đất
                @endif
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert">×</a>
                    <span><?php echo $message ?>!</span>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">×</a>
                    <span><strong>Lỗi!</strong> <?php echo $message ?>.</span>
                </div>
            @endif
            <div class="box_admin_C">
                <div class="detail_admin_C clearfix" style="padding-bottom: 0px;padding-top: 0px;">
                    <p>
                        <b class="camcam">Một số lưu ý khi đăng tin</b><br>
                        - Thông tin có dấu (<span class="camcam">*</span>) là bắt buộc.<br>
                        - Không gộp nhiều bất động sản trong một tin rao.<br>
                        - Không đăng lạiTIỆN ÍCH XUNG QUANH tin đã đăng trên thosannhadat.com<br>
                        - Nên dùng trình duyệt Firefox và Chrome để hiển thị tốt nhất.</p>
                </div>
            </div>

            <form action="/quan-ly-tin/dang-tin-ban-cho-thue" enctype="multipart/form-data" class="form_submit" method="POST">
                <div class="box_admin_C">
                    <div class="detail_admin_C">
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Tiêu đề tin đăng (<span class="camcam">*</span>)</label></div>
                            <div class="row75">
                                <input size="47" maxlength="500" placeholder="Vui lòng nhập tiêu đề tin đăng của bạn. Tối thiểu là 30 ký tự và tối đa là 99 ký tự." value="{{old('title') ?? $article->title ?? ''}}" class="ipt1" name="title" id="Property_name" type="text">
                                @if ($errors->has('title'))
                                    <span style="color: red;">{{ str_replace('title', 'tiêu đề', $errors->first('title')) }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                <div class="box_admin_C">
                    <div class="detail_admin_C">
                        <div class="row_ad"><strong class="xanhxanh">thông tin cơ bản</strong></div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Hình thức (<span class="camcam">*</span>):</label></div>
                            <div class="row25">
                                <select id="method_article" name="method_article" class="ipt1" onchange="typeMethod(this.value);">
                                    <option value="" class="advance-options" style="min-width: 195px;">-- Hình thức --</option>
                                    <option value="Nhà đất bán" class="advance-options" style="min-width: 195px;">Nhà đất bán</option>
                                    <option value="Nhà đất cho thuê" class="advance-options" style="min-width: 195px;">Nhà đất cho thuê</option>
                                </select>
                                @if ($errors->has('title'))
                                    <span style="color: red;">{{ str_replace('title', 'tiêu đề', $errors->first('title')) }}</span>
                                @endif
                                @if ($errors->has('method_article'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('method article', 'hình thức', $errors->first('method_article')) }}</p></div>
                                @endif
                            </div>
                            <div class="row25"><label>Chọn dự án:</label></div>
                            <div class="row25">
                                <select class="ipt1" name="Property[project_id]" id="Property_project_id">
                                    <option value="">Chọn dự án</option>
                                    <option value="11">KHU BIỆT THỰ, NHÀ PHỐ CAO CẤP TẠI QUẬN 12</option>
                                </select>
                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Loại (<span class="camcam">*</span>):</label></div>
                            <div class="row25">
                                <select class="ipt1" name="Property[category_id]" id="Property_category_id">
                                    <option value="">Chọn loại nhà đất</option>
                                    <option value="14">Nhà phố - Nhà riêng</option>
                                    <option value="11">Đất - Đất nền dự án</option>
                                    <option value="12">Căn hộ Chung Cư</option>
                                    <option value="26">Nhà đất Quận 12</option>
                                    <option value="18">Nhà Kho - Nhà xưởng</option>
                                    <option value="20">Mặt bằng - Cửa hàng</option>
                                    <option value="19">Khách sạn - Nhà nghỉ</option>
                                    <option value="10">Biệt Thự - Village</option>
                                    <option value="17">Trang trại, khu nghỉ dưỡng</option>
                                    <option value="25">Nhà trọ</option>
                                    <option value="27">đất quận 12</option>
                                    <option value="28">nhà quận 12</option>
                                </select>                                            </div>
                            <div class="row25"><label>Vị trí nhà đất:</label></div>
                            <div class="row25">
                                <select class="ipt1" name="Property[vitrinhadat]" id="Property_vitrinhadat">
                                    <option value="">Chọn loại nhà đất</option>
                                    <option value="1">Mặt tiền đường</option>
                                    <option value="2">Đường nội bộ</option>
                                    <option value="3">Đường ngõ lớn</option>
                                    <option value="4">Đường ngỏ nhỏ</option>
                                    <option value="5">Không cập nhật</option>
                                </select>                                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Địa chỉ (<span class="camcam">*</span>):</label></div>
                            <div class="row75">
                                <input size="47" maxlength="255" class="ipt1" id="street" name="Property[street]" type="text" value="16/23 dinh tien hoang" placeholder="Nhập truy vấn" autocomplete="off">                                            </div>

                            <input name="Property[long_attitude]" id="Property_long_attitude" type="hidden">                    <input name="Property[lat_attitude]" id="Property_lat_attitude" type="hidden">                </div>

                        <!-- <div class="row_ad clearfix">
                            <div class="row25"><label>Phường / xã :</label></div>
                            <div class="row75">
                                                                            </div>
                        </div> -->

                        <div class="row_ad clearfix">
                            <div class="row25"><label>Tỉnh / Thành phố (<span class="camcam">*</span>):</label></div>
                            <div class="row25">
                                <select class="ipt1" id="Property_city_id_dangtin" name="Property[city_id]">
                                    <option value="">Tỉnh/Thành phố</option>
                                    <option value="2">Hà Nội</option>
                                    <option value="3" selected="selected">TP.HCM</option>
                                    <option value="4">Hải Phòng</option>
                                    <option value="5">Đà Nẵng</option>
                                    <option value="12">Bình Dương</option>
                                    <option value="13">Cần Thơ</option>
                                    <option value="14">An Giang</option>
                                    <option value="15">Bà Rịa-Vũng Tàu</option>
                                    <option value="16">Bạc Liêu</option>
                                    <option value="17">Bắc Kạn</option>
                                    <option value="18">Bắc Giang</option>
                                    <option value="19">Bắc Ninh</option>
                                    <option value="20">Bến Tre</option>
                                    <option value="21">Bình Định</option>
                                    <option value="22">Bình Phước</option>
                                    <option value="23">Bình Thuận</option>
                                    <option value="24">Cà Mau</option>
                                    <option value="25">Cao Bằng</option>
                                    <option value="26">Đắk Lắk</option>
                                    <option value="27">Đắk Nông</option>
                                    <option value="28">Điện Biên</option>
                                    <option value="29">Đồng Nai</option>
                                    <option value="30">Đồng Tháp</option>
                                    <option value="31">Gia Lai</option>
                                    <option value="32">Hà Giang</option>
                                    <option value="33">Hà Nam</option>
                                    <option value="34">Hà Tây</option>
                                    <option value="35">Hà Tĩnh</option>
                                    <option value="36">Hải Dương</option>
                                    <option value="37">Hòa Bình</option>
                                    <option value="38">Hậu Giang</option>
                                    <option value="39">Hưng Yên</option>
                                    <option value="40">Khánh Hòa</option>
                                    <option value="41">Kiên Giang</option>
                                    <option value="42">Kon Tum</option>
                                    <option value="43">Lai Châu</option>
                                    <option value="44">Lào Cai</option>
                                    <option value="45">Lạng Sơn</option>
                                    <option value="46">Lâm Đồng</option>
                                    <option value="47">Long An</option>
                                    <option value="48">Nam Định</option>
                                    <option value="49">Nghệ An</option>
                                    <option value="50">Ninh Bình</option>
                                    <option value="51">Ninh Thuận</option>
                                    <option value="52">Phú Thọ</option>
                                    <option value="53">Phú Yên</option>
                                    <option value="54">Quảng Bình</option>
                                    <option value="55">Quảng Nam</option>
                                    <option value="56">Quảng Ngãi</option>
                                    <option value="57">Quảng Ninh</option>
                                    <option value="58">Quảng Trị</option>
                                    <option value="59">Sóc Trăng</option>
                                    <option value="60">Sơn La</option>
                                    <option value="61">Tây Ninh</option>
                                    <option value="62">Thái Bình</option>
                                    <option value="63">Thái Nguyên</option>
                                    <option value="64">Thanh Hóa</option>
                                    <option value="65">Thừa Thiên - Huế</option>
                                    <option value="66">Tiền Giang</option>
                                    <option value="67">Trà Vinh</option>
                                    <option value="68">Tuyên Quang</option>
                                    <option value="69">Vĩnh Long</option>
                                    <option value="70">Vĩnh Phúc</option>
                                    <option value="71">Yên Bái</option>
                                </select>                                            </div>
                            <div class="row25"><label>Quận / huyện (<span class="camcam">*</span>):</label></div>
                            <div class="row25">
                                <select id="Property_district_id_dangtin" class="ipt1" name="Property[district_id]">
                                    <option value="">Quận / Huyện</option>
                                    <option value="28">Huyện Nhà Bè</option>
                                    <option value="27">Huyện Hóc Môn</option>
                                    <option value="26">Huyện Củ Chi</option>
                                    <option value="25">Huyện Cần Giờ</option>
                                    <option value="24">Quận Tân Phú</option>
                                    <option value="23">Quận Bình Tân</option>
                                    <option value="29">Huyện Bình Chánh</option>
                                    <option value="30">Quận Thủ Đức</option>
                                    <option value="31">Quận Tân Bình</option>
                                    <option value="32">Quận Bình Thạnh</option>
                                    <option value="33">Quận Phú Nhuận</option>
                                    <option value="34">Quận Gò Vấp</option>
                                    <option value="35">Quận 12</option>
                                    <option value="36">Quận 11</option>
                                    <option value="37">Quận 10</option>
                                    <option value="38">Quận 9</option>
                                    <option value="39">Quận 8</option>
                                    <option value="40">Quận 7</option>
                                    <option value="41">Quận 6</option>
                                    <option value="42">Quận 5</option>
                                    <option value="43">Quận 4</option>
                                    <option value="44">Quận 3</option>
                                    <option value="45">Quận 2</option>
                                    <option value="46" selected="selected">Quận 1</option>
                                </select>                                            </div>
                        </div>

                        <div class="row_ad clearfix">
                            <div class="row25"><label>Diện tích (<span class="camcam">*</span>):</label></div>
                            <div class="row25 xuong50">
                                <input size="47" maxlength="255" class="ver_number ipt1" name="Property[area]" id="Property_area" type="text">                                            </div>
                            <div class="row25 xuong50">  m2 </div>
                        </div>

                        <div class="camcam">Không chỉnh giá nếu muốn để giá thương lượng</div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Giá:</label></div>
                            <div class="row25">
                                <input size="47" maxlength="255" class="ver_number ipt1" name="Property[price]" id="Property_price" type="text" value="0.00">                    </div>

                            <div class="row25"><label>Đơn vị tính :</label></div>
                            <div class="row25">
                                <select class="ipt1" name="Property[donvitinh]" id="Property_donvitinh">
                                    <option value="">Vui lòng chọn ...</option>
                                    <option value="1">Tỷ</option>
                                    <option value="2">Triệu</option>
                                    <option value="3">Triệu/m2</option>
                                    <option value="4">Trăm nghìn/m2</option>
                                </select>                                            </div>
                        </div>

                    </div>
                </div>

                <div class="box_admin_C">
                    <div class="detail_admin_C">
                        <div class="box_admin_C">
                            <div class="row_ad"><strong class="xanhxanh">Thông tin mô tả</strong></div>
                            <div class="row_ad">Nội dung đăng tin (<span class="camcam">*</span>) (3000 từ)</div>
                            <div class="row_ad">
                                <textarea name="content_article" id="content_article" style="height: 170px; width: 100%;" class="text-field countTypeLength required mt10" rows="50" cols="100" minlength="30" maxlength="3000">{{old('content_article') ?? $article->content_article ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box_admin_C">
                    <div class="detail_admin_C">
                        <div class="box_admin_C">
                            <div class="row_ad"><strong class="xanhxanh">Thông tin mô tả</strong></div>
                            <div class="row_ad">Hình ảnh đầu tiên sẽ đặt làm ảnh đại diện (<span class="camcam">*</span>) (tối đa 50Mb)</div>
                            <div class="row_ad">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box_admin_C">
                    <div class="detail_admin_C detail_admin_d">
                        <div class="row_ad"><strong class="xanhxanh">Thông tin Bổ sung</strong></div>
                        <div class="row_ad">Các bạn nên điền đầy đủ các thông tin bên dưới đây để những khách hàng có nhu cầu có thể nắm bắt được đầy đủ thông tin về bất động sản của bạn hơn . Theo thống kê thì 1 tin tức được điền đẩy đủ thông tin sẽ có lượng truy cập gấp 2 lần tin không điền đẩy đủ</div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Tình trạng pháp lý (<span class="camcam">*</span>):</label></div>
                            <div class="row25">
                                <select class="ipt1" name="Property[tinhtrangphaply]" id="Property_tinhtrangphaply">
                                    <option value="">Vui lòng chọn ...</option>
                                    <option value="1">Không Xác Định</option>
                                    <option value="2">Sổ Hồng</option>
                                    <option value="3">Giấy Đỏ</option>
                                    <option value="4">Giấy Tay</option>
                                    <option value="5">Đang Hợp Thức Hóa</option>
                                    <option value="6">Giấy Tờ Hợp Lệ</option>
                                    <option value="7">Chủ Quyền Tư Nhân</option>
                                    <option value="8">Hợp Đồng</option>
                                </select>                                            </div>
                            <div class="row25"><label>Đường vào(Đơn vị m2):</label></div>
                            <div class="row25">
                                <input size="47" maxlength="255" class="ipt1" name="Property[duongvao]" id="Property_duongvao" type="text">                    </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Hướng nhà :</label></div>
                            <div class="row25">
                                <select class="ipt1" name="Property[huongnha]" id="Property_huongnha">
                                    <option value="">Vui lòng chọn ...</option>
                                    <option value="1">Không Xác Định</option>
                                    <option value="2">Đông</option>
                                    <option value="3">Tây</option>
                                    <option value="4">Nam</option>
                                    <option value="5">Bắc</option>
                                    <option value="6">Đông Bắc</option>
                                    <option value="7">Tây Bắc</option>
                                    <option value="8">Đông Nam</option>
                                    <option value="9">Tây Nam</option>
                                </select>                    </div>
                            <div class="row25"><label>Số tầng:</label></div>
                            <div class="row25">
                                <input size="47" maxlength="255" class="ipt1" name="Property[floor]" id="Property_floor" type="text" value="0">                                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Số phòng ngủ:</label></div>
                            <div class="row25">
                                <input size="47" maxlength="255" class="ipt1" name="Property[bed_room]" id="Property_bed_room" type="text" value="0">                                            </div>
                            <div class="row25"><label>Số toilet:</label></div>
                            <div class="row25">
                                <input size="47" maxlength="255" class="ipt1" name="Property[toilet]" id="Property_toilet" type="text" value="0">                                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Số phòng khách:</label></div>
                            <div class="row25">
                                <input size="47" maxlength="255" class="ipt1" name="Property[phongkhach]" id="Property_phongkhach" type="text" value="0">                                            </div>
                            <div class="row25"><label>Số phòng bếp:</label></div>
                            <div class="row25">
                                <input size="47" maxlength="255" class="ipt1" name="Property[phongbep]" id="Property_phongbep" type="text" value="0">                                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Có ban công:</label></div>
                            <div class="row25">
                                <select class="ipt1" name="Property[bancong]" id="Property_bancong">
                                    <option value="1">Có</option>
                                    <option value="0" selected="selected">Không</option>
                                </select>                    </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Diện tích khuôn viên:</label></div>
                            <div class="row50">
                                <input size="47" maxlength="255" class="ipt1" placeholder="Chiều ngang x Chiều dài x chiều ngang sau" name="Property[dientichkhuonvien]" id="Property_dientichkhuonvien" type="text">                    </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Diện tích xây dựng:</label></div>
                            <div class="row50">
                                <input size="47" maxlength="255" class="ipt1" placeholder="Chiều ngang trước x Chiều dài x chiều ngang sau" name="Property[dientichxaydung]" id="Property_dientichxaydung" type="text">                    </div>
                        </div>
                    </div>
                </div>

                <div class="box_admin_C">
                    <div class="detail_admin_C">
                        <div class="row_ad"><strong class="xanhxanh">THÔNG TIN LIÊN HỆ</strong></div>
                        <div class="row_ad clearfix ">
                            <div class="row25"><label>Họ và tên (<span class="camcam">*</span>):</label></div>
                            <div class="row50">
                                <input size="47" maxlength="255" class="ipt1" name="Property[hoten]" id="Property_hoten" type="text" value="Hau Trong">                                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Địa chỉ:</label></div>
                            <div class="row50">
                                <input size="47" maxlength="255" class="ipt1" name="Property[diachi]" id="Property_diachi" type="text" value="16/23 dinh tien hoang">                    </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Di động (<span class="camcam">*</span>):</label></div>
                            <div class="row50">
                                <input size="47" maxlength="255" class="ipt1" name="Property[dienthoai]" id="Property_dienthoai" type="text" value="0903353794">                                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Email:</label></div>
                            <div class="row50">
                                <input size="47" maxlength="255" class="ipt1" name="Property[email]" id="Property_email" type="text" value="tt.hau94@gmail.com">                    </div>
                        </div>
                    </div>
                </div>

                <div class="box_admin_C">
                    <div class="detail_admin_C">
                        <div class="row_ad"><strong class="xanhxanh">Xác thực thông tin</strong></div>
                        <div class="row_ad">
                            <div class="row25"><label>Mã xác nhận(<span class="camcam">*</span>):</label></div>
                            <div class="row50">
                                <div class="g-recaptcha" data-sitekey="6LeMeRwTAAAAALI3cY0P-_Qw8fkUzJG3j75OrVl1"><div style="width: 304px; height: 78px;"><div><iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LeMeRwTAAAAALI3cY0P-_Qw8fkUzJG3j75OrVl1&amp;co=aHR0cDovL211YW5oYWRhdHF1YW4xMi5jb206ODA.&amp;hl=vi&amp;v=v1554100419869&amp;size=normal&amp;cb=5897i7is27kq" width="304" height="78" role="presentation" name="a-b26adf31yocv" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div></div>
                            </div>
                        </div>

                        <div class="row_ad cangiua">
                            <input id="btnSave" name="btnSave" type="submit" class="bt_cam bt_sb" value="Đăng tin">
                            <input id="Button5" type="button" onclick="window.location.href= 'http://muanhadatquan12.com/member/site/index'" class="bt_cam bt_sb" value="Hủy bỏ">
                        </div>
                    </div>
                </div>
            </form></div>

    </div>
@endsection
@section('contentJS')
    <script>
        function DirectDraft() {
            $('.submit_type').val('draf');
            $('#btnSave').click();
        }
        <?php
        if(old('province_id') ?? $article->province_id ?? false) {
        ?>
        $(document).ready(function() {
            document.getElementById('select-province').value = '<?php echo old('province_id') ?? $article->province_id ?? '' ?>';
            getDistrict('<?php echo old('province_id') ?? $article->province_id ?? '' ?>', '<?php echo old('district_id') ?? $article->district_id ?? '' ?>', '<?php echo old('ward_id') ?? $article->ward_id ?? '' ?>', '<?php echo old('street_id') ?? $article->street_id ?? '' ?>');
            <?php
            if(old('district_id') ?? $article->district_id ?? false) {
            ?>
            getWard(' <?php echo old('district_id') ?? $article->district_id ?? '' ?>', ' <?php echo old('ward_id') ?? $article->ward_id ?? '' ?>', '<?php echo old('street_id') ?? $article->street_id ?? '' ?>');
            <?php
            }
            ?>
        });
        <?php
        }
        ?>
        function typeMethod(val) {
            document.getElementById('type_article').options.length = 0;
            if(val == 'Nhà đất bán') {
                document.getElementById('type_article').options[0]=new Option("--Phân mục--", "", false, false);
                document.getElementById('type_article').options[1]=new Option("Bán căn hộ chung cư", "Bán căn hộ chung cư", false, false);
                document.getElementById('type_article').options[2]=new Option("Bán nhà riêng", "Bán nhà riêng", false, false);
                document.getElementById('type_article').options[3]=new Option("Bán biệt thự, liền kề", "Bán biệt thự, liền kề", false, false);
                document.getElementById('type_article').options[4]=new Option("Bán nhà mặt phố", "Bán nhà mặt phố", false, false);
                document.getElementById('type_article').options[5]=new Option("Bán đất nền dự án", "Bán đất nền dự án", false, false);
                document.getElementById('type_article').options[6]=new Option("Bán đất", "Bán đất", false, false);
                document.getElementById('type_article').options[7]=new Option("Bán trang trại, khu nghỉ dưỡng", "Bán trang trại, khu nghỉ dưỡng", false, false);
                document.getElementById('type_article').options[8]=new Option("Bán kho, nhà xưởng", "Bán kho, nhà xưởng", false, false);
                document.getElementById('type_article').options[9]=new Option("Bán loại bất động sản khác", "Bán loại bất động sản khác", false, false);

                document.getElementById('ddlPriceType').options[0]=new Option("Thỏa thuận", "Thỏa thuận", false, false);
                document.getElementById('ddlPriceType').options[1]=new Option("Triệu", "Triệu", false, false);
                document.getElementById('ddlPriceType').options[2]=new Option("Tỷ", "Tỷ", false, false);
                document.getElementById('ddlPriceType').options[3]=new Option("Trăm nghìn/m2", "Trăm nghìn/m2", false, false);
                document.getElementById('ddlPriceType').options[4]=new Option("Triệu/m2", "Triệu/m2", false, false);

            }else{
                document.getElementById('type_article').options[0]=new Option("--Phân mục--", "", false, false);
                document.getElementById('type_article').options[1]=new Option("Cho thuê căn hộ chung cư", "Cho thuê căn hộ chung cư", false, false);
                document.getElementById('type_article').options[2]=new Option("Cho thuê căn nhà riêng", "Cho thuê căn nhà riêng", false, false);
                document.getElementById('type_article').options[3]=new Option("Cho thuê nhà mặt phố", "Cho thuê nhà mặt phố", false, false);
                document.getElementById('type_article').options[4]=new Option("Cho thuê nhà trọ, phòng trọ", "Cho thuê nhà trọ, phòng trọ", false, false);
                document.getElementById('type_article').options[5]=new Option("Cho thuê văn phòng", "Cho thuê văn phòng", false, false);
                document.getElementById('type_article').options[6]=new Option("Cho thuê cửa hàng, ki ốt", "Cho thuê cửa hàng, ki ốt", false, false);
                document.getElementById('type_article').options[7]=new Option("Cho thuê kho, nhà xưởng, đất", "Cho thuê kho, nhà xưởng, đất", false, false);
                document.getElementById('type_article').options[8]=new Option("Cho thuê loại bất động sản khác", "Cho thuê loại bất động sản khác", false, false);

                document.getElementById('ddlPriceType').options[0]=new Option("Thỏa thuận", "Thỏa thuận", false, false);
                document.getElementById('ddlPriceType').options[1]=new Option("Nghìn/tháng", "Nghìn/tháng", false, false);
                document.getElementById('ddlPriceType').options[2]=new Option("Triệu/tháng", "Triệu/tháng", false, false);
                document.getElementById('ddlPriceType').options[3]=new Option("Nghìn/m2/tháng", "Nghìn/m2/tháng", false, false);
                document.getElementById('ddlPriceType').options[4]=new Option("Triệu/m2/tháng", "Triệu/m2/tháng", false, false);
                document.getElementById('ddlPriceType').options[5]=new Option("Nghìn/m2/tháng", "Nghìn/m2/tháng", false, false);
            }
        }
        $('#txtTitle').keyup(function() {
            $('.txtProductTitle_count').html(99 - this.value.length);
        });
        $('#content_article').keyup(function() {
            $('.grayfont').html('Tối đa chỉ ' + (3000 - this.value.length) + ' ký tự');
        });
        <?php

        if(old('ddlHomeDirection') ?? $article->ddlHomeDirection ?? false){
        ?>
        document.getElementById('ddlHomeDirection').value = '<?php echo old('ddlHomeDirection') ?? $article->ddlHomeDirection ?? '' ?>';
        <?php
        }
        if(old('ddlBaconDirection') ?? $article->ddlBaconDirection ?? false){
        ?>
        document.getElementById('ddlBaconDirection').value = '<?php echo old('ddlBaconDirection') ?? $article->ddlBaconDirection ?? '' ?>';
        <?php
        }
        if(old('method_article') ?? $article->method_article ?? false) {
        echo old('method_article') ? "document.getElementById('method_article').value = '".old('method_article')."'; typeMethod('".old('method_article')."');" : '';
        echo isset($article->method_article) ? "document.getElementById('method_article').value = '".$article->method_article."'; typeMethod('".$article->method_article."');" : '';
        ?>
        document.getElementById('type_article').value = '<?php echo old('type_article') ?? $article->type_article ?? '' ?>';
        <?php
        }
        if(old('ddlPriceType') ?? $article->ddlPriceType ?? false){
        ?>
        document.getElementById('ddlPriceType').value = '<?php echo old('ddlPriceType') ?? $article->ddlPriceType ?? '' ?>';
        <?php
        }
        ?>
        $('#price').keyup(function() {
            let valPrice = this.value;
            if(valPrice && $('#ddlPriceType').val() != 'Thỏa thuận'){
                $('#_totalPrice').html(valPrice + ' ' + $('#ddlPriceType').val());
            }else{
                $('#_totalPrice').html('Thỏa thuận');
            }
        });
        $('#ddlPriceType').change(function() {
            reloadTotalPrice();
        })
        function reloadTotalPrice() {
            let valPrice = $('#price').val();
            if(valPrice && $('#ddlPriceType').val() != 'Thỏa thuận'){
                $('#_totalPrice').html(valPrice + ' ' + $('#ddlPriceType').val());
            }else{
                $('#_totalPrice').html('Thỏa thuận');
            }
        }
        <?php
        if(old('price') ?? $article->price ?? false) {
        ?>
        reloadTotalPrice();
        <?php
        }elseif(old('ddlPriceType') ?? $article->ddlPriceType ?? false) {
        ?>
        reloadTotalPrice();
        <?php
        }
        ?>
        function remove_exists_img(img) {
            let old = $('#remove_imgs').val();
            $('#remove_imgs').val((old ? (old + '|') : '') + img);
        }
        $('.select-province').change(function() {
            $('#txtAddress').val('');
        });
        $('.select-district').change(function() {
            $('#txtAddress').val($('.select-district option:selected').text() + ', ' + $('.select-province option:selected').text());
        });
        $('.select-ward').change(function() {
            $('#txtAddress').val('Phường ' + $('.select-ward option:selected').text() + ', ' + $('.select-district option:selected').text() + ', ' + $('.select-province option:selected').text());
        });
        $('.select-street').change(function() {
            $('#txtAddress').val('Đường ' + $('.select-street option:selected').text() + ', ' + 'Phường ' + $('.select-ward option:selected').text() + ', ' + $('.select-district option:selected').text() + ', ' + $('.select-province option:selected').text());
        });
    </script>
    <script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                    <button class="btn btn-primary start" disabled>
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Start</span>
                    </button>
                {% } %}
                {% if (!i) { %}
                    <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            <td>
                <span class="preview">
                    {% if (file.thumbnailUrl) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                    {% } %}
                </span>
            </td>
            <td>
                <p class="name">
                    {% if (file.url) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                    {% } else { %}
                        <span>{%=file.name%}</span>
                    {% } %}
                </p>
                {% if (file.error) { %}
                    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                {% } else { %}
                    <input hidden type="text" name="upload_images[]" value="{%=file.name%}" />
                {% } %}
            </td>
            <td>
                {% if (file.deleteUrl) { %}
                    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>Delete</span>
                    </button>
                    {{--<input type="checkbox" name="delete" value="1" class="toggle">--}}
        {% } else { %}
            <button class="btn btn-warning cancel">
                <i class="glyphicon glyphicon-ban-circle"></i>
                <span>Cancel</span>
            </button>
        {% } %}
    </td>
</tr>
{% } %}
</script>
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="/js/upload/vendor/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>--}}
    <!-- blueimp Gallery script -->
    <script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="/js/upload/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="/js/upload/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="/js/upload/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="/js/upload/jquery.fileupload-image.js"></script>
    <!-- The File Upload validation plugin -->
    <script src="/js/upload/jquery.fileupload-validate.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="/js/upload/jquery.fileupload-ui.js"></script>
    <!-- The main application script -->
    <script src="/js/upload/main.js"></script>
@endsection



