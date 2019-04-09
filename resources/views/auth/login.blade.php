@extends('layouts.app')
@section('contentCSS')
@endsection
@section('content')
    <div class="main-l">
        <div class="box1-left">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span>ĐĂNG NHẬP VÀO Nhà đất Quận 12 Giá Rẻ        </div>
            <form id="LoginForm" action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="detail_R">
                    <div class="row_ad">
                        <label for="LoginForm_email" class="required">Email: </label>
                        <div class="row50 success">
                            <input class="ipt1" size="40" name="email" value="{{ old('email') }}" id="LoginForm_email" type="text">

                        </div>
                        @if ($errors->has('email'))
                            <div style="padding-left: 135px;" class="errorMessage" id="LoginForm_email_em_">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="row_ad">
                        <label for="LoginForm_password" class="required">Mật khẩu: </label>
                        <div class="row50 success">
                            <input class="ipt1" size="40" name="password" value="{{ old('password') }}" id="LoginForm_password" type="password">
                        </div>
                        @if ($errors->has('password'))
                            <div style="padding-left: 135px;" class="errorMessage" id="LoginForm_password_em_">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="row_ad">
                        <div class="row_ad">
                            <label>&nbsp;</label>
                            <div class="row50">
                                <p><input id="chkSavePass" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}><span>Lưu tài khoản đăng nhập</span></p>
                                <input id="login" type="submit" class="bt_sb" value="Đăng nhập">
                                <input id="register" onclick="window.location.href='/register'" type="button" class="bt_sb" value="Đăng ký">
                            </div>
                        </div>
                        <label>&nbsp;</label>
                        <div class="row50">
                            <p><a href="{{ route('password.request') }}">Bạn quên mật khẩu?</a></p>
                            <div class="login-social">
                                <div class="login-facebook" ><div class="fa fa-facebook-square"></div><a href="/auth/facebook"> Đăng nhập qua Facebook</a><input type="hidden" id="hddFacebookToken" value=""></div><div class="login-google"><div class="fa fa-google-plus-square"></div><a href="/auth/google"> Đăng nhập qua Google</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="main-r">
        <div class="boxsearch-right box1-right">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span>
                LỢI ÍCH ĐĂNG KÝ THÀNH VIÊN
            </div>
            <div class="detail_R">
                <div class="mi_neny_dk clearfix">
                    <div class="info_neny_dk">
                        <div class="ten_neny_dk">Cập nhật thời gian thực</div>

                        <div class="text_neny_dk">Chúng tôi sẽ gửi email cho bạn các gói dịch vụ mới cũng như thông tin thị trường nhà đất mới nhất, tin tức của bạn</div>
                    </div>
                </div>

                <div class="mi_neny_dk clearfix">
                    <div class="info_neny_dk">
                        <div class="ten_neny_dk">Theo dõi ưa thích của bạn</div>

                        <div class="text_neny_dk">Chúng tôi sẽ gửi email cho bạn các gói dịch vụ mới cũng như thông tin thị trường nhà đất mới nhất, tin tức của bạn</div>
                    </div>
                </div>

                <div class="mi_neny_dk clearfix">
                    <div class="info_neny_dk">
                        <div class="ten_neny_dk">Tư vấn và hướng dẫn</div>

                        <div class="text_neny_dk">Chúng tôi sẽ gửi email cho bạn các gói dịch vụ mới cũng như thông tin thị trường nhà đất mới nhất, tin tức của bạn</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .login-social {
            margin: auto;
        }
        .login .login-social .login-facebook {
            float: left;
        }
        .login .login-social .login-facebook, .login .login-social .login-google {
            height: 38px;
            border: 1px solid #d7d7d7;
            width: 210px;
        }
        .login .login-social .login-facebook span, .login .login-social .login-facebook div {
            color: #055698;
        }
        .login .login-social .login-facebook div, .login .login-social .login-google div {
            width: 20px;
            height: 20px;
            margin: 9px;
            font-size: 22px;
            float: left;
        }
        .login .login-social .login-google a, .login .login-social .login-google div {
            color: #EB4F38;
        }
        .login .login-social .login-google {
            float: right;
        }
        .login .login-social .login-facebook a, .login .login-social .login-google a {
            font-size: 13px;
        }
        .login .login-social .login-facebook a, .login .login-social .login-facebook div {
            color: #055698;
        }
        .login .login-social .login-facebook a, .login .login-social .login-google a {
            line-height: 38px;
            float: left;
            cursor: pointer;
            display: block;
            width: 150px;
            height: 38px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
@endsection
@section('contentJS')

@endsection

