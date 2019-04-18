<?php
use App\Library\Helpers;
use Jenssegers\Agent\Agent;
$Agent = new Agent();
?>
@if($Agent->isMobile())
@section('contentCSS')
    <link rel="stylesheet" type="text/css" href="/css/mobile_catalog.css">
@endsection
@endif
@extends('layouts.app')
@section('content')
    <div class="main-l">
        <div class="box1-left">
            <div class="tit_C cachtren2">
                <span class="icon_star_xanh"></span> {{$category->name}}</div>
            <div class="boxfull clearfix">

                <div id="media" class="list-view">
                    @if($article->total() == 0)
                        <div style="text-align: center">Không có bài viết nào</div>
                    @else
                        <?php
                        $page = $article->links();
                        $article = $article->toArray();
                        ?>
                        <ul class="clearfix">
                            @foreach($article['data'] as $key => $item)
                                <div class="box_nhadatban  vipdb clearfix">
                                    <div class="tit_nhadatban">
                                        <h4><a href="/{{$category->slug}}/{{$item['slug']}}" title="{{$item['title']}}">
                                                <span style="color: #266fb5">{{$item['title']}}</span>		</a></h4>
                                    </div>
                                    <div class="detail_nhadatban">
                                        <div class="img_nhadatban">
                                            <a href="/{{$category->slug}}/{{$item['slug']}}">
                                                <img alt="" src="{{$item['image'] ? '/'.$item['image'] : PATH_LOGO_DEFAULT}}">
                                            </a>
                                        </div>
                                        <div class="description_tin-tuc"><?php echo $item['short_content'] ?></div>
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