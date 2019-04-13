<?php
use App\Library\Helpers;
$mySelf = Auth::user();
?>
@extends('layouts.app')
@section('content')
    @include('user.left_sidebar_avatar', ['mySelf' => $mySelf])
    <div class="main-l main-l1">
        <div class="box1-left">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span>QUẢN LÝ TIN NHÁP
            </div>
            <div class="detail_admin_C detail_R">
                <table style="margin-bottom: 10px" class="t-4-c">
                    <tbody>
                    <tr>
                        <td class="colorblue">Từ ngày</td>
                        <td class="colorblue">Đến ngày</td>
                        <td class="colorblue">Mã tin</td>
                        <td class="colorblue">Trạng thái</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 10px;">
                            <input value="{{date('Y-m-d', strtotime('-2 months'))}}" name="date_from" type="date" value="22/06/2018" id="date_from" class="form-control">
                        </td>
                        <td style="padding-right: 10px;">
                            <input value="{{date("Y-m-d")}}" name="date_to" type="date" value="23/12/2018" id="date_to" class="form-control">
                        </td>
                        <td style="padding-right: 10px;">
                            <input placeholder="Bài viết của bạn" name="code" type="text" id="code" class="form-control">
                        </td>
                        <td style="padding-right: 10px;">
                            <div id="divProductType" class="comboboxs advance-select-box pad0">
                                <select class="select-text form-control" name="aprroval" id="aprroval">
                                    <option selected="selected" value="-1">Tất cả</option>
                                    <option value="{{APPROVAL_ARTICLE_PUBLIC}}">Đã duyệt</option>
                                    <option value="{{APPROVAL_ARTICLE_PENĐING}}">Chưa duyệt</option>
                                    <option value="{{APPROVAL_ARTICLE_DELETE}}">Đã bị xóa</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <input type="submit" name="ctl00$MainContent$_userPage$ctl00$btnSearch" value="Tìm kiếm" onclick="doReadySearch();" id="MainContent__userPage_ctl00_btnSearch" class="timkiem form-control bt_sb" style="margin-bottom: 0px;" autopostback="true">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div id="list_article">
                    <?php echo $list ?>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('contentJS')
    <script>
        var pageUrl = '/quan-ly-tin/tin-nhap';
        function doReadySearch() {
            getList('/quan-ly-tin/tin-nhap');
        }
        function deleteArticle(code, type) {
            var r = confirm("Bạn có chắc muốn xóa tin này không?");
            if (r == true) {
                $.ajax({
                    url: "/thong-tin-ca-nhan/xoa-tin",
                    type: "POST",
                    dataType: "json",
                    data: {code: code, type: type},
                    beforeSend: function () {
                        if(loaded) return false;
                        loaded = true;
                    },
                    success: function(data) {
                        if(data.success) {
                            loaded = false;
                            getList(pageUrl);
                            successModal(data.message);
                            // $('#item-'+code).remove();
                        }else {
                            alertModal(data.message);
                        }
                    }
                });
            }

        }
        function getAllNote(content) {
            alertModal(content ? content : 'Không có thông báo nào.');
        }
        $('#list_article').find('.pagination li a').on('click', function (e) {
            e.preventDefault();
            getList($(this).attr('href'));
        });
        function getList(url) {
            $.ajax({
                url: url,
                type: "POST",
                dataType: "html",
                data: {
                    date_from: $('#date_from').val(),
                    date_to: $('#date_to').val(),
                    code: $('#code').val(),
                    aprroval: $('#aprroval').val(),
                },
                beforeSend: function () {
                    if(loaded) return false;
                    loaded = true;
                },
                success: function(response) {
                    $('#list_article').html(response);
                    $('#list_article').find('.pagination li a').on('click', function (e) {
                        e.preventDefault();
                        pageUrl = $(this).attr('href');
                        getList($(this).attr('href'));
                    });
                }
            });
        }
    </script>
@endsection

