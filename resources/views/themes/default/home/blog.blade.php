@extends('theme::layout.public')

@section('content')
    <div class="row mt-10">
        <div class="col-xs-12 col-md-9 main">
            <ul class="nav nav-tabs nav-tabs-zen mb-10">
                <li @if($filter==='recommended') class="active" @endif><a href="{{ route('website.blog') }}">推荐的</a></li>
                <li @if($filter==='hottest') class="active" @endif><a href="{{ route('website.blog',['filter'=>'hottest']) }}">热门的</a></li>
                <li @if($filter==='newest') class="active" @endif ><a href="{{ route('website.blog',['filter'=>'newest']) }}">最新的</a></li>
            </ul>
            <div class="stream-list blog-stream">
                @foreach($articles as $article)
                <section class="stream-list-item">
                    <div class="blog-rank">
                        <div class="votes @if($article->supports>0) plus @endif">
                            {{ $article->supports }}<small>推荐</small>
                        </div>
                        <div class="views hidden-xs">
                            {{ $article->views }}<small>浏览</small>
                        </div>
                    </div>
                    <div class="summary">
                        <h2 class="title"><a href="{{ route('blog.article.detail',['id'=>$article->id]) }}">{{ $article->title }}</a></h2>
                        <p class="excerpt wordbreak hidden-xs">{{ $article->summary }}</p>
                        <ul class="author list-inline">
                            <li class="pull-right" title="{{ $article->collections }} 收藏">
                                <small class="glyphicon glyphicon-bookmark"></small> {{ $article->collections }}
                            </li>
                            <li>
                                <a href="{{ route('auth.space.index',['user_id'=>$article->user_id]) }}">
                                    <img class="avatar-20 mr-10 hidden-xs" src="{{ route('website.image.avatar',['avatar_name'=>$article->user_id.'_small']) }}" alt="{{ $article->user->name }}"> {{ $article->user->name }}
                                </a>
                                发布于 {{ timestamp_format($article->created_at) }}
                            </li>
                        </ul>
                    </div>
                </section>
                @endforeach

            </div>

            <div class="text-center">
                {!! str_replace('/?', '?', $articles->render()) !!}
            </div>
        </div><!-- /.main -->
        <div class="col-xs-12 col-md-3 side">
            <div class="side-ask alert alert-warning">
                <p>今天，有什么开发相关的分享呢？</p>
                <a href="{{ route('blog.article.create') }}" class="btn btn-primary btn-block mt-10">撰写</a>
                <div class="mt-10 side-system-notice">
                    <i class="fa fa-bullhorn pull-left"></i><a class="side-system-notice--title" href="http://segmentfault.com/a/1190000004292681">年度内容精选：SegmentFault 2015 Top Rank</a>
                </div>
            </div>

            <div class="widget-box">
                <h2 class="h4 widget-box-title">热门作者</h2>
                <ul class="list-unstyled">
                    <li class="media  widget-user-item ">
                        <a class="pull-left" href="/blog/dongoer">
                            <img class="media-object avatar-40" src="http://sfault-avatar.b0.upaiyun.com/718/754/718754797-567b59f967165_big64">
                        </a>
                        <div class="media-object">
                            <strong><a href="/blog/dongoer">Noodles</a></strong>

                            <p class="text-muted">最近获得 34 推荐</p>
                        </div>
                    </li>
                    <li class="media widget-user-item">
                        <a class="pull-left" href="/blog/neu">
                            <img class="media-object avatar-40" src="http://sfault-avatar.b0.upaiyun.com/149/315/1493158663-564dbafdc6f0f_big64">
                        </a>

                        <div class="media-object">
                            <strong><a href="/blog/neu">neu</a></strong>

                            <p class="text-muted">最近获得 16 推荐</p>
                        </div>
                    </li>
                    <li class="media widget-user-item">
                        <a class="pull-left" href="/blog/jimmy_thr">
                            <img class="media-object avatar-40" src="http://sfault-avatar.b0.upaiyun.com/222/265/2222651558-5688d54d4891c_big64">
                        </a>

                        <div class="media-object">
                            <strong><a href="/blog/jimmy_thr">jimmy_thr</a></strong>

                            <p class="text-muted">最近获得 4 推荐</p>
                        </div>
                    </li>
                    <li class="widget-user-item media">
                        <a class="pull-left" href="/blog/ryanli">
                            <img class="media-object avatar-40" src="http://static.segmentfault.com/v-56935546/global/img/user-64.png">
                        </a>

                        <div class="media-object">
                            <strong><a href="/blog/ryanli">lpy1990</a></strong>

                            <p class="text-muted">最近获得 1 推荐</p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="widget-box">
                <h2 class="h4 widget-box-title">热议标签 <a href="/tags" title="更多">»</a></h2>
                <ul class="taglist--inline multi">
                    <li class="tagPopup"><a class="tag" data-toggle="popover" data-id="1040000000089436" data-original-title="javascript" href="/t/javascript">javascript</a></li>
                    <li class="tagPopup"><a class="tag" data-toggle="popover" data-id="1040000000089387" data-original-title="php" href="/t/php">php</a></li>
                    <li class="tagPopup"><a class="tag" data-toggle="popover" data-id="1040000000089534" data-original-title="python" href="/t/python">python</a></li>
                    <li class="tagPopup"><a class="tag" data-toggle="popover" data-id="1040000000089434" data-original-title="css" href="/t/css">css</a></li>
                    <li class="tagPopup"><a class="tag" data-toggle="popover" data-id="1040000000089442" data-original-title="ios" href="/t/ios">ios</a></li>
                    <li class="tagPopup"><a class="tag" data-toggle="popover" data-id="1040000000089658" data-original-title="android" href="/t/android">android</a></li>
                    <li class="tagPopup"><a class="tag" data-toggle="popover" data-id="1040000000089918" data-original-title="node.js" href="/t/node.js">node.js</a></li>
                    <li class="tagPopup"><a class="tag" data-toggle="popover" data-id="1040000000089409" data-original-title="html5" href="/t/html5">html5</a></li>
                    <li class="tagPopup"><a class="tag" data-toggle="popover" data-id="1040000000090203" data-original-title="go" href="/t/go">go</a></li>
                    <li class="tagPopup"><a class="tag" data-toggle="popover" data-id="1040000000089488" data-original-title="mongodb" href="/t/mongodb">mongodb</a></li>
                    <li class="tagPopup"><a class="tag" data-toggle="popover" data-id="1040000000089431" data-original-title="redis" href="/t/redis">redis</a></li>
                    <li class="tagPopup"><a class="tag" data-toggle="popover" data-id="1040000000089556" data-original-title="程序员" href="/t/程序员">程序员</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection