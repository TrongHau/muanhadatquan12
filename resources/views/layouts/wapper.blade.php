<div class="header-top">
    <div class="header-top-left">
        <div style="padding-top: 5px;">
            <h1>
                <a href="/" title="Trang chủ"><img src="/imgs/logo@3x.png" alt="Kênh thông tin mua bán, cho thuê nhà đất số 1" style="padding-top: 2px; width: 100%;"></a>
            </h1>
        </div>
    </div>
    <div class="header-top-right">
        <div id="TopBanner">
            <div class="container-default">
                <div id="ctl21_BodyContainer">
                    <div class="adPosition" positioncode="BANNER_POSITION_TOP" style="" hasshare="True"
                         hasnotshare="False">
                        <div class="adshared">
                            <div class="aditem" time="15" style="display: block;"
                                 src="/imgs/20180407105303-7dfc.jpg"
                                 altsrc="/imgs/20180407105303-7dfc.jpg"
                                 link="#"
                                 bid="7550" tip="" tp="7" w="746" h="96" k=""><a
                                        href="{{env("APP_URL")}}/nha-dat-ban" target="_blank"
                                        title="" rel="nofollow"><img
                                            src="/imgs/bdscompany_cover.png"
                                            style="max-width: 100%; height:96px;"></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle-right">

            <div class="user_style">
                <div id="divUserStt" style="" ins-init-condition="#W29iamVjdCBPYmplY3Rd">
                    @if(!Auth::check())
                    <div>
                        <div class="header-middle-righ-link">
                            <a href="{{env("APP_URL")}}/login" rel="nofollow">Đăng nhập</a>
                        </div>
                        <div class="header-middle-righ-icon">
                            <img src="/imgs/login.png"
                                 id="ico_login">
                        </div>
                    </div>
                    <div>
                        <div class="header-middle-righ-link max90" id="kct_username">
                            <a href="{{env("APP_URL")}}/register" title="Đăng ký" rel="nofollow">Đăng ký
                            </a>
                        </div>
                        <div class="header-middle-righ-icon">
                            <img src="/imgs/register.png"
                                 id="ico_register">
                        </div>
                    </div>
                    @else
                    <div>
                        <div class="header-middle-righ-link"><a href="/logout" class="line_user_name" rel="nofollow">Thoát</a></div>
                        <div class="header-middle-righ-icon"><img
                                    src="/imgs/logout.png" id="ico_logout"
                                    style="padding-top: 2px !important"></div>
                    </div>
                    <div>
                        <div class="header-middle-righ-link max155 user_name"><img
                                    src="/imgs/user.png"
                                    style="display: block; float: left; margin-top: 7px; margin-right: 3px;"><a
                                    style="white-space: nowrap;" href="/thong-tin-ca-nhan" class="line_user_name"  rel="nofollow">{{Auth::user()->name}}</a>
                        </div>
                    </div>
                    @endif

                    <div class="header-middle-righ-link" id="chat-quick-inbox-icon"></div>
                </div>
                <div class="user_hide" style="display: none !important;">
                    <div class="header-middle-righ-link">
                        <a href="{{env("APP_URL")}}/Defaults/#" id="UserControl1_linkPostFAQ"><span
                                    class="HeaderText">Hỏi đáp</span></a>
                    </div>
                    <div class="header-middle-righ-icon">
                        <img src="/imgs/header-middle-right-icon2.jpg"
                             id="ico_faq">
                    </div>
                </div>
                @if(Auth::check())
                <div id="divCusPostProduct">
                    <div id="UserControl1_divPostProduct" class="header-middle-righ-link">
                        <a href="/quan-ly-tin/dang-tin-ban-cho-thue"
                           id="linkPostProduct"><span>Đăng tin rao</span></a>
                    </div>
                    <div class="header-middle-righ-icon">
                        <img src="/imgs/plus.png"
                             id="ico_product">
                    </div>
                </div>
                @else
                    <div id="divCusPostProduct">
                        <div id="UserControl1_divPostProduct" class="header-middle-righ-link">
                            <a href="/guest/dang-tin-ban-cho-thue"
                               id="linkPostProduct"><span>Đăng tin rao</span></a>
                        </div>
                        <div class="header-middle-righ-icon">
                            <img src="/imgs/plus.png"
                                 id="ico_product">
                        </div>
                    </div>
                @endif
                <div id="UserControl1_divMember">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-menu">
    <div id="left-page-nav"></div>
    <div class="menupad"></div>
    <div id="page-navigative-menu">
        <div class="ihome"><a href="{{env("APP_URL")}}/"><img
                        src="/imgs/homea.png"></a></div>
        <ul class="dropdown-navigative-menu">
            <li class="lv0"><a href="/nha-dat-ban" class="haslink ">Nhà đất bán</a>
                <ul>
                    <li class="lv1"><a href="/ban-can-ho-chung-cu" class="haslink ">Bán
                            căn hộ chung cư</a></li>
                    <li class="lv1"><a href="/ban-nha-rieng" class="haslink ">Bán nhà
                            riêng</a></li>
                    <li class="lv1"><a href="/ban-biet-thu-lien-ke" class="haslink ">Bán biệt thự, liền kề</a></li>
                    <li class="lv1"><a href="/ban-nha-mat-pho" class="haslink ">Bán nhà
                            mặt phố</a></li>
                    <li class="lv1"><a href="/ban-dat-nen-du-an" class="haslink ">Bán
                            đất nền dự án</a></li>
                    <li class="lv1"><a href="/ban-dat" class="haslink ">Bán đất</a>
                    </li>
                    <li class="lv1"><a href="/ban-trang-trai-khu-nghi-duong" class="haslink ">Bán trang trại, khu nghỉ dưỡng</a></li>
                    <li class="lv1"><a href="/ban-kho-nha-xuong" class="haslink ">Bán kho, nhà xưởng</a></li>
                    <li class="lv1"><a href="/ban-du-an-quan-12" class="haslink ">Bán dự án quận 12</a></li>
                    <li class="lv1"><a href="/ban-loai-bat-dong-san-khac" class="haslink ">Bán loại bất động sản khác</a></li>
                </ul>
            </li>

            <li class="lv0"><a href="/nha-dat-cho-thue" class="haslink ">Nhà đất cho thuê</a>
                <ul>
                    <li class="lv1"><a href="/cho-thue-can-ho-chung-cu" class="haslink ">Cho thuê căn hộ chung cư</a></li>
                    <li class="lv1"><a href="/cho-thue-nha-rieng" class="haslink ">Cho
                            thuê nhà riêng</a></li>
                    <li class="lv1"><a href="/cho-thue-nha-mat-pho" class="haslink ">Cho
                            thuê nhà mặt phố</a></li>
                    <li class="lv1"><a href="/cho-thue-nha-tro-phong-tro" class="haslink ">Cho thuê nhà trọ, phòng trọ</a></li>
                    <li class="lv1"><a href="/cho-thue-van-phong" class="haslink ">Cho
                            thuê văn phòng</a></li>
                    <li class="lv1"><a href="/cho-thue-cua-hang-ki-ot" class="haslink ">Cho thuê cửa hàng - ki ốt</a></li>
                    <li class="lv1"><a href="/cho-thue-kho-nha-xuong-dat" class="haslink ">Cho thuê kho, nhà xưởng, đất</a></li>
                    <li class="lv1"><a href="/cho-thue-du-an-quan-12" class="haslink ">Cho thuê dự án quận 12</a></li>
                    <li class="lv1"><a href="/cho-thue-loai-bat-dong-san-khac" class="haslink ">Cho thuê loại bất động sản khác</a></li>
                </ul>
            </li>

            <li class="lv0"><a href="/nha-dat-can-mua" class="haslink">Nhà
                    đất cần mua</a>
                <ul>
                    <li class="lv1"><a href="/mua-can-ho-chung-cu" class="haslink ">Mua căn hộ chung cư</a></li>
                    <li class="lv1"><a href="/mua-nha-rieng" class="haslink ">Mua
                            nhà riêng</a></li>
                    <li class="lv1"><a href="/mua-nha-biet-thu-lien-ke" class="haslink ">Mua nhà biệt thự, liền kề</a></li>
                    <li class="lv1"><a href="/mua-nha-mat-pho" class="haslink ">Mua nhà mặt phố</a></li>
                    <li class="lv1"><a href="/mua-dat-nen-du-an" class="haslink ">Mua đất nền dự án</a></li>
                    <li class="lv1"><a href="/mua-dat" class="haslink ">Mua
                            đất</a></li>
                    <li class="lv1"><a href="/mua-trang-trai-khu-nghi-duong" class="haslink ">Mua trang trại, khu nghỉ dưỡng</a></li>
                    <li class="lv1"><a href="/mua-kho-nha-xuong" class="haslink ">Mua kho, nhà xưởng</a></li>
                    <li class="lv1"><a href="/mua-du-an-quan-12" class="haslink ">Mua dự án quận 12</a></li>
                    <li class="lv1"><a href="/mua-cac-loai-bat-dong-san-khac" class="haslink ">Mua loại bất động sản khác</a></li>
                </ul>
            </li>
            <li class="lv0"><a href="/nha-dat-can-thue" class="haslink">Nhà
                    đất cần thuê</a>
                <ul>
                    <li class="lv1"><a href="/can-thue-can-ho-chung-cu" class="haslink ">Cần thuê căn hộ chung cư</a></li>
                    <li class="lv1"><a href="/can-thue-nha-rieng" class="haslink ">Cần thuê nhà riêng</a></li>
                    <li class="lv1"><a href="/can-thue-nha-mat-pho" class="haslink ">Cần thuê nhà mặt phố</a></li>
                    <li class="lv1"><a href="/can-thue-nha-tro-phong-tro" class="haslink ">Cần thuê nhà trọ, phòng trọ</a></li>
                    <li class="lv1"><a href="/can-thue-van-phong" class="haslink ">Cần thuê văn phòng</a></li>
                    <li class="lv1"><a href="/can-thue-cua-hang-ki-ot" class="haslink ">Cần thuê cửa hàng - ki ốt</a></li>
                    <li class="lv1"><a href="/can-thue-kho-nha-xuong-dat" class="haslink ">Cần thuê kho, nhà xưởng, đất</a></li>
                    <li class="lv1"><a href="/can-thue-du-an-quan-12" class="haslink ">Cần thuê dự án quận 12</a></li>
                    <li class="lv1"><a href="/can-thue-loai-bat-dong-san-khac" class="haslink ">Cần thuê loại bất động sản khác</a></li>
                </ul>
            </li>


        </ul>
    </div>
    <div class="menupad"></div>
    <div id="right-page-nav"></div>
</div>