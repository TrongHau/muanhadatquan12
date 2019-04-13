<?php
use App\Library\Helpers;
$user = Auth::user();
$paging = $article->links();
$list = $article->toArray();
?>
@if($list['data'])
@foreach($list['data'] as $key => $item)
    <div id="item-{{$item['id']}}" class="list-view">
        <ul class="clearfix">
            <div class="box_nhadatban  clearfix">
                <div class="tit_nhadatban">
                    <h4><a title="" target="_blank" href="/{{$item['prefix_url'].'-bds-'.$item['id']}}">{{$item['title']}}</a></h4>
                </div>
                <div class="detail_nhadatban">
                    <div class="img_nhadatban">
                        <a target="_blank" href="/{{$item['prefix_url'].'-bds-'.$item['id']}}"><img src="{{$item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_LEASE, true).THUMBNAIL_PATH.json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT }}" alt=""></a>
                        <!-- <span class="masotin">MST: 889034</span>     -->
                    </div>
                    <div class="text_nhadatban">
                        <div class="info_nhadatban">
                            <ul>
                                <li>Giá: <strong class="camcam">500 Triệu/m2</strong> | Lượt xem: <span class="saleboldtext">{{number_format($item['views'])}}</span></li>
                                <li>
                                    Ngày đăng:
                                    <span class="datetime">
                         <span class="camcam">{{date_format(date_create($item['updated_at']), "d-m-Y")}}</span>
                    </span>
                                </li>
                                <li>
                                    Danh mục: <span class="saleboldtext">{{$item['type_article']}}</span>
                                    -
                                    Mã Số Tin:<span class="saleboldtext">{{$item['id']}}</span>
                                </li>
                                <li>
                                    Tình trạng: <span class="saleboldtext">
                                        @if($item['aprroval'] == 0)
                                            Chưa duyệt
                                        @elseif($item['aprroval'] == 1)
                                            <span class="camcam">Đã duyệt - {{date_format(date_create($item['updated_at']), "d-m-Y")}}</span>
                                        @endif
                                    </span>
                                </li>
                                <li>
                                    <ul class="chucnang_tindang">
                                        <li class="suatin_icon"><a href="/quan-ly-tin/dang-tin-ban-cho-thue/{{$item['id']}}">Sửa tin</a></li>
                                        <li class="xoatin_icon"><a class="delete-property" onclick="deleteArticle('{{$item['id']}}')" data-property-id="994" href="javascript:void(0)">Xóa tin</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div></ul>
        <div class="results-wrap clearfix"><div class="summary"></div></div>
    </div>
@endforeach
<div class="pager" style="float: right">
    <?php echo str_replace('/thong-tin-ca-nhan', '/quan-ly-tin/tin-cho-thue', $paging) ?>
</div>
@else
    Hiện tại bạn vẫn chưa có bài tin đăng nào.
@endif