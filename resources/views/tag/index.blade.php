@extends('layout.html')

@section('title')
    #{{ $tag->name }}#
@stop
@section('body')
    <!-- page集合的容器，里面放多个平行的.page，其他.page作为内联页面由路由控制展示 -->
    <div class="page-group">
        <!-- 单个page ,第一个.page默认被展示-->
        <div class="page page-current">
            <!-- 标题栏 -->
            <header class="bar bar-nav page-title">
                <a class="icon icon-me pull-left open-panel"></a>
                <h1 class="title">#{{ $tag->name }}#</h1>
                <a class="icon icon-app pull-right" href="{{ action('TagController@getTagPage') }}" external></a>
            </header>


            <!-- 这里是页面内容区 -->
            <div class="content infinite-scroll infinite-scroll-bottom" data-distance="100">
                <div class="content-block card-items-block">
                    <div class="card-items">

                        {{--<div class="card demo-card-header-pic">--}}
                        {{--<div valign="bottom" class="card-header color-white no-border no-padding">--}}

                        {{--<div class="video-card"--}}
                        {{--id="video-card1"--}}
                        {{--data-poster="http://d.ifengimg.com/w480_h360/p0.ifengimg.com/pmop/2016/10/21/c08754b1-2a85-414a-a631-f3e5024978b0.jpg"--}}
                        {{--data-src="http://ips.ifeng.com/video19.ifeng.com/video09/2016/10/21/4313976-280-100-1549.mp4?unlimit=1"--}}
                        {{-->--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="card-content video-title">--}}
                        {{--<div class="card-content-inner">--}}
                        {{--<p class="">有视频！妻子偷情被抓现行 丈夫当街暴打“男小三”</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="card-footer card-bottom">--}}
                        {{--<a class="tag-item">花絮片段</a>--}}
                        {{--<a class="tag-item">电视剧</a>--}}
                        {{--<a href="#" class="link">--}}
                        {{--<span class="icon icon-message"></span>--}}
                        {{--12--}}
                        {{--</a>--}}
                        {{--<a href="#" class="link">--}}
                        {{--<span class="icon icon-star"></span>--}}
                        {{--12--}}
                        {{--</a>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </div>

                </div>

                <!-- 加载提示符 -->
                <div class="infinite-scroll-preloader">
                    <div class="preloader"></div>
                </div>
            </div>


            <!-- 工具栏 -->
            {{--<nav class="bar bar-tab">--}}
            {{--<a class="tab-item external active" href="#">--}}
            {{--<span class="icon icon-home"></span>--}}
            {{--<span class="tab-label">首页</span>--}}
            {{--</a>--}}
            {{--<a class="tab-item external" href="#">--}}
            {{--<span class="icon icon-star"></span>--}}
            {{--<span class="tab-label">收藏</span>--}}
            {{--</a>--}}
            {{--<a class="tab-item external" href="#">--}}
            {{--<span class="icon icon-settings"></span>--}}
            {{--<span class="tab-label">设置</span>--}}
            {{--</a>--}}
            {{--</nav>--}}
        </div>

        <!-- 其他的单个page内联页（如果有） -->
        <div class="page">...</div>
    </div>

    <!-- popup, panel 等放在这里 -->
    <div class="panel-overlay"></div>

@stop

@section('bottom-scripts')
    <script>
        $(function () {
            var url = "{{ action('TagController@getTagVideoList',['id'=>$tag->id]) }}";
            var svs = $$.svs();
            var params = {_token:"{{ csrf_token() }}",tag_id: "{{ $tag->id }}" ,page: svs.getDefault().curPage, not_in_item: svs.getDefault().notInItem}
            svs.getNormalList(url, 'POST', params);
            svs.initScroll(function () {
                params = {_token:"{{ csrf_token() }}",tag_id: "{{ $tag->id }}",page: svs.getDefault().curPage, not_in_item: svs.getDefault().notInItem}
                svs.getNormalList(url, 'POST', params);
            });

        })
    </script>
@stop