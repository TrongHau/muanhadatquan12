<?php
use App\Library\Helpers;
?>
@extends('layouts.app')
@section('content')
    <div class="main-l">
        <div class="box1-left">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span> Các dự án ở quận 12</div>
            <div class="boxfull clearfix">

                <div id="media" class="list-view">
                    @if($project->total() == 0)
                        <div style="text-align: center">Không có bài viết nào</div>
                    @else
                        <?php
                        $page = $project->links();
                        $project = $project->toArray();
                        ?>
                        <ul class="clearfix">
                            @foreach($project['data'] as $key => $item)
                                <div class="box_nhadatban clearfix" style="padding: 0px;">
                                    <div class="detail_nhadatban">
                                        <div class="img_nhadatban" style="padding: 0px; width: 255px;">
                                            <a href="/du-an/{{$item['slug'] ?? $item['id']}}">
                                                <img style="border: none; padding: 0px; width: 255px; height: 180px" alt="" src="{{$item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_PROJECT, true).json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT }}">
                                            </a>
                                        </div>
                                        <div class="text_nhadatban" style="width: auto; padding-left: 20px; width: 410px;">
                                            <div class="info_nhadatban" style="width: 100%;">
                                                <ul>
                                                    <li style="text-transform: uppercase;"><h4><a href="/du-an/{{$item['slug'] ?? $item['id']}}" title="{{$item['_name']}}">
                                                                <span style="color: #266fb5"><b>{{$item['_name']}}</b></span></a></h4></li>
                                                    <li>{{$item['address'] ?? 'Địa chỉ đang cập nhật'}}</li>
                                                    <li><span style="width: 75px;display: inline-block;">Giá từ:</span><span class="">{{$item['price_from'] ?? 'Đang cập nhật'}}</span></li>
                                                    <li><span style="width: 75px;display: inline-block;">Chủ đầu tư: </span><span class="">{{$item['owner'] ?? 'Đang cập nhật'}}</span></li>
                                                    <li><span style="width: 75px;display: inline-block;">Diện tích: </span><span class="">{{$item['area'] ?? 'Đang cập nhật'}}</span></li>
                                                    <li><span style="width: 75px;display: inline-block;">Tiến độ: </span><span class="">{{$item['status'] ?? 'Đang cập nhật'}}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                        <div class="results-wrap clearfix"><div class="summary"></div>
                            <div class="pager clearfix">
                                <?php echo $page ?>
                            </div>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.slider_bar_right')
@endsection
@section('contentJS')
    <script>

    </script>
@endsection