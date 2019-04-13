<?php
use App\Library\Helpers;
?>
<div class="main-r main-r1">
    <div class="boxsearch-right box1-right boxsearch-right box1-menu">
        <div class="tit_C cachtren2">
            <span class="icon_star_xanh"></span>
            TÀI KHOẢN
        </div>
        <div class="detail_R detail_box_admin_L">
            <ul class="thongtintaikhoan">
                <li class="icon_thaydoi_thongtincanhan"><a href="/thong-tin-ca-nhan/thay-doi-ca-nhan">Thay đổi thông tin cá nhân</a></li>
                <li class="icon_thaydoi_matkhau"><a href="/thong-tin-ca-nhan/thay-doi-mat-khau">Thay đổi mật khẩu</a></li>
                <li class="icon_thoatkhoi_hethong"><a href="/logout">Thoát khỏi hệ thống</a></li>
            </ul>
        </div>
        <div class="tit_C cachtren2">
            <span class="icon_star_xanh"></span>
            QUẢN LÝ TIN
        </div>
        <div class="detail_R detail_box_admin_L">
            <ul class="thongtintaikhoan">
                <li class="icon_dangtinraoban_chothue"><a href="/thong-tin-ca-nhan">Quản lý tin rao bán/cho thuê</a></li>
                <li class="icon_cactin_danghienthi"><a href="/quan-ly-tin/dang-tin-ban-cho-thue">Đăng tin rao bán/cho thuê</a></li>
                <li class="icon_cactin_danghienthi"><a href="/thong-tin-ca-nhan/quan-ly-mua-can-thue">Quản lý tin cần mua/cần thuê</a></li>
                <li class="icon_cactin_danghienthi"><a href="/quan-ly-tin/dang-tin-can-mua-can-thue">Đăng tin cần mua/cần thuê</a></li>
                <li class="icon_cactin_danghienthi"><a href="/thong-tin-ca-nhan/tin-nhap">Quản lý tin nháp</a></li>
            </ul>
        </div>
    </div></div>
<script>
    if(window.location.pathname == '/thong-tin-ca-nhan') {
        $('.icon_dangtinraoban_chothue a').addClass('selected');
    }else{
        $('.detail_R a').each(function( index ) {
            if($(this).attr('href') == window.location.pathname) {
                $(this).addClass('selected');
            }
        });
    }
</script>
