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
                <span class="icon_star_xanh"></span>Thay đổi mật khẩu
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
                <form id="users-model-form" action="/thong-tin-ca-nhan/thay-doi-mat-khau" method="post">

                    <div class="row_ad">
                        <label class="col-sm-4 required" for="Users_currentPassword">Mật khẩu hiện tại <span class="required">*</span></label>				<div class="row50">
                            <input size="38" maxlength="30" class="form-control" name="current_password" id="Users_currentPassword" value="{{old('current_password')}}" type="password">
                            @if ($errors->has('current_password'))
                                <span style="color: red;" id="errorFullName">{{ str_replace('current password', 'mật khẩu hiện tại', $errors->first('current_password')) }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row_ad">
                        <label class="col-sm-4 required" for="Users_newPassword">Mật khẩu mới <span class="required">*</span></label>				<div class="row50">
                            <input size="38" maxlength="30" class="form-control" name="password" value="" id="Users_newPassword" type="password">
                            @if ($errors->has('password'))
                                <span style="color: red;" id="errorFullName">{{ str_replace('password', 'mật khẩu mới', $errors->first('password')) }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row_ad">
                        <label class="col-sm-4 required" for="Users_password_confirm">Nhập lại mật khẩu <span class="required">*</span></label>				<div class="row50">
                            <input size="38" maxlength="30" class="form-control" name="repassword" id="Users_password_confirm" type="password">
                            @if ($errors->has('repassword'))
                                <span style="color: red;" id="errorFullName">{{ str_replace('repassword', 'gõ lại mật khẩu', $errors->first('repassword')) }}</span>
                            @endif
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="row_ad">
                        <label>&nbsp;</label>
                        <div class="row50">
                            <button style="margin-right:-25px" type="submit" class="bt_sb">Thay đổi mật khẩu <span class="glyphicon glyphicon-floppy-disk"></span></button>
                        </div>
                    </div>

                </form>		</div>
        </div>
    </div>
@endsection
@section('contentJS')
@endsection