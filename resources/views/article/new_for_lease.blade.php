<?php
use App\Library\Helpers;
$mySelf = Auth::user();
global $province;
global $projectWard12;
?>
@section('contentCSS')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@extends('layouts.app')
@section('content')
    @include('cache.province')
    @include('cache.project_ward_12')
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
                                    {{--@foreach($province as $item)--}}
                                        {{--<option value="{{$item['id']}}">{{$item['_name']}}</option>--}}
                                    {{--@endforeach--}}
                                    <option selected value="1">Tp.Hồ Chí Minh</option>
                                </select>
                                @if ($errors->has('province_id'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('province id', 'Tỉnh/Thành phố', $errors->first('province_id')) }}</p></div>
                                @endif
                            </div>
                            <div class="row25"><label>Quận/Huyện (<span class="camcam">*</span>):</label></div>
                            <div class="row25">
                                {{--<select name="district_id" class="ipt1 select-district">--}}
                                    {{--<option value="0" class="advance-options" style="min-width: 168px;">-- Chọn Quận/Huyện --</option>--}}
                                {{--</select>--}}
                                <select name="district_id" class="ipt1 select-district">
                                    <option selected value="13" class="advance-options">Quận 12</option>
                                </select>
                                @if ($errors->has('district_id'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('district id', 'Quận/Huyện', $errors->first('district_id')) }}</p></div>
                                @endif
                            </div>
                        </div>

                        <div class="row_ad clearfix">
                            <div class="row25"><label>Phường/Xã:</label></div>
                            <div class="row25">
                                {{--<select class="ipt1 select-ward" name="ward_id" id="select-ward">--}}
                                    {{--<option value="0" class="advance-options" style="min-width: 168px;">-- Chọn Đường/Phố ----}}
                                    {{--</option>--}}
                                {{--</select>--}}
                                <select class="ipt1 select-ward" name="ward_id" id="select-ward"><option value="">--Chọn Phường/Xã--</option><option value="170">An Phú Đông</option><option value="171">Đông Hưng Thuận</option><option value="172">Hiệp Thành</option><option value="173">Tân Chánh Hiệp</option><option value="174">Tân Hưng Thuận</option><option value="175">Tân Thới Hiệp</option><option value="176">Tân Thới Nhất</option><option value="177">Thạnh Lộc</option><option value="178">Thạnh Xuân</option><option value="179">Thới An</option><option value="180">Trung Mỹ Tây</option></select>
                                @if ($errors->has('street_id'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('ward id', 'Đường/Phố', $errors->first('street_id')) }}</p></div>
                                @endif
                            </div>
                            <div class="row25"><label>Đường/Phố:</label></div>
                            <div class="row25">
                                <select class="ipt1 select-street" name="street_id" id="select-street">
                                    {{--<option value="0" class="advance-options" style="min-width: 168px;">-- Chọn Đường/Phố --</option>--}}
                                    <option value="">--Chọn Đường/Phố--</option><option value="3458">1</option><option value="3459">10</option><option value="3460">12</option><option value="3461">122</option><option value="3462">13</option><option value="3463">14</option><option value="3464">15</option><option value="3465">16</option><option value="3466">17</option><option value="3467">18</option><option value="3468">2</option><option value="3469">21</option><option value="3470">22</option><option value="3471">25B</option><option value="3472">28</option><option value="3473">3</option><option value="3474">30</option><option value="3475">32</option><option value="3476">33</option><option value="3477">35</option><option value="3478">36</option><option value="3479">38</option><option value="3480">39</option><option value="3481">40</option><option value="3482">43</option><option value="3483">45</option><option value="3484">47</option><option value="3485">48</option><option value="3486">5</option><option value="3487">50</option><option value="3488">51</option><option value="3489">595</option><option value="3490">6</option><option value="3491">66</option><option value="3492">7</option><option value="3493">8</option><option value="3494">9</option><option value="3495">9A</option><option value="3496">A2</option><option value="3497">A3</option><option value="3498">An Lộc</option><option value="3499">An Phú Đông</option><option value="3500">An Phú Đông 1</option><option value="3501">An Phú Đông 10</option><option value="3502">An Phú Đông 11</option><option value="3503">An Phú Đông 12</option><option value="3504">An Phú Đông 13</option><option value="3505">An Phú Đông 15</option><option value="3506">An Phú Đông 17</option><option value="3507">An Phú Đông 2</option><option value="3508">An Phú Đông 21</option><option value="3509">An Phú Đông 22</option><option value="3510">An Phú Đông 25</option><option value="3511">An Phú Đông 26</option><option value="3512">An Phú Đông 27</option><option value="3513">An Phú Đông 29</option><option value="3514">An Phú Đông 3</option><option value="3515">An Phú Đông 31</option><option value="3516">An Phú Đông 35</option><option value="3517">An Phú Đông 8</option><option value="3518">An Phú Đông 9</option><option value="3519">Ba Phụ</option><option value="3520">Bà Triệu</option><option value="3521">Bùi Công Trừng</option><option value="3522">Bùi Văn Ngữ</option><option value="3523">Bùi Văn Thủ</option><option value="3524">C1</option><option value="3525">C3</option><option value="3526">C4</option><option value="3527">Cầu Ba Phụ</option><option value="3528">Cầu Chợ</option><option value="3529">Cây Sao</option><option value="3530">Chiến Khu</option><option value="3531">Cù Lao Thượng</option><option value="3532">D1</option><option value="3533">D15</option><option value="3534">D2</option><option value="3535">D3</option><option value="3536">D6</option><option value="3537">DCT1</option><option value="3538">DCT5</option><option value="3539">DCT9</option><option value="3540">DD10</option><option value="3541">DD11</option><option value="3542">DD12</option><option value="3543">DD2</option><option value="3544">DD4</option><option value="3545">DD4-1</option><option value="3546">DD4-2</option><option value="3547">DD5</option><option value="3548">DD6</option><option value="3549">DD6-1</option><option value="3550">DD7</option><option value="3551">DD7-1</option><option value="3552">DD9</option><option value="3553">Đình Giao Khẩu</option><option value="3554">Đình Thạnh Phú</option><option value="3555">DN 7-1</option><option value="3556">DN10</option><option value="3557">DN11</option><option value="3558">DN12</option><option value="3559">DN13</option><option value="3560">DN4</option><option value="3561">DN5</option><option value="3562">DN6</option><option value="3563">DN7</option><option value="3564">DN8</option><option value="3565">DN9</option><option value="3566">Đỗ Hành</option><option value="3567">Đỗ Quyên</option><option value="3568">Đông Bắc</option><option value="3569">Đông Hưng Thuận</option><option value="3570">Đông Hưng Thuận 10</option><option value="3571">Đông Hưng Thuận 10B</option><option value="3572">Đông Hưng Thuận 11</option><option value="3573">Đông Hưng Thuận 12</option><option value="3574">Đông Hưng Thuận 13</option><option value="3575">Đông Hưng Thuận 14</option><option value="3576">Đông Hưng Thuận 14B</option><option value="3577">Đông Hưng Thuận 15</option><option value="3578">Đông Hưng Thuận 16</option><option value="3579">Đông Hưng Thuận 17</option><option value="3580">Đông Hưng Thuận 18</option><option value="3581">Đông Hưng Thuận 19</option><option value="3582">Đông Hưng Thuận 2</option><option value="3583">Đông Hưng Thuận 21</option><option value="3584">Đông Hưng Thuận 22</option><option value="3585">Đông Hưng Thuận 23</option><option value="3586">Đông Hưng Thuận 26</option><option value="3587">Đông Hưng Thuận 27</option><option value="3588">Đông Hưng Thuận 29</option><option value="3589">Đông Hưng Thuận 3</option><option value="3590">Đông Hưng Thuận 30</option><option value="3591">Đông Hưng Thuận 31</option><option value="3592">Đông Hưng Thuận 32</option><option value="3593">Đông Hưng Thuận 33</option><option value="3594">Đông Hưng Thuận 36</option><option value="3595">Đông Hưng Thuận 39</option><option value="3596">Đông Hưng Thuận 40</option><option value="3597">Đông Hưng Thuận 41</option><option value="3598">Đông Hưng Thuận 42</option><option value="3599">Đông Hưng Thuận 45</option><option value="3600">Đông Hưng Thuận 47</option><option value="3601">Đông Hưng Thuận 5</option><option value="3602">Đông Hưng Thuận 6</option><option value="3603">Đông Hưng Thuận 7</option><option value="3604">Đông Hưng Thuận 8</option><option value="3605">Đông Hưng Thuận 9</option><option value="3606">Dòng Sông Xanh</option><option value="3607">Đồng Tâm</option><option value="3608">Đồng Tiến</option><option value="3609">ĐT 741</option><option value="3610">ĐT 747</option><option value="3611">DTC 11</option><option value="3612">DTC2</option><option value="3613">Dương Thị Giang</option><option value="3614">Dương Thị Mười</option><option value="3615">Giang Cự Vọng</option><option value="3616">Gò Sao</option><option value="3617">Hà Chương</option><option value="3618">Hà Đặc</option><option value="3619">Hà Huy Giáp</option><option value="3620">Hà Huy Giáp 2</option><option value="3621">Hà Huy Tập</option><option value="3622">Hà Thị Khéo</option><option value="3623">Hà Thị Khiêm</option><option value="3624">Hàn Giang</option><option value="3625">Hậu Lân</option><option value="3626">Hiệp Thành</option><option value="3627">Hiệp Thành 1</option><option value="3628">Hiệp Thành 10</option><option value="3629">Hiệp Thành 11</option><option value="3630">Hiệp Thành 12</option><option value="3631">Hiệp Thành 13</option><option value="3632">Hiệp Thành 14</option><option value="3633">Hiệp Thành 16</option><option value="3634">Hiệp Thành 17</option><option value="3635">Hiệp Thành 18</option><option value="3636">Hiệp Thành 19</option><option value="3637">Hiệp Thành 2</option><option value="3638">Hiệp Thành 21</option><option value="3639">Hiệp Thành 22</option><option value="3640">Hiệp Thành 23</option><option value="3641">Hiệp Thành 24</option><option value="3642">Hiệp Thành 25</option><option value="3643">Hiệp Thành 26</option><option value="3644">Hiệp Thành 27</option><option value="3645">Hiệp Thành 3</option><option value="3646">Hiệp Thành 31</option><option value="3647">Hiệp Thành 33</option><option value="3648">Hiệp Thành 35</option><option value="3649">Hiệp Thành 37</option><option value="3650">Hiệp Thành 39</option><option value="3651">Hiệp Thành 4</option><option value="3652">Hiệp Thành 42</option><option value="3653">Hiệp Thành 43</option><option value="3654">Hiệp Thành 44</option><option value="3655">Hiệp Thành 45</option><option value="3656">Hiệp Thành 48</option><option value="3657">Hiệp Thành 49</option><option value="3658">Hiệp Thành 5</option><option value="3659">Hiệp Thành 6</option><option value="3660">Hiệp Thành 7</option><option value="3661">Hiệp Thành 8</option><option value="3662">Hiệp Thành 9</option><option value="3663">Hồ Biểu Chánh</option><option value="3664">Hồ Bơi</option><option value="3665">Hòa An 8</option><option value="3666">Họa Mi</option><option value="3667">Hoàng Tăng Bí</option><option value="3668">Hưng Thuận 44</option><option value="3669">Hương Lộ</option><option value="3670">Hương lộ  80</option><option value="3671">Hương lộ 17A</option><option value="3672">Hương Lộ 18B</option><option value="3673">Hương Lộ 80B</option><option value="3674">Hương lộ 84B</option><option value="3675">Huỳnh Thị Hai</option><option value="3676">Kênh Tham Lương</option><option value="3677">Khởi Nghĩa Bắc Sơn</option><option value="3678">Lâm Thị Hố</option><option value="3679">Lê Đức Thọ</option><option value="3680">Lê Thị Nho</option><option value="3681">Lê Thị Riêng</option><option value="3682">Lê Văn Khương</option><option value="3683">Lộc Hòa</option><option value="3684">Lý Ông Trọng</option><option value="3685">Mương Khai</option><option value="3686">Nguyễn An Ninh</option><option value="3687">Nguyễn Ảnh Thủ</option><option value="3688">Nguyễn Hữu Cầu</option><option value="3689">Nguyễn Huy Chương</option><option value="3690">Nguyễn Khanh</option><option value="3691">Nguyễn Oanh</option><option value="3692">Nguyễn Thành Vĩnh</option><option value="3693">Nguyễn Thị Búp</option><option value="3694">Nguyễn Thị Căn</option><option value="3695">Nguyễn Thị Đặng</option><option value="3696">Nguyễn Thị Kiêu</option><option value="3697">Nguyễn Thị Kiểu</option><option value="3698">Nguyễn Thị Sáng</option><option value="3699">Nguyễn Thị Sáu</option><option value="3700">Nguyễn Thị Thảnh</option><option value="3701">Nguyễn Thị Thơi</option><option value="3702">Nguyễn Thị Tràng</option><option value="3703">Nguyễn Văn Quá</option><option value="3704">Nguyễn Văn Thủ</option><option value="3705">Núi Một</option><option value="3706">Phần Lăng 8</option><option value="3707">Phan Văn Hớn</option><option value="3708">Phú Trung</option><option value="3709">Quán Tre</option><option value="3710">Quang Trung</option><option value="3711">Quốc Lộ 13</option><option value="3712">Quốc lộ 1A</option><option value="3713">Quốc Lộ 22</option><option value="3714">Quốc lộ 80</option><option value="3715">Rạch Giao Khẩu</option><option value="3716">Rạch Ông Học</option><option value="3717">Rạch Thầy Tư</option><option value="3718">Số 10</option><option value="3719">Số 12</option><option value="3720">Số 13</option><option value="3721">Số 2</option><option value="3722">Số 21</option><option value="3723">Số 22</option><option value="3724">Số 23</option><option value="3725">Số 27</option><option value="3726">Số 29</option><option value="3727">Số 2A</option><option value="3728">Số 3</option><option value="3729">Số 37</option><option value="3730">Số 41B</option><option value="3731">Số 5</option><option value="3732">Số 52</option><option value="3733">Số 7</option><option value="3734">Số 8</option><option value="3735">Số 8A</option><option value="3736">Số 9</option><option value="3737">Sơn Ca</option><option value="3738">Sơn Ca 8</option><option value="3739">Sơn Cang</option><option value="3740">Sơn Hưng</option><option value="3741">Song Hành</option><option value="3742">T15</option><option value="3743">Tân Chánh Hiệp</option><option value="3744">Tân Chánh Hiệp 10</option><option value="3745">Tân Chánh Hiệp 12</option><option value="3746">Tân Chánh Hiệp 13</option><option value="3747">Tân Chánh Hiệp 15</option><option value="3748">Tân Chánh Hiệp 16</option><option value="3749">Tân Chánh Hiệp 17</option><option value="3750">Tân Chánh Hiệp 18</option><option value="3751">Tân Chánh Hiệp 2</option><option value="3752">Tân Chánh Hiệp 20</option><option value="3753">Tân Chánh Hiệp 21</option><option value="3754">Tân Chánh Hiệp 24</option><option value="3755">Tân Chánh Hiệp 25</option><option value="3756">Tân Chánh Hiệp 26</option><option value="3757">Tân Chánh Hiệp 3</option><option value="3758">Tân Chánh Hiệp 32</option><option value="3759">Tân Chánh Hiệp 33</option><option value="3760">Tân Chánh Hiệp 34</option><option value="3761">Tân Chánh Hiệp 35</option><option value="3762">Tân Chánh Hiệp 36</option><option value="3763">Tân Chánh Hiệp 4</option><option value="3764">Tân Chánh Hiệp 5</option><option value="3765">Tân Chánh Hiệp 7</option><option value="3766">Tân Chánh Hiệp 8</option><option value="3767">Tân Hưng Thuận</option><option value="3768">Tân Hưng Thuận 10</option><option value="3769">Tân Hưng Thuận 2</option><option value="3770">Tân Hưng Thuận 6</option><option value="3771">Tân Thới Hiệp</option><option value="3772">Tân Thới Hiệp 1</option><option value="3773">Tân Thới Hiệp 10</option><option value="3774">Tân Thới Hiệp 12</option><option value="3775">Tân Thới Hiệp 13</option><option value="3776">Tân Thới Hiệp 14</option><option value="3777">Tân Thới Hiệp 14B</option><option value="3778">Tân Thới Hiệp 15</option><option value="3779">Tân Thới Hiệp 16</option><option value="3780">Tân Thới Hiệp 17</option><option value="3781">Tân Thới Hiệp 18</option><option value="3782">Tân Thới Hiệp 19</option><option value="3783">Tân Thới Hiệp 2</option><option value="3784">Tân Thới Hiệp 20</option><option value="3785">Tân Thới Hiệp 21</option><option value="3786">Tân Thới Hiệp 22</option><option value="3787">Tân Thới Hiệp 25</option><option value="3788">Tân Thới Hiệp 27</option><option value="3789">Tân Thới Hiệp 29</option><option value="3790">Tân Thới Hiệp 37</option><option value="3791">Tân Thới Hiệp 5</option><option value="3792">Tân Thới Hiệp 6</option><option value="3793">Tân Thới Hiệp 7</option><option value="3794">Tân Thới Hiệp 8</option><option value="3795">Tân Thới Hiệp 9</option><option value="3796">Tân Thới Nhất</option><option value="3797">Tân Thới Nhất 05</option><option value="3798">Tân Thới Nhất 1</option><option value="3799">Tân Thới Nhất 10</option><option value="3800">Tân Thới Nhất 11</option><option value="3801">Tân Thới Nhất 12</option><option value="3802">Tân Thới Nhất 13</option><option value="3803">Tân Thới Nhất 14</option><option value="3804">Tân Thới Nhất 15</option><option value="3805">Tân Thới Nhất 17</option><option value="3806">Tân Thới Nhất 18</option><option value="3807">Tân Thới Nhất 1B</option><option value="3808">Tân Thới Nhất 2</option><option value="3809">Tân Thới Nhất 20</option><option value="3810">Tân Thới Nhất 21</option><option value="3811">Tân Thới Nhất 22</option><option value="3812">Tân Thới Nhất 25</option><option value="3813">Tân Thới Nhất 3</option><option value="3814">Tân Thới Nhất 4</option><option value="3815">Tân Thới Nhất 5</option><option value="3816">Tân Thới Nhất 6</option><option value="3817">Tân Thới Nhất 7</option><option value="3818">Tân Thới Nhất 8</option><option value="3819">Tân Thới Nhất 9</option><option value="3820">Tân Tiến</option><option value="3821">Thạch Xuân</option><option value="3822">Thạnh Lộc</option><option value="3823">Thạnh Lộc 12</option><option value="3824">Thạnh Lộc 13</option><option value="3825">Thạnh Lộc 14</option><option value="3826">Thạnh Lộc 15</option><option value="3827">Thạnh Lộc 16</option><option value="3828">Thạnh Lộc 17</option><option value="3829">Thạnh Lộc 18</option><option value="3830">Thạnh Lộc 19</option><option value="3831">Thạnh Lộc 2</option><option value="3832">Thạnh Lộc 20</option><option value="3833">Thạnh Lộc 21</option><option value="3834">Thạnh Lộc 22</option><option value="3835">Thạnh Lộc 23</option><option value="3836">Thạnh Lộc 24</option><option value="3837">Thạnh Lộc 25</option><option value="3838">Thạnh Lộc 26</option><option value="3839">Thạnh Lộc 27</option><option value="3840">Thạnh Lộc 28</option><option value="3841">Thạnh Lộc 29</option><option value="3842">Thạnh Lộc 3</option><option value="3843">Thạnh Lộc 30</option><option value="3844">Thạnh Lộc 31</option><option value="3845">Thạnh Lộc 33</option><option value="3846">Thạnh Lộc 35</option><option value="3847">Thạnh Lộc 37</option><option value="3848">Thạnh Lộc 38</option><option value="3849">Thạnh Lộc 39</option><option value="3850">Thạnh Lộc 4</option><option value="3851">Thạnh Lộc 40</option><option value="3852">Thạnh Lộc 41</option><option value="3853">Thạnh Lộc 42</option><option value="3854">Thạnh Lộc 43</option><option value="3855">Thạnh Lộc 44</option><option value="3856">Thạnh Lộc 45</option><option value="3857">Thạnh Lộc 47</option><option value="3858">Thạnh Lộc 48</option><option value="3859">Thạnh Lộc 49</option><option value="3860">Thạnh Lộc 5</option><option value="3861">Thạnh Lộc 50</option><option value="3862">Thạnh Lộc 51</option><option value="3863">Thạnh Lộc 52</option><option value="3864">Thạnh Lộc 53</option><option value="3865">Thạnh Lộc 54</option><option value="3866">Thạnh Lộc 55</option><option value="3867">Thạnh Lộc 56</option><option value="3868">Thạnh Lộc 57</option><option value="3869">Thạnh Lộc 59</option><option value="3870">Thạnh Lộc 6</option><option value="3871">Thạnh Lộc 7</option><option value="3872">Thạnh Lộc 8</option><option value="3873">Thanh Xuân</option><option value="3874">Thạnh Xuân</option><option value="3875">Thạnh Xuân 12</option><option value="3876">Thạnh Xuân 13</option><option value="3877">Thạnh Xuân 14</option><option value="3878">Thạnh Xuân 15</option><option value="3879">Thạnh Xuân 16</option><option value="3880">Thạnh Xuân 18</option><option value="3881">Thạnh Xuân 19</option><option value="3882">Thạnh Xuân 2</option><option value="3883">Thạnh Xuân 21</option><option value="3884">Thạnh Xuân 22</option><option value="3885">Thạnh Xuân 23</option><option value="3886">Thạnh Xuân 24</option><option value="3887">Thạnh Xuân 25</option><option value="3888">Thạnh Xuân 26</option><option value="3889">Thạnh Xuân 27</option><option value="3890">Thạnh Xuân 29</option><option value="3891">Thạnh Xuân 31</option><option value="3892">Thạnh Xuân 32</option><option value="3893">Thạnh Xuân 33</option><option value="3894">Thạnh Xuân 34</option><option value="3895">Thạnh Xuân 35</option><option value="3896">Thạnh Xuân 36</option><option value="3897">Thạnh Xuân 37</option><option value="3898">Thạnh Xuân 38</option><option value="3899">Thạnh Xuân 39</option><option value="3900">Thạnh Xuân 4</option><option value="3901">Thạnh Xuân 40</option><option value="3902">Thạnh Xuân 41</option><option value="3903">Thạnh Xuân 42</option><option value="3904">Thạnh Xuân 43</option><option value="3905">Thạnh Xuân 44</option><option value="3906">Thạnh Xuân 46</option><option value="3907">Thạnh Xuân 47</option><option value="3908">Thạnh Xuân 48</option><option value="3909">Thạnh Xuân 51</option><option value="3910">Thạnh Xuân 52</option><option value="3911">Thạnh Xuân 56</option><option value="3912">Thạnh Xuân 64</option><option value="3913">Thích Bửu Đăng</option><option value="3914">Thới An</option><option value="3915">Thới An 06</option><option value="3916">Thới An 07</option><option value="3917">Thới An 09</option><option value="3918">Thới An 10</option><option value="3919">Thới An 11</option><option value="3920">Thới An 12</option><option value="3921">Thới An 13</option><option value="3922">Thới An 15</option><option value="3923">Thới An 16</option><option value="3924">Thới An 17</option><option value="3925">Thới An 17A</option><option value="3926">Thới An 18</option><option value="3927">Thới An 18A</option><option value="3928">Thới An 19</option><option value="3929">Thới An 19A</option><option value="3930">Thới An 2</option><option value="3931">Thới An 20</option><option value="3932">Thới An 21</option><option value="3933">Thới An 22</option><option value="3934">Thới An 24</option><option value="3935">Thới An 28</option><option value="3936">Thới An 29</option><option value="3937">Thới An 3</option><option value="3938">Thới An 32</option><option value="3939">Thới An 35</option><option value="3940">Thới An 36</option><option value="3941">Thới An 4</option><option value="3942">Thới An 5</option><option value="3943">Thới An 8</option><option value="3944">Thới An 8A</option><option value="3945">Thới An 9</option><option value="3946">Thống Nhất</option><option value="3947">Tỉnh Lộ 13</option><option value="3948">Tỉnh Lộ 14</option><option value="3949">Tỉnh lộ 15</option><option value="3950">Tỉnh lộ 16</option><option value="3951">Tỉnh Lộ 18</option><option value="3952">Tỉnh Lộ 19</option><option value="3953">Tỉnh Lộ 21</option><option value="3954">Tỉnh Lộ 26</option><option value="3955">Tỉnh Lộ 27</option><option value="3956">Tỉnh Lộ 29</option><option value="3957">Tỉnh Lộ 30</option><option value="3958">Tỉnh Lộ 40</option><option value="3959">Tỉnh Lộ 41</option><option value="3960">Tỉnh lộ 43</option><option value="3961">Tỉnh lộ 9</option><option value="3962">TN02</option><option value="3963">Tô Ký</option><option value="3964">Tô Ngọc Vân</option><option value="3965">Trại Gà</option><option value="3966">Trần Quang Cơ</option><option value="3967">Trần Quang Đạo</option><option value="3968">Trần Thị Bảy</option><option value="3969">Trần Thị Có</option><option value="3970">Trần Thị Cờ</option><option value="3971">Trần Thị Do</option><option value="3972">Trần Thị Hè</option><option value="3973">Trần Thị Hòe</option><option value="3974">Trần Thị Nghè</option><option value="3975">Trích Sài</option><option value="3976">Trung Chánh</option><option value="3977">Trung Mỹ Tây</option><option value="3978">Trung Mỹ Tây 03</option><option value="3979">Trung Mỹ Tây 1</option><option value="3980">Trung Mỹ Tây 10A</option><option value="3981">Trung Mỹ Tây 12</option><option value="3982">Trung Mỹ Tây 13</option><option value="3983">Trung Mỹ Tây 13A</option><option value="3984">Trung Mỹ Tây 14A</option><option value="3985">Trung Mỹ Tây 16</option><option value="3986">Trung Mỹ Tây 17</option><option value="3987">Trung Mỹ Tây 18</option><option value="3988">Trung Mỹ Tây 19</option><option value="3989">Trung Mỹ Tây 2</option><option value="3990">Trung Mỹ Tây 23A</option><option value="3991">Trung Mỹ Tây 2A</option><option value="3992">Trung Mỹ Tây 3</option><option value="3993">Trung Mỹ Tây 4</option><option value="3994">Trung Mỹ Tây 5</option><option value="3995">Trung Mỹ Tây 6</option><option value="3996">Trung Mỹ Tây 6A</option><option value="3997">Trung Mỹ Tây 8</option><option value="3998">Trung Mỹ Tây 9</option><option value="3999">Trung Mỹ Tây 9A</option><option value="4000">Trường Chinh</option><option value="4001">Trương Thị Ngào</option><option value="4002">Trương Văn Đa</option><option value="4003">Võ Cây Dương</option><option value="4004">Võ Quảng</option><option value="4005">Võ Thị Liễu</option><option value="4006">Võ Thị Phải</option><option value="4007">Võ Thị Thừa</option><option value="4008">Vườn Lài</option><option value="4009">Xa La</option><option value="4010">Xa Lộ Đại Hàn</option><option value="4011">Xô Ngọc Oanh</option><option value="4012">Xuân Thới Sơn 12</option><option value="4013">Xuân Thới Sơn 8</option><option value="4014">Xuyên Á</option>
                                </select>
                                @if ($errors->has('street_id'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('ward id', 'Đường/Phố', $errors->first('street_id')) }}</p></div>
                                @endif
                            </div>
                        </div>

                        <div class="row_ad clearfix">
                            <div class="row25"><label>Tên dự án:</label></div>
                            <div class="row25">
                                <select class="ipt1 select-project" id="select-project" name="project">
                                    <option value="-1" class="advance-options">-- Chọn dự án quận 12 --</option>
                                    @foreach($projectWard12 as $item)
                                    <option value="{{$item['id']}}">{{$item['_name']}}</option>
                                    @endforeach
                                </select>
                                {{--<input size="47" maxlength="255" class="ipt1" name="project" value="{{old('project') ?? $article->project ?? ''}}" type="text">--}}
                                @if ($errors->has('project'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('project', 'dự án', $errors->first('project')) }}</p></div>
                                @endif
                            </div>
                            <div class="row25"><label>Diện tích:</label></div>
                            <div class="row25">
                                <input size="47" maxlength="255" type="text" class="ver_number ipt1 ver_number" name="area" value="{{old('area') ?? $article->area ?? ''}}"style="width: 88%;"><span> m²</span>
                                @if ($errors->has('area'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('area', 'diện tích', $errors->first('area')) }}</p></div>
                                @endif
                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Giá:</label></div>
                            <div class="row25">
                                <input name="price" type="text" id="price" value="{{old('price') ?? $article->price ?? ''}}" class="text-field ipt1 ver_number" numberonly="2" maxlength="6">
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
                                @endif
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
                                                        <input type="hidden" name="upload_images[]" value="{{$item}}">
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
                                <input name="facade" type="text" value="{{old('facade') ?? $article->facade ?? ''}}" id="txtWidth" maxlength="6" numberonly="2" class="text-field ipt1 ver_number">
                                @if ($errors->has('facade'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('facade', 'mặt tiền', $errors->first('facade')) }}</p></div>
                                @endif                                          </div>
                            <div class="row25"><label>Đường vào (m):</label></div>
                            <div class="row25">
                                <input name="land_width" value="{{old('land_width') ?? $article->land_width ?? ''}}" type="text" id="txtLandWidth" maxlength="6" numberonly="2" class="text-field ipt1 ver_number">
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
                                <input name="floor" type="text" id="txtFloorNumbers" value="{{old('floor') ?? $article->floor ?? ''}}" class="text-field ipt1 ver_number" maxlength="3" numberonly="1">
                                @if ($errors->has('floor'))
                                    <div class="errorMessage" style="display: block;">{{ str_replace('floor', 'số tầng', $errors->first('floor')) }}</div>
                                @endif
                            </div>
                            <div class="row25"><label>Số phòng ngủ:</label></div>
                            <div class="row25">
                                <input name="bed_room" type="text" id="txtRoomNumber" value="{{old('bed_room') ?? $article->bed_room ?? ''}}" class="text-field ipt1 ver_number" maxlength="3" numberonly="1">
                                @if ($errors->has('bed_room'))
                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('bed_room', 'số phòng ngủ', $errors->first('bed_room')) }}</p></div>
                                @endif
                            </div>
                        </div>
                        <div class="row_ad clearfix">
                            <div class="row25"><label>Số toilet:</label></div>
                            <div class="row25">
                                <input name="toilet" type="text" value="{{old('toilet') ?? $article->toilet ?? ''}}" id="txtToiletNumber" class="text-field ipt1 ver_number" maxlength="3" numberonly="1">
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
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                $('#_totalPrice').html(formatNumber(valPrice) + ' ' + $('#ddlPriceType').val());
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
                $('#_totalPrice').html(formatNumber(valPrice) + ' ' + $('#ddlPriceType').val());
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
        if(old('project') ?? $article->project ?? false) {
        ?>
        document.getElementById('select-project').value = '<?php echo old('project') ?? $article->project ?? false ?>';
        <?php
        }
        ?>
        function remove_exists_img(img) {
            let old = $('#remove_imgs').val();
            $('#remove_imgs').val((old ? (old + '|') : '') + img);
        }
        $('.select-province').change(function() {
            $('#txtAddress').val($('.select-province option:selected').text());
        });
        $('.select-district').change(function() {
            $('#txtAddress').val($('.select-district option:selected').text() + ', ' + $('.select-province option:selected').text());
        });
        $('.select-ward').change(function() {
            var ward = $('.select-ward option:selected').val() ? 'Phường ' + $('.select-ward option:selected').text() + ', ' : '';
            var street = $('.select-street option:selected').val() ?  ('Đường ' + $('.select-street option:selected').text() + ', ') : '';
            $('#txtAddress').val(street + ward + $('.select-district option:selected').text() + ', ' + $('.select-province option:selected').text());
        });
        $('.select-street').change(function() {
            var ward = $('.select-ward option:selected').val() ? 'Phường ' + $('.select-ward option:selected').text() + ', ' : '';
            var street = $('.select-street option:selected').val() ?  ('Đường ' + $('.select-street option:selected').text() + ', ') : '';
            $('#txtAddress').val(street + ward + $('.select-district option:selected').text() + ', ' + $('.select-province option:selected').text());
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
                    <input type="hidden" name="upload_images[]" value="{%=file.name%}" />
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



