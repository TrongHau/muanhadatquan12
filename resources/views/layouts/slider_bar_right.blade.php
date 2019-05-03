<?php
use App\Library\Helpers;
global $province;
global $noibat;
global $projectWard12;
global $wardSlideBar;
?>
@include('cache.province')
@include('cache.tin_noi_bat')
@include('cache.project_ward_12')
@include('cache.ward_slide_bar')
<div class="main-r">
        <div class="boxsearch-right box1-right">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span>
                Tìm kiếm nhà đất
            </div>
            <div class="detail_R">
                <div class="row_timkiemR clearfix">
                    <label>Từ Khóa</label>
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
                            <option selected value="1">Tp.Hồ Chí Minh</option>
                            {{--@foreach($province as $item)--}}
                                {{--<option value="{{$item['id']}}">{{$item['_name']}}</option>--}}
                            {{--@endforeach--}}
                        </select>           </div>
                </div>
                <div class="row_timkiemR clearfix">
                    <label>Quận, huyện</label>
                    <div class="divipt">
                        <select class="advance-options select-district">
                            <option selected value="13" class="advance-options">Quận 12</option>
                            {{--<option value="-1" class="advance-options">-- Chọn Quận/Huyện --</option>--}}
                        </select>
                    </div>
                </div>

                <div class="row_timkiemR clearfix">
                    <label>Phường, xã</label>
                    <div class="divipt">
                        {{--<select class="advance-options select-ward">--}}
                            {{--<option value="-1" class="advance-options">-- Chọn Phường/Xã ----}}
                            {{--</option>--}}
                        {{--</select>--}}
                        <select class="advance-options select-ward" name="ward_id" id="select-ward"><option value="">--Chọn Phường/Xã--</option><option value="170">An Phú Đông</option><option value="171">Đông Hưng Thuận</option><option value="172">Hiệp Thành</option><option value="173">Tân Chánh Hiệp</option><option value="174">Tân Hưng Thuận</option><option value="175">Tân Thới Hiệp</option><option value="176">Tân Thới Nhất</option><option value="177">Thạnh Lộc</option><option value="178">Thạnh Xuân</option><option value="179">Thới An</option><option value="180">Trung Mỹ Tây</option></select>
                    </div>
                </div>

                <div class="row_timkiemR clearfix">
                    <label>Đường, phố</label>
                    <div class="divipt">
                        <select class="advance-options select-street">
                            <option value="">--Chọn Đường/Phố--</option><option value="3458">1</option><option value="3459">10</option><option value="3460">12</option><option value="3461">122</option><option value="3462">13</option><option value="3463">14</option><option value="3464">15</option><option value="3465">16</option><option value="3466">17</option><option value="3467">18</option><option value="3468">2</option><option value="3469">21</option><option value="3470">22</option><option value="3471">25B</option><option value="3472">28</option><option value="3473">3</option><option value="3474">30</option><option value="3475">32</option><option value="3476">33</option><option value="3477">35</option><option value="3478">36</option><option value="3479">38</option><option value="3480">39</option><option value="3481">40</option><option value="3482">43</option><option value="3483">45</option><option value="3484">47</option><option value="3485">48</option><option value="3486">5</option><option value="3487">50</option><option value="3488">51</option><option value="3489">595</option><option value="3490">6</option><option value="3491">66</option><option value="3492">7</option><option value="3493">8</option><option value="3494">9</option><option value="3495">9A</option><option value="3496">A2</option><option value="3497">A3</option><option value="3498">An Lộc</option><option value="3499">An Phú Đông</option><option value="3500">An Phú Đông 1</option><option value="3501">An Phú Đông 10</option><option value="3502">An Phú Đông 11</option><option value="3503">An Phú Đông 12</option><option value="3504">An Phú Đông 13</option><option value="3505">An Phú Đông 15</option><option value="3506">An Phú Đông 17</option><option value="3507">An Phú Đông 2</option><option value="3508">An Phú Đông 21</option><option value="3509">An Phú Đông 22</option><option value="3510">An Phú Đông 25</option><option value="3511">An Phú Đông 26</option><option value="3512">An Phú Đông 27</option><option value="3513">An Phú Đông 29</option><option value="3514">An Phú Đông 3</option><option value="3515">An Phú Đông 31</option><option value="3516">An Phú Đông 35</option><option value="3517">An Phú Đông 8</option><option value="3518">An Phú Đông 9</option><option value="3519">Ba Phụ</option><option value="3520">Bà Triệu</option><option value="3521">Bùi Công Trừng</option><option value="3522">Bùi Văn Ngữ</option><option value="3523">Bùi Văn Thủ</option><option value="3524">C1</option><option value="3525">C3</option><option value="3526">C4</option><option value="3527">Cầu Ba Phụ</option><option value="3528">Cầu Chợ</option><option value="3529">Cây Sao</option><option value="3530">Chiến Khu</option><option value="3531">Cù Lao Thượng</option><option value="3532">D1</option><option value="3533">D15</option><option value="3534">D2</option><option value="3535">D3</option><option value="3536">D6</option><option value="3537">DCT1</option><option value="3538">DCT5</option><option value="3539">DCT9</option><option value="3540">DD10</option><option value="3541">DD11</option><option value="3542">DD12</option><option value="3543">DD2</option><option value="3544">DD4</option><option value="3545">DD4-1</option><option value="3546">DD4-2</option><option value="3547">DD5</option><option value="3548">DD6</option><option value="3549">DD6-1</option><option value="3550">DD7</option><option value="3551">DD7-1</option><option value="3552">DD9</option><option value="3553">Đình Giao Khẩu</option><option value="3554">Đình Thạnh Phú</option><option value="3555">DN 7-1</option><option value="3556">DN10</option><option value="3557">DN11</option><option value="3558">DN12</option><option value="3559">DN13</option><option value="3560">DN4</option><option value="3561">DN5</option><option value="3562">DN6</option><option value="3563">DN7</option><option value="3564">DN8</option><option value="3565">DN9</option><option value="3566">Đỗ Hành</option><option value="3567">Đỗ Quyên</option><option value="3568">Đông Bắc</option><option value="3569">Đông Hưng Thuận</option><option value="3570">Đông Hưng Thuận 10</option><option value="3571">Đông Hưng Thuận 10B</option><option value="3572">Đông Hưng Thuận 11</option><option value="3573">Đông Hưng Thuận 12</option><option value="3574">Đông Hưng Thuận 13</option><option value="3575">Đông Hưng Thuận 14</option><option value="3576">Đông Hưng Thuận 14B</option><option value="3577">Đông Hưng Thuận 15</option><option value="3578">Đông Hưng Thuận 16</option><option value="3579">Đông Hưng Thuận 17</option><option value="3580">Đông Hưng Thuận 18</option><option value="3581">Đông Hưng Thuận 19</option><option value="3582">Đông Hưng Thuận 2</option><option value="3583">Đông Hưng Thuận 21</option><option value="3584">Đông Hưng Thuận 22</option><option value="3585">Đông Hưng Thuận 23</option><option value="3586">Đông Hưng Thuận 26</option><option value="3587">Đông Hưng Thuận 27</option><option value="3588">Đông Hưng Thuận 29</option><option value="3589">Đông Hưng Thuận 3</option><option value="3590">Đông Hưng Thuận 30</option><option value="3591">Đông Hưng Thuận 31</option><option value="3592">Đông Hưng Thuận 32</option><option value="3593">Đông Hưng Thuận 33</option><option value="3594">Đông Hưng Thuận 36</option><option value="3595">Đông Hưng Thuận 39</option><option value="3596">Đông Hưng Thuận 40</option><option value="3597">Đông Hưng Thuận 41</option><option value="3598">Đông Hưng Thuận 42</option><option value="3599">Đông Hưng Thuận 45</option><option value="3600">Đông Hưng Thuận 47</option><option value="3601">Đông Hưng Thuận 5</option><option value="3602">Đông Hưng Thuận 6</option><option value="3603">Đông Hưng Thuận 7</option><option value="3604">Đông Hưng Thuận 8</option><option value="3605">Đông Hưng Thuận 9</option><option value="3606">Dòng Sông Xanh</option><option value="3607">Đồng Tâm</option><option value="3608">Đồng Tiến</option><option value="3609">ĐT 741</option><option value="3610">ĐT 747</option><option value="3611">DTC 11</option><option value="3612">DTC2</option><option value="3613">Dương Thị Giang</option><option value="3614">Dương Thị Mười</option><option value="3615">Giang Cự Vọng</option><option value="3616">Gò Sao</option><option value="3617">Hà Chương</option><option value="3618">Hà Đặc</option><option value="3619">Hà Huy Giáp</option><option value="3620">Hà Huy Giáp 2</option><option value="3621">Hà Huy Tập</option><option value="3622">Hà Thị Khéo</option><option value="3623">Hà Thị Khiêm</option><option value="3624">Hàn Giang</option><option value="3625">Hậu Lân</option><option value="3626">Hiệp Thành</option><option value="3627">Hiệp Thành 1</option><option value="3628">Hiệp Thành 10</option><option value="3629">Hiệp Thành 11</option><option value="3630">Hiệp Thành 12</option><option value="3631">Hiệp Thành 13</option><option value="3632">Hiệp Thành 14</option><option value="3633">Hiệp Thành 16</option><option value="3634">Hiệp Thành 17</option><option value="3635">Hiệp Thành 18</option><option value="3636">Hiệp Thành 19</option><option value="3637">Hiệp Thành 2</option><option value="3638">Hiệp Thành 21</option><option value="3639">Hiệp Thành 22</option><option value="3640">Hiệp Thành 23</option><option value="3641">Hiệp Thành 24</option><option value="3642">Hiệp Thành 25</option><option value="3643">Hiệp Thành 26</option><option value="3644">Hiệp Thành 27</option><option value="3645">Hiệp Thành 3</option><option value="3646">Hiệp Thành 31</option><option value="3647">Hiệp Thành 33</option><option value="3648">Hiệp Thành 35</option><option value="3649">Hiệp Thành 37</option><option value="3650">Hiệp Thành 39</option><option value="3651">Hiệp Thành 4</option><option value="3652">Hiệp Thành 42</option><option value="3653">Hiệp Thành 43</option><option value="3654">Hiệp Thành 44</option><option value="3655">Hiệp Thành 45</option><option value="3656">Hiệp Thành 48</option><option value="3657">Hiệp Thành 49</option><option value="3658">Hiệp Thành 5</option><option value="3659">Hiệp Thành 6</option><option value="3660">Hiệp Thành 7</option><option value="3661">Hiệp Thành 8</option><option value="3662">Hiệp Thành 9</option><option value="3663">Hồ Biểu Chánh</option><option value="3664">Hồ Bơi</option><option value="3665">Hòa An 8</option><option value="3666">Họa Mi</option><option value="3667">Hoàng Tăng Bí</option><option value="3668">Hưng Thuận 44</option><option value="3669">Hương Lộ</option><option value="3670">Hương lộ  80</option><option value="3671">Hương lộ 17A</option><option value="3672">Hương Lộ 18B</option><option value="3673">Hương Lộ 80B</option><option value="3674">Hương lộ 84B</option><option value="3675">Huỳnh Thị Hai</option><option value="3676">Kênh Tham Lương</option><option value="3677">Khởi Nghĩa Bắc Sơn</option><option value="3678">Lâm Thị Hố</option><option value="3679">Lê Đức Thọ</option><option value="3680">Lê Thị Nho</option><option value="3681">Lê Thị Riêng</option><option value="3682">Lê Văn Khương</option><option value="3683">Lộc Hòa</option><option value="3684">Lý Ông Trọng</option><option value="3685">Mương Khai</option><option value="3686">Nguyễn An Ninh</option><option value="3687">Nguyễn Ảnh Thủ</option><option value="3688">Nguyễn Hữu Cầu</option><option value="3689">Nguyễn Huy Chương</option><option value="3690">Nguyễn Khanh</option><option value="3691">Nguyễn Oanh</option><option value="3692">Nguyễn Thành Vĩnh</option><option value="3693">Nguyễn Thị Búp</option><option value="3694">Nguyễn Thị Căn</option><option value="3695">Nguyễn Thị Đặng</option><option value="3696">Nguyễn Thị Kiêu</option><option value="3697">Nguyễn Thị Kiểu</option><option value="3698">Nguyễn Thị Sáng</option><option value="3699">Nguyễn Thị Sáu</option><option value="3700">Nguyễn Thị Thảnh</option><option value="3701">Nguyễn Thị Thơi</option><option value="3702">Nguyễn Thị Tràng</option><option value="3703">Nguyễn Văn Quá</option><option value="3704">Nguyễn Văn Thủ</option><option value="3705">Núi Một</option><option value="3706">Phần Lăng 8</option><option value="3707">Phan Văn Hớn</option><option value="3708">Phú Trung</option><option value="3709">Quán Tre</option><option value="3710">Quang Trung</option><option value="3711">Quốc Lộ 13</option><option value="3712">Quốc lộ 1A</option><option value="3713">Quốc Lộ 22</option><option value="3714">Quốc lộ 80</option><option value="3715">Rạch Giao Khẩu</option><option value="3716">Rạch Ông Học</option><option value="3717">Rạch Thầy Tư</option><option value="3718">Số 10</option><option value="3719">Số 12</option><option value="3720">Số 13</option><option value="3721">Số 2</option><option value="3722">Số 21</option><option value="3723">Số 22</option><option value="3724">Số 23</option><option value="3725">Số 27</option><option value="3726">Số 29</option><option value="3727">Số 2A</option><option value="3728">Số 3</option><option value="3729">Số 37</option><option value="3730">Số 41B</option><option value="3731">Số 5</option><option value="3732">Số 52</option><option value="3733">Số 7</option><option value="3734">Số 8</option><option value="3735">Số 8A</option><option value="3736">Số 9</option><option value="3737">Sơn Ca</option><option value="3738">Sơn Ca 8</option><option value="3739">Sơn Cang</option><option value="3740">Sơn Hưng</option><option value="3741">Song Hành</option><option value="3742">T15</option><option value="3743">Tân Chánh Hiệp</option><option value="3744">Tân Chánh Hiệp 10</option><option value="3745">Tân Chánh Hiệp 12</option><option value="3746">Tân Chánh Hiệp 13</option><option value="3747">Tân Chánh Hiệp 15</option><option value="3748">Tân Chánh Hiệp 16</option><option value="3749">Tân Chánh Hiệp 17</option><option value="3750">Tân Chánh Hiệp 18</option><option value="3751">Tân Chánh Hiệp 2</option><option value="3752">Tân Chánh Hiệp 20</option><option value="3753">Tân Chánh Hiệp 21</option><option value="3754">Tân Chánh Hiệp 24</option><option value="3755">Tân Chánh Hiệp 25</option><option value="3756">Tân Chánh Hiệp 26</option><option value="3757">Tân Chánh Hiệp 3</option><option value="3758">Tân Chánh Hiệp 32</option><option value="3759">Tân Chánh Hiệp 33</option><option value="3760">Tân Chánh Hiệp 34</option><option value="3761">Tân Chánh Hiệp 35</option><option value="3762">Tân Chánh Hiệp 36</option><option value="3763">Tân Chánh Hiệp 4</option><option value="3764">Tân Chánh Hiệp 5</option><option value="3765">Tân Chánh Hiệp 7</option><option value="3766">Tân Chánh Hiệp 8</option><option value="3767">Tân Hưng Thuận</option><option value="3768">Tân Hưng Thuận 10</option><option value="3769">Tân Hưng Thuận 2</option><option value="3770">Tân Hưng Thuận 6</option><option value="3771">Tân Thới Hiệp</option><option value="3772">Tân Thới Hiệp 1</option><option value="3773">Tân Thới Hiệp 10</option><option value="3774">Tân Thới Hiệp 12</option><option value="3775">Tân Thới Hiệp 13</option><option value="3776">Tân Thới Hiệp 14</option><option value="3777">Tân Thới Hiệp 14B</option><option value="3778">Tân Thới Hiệp 15</option><option value="3779">Tân Thới Hiệp 16</option><option value="3780">Tân Thới Hiệp 17</option><option value="3781">Tân Thới Hiệp 18</option><option value="3782">Tân Thới Hiệp 19</option><option value="3783">Tân Thới Hiệp 2</option><option value="3784">Tân Thới Hiệp 20</option><option value="3785">Tân Thới Hiệp 21</option><option value="3786">Tân Thới Hiệp 22</option><option value="3787">Tân Thới Hiệp 25</option><option value="3788">Tân Thới Hiệp 27</option><option value="3789">Tân Thới Hiệp 29</option><option value="3790">Tân Thới Hiệp 37</option><option value="3791">Tân Thới Hiệp 5</option><option value="3792">Tân Thới Hiệp 6</option><option value="3793">Tân Thới Hiệp 7</option><option value="3794">Tân Thới Hiệp 8</option><option value="3795">Tân Thới Hiệp 9</option><option value="3796">Tân Thới Nhất</option><option value="3797">Tân Thới Nhất 05</option><option value="3798">Tân Thới Nhất 1</option><option value="3799">Tân Thới Nhất 10</option><option value="3800">Tân Thới Nhất 11</option><option value="3801">Tân Thới Nhất 12</option><option value="3802">Tân Thới Nhất 13</option><option value="3803">Tân Thới Nhất 14</option><option value="3804">Tân Thới Nhất 15</option><option value="3805">Tân Thới Nhất 17</option><option value="3806">Tân Thới Nhất 18</option><option value="3807">Tân Thới Nhất 1B</option><option value="3808">Tân Thới Nhất 2</option><option value="3809">Tân Thới Nhất 20</option><option value="3810">Tân Thới Nhất 21</option><option value="3811">Tân Thới Nhất 22</option><option value="3812">Tân Thới Nhất 25</option><option value="3813">Tân Thới Nhất 3</option><option value="3814">Tân Thới Nhất 4</option><option value="3815">Tân Thới Nhất 5</option><option value="3816">Tân Thới Nhất 6</option><option value="3817">Tân Thới Nhất 7</option><option value="3818">Tân Thới Nhất 8</option><option value="3819">Tân Thới Nhất 9</option><option value="3820">Tân Tiến</option><option value="3821">Thạch Xuân</option><option value="3822">Thạnh Lộc</option><option value="3823">Thạnh Lộc 12</option><option value="3824">Thạnh Lộc 13</option><option value="3825">Thạnh Lộc 14</option><option value="3826">Thạnh Lộc 15</option><option value="3827">Thạnh Lộc 16</option><option value="3828">Thạnh Lộc 17</option><option value="3829">Thạnh Lộc 18</option><option value="3830">Thạnh Lộc 19</option><option value="3831">Thạnh Lộc 2</option><option value="3832">Thạnh Lộc 20</option><option value="3833">Thạnh Lộc 21</option><option value="3834">Thạnh Lộc 22</option><option value="3835">Thạnh Lộc 23</option><option value="3836">Thạnh Lộc 24</option><option value="3837">Thạnh Lộc 25</option><option value="3838">Thạnh Lộc 26</option><option value="3839">Thạnh Lộc 27</option><option value="3840">Thạnh Lộc 28</option><option value="3841">Thạnh Lộc 29</option><option value="3842">Thạnh Lộc 3</option><option value="3843">Thạnh Lộc 30</option><option value="3844">Thạnh Lộc 31</option><option value="3845">Thạnh Lộc 33</option><option value="3846">Thạnh Lộc 35</option><option value="3847">Thạnh Lộc 37</option><option value="3848">Thạnh Lộc 38</option><option value="3849">Thạnh Lộc 39</option><option value="3850">Thạnh Lộc 4</option><option value="3851">Thạnh Lộc 40</option><option value="3852">Thạnh Lộc 41</option><option value="3853">Thạnh Lộc 42</option><option value="3854">Thạnh Lộc 43</option><option value="3855">Thạnh Lộc 44</option><option value="3856">Thạnh Lộc 45</option><option value="3857">Thạnh Lộc 47</option><option value="3858">Thạnh Lộc 48</option><option value="3859">Thạnh Lộc 49</option><option value="3860">Thạnh Lộc 5</option><option value="3861">Thạnh Lộc 50</option><option value="3862">Thạnh Lộc 51</option><option value="3863">Thạnh Lộc 52</option><option value="3864">Thạnh Lộc 53</option><option value="3865">Thạnh Lộc 54</option><option value="3866">Thạnh Lộc 55</option><option value="3867">Thạnh Lộc 56</option><option value="3868">Thạnh Lộc 57</option><option value="3869">Thạnh Lộc 59</option><option value="3870">Thạnh Lộc 6</option><option value="3871">Thạnh Lộc 7</option><option value="3872">Thạnh Lộc 8</option><option value="3873">Thanh Xuân</option><option value="3874">Thạnh Xuân</option><option value="3875">Thạnh Xuân 12</option><option value="3876">Thạnh Xuân 13</option><option value="3877">Thạnh Xuân 14</option><option value="3878">Thạnh Xuân 15</option><option value="3879">Thạnh Xuân 16</option><option value="3880">Thạnh Xuân 18</option><option value="3881">Thạnh Xuân 19</option><option value="3882">Thạnh Xuân 2</option><option value="3883">Thạnh Xuân 21</option><option value="3884">Thạnh Xuân 22</option><option value="3885">Thạnh Xuân 23</option><option value="3886">Thạnh Xuân 24</option><option value="3887">Thạnh Xuân 25</option><option value="3888">Thạnh Xuân 26</option><option value="3889">Thạnh Xuân 27</option><option value="3890">Thạnh Xuân 29</option><option value="3891">Thạnh Xuân 31</option><option value="3892">Thạnh Xuân 32</option><option value="3893">Thạnh Xuân 33</option><option value="3894">Thạnh Xuân 34</option><option value="3895">Thạnh Xuân 35</option><option value="3896">Thạnh Xuân 36</option><option value="3897">Thạnh Xuân 37</option><option value="3898">Thạnh Xuân 38</option><option value="3899">Thạnh Xuân 39</option><option value="3900">Thạnh Xuân 4</option><option value="3901">Thạnh Xuân 40</option><option value="3902">Thạnh Xuân 41</option><option value="3903">Thạnh Xuân 42</option><option value="3904">Thạnh Xuân 43</option><option value="3905">Thạnh Xuân 44</option><option value="3906">Thạnh Xuân 46</option><option value="3907">Thạnh Xuân 47</option><option value="3908">Thạnh Xuân 48</option><option value="3909">Thạnh Xuân 51</option><option value="3910">Thạnh Xuân 52</option><option value="3911">Thạnh Xuân 56</option><option value="3912">Thạnh Xuân 64</option><option value="3913">Thích Bửu Đăng</option><option value="3914">Thới An</option><option value="3915">Thới An 06</option><option value="3916">Thới An 07</option><option value="3917">Thới An 09</option><option value="3918">Thới An 10</option><option value="3919">Thới An 11</option><option value="3920">Thới An 12</option><option value="3921">Thới An 13</option><option value="3922">Thới An 15</option><option value="3923">Thới An 16</option><option value="3924">Thới An 17</option><option value="3925">Thới An 17A</option><option value="3926">Thới An 18</option><option value="3927">Thới An 18A</option><option value="3928">Thới An 19</option><option value="3929">Thới An 19A</option><option value="3930">Thới An 2</option><option value="3931">Thới An 20</option><option value="3932">Thới An 21</option><option value="3933">Thới An 22</option><option value="3934">Thới An 24</option><option value="3935">Thới An 28</option><option value="3936">Thới An 29</option><option value="3937">Thới An 3</option><option value="3938">Thới An 32</option><option value="3939">Thới An 35</option><option value="3940">Thới An 36</option><option value="3941">Thới An 4</option><option value="3942">Thới An 5</option><option value="3943">Thới An 8</option><option value="3944">Thới An 8A</option><option value="3945">Thới An 9</option><option value="3946">Thống Nhất</option><option value="3947">Tỉnh Lộ 13</option><option value="3948">Tỉnh Lộ 14</option><option value="3949">Tỉnh lộ 15</option><option value="3950">Tỉnh lộ 16</option><option value="3951">Tỉnh Lộ 18</option><option value="3952">Tỉnh Lộ 19</option><option value="3953">Tỉnh Lộ 21</option><option value="3954">Tỉnh Lộ 26</option><option value="3955">Tỉnh Lộ 27</option><option value="3956">Tỉnh Lộ 29</option><option value="3957">Tỉnh Lộ 30</option><option value="3958">Tỉnh Lộ 40</option><option value="3959">Tỉnh Lộ 41</option><option value="3960">Tỉnh lộ 43</option><option value="3961">Tỉnh lộ 9</option><option value="3962">TN02</option><option value="3963">Tô Ký</option><option value="3964">Tô Ngọc Vân</option><option value="3965">Trại Gà</option><option value="3966">Trần Quang Cơ</option><option value="3967">Trần Quang Đạo</option><option value="3968">Trần Thị Bảy</option><option value="3969">Trần Thị Có</option><option value="3970">Trần Thị Cờ</option><option value="3971">Trần Thị Do</option><option value="3972">Trần Thị Hè</option><option value="3973">Trần Thị Hòe</option><option value="3974">Trần Thị Nghè</option><option value="3975">Trích Sài</option><option value="3976">Trung Chánh</option><option value="3977">Trung Mỹ Tây</option><option value="3978">Trung Mỹ Tây 03</option><option value="3979">Trung Mỹ Tây 1</option><option value="3980">Trung Mỹ Tây 10A</option><option value="3981">Trung Mỹ Tây 12</option><option value="3982">Trung Mỹ Tây 13</option><option value="3983">Trung Mỹ Tây 13A</option><option value="3984">Trung Mỹ Tây 14A</option><option value="3985">Trung Mỹ Tây 16</option><option value="3986">Trung Mỹ Tây 17</option><option value="3987">Trung Mỹ Tây 18</option><option value="3988">Trung Mỹ Tây 19</option><option value="3989">Trung Mỹ Tây 2</option><option value="3990">Trung Mỹ Tây 23A</option><option value="3991">Trung Mỹ Tây 2A</option><option value="3992">Trung Mỹ Tây 3</option><option value="3993">Trung Mỹ Tây 4</option><option value="3994">Trung Mỹ Tây 5</option><option value="3995">Trung Mỹ Tây 6</option><option value="3996">Trung Mỹ Tây 6A</option><option value="3997">Trung Mỹ Tây 8</option><option value="3998">Trung Mỹ Tây 9</option><option value="3999">Trung Mỹ Tây 9A</option><option value="4000">Trường Chinh</option><option value="4001">Trương Thị Ngào</option><option value="4002">Trương Văn Đa</option><option value="4003">Võ Cây Dương</option><option value="4004">Võ Quảng</option><option value="4005">Võ Thị Liễu</option><option value="4006">Võ Thị Phải</option><option value="4007">Võ Thị Thừa</option><option value="4008">Vườn Lài</option><option value="4009">Xa La</option><option value="4010">Xa Lộ Đại Hàn</option><option value="4011">Xô Ngọc Oanh</option><option value="4012">Xuân Thới Sơn 12</option><option value="4013">Xuân Thới Sơn 8</option><option value="4014">Xuyên Á</option>
                            {{--<option value="-1" class="advance-options">-- Chọn Đường/Phố --</option>--}}
                        </select>
                    </div>
                </div>

                <div class="row_timkiemR clearfix">
                    <label>Theo dự án</label>
                    <div class="divipt">
                        <select id="select-project" class="advance-options select-project">
                            <option value="-1" class="advance-options">-- Chọn dự án quận 12 --</option>
                            @foreach($projectWard12 as $item)
                                <option value="{{$item['id']}}">{{$item['_name']}}</option>
                            @endforeach
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
                window.location.href = window.location.origin + '/tim-kiem-nang-cao/' + $('#search-advance-method').val()+ '/-1/' + ($('.select-province').val() ?  $('.select-province').val() : -1) + '/' + ($('.select-district').val() ? $('.select-district').val() : -1) + '/' + ($('.select-ward').val() ? $('.select-ward').val() : -1) + '/' + ($('.select-street').val() ? $('.select-street').val() : -1) + '/' + ($('.select-project').val() ? $('.select-project').val() : -1) + '/' + $('#search-advance-area').val() + '/' + $('#search-advance-price').val() + '/' + $('#search-advance-bed_room').val() + '/' + $('#search-advance-toilet').val() + '/' + $('#search-advance-ddlHomeDirection').val()+ '/' + $('#title_article').val();
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
            if($project_id > 0) {
            ?>
            document.getElementById('select-project').value = '<?php echo $project_id ?>';
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

    </div>
    <div class="box1-right">
        <div class="tit_C">
            <span class="icon_star_xanh"></span>
            Nhà đất bán tại quận 12
        </div>
        <div class="detail_R">
            <ul class="slide-bar-du-an">
            @foreach($wardSlideBar as $item)
                @if($item['total'] > 0)
                <li>
                    <a href="/tim-kiem-nang-cao/nha-dat-ban/-1/1/13/{{$item['ward_id']}}/-1/-1/-1/-1/-1/-1/-1">
                        <h3>{{$item['ward']}} ({{$item['total']}})</h3>
                    </a>
                </li>
                @endif
            @endforeach
            </ul>
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