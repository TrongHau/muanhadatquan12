<?php
use App\Library\Helpers;
$mySelf = Auth::user();
?>
@section('contentCSS')
    <link rel="stylesheet" type="text/css" href="/css/croppie.css">
@endsection
@extends('layouts.app')
@section('content')
    @include('user.left_sidebar_avatar', ['mySelf' => $mySelf])
    <div class="main-l main-l1">
        <div class="box1-left">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span>Thay đổi thông tin cá nhân
            </div>

            <div class="detail_admin_C detail_R">
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
                <form class="form-horizontal" role="form" enctype="multipart/form-data" id="users-model-form" action="/thong-tin-ca-nhan/thay-doi-ca-nhan" method="post">
                    <div class="row_ad clearfix"><strong class="xanhxanh">Thông tin liên hệ</strong></div>
                    <div class="row_ad clearfix">
                        <label class="col-sm-4 required" style="line-height: 28px;" for="Users_full_name">Tên liên hệ <span class="required">*</span></label>				<div class="row50">
                            <input size="38" maxlength="30" class="form-control" name="name" id="Users_full_name" type="text" value="{{old('name') ?? $mySelf->name}}">
                            @if ($errors->has('name'))
                                <span style="color: red;" id="errorFullName">{{ str_replace('name', 'họ tên', $errors->first('name')) }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row_ad clearfix">
                        <label class="col-sm-4 required" style="line-height: 28px;" for="Users_full_name">Tên thường gọi </label>				<div class="row50">
                            <input size="38" maxlength="30" class="form-control" name="nick_name" id="Users_full_name" type="text" value="{{old('nick_name') ?? $mySelf->nick_name}}">
                            @if ($errors->has('nick_name'))
                                <span style="color: red;" id="errorFullName">{{ str_replace('nick name', 'tên thường gọi', $errors->first('nick_name')) }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row_ad clearfix">
                        <label class="col-sm-4 required" style="line-height: 28px;" for="Users_full_name">Ngày sinh </label>				<div class="row50">
                            <input name="birth_day" type="date" value="{{old('birth_day') ? date('Y-m-d', strtotime(old('birth_day'))) : $mySelf->birth_day ? date('Y-m-d', strtotime($mySelf->birth_day)) : ''}}   {{date('Y-m-d', strtotime(old('birth_day') ?? $mySelf->birth_day))}}" id="MainContent__userPage_ctl00_txtBirthDates" class="datetimepicker keycode hasDatepicker form-control" >
                            @if ($errors->has('birth_day'))
                                <span style="color: red;" id="errorFullName">{{ str_replace('birth day', 'ngày sinh', $errors->first('birth_day')) }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="row_ad clearfix">
                        <label class="col-sm-4" for="Users_company">Giới tính </label>				<div class="row50">
                            <input type="radio" name="gender" value="1" {{(old('gender') ?? $mySelf->gender) == 1 ? 'checked="checked"' : ''}} ><label for="MainContent__userPage_ctl00_rdMale">Nam</label>
                            <input type="radio" name="gender" value="0" {{(old('gender') ?? $mySelf->gender) == 0 ? 'checked="checked"' : ''}}><label for="MainContent__userPage_ctl00_rdFemale">Nữ</label>
                        </div>
                    </div>

                    <div class="row_ad clearfix">
                        <label class="col-sm-4" style="line-height: 28px;">Địa chỉ:<span class="required">*</span></label>
                        <div class="row70">
                            <select id="select-province" name="province_id" class="advance-options select-province opt1">
                                <option value="">-- Chọn Tỉnh/Thành phố * --</option>
                                @foreach($province as $item)
                                    <option value="{{$item->id}}">{{$item->_name}}</option>
                                @endforeach
                            </select>
                            <select id="select-district" name="district_id" class="advance-options select-district opt1">
                                <option value="0" class="advance-options" style="min-width: 168px;">-- Chọn Quận/Huyện * --</option>
                            </select>
                            <br/>
                            @if ($errors->has('province_id'))
                                <span style="color: red;" id="errorFullName">{{ str_replace('province id', 'Tỉnh/Thành phố', $errors->first('province_id')) }}</span><br/>
                            @endif
                            @if ($errors->has('district_id'))
                                <span style="color: red;" id="errorFullName">{{ str_replace('district id', 'Quận/Huyện', $errors->first('district_id')) }}</span><br/>
                            @endif
                            <select style="margin-top: 5px" class="advance-options select-ward opt1" name="ward_id" id="select-ward">
                                <option value="0" class="advance-options" style="min-width: 168px;">-- Chọn Phường/Xã --
                                </option>
                            </select>
                            <select class="advance-options select-street opt1" name="street_id" id="select-street">
                                <option value="0" class="advance-options" style="min-width: 168px;">-- Chọn Đường/Phố --
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row_ad clearfix">
                        <label class="col-sm-4" style="line-height: 28px;" for="Users_avatar">Ảnh đại diện</label>
                        <div class="row50">
                            <label class="label_change_avatar" for="choose_user_avatar"><i class="material-icons" style="font-size: 18px;">photo_camera</i>&nbsp Thay đổi ảnh đại diện</label>
                            <input type="file" style="display: none" hidden class="form-control-file" name="choose_user_avatar" id="choose_user_avatar">
                            <input type="text" style="display: none" hidden  class="form-control-file" name="avatar_data" id="avatar_data" value="">
                        </div>
                        <div style="float: left;">
                            <!-- Neu co thi show ra -->
                            <div class="ma1">
                                <img style="width: 80px;" id="MainContent__userPage_imgAvatar" class="avatar" src="{{$mySelf->avatar ? Helpers::file_path($mySelf->id, AVATAR_PATH, true).$mySelf->avatar.'?t='.time() : '/imgs/default-user-avatar.jpg'}}">
                            </div>
                        </div>
                    </div>

                    <div class="row_ad clearfix">
                        <label class="col-sm-4" style="line-height: 28px;" for="Users_company">Tên công ty: </label>				<div class="row50">
                            <input size="38" maxlength="30" class="form-control" name="company" id="Users_company" type="text" value="{{old('company') ?? $mySelf->company}}">
                        </div>
                    </div>

                    <div class="row_ad clearfix">
                        <label class="col-sm-4 required" style="line-height: 28px;" for="Users_phone">Di động: <span class="required">*</span></label>
                        <div class="row50">
                            <input size="38" maxlength="30" class="form-control" name="phone" id="Users_phone" type="text" value="{{old('phone') ?? $mySelf->phone}}">
                            @if ($errors->has('phone'))
                                <span style="color: red;" id="errorFullName">{{ str_replace('phone', 'số điện thoại', $errors->first('phone')) }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row_ad clearfix">
                        <label class="col-sm-4" style="line-height: 28px;" for="Users_skype">Email:</label>				<div class="row50">
                            <input size="38" maxlength="30" class="form-control" disabled="disabled" id="Users_skype" value="{{$mySelf->email}}" type="text">									</div>
                    </div>
                    <div class="row_ad clearfix">
                        <label class="col-sm-4" style="line-height: 28px;" for="Users_skype">Mã số thuế:</label>				<div class="row50">
                            <input size="38" maxlength="30" class="form-control" name="tax_code" id="Users_skype" value="{{old('tax_code') ?? $mySelf->tax_code}}" type="text">									</div>
                    </div>
                    <div class="row_ad clearfix">
                        <label class="col-sm-4" style="line-height: 28px;" for="Users_skype">Skype:</label>				<div class="row50">
                            <input size="38" maxlength="30" class="form-control" name="skype" value="{{old('skype') ?? $mySelf->skype}}" id="Users_skype" type="text">									</div>
                    </div>
                    <div class="row_ad clearfix">
                        <label class="col-sm-4" style="line-height: 28px;" for="Users_skype">Zalo:</label>				<div class="row50">
                            <input size="38" maxlength="30" class="form-control" name="zalo" value="{{old('zalo') ?? $mySelf->zalo}}"  id="Users_skype" type="text">									</div>
                    </div>
                    <div class="row_ad clearfix">
                        <label class="col-sm-4" style="line-height: 28px;" for="Users_skype">Viber:</label>				<div class="row50">
                            <input size="38" maxlength="30" class="form-control" name="viber" value="{{old('viber') ?? $mySelf->viber}}" id="Users_skype" type="text">									</div>
                    </div>
                    <div class="row_ad clearfix">
                        <label>&nbsp;</label>
                        <div class="row50">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button style="margin-right:-25px" type="submit" class="bt_sb">Lưu lại <span class="glyphicon glyphicon-floppy-disk"></span></button>
                        </div>
                    </div>

                </form>		</div>
        </div>
    </div>
@endsection
@section('footerElement')
    <div id="uploadimageModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cắt sửa ảnh</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10 text-center">
                            <div id="image_demo" style="width:470px; margin-top:30px"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success crop_image">Cắt ảnh</button>
                    <button class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('contentJS')
    <script type="text/javascript" src="/js/croppie.js"></script>
    <script>
        $(document).ready(function(){
            $('#choose_user_avatar').on('change', function(){
                $('#image_demo').html('');
                $('.modal-dialog').css("max-width", "500px")
                $image_crop = $('#image_demo').croppie({
                    enableExif: true,
                    viewport: {
                        width:300,
                        height:300,
                        type:'circle' //square
                    },
                    boundary:{
                        width:300,
                        height:300
                    },
                    enableOrientation: true,
                    mouseWheelZoom: '',
                });
                var reader = new FileReader();
                reader.onload = function (event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#uploadimageModal').modal('show');
            });
            $('.crop_image').click(function(event){
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function (response) {
                    $('#uploadimageModal').modal('hide');
                    $('#avatar_data').val(response);
                    $('#MainContent__userPage_imgAvatar').attr("src", response);

                    $.ajax({
                        url: "/thong-tin-ca-nhan/update_avatar",
                        type: "POST",
                        dataType: "json",
                        data: {avatar: response},
                        beforeSend: function () {
                        },
                        success: function(data) {
                            successModal(data.message);
                        }
                    });
                })
            });
        });
        if(window.location.pathname == '/thong-tin-ca-nhan') {
            $('.manage_article').addClass('selected');
        }else{
            $('.white-background-new').find('.row-content').each(function( index ) {
                if($(this).find('a').attr('href') == window.location.pathname) {
                    $(this).find('a').addClass('selected');
                }
            });
        }

    </script>
    <script>
        <?php
        if(old('province_id') ?? $mySelf->province_id) {
        ?>
        $(document).ready(function() {
            document.getElementById('select-province').value = '<?php echo old('province_id') ?? $mySelf->province_id ?? '' ?>';
            getDistrict('<?php echo old('province_id') ?? $mySelf->province_id ?? '' ?>', '<?php echo old('district_id') ?? $mySelf->district_id ?? '' ?>', '<?php echo old('ward_id') ?? $mySelf->ward_id ?? '' ?>', '<?php echo old('street_id') ?? $mySelf->street_id ?? '' ?>');
            <?php
            if(old('district_id') ?? $mySelf->district_id ?? false) {
            ?>
            getWard(' <?php echo old('district_id') ?? $mySelf->district_id ?? '' ?>', ' <?php echo old('ward_id') ?? $mySelf->ward_id ?? '' ?>', '<?php echo old('street_id') ?? $mySelf->street_id ?? '' ?>');
            <?php
            }
            ?>
        });
        <?php
        }
        ?>
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
            $('#txtAddress').val('Đường ' + $('.select-street option:selected').text() + ', ' + $('.select-ward option:selected').text() + ', ' + $('.select-district option:selected').text() + ', ' + $('.select-province option:selected').text());
        });

    </script>
@endsection