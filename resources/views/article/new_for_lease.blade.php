<?php
use App\Library\Helpers;
$mySelf = Auth::user();
global $province;
?>
@section('contentCSS')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@extends('layouts.app')
@section('content')
    @include('cache.province')
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
                                    <option value="Nhà đất bán">Nhà đất bán</option>
                                    <option value="Nhà đất cho thuê">Nhà đất cho thuê</option>
                                </select>
                                @if ($errors->has('method_article'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('method article', 'hình thức', $errors->first('method_article')) }}</p></div>
                                @endif
                            </div>
                            <div class="row25"><label>Loại (<span class="camcam">*</span>):</label></div>
                            <div class="row25">
                                <select id="type_article" name="type_article" class="advance-options ipt1">
                                    <option value="" class="advance-options" style="min-width: 195px;">-- Phân mục --</option>
                                </select>
                                @if ($errors->has('type_article'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('type article', 'loại', $errors->first('type_article')) }}</p></div>
                                @endif
                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Tỉnh/Thành phố (<span class="camcam">*</span>):</label></div>
                            <div class="row25">
                                <select id="select-province" name="province_id" class="ipt1 select-province">
                                    <option value="">-- Chọn Tỉnh/Thành phố --</option>
                                    @foreach($province as $item)
                                        <option value="{{$item['id']}}">{{$item['_name']}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('province_id'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('province id', 'Tỉnh/Thành phố', $errors->first('province_id')) }}</p></div>
                                @endif
                            </div>
                            <div class="row25"><label>Quận/Huyện (<span class="camcam">*</span>):</label></div>
                            <div class="row25">
                                <select name="district_id" class="ipt1 select-district">
                                    <option value="0" class="advance-options" style="min-width: 168px;">-- Chọn Quận/Huyện --</option>
                                </select>
                                @if ($errors->has('district_id'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('district id', 'Quận/Huyện', $errors->first('district_id')) }}</p></div>
                                @endif
                            </div>
                        </div>

                        <div class="row_ad clearfix">
                            <div class="row25"><label>Phường/Xã:</label></div>
                            <div class="row25">
                                <select class="ipt1 select-ward" name="ward_id" id="select-ward">
                                    <option value="0" class="advance-options" style="min-width: 168px;">-- Chọn Đường/Phố --
                                    </option>
                                </select>
                                @if ($errors->has('street_id'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('ward id', 'Đường/Phố', $errors->first('street_id')) }}</p></div>
                                @endif
                            </div>
                            <div class="row25"><label>Đường/Phố:</label></div>
                            <div class="row25">
                                <select class="ipt1 select-street" name="street_id" id="select-street">
                                    <option value="0" class="advance-options" style="min-width: 168px;">-- Chọn Đường/Phố --
                                    </option>
                                </select>
                                @if ($errors->has('street_id'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('ward id', 'Đường/Phố', $errors->first('street_id')) }}</p></div>
                                @endif
                            </div>
                        </div>

                        <div class="row_ad clearfix">
                            <div class="row25"><label>Tên dự án:</label></div>
                            <div class="row25">
                                <input size="47" maxlength="255" class="ver_number ipt1" name="project" value="{{old('project') ?? $article->project ?? ''}}" id="Property_area" type="text">
                                @if ($errors->has('project'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('project', 'dự án', $errors->first('project')) }}</p></div>
                                @endif
                            </div>
                            <div class="row25"><label>Diện tích:</label></div>
                            <div class="row25">
                                <input size="47" maxlength="255" type="number" class="ver_number ipt1" name="area" value="{{old('area') ?? $article->area ?? ''}}" id="Property_area" style="width: 88%;"><span>m²</span>
                                @if ($errors->has('area'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('area', 'diện tích', $errors->first('area')) }}</p></div>
                                @endif
                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Giá:</label></div>
                            <div class="row25">
                                <input name="price" type="number" id="price" value="{{old('price') ?? $article->price ?? ''}}" class="text-field ipt1" numberonly="2" maxlength="6">
                                @if ($errors->has('price'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('price', 'thành tiền', $errors->first('price')) }}</p></div>
                                @endif
                            </div>
                            <div class="row25"><label>Đơn vị:</label></div>
                            <div class="row25">
                                <select id="ddlPriceType" name="ddlPriceType" class="ipt1 select-ddlPriceType">
                                    <option value="Thỏa thuận" class="advance-options" style="min-width: 168px;">Thỏa thuận</option>
                                </select>
                                @if ($errors->has('ddlPriceType'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('ddlPriceType', 'đơn vị', $errors->first('ddlPriceType')) }}</p></div>
                                @endif
                            </div>
                        </div>
                        <div class="camcam" id="_totalPrice">Không chỉnh giá nếu muốn để giá thỏa thuận</div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Địa chỉ (<span class="camcam">*</span>):</label></div>
                            <div class="row75">
                                <input size="47" maxlength="255" class="ipt1" name="address" id="txtAddress" type="text" value="{{old('address') ?? $article->address ?? ''}}" placeholder="Nhập địa chỉ" autocomplete="off">
                                @if ($errors->has('address'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('address', 'địa chỉ', $errors->first('address')) }}</p></div>
                                @endif</div>
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
                                @if ($errors->has('content_article'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('content article', 'nội dung', $errors->first('content_article')) }}</p></div>
                                @endif</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box_admin_C">
                    <div class="detail_admin_C">
                        <div class="box_admin_C">
                            <div class="row_ad"><strong class="xanhxanh">Hình ảnh</strong></div>
                            <div class="row_ad">Hình ảnh đầu tiên sẽ đặt làm ảnh đại diện (<span class="camcam">*</span>) (tối đa 50Mb)</div>
                            <div class="row_ad">
                                <div id="fileupload">
                                    <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                    <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                    <div class="row fileupload-buttonbar">
                                        <div class="col-lg-10">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <label class="btn btn-success fileinput-button" style="width: 205px;">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>Thêm nhiều hình ảnh...</span>
                                                        <input class="hidden" id="file_upload_images" type="file" name="files[]" multiple>
                                                    </label>
                                            <div style="padding: 10px 20px 0 30px;display: contents;">
                                                (hình ảnh đầu tiên sẽ được đặc làm ảnh đại điện cho tin của bạn)
                                            </div>
                                        </div>
                                    </div>
                                    <!-- The table listing the files available for upload/download -->
                                    <table role="presentation" class="table table-striped">
                                        <tbody class="files">
                                        @if(isset($article->gallery_image) && $article->gallery_image)
                                            @foreach(json_decode($article->gallery_image) as $item)
                                                <tr class="template-download fade in">
                                                    <td>
                                                            <span class="preview">
                                                                    <a href="{{ Helpers::file_path($article->id, PUBLIC_ARTICLE_LEASE, true).$item}}"
                                                                       title="{{$item}}" download="{{$item}}" data-gallery=""><img width="120"
                                                                                                                                   src="{{ Helpers::file_path($article->id, PUBLIC_ARTICLE_LEASE, true).THUMBNAIL_PATH.$item}}"></a>
                                                            </span>
                                                    </td>
                                                    <td>
                                                        <p class="name">
                                                            <a href="{{ Helpers::file_path($article->id, PUBLIC_ARTICLE_LEASE, true).$item}}"
                                                               title="{{$item}}"
                                                               download="{{$item}}" data-gallery="">{{$item}}</a>
                                                        </p>
                                                        <input hidden="" type="text" name="upload_images[]" value="{{$item}}">
                                                    </td>
                                                    <td>
                                                        <button onclick="remove_exists_img('{{$item}}')" class="btn btn-danger delete">
                                                            <i class="glyphicon glyphicon-trash"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box_admin_C">
                    <div class="detail_admin_C detail_admin_d">
                        <div class="row_ad"><strong class="xanhxanh">Thông tin Bổ sung</strong></div>
                        <div class="row_ad">Các bạn nên điền đầy đủ các thông tin bên dưới đây để những khách hàng có nhu cầu có thể nắm bắt được đầy đủ thông tin về bất động sản của bạn hơn . Theo thống kê thì 1 tin tức được điền đẩy đủ thông tin sẽ có lượng truy cập gấp 2 lần tin không điền đẩy đủ</div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Mặt tiền (m):</label></div>
                            <div class="row25">
                                <input name="facade" type="text" value="{{old('facade') ?? $article->facade ?? ''}}" id="txtWidth" maxlength="6" numberonly="2" class="text-field ipt1">
                                @if ($errors->has('facade'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('facade', 'mặt tiền', $errors->first('facade')) }}</p></div>
                                @endif                                          </div>
                            <div class="row25"><label>Đường vào (m):</label></div>
                            <div class="row25">
                                <input name="land_width" value="{{old('land_width') ?? $article->land_width ?? ''}}" type="text" id="txtLandWidth" maxlength="6" numberonly="2" class="text-field ipt1">
                                @if ($errors->has('way_in'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('land width', 'đường vào', $errors->first('land_width')) }}</p></div>
                                @endif
                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Hướng nhà :</label></div>
                            <div class="row25">
                                <select id="ddlHomeDirection" name="ddl_home_direction" class="dropdown-list ipt1">
                                    <option value="KXĐ">KXĐ</option>
                                    <option value="Đông">Đông</option>
                                    <option value="Tây">Tây</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Bắc">Bắc</option>
                                    <option value="Đông-Bắc">Đông-Bắc</option>
                                    <option value="Tây-Bắc">Tây-Bắc</option>
                                    <option value="Tây-Nam">Tây-Nam</option>
                                    <option value="Đông-Nam">Đông-Nam</option>
                                </select>
                                @if ($errors->has('ddlHomeDirection'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('ddlHomeDirection', 'hướng nhà', $errors->first('ddlHomeDirection')) }}</p></div>
                                @endif                 </div>
                            <div class="row25"><label>Hướng ban công:</label></div>
                            <div class="row25">
                                <select id="ddlBaconDirection" name="ddl_bacon_direction" class="dropdown-list ipt1">
                                    <option value="KXĐ">KXĐ</option>
                                    <option value="Đông">Đông</option>
                                    <option value="Tây">Tây</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Bắc">Bắc</option>
                                    <option value="Đông-Bắc">Đông-Bắc</option>
                                    <option value="Tây-Bắc">Tây-Bắc</option>
                                    <option value="Tây-Nam">Tây-Nam</option>
                                    <option value="Đông-Nam">Đông-Nam</option>
                                </select>
                                @if ($errors->has('ddlBaconDirection'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('ddlBaconDirection', 'hướng ban công', $errors->first('ddlBaconDirection')) }}</p></div>
                                @endif
                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Số tầng:</label></div>
                            <div class="row25">
                                <input name="floor" type="text" id="txtFloorNumbers" value="{{old('floor') ?? $article->floor ?? ''}}" class="text-field ipt1" maxlength="3" numberonly="1">
                                @if ($errors->has('floor'))
                                    <div class="errorMessage" style="display: block;">{{ str_replace('floor', 'số tầng', $errors->first('floor')) }}</div>
                                @endif
                            </div>
                            <div class="row25"><label>Số phòng ngủ:</label></div>
                            <div class="row25">
                                <input name="bed_room" type="number" id="txtRoomNumber" value="{{old('bed_room') ?? $article->bed_room ?? ''}}" class="text-field ipt1" maxlength="3" numberonly="1">
                                @if ($errors->has('bed_room'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('bed_room', 'số phòng ngủ', $errors->first('bed_room')) }}</p></div>
                                @endif
                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Số toilet:</label></div>
                            <div class="row25">
                                <input name="toilet" type="number" value="{{old('toilet') ?? $article->toilet ?? ''}}" id="txtToiletNumber" class="text-field ipt1" maxlength="3" numberonly="1">
                                @if ($errors->has('toilet'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('toilet', 'số toilet', $errors->first('toilet')) }}</p></div>
                                @endif
                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Nội thất:</label></div>
                            <div class="row25">
                                <textarea name="furniture" id="txtInterior" rows="10" cols="50" class="text-field" style="width: 524px; height: 130px" maxlength="200">{{old('furniture') ?? $article->furniture ?? ''}}</textarea>
                                @if ($errors->has('furniture'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('furniture', 'nội thất', $errors->first('furniture')) }}</p></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box_admin_C">
                    <div class="detail_admin_C">
                        <div class="row_ad"><strong class="xanhxanh">THÔNG TIN LIÊN HỆ</strong></div>
                        <div class="row_ad clearfix ">
                            <div class="row25"><label>Họ và tên (<span class="camcam">*</span>):</label></div>
                            <div class="row50">
                                <input name="contact_name" type="text" required id="txtBrName" class="text-field ipt1" maxlength="200" value="{{old('contact_name') ?? $article->contact_name ?? $mySelf->name}}">
                                @if ($errors->has('contact_name'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('contact name', 'tên liên hệ', $errors->first('contact_name'))}}</p></div>
                                @endif
                            </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Địa chỉ:</label></div>
                            <div class="row50">
                                <input name="contact_address" type="text" id="txtBrAddress" class="text-field ipt1" value="{{old('contact_address') ?? $article->contact_address ?? (($mySelf->address ? $mySelf->address.', ' : '').($mySelf->street ? $mySelf->street.', ' : '').($mySelf->ward ? $mySelf->ward.', ' : '').($mySelf->district ? $mySelf->district.', ' : '').($mySelf->province ? $mySelf->province.', Việt Nam' : ''))}}" maxlength="200" style="width: 100%;">
                                @if ($errors->has('contact_address'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('contact address', 'địa chỉ', $errors->first('contact_address'))}}</p></div>
                                @endif
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Di động (<span class="camcam">*</span>):</label></div>
                            <div class="row50">
                                <input type="text" name="contact_phone" class="select-text-content ipt1" value="{{old('contact_phone') ?? $article->contact_phone ?? $mySelf->phone}}" placeholder="" style="width: 175px;">
                                @if ($errors->has('contact_phone'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('contact phone', 'di động', $errors->first('contact_phone'))}}</p></div>
                                @endif
                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Email:</label></div>
                            <div class="row50">
                                <input name="contact_email" type="text" id="txtBrEmail" class="text-field email-field ipt1" maxlength="100" style="width: 100%;" email="1" value="{{old('contact_email') ?? $article->contact_email ?? $mySelf->email}}">
                                @if ($errors->has('contact_email'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('contact email', 'email', $errors->first('contact_email')) }}</p></div>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="box_admin_C">
                    <div class="detail_admin_C">
                        <div class="row_ad"><strong class="xanhxanh">Xác thực thông tin</strong></div>
                        <div class="row_ad">
                            <div class="row25"><label>Mã xác nhận(<span class="camcam">*</span>):</label></div>
                            <div class="row50">
                                <div class="g-recaptcha" data-sitekey="{{env('NOCAPTCHA_SECRET')}}"></div>
                            </div>
                        </div>

                        <div class="row_ad cangiua">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="submit_type" class="submit_type" value="">
                            @if(isset($article->id))
                                <input type="hidden" name="id" value="{{ $article->id }}">
                                <input type="hidden" name="remove_imgs" id="remove_imgs" value="">
                                @if($article->status == PUBLISHED_ARTICLE)
                                    <input type="submit" name="ctl00$MainContent$_userPage$ctl00$btnSave" value="Lưu tin" id="btnSave" class="bluebotton bt_cam bt_sb" style="width:80px;">
                                @else
                                    <input type="submit" name="ctl00$MainContent$_userPage$ctl00$btnSave" value="Đăng tin" id="btnSave" class="bluebotton bt_cam bt_sb" style="width:80px;">
                                @endif
                            @else
                                <input type="submit" name="ctl00$MainContent$_userPage$ctl00$btnSave" value="Đăng tin" id="btnSave" class="bluebotton bt_cam bt_sb" style="width:80px;">
                            @endif
                            <input id="btnCancel" type="button" value="Lưu Nháp" name="btnCancel" class="orangebutton bt_cam bt_sb" onclick="DirectDraft()">
                        </div>
                    </div>
                </div>
            </div>
                    </div>
            </div>
            </form>
        </div>
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
                document.getElementById('type_article').options[9]=new Option("Bán dự án quận 12", "Bán dự án quận 12", false, false);
                document.getElementById('type_article').options[10]=new Option("Bán loại bất động sản khác", "Bán loại bất động sản khác", false, false);

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
                document.getElementById('type_article').options[8]=new Option("Cho dự án quận 12", "Cho dự án quận 12", false, false);
                document.getElementById('type_article').options[9]=new Option("Cho thuê loại bất động sản khác", "Cho thuê loại bất động sản khác", false, false);

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



