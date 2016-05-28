@extends('theme::layout.public')

@section('seo')
    <title>活跃用户 - {{ Setting()->get('website_name') }}</title>
    <meta name="description" content="tipask问答系统交流平台" />
    <meta name="keywords" content="问答系统,PHP问答系统,Tipask问答系统 " />
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-9 main">
            <h2 class="h4  mt-30">活跃用户</h2>
            <div class="widget-streams users">
                @foreach($users as $index=>$user)
                <section class="hover-show streams-item">
                    <div class="stream-wrap media">

                        <div class="col-md-9">
                            <div class="top-num pull-left mr-10">
                                @if($index < 3)
                                <label class="label label-warning">{{ ($index+1) }}</label>
                                @else
                                <label class="label label-default">{{ ($index+1) }}</label>
                                @endif
                            </div>
                            <div class="pull-left mr-10">
                                <a href="{{ route('auth.space.index',['id'=>$user->user_id]) }}" target="_blank">
                                    <img class="media-object avatar-64" src="{{ route('website.image.avatar',['avatar_name'=>$user->user_id.'_big'])}}" alt="{{ $user->user->name }}">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="{{ route('auth.space.index',['id'=>$user->user_id]) }}">{{ $user->user->name }}</a></h4>
                                <p class="text-muted">{{ $user->user->title }}</p>
                                <p class="text-muted">{{ $user->coins }}金币 / {{ $user->supports }}赞同 / {{ $user->followers }}关注 / {{ $user->answers }}回答</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <ul class="action-list list-unstyled">
                                <li>
                                    @if(Auth()->guest())
                                        <button type="button" class="btn btn-success followerUser btn-sm" data-source_type = "user" data-source_id = "{{ $user->user_id }}"  data-show_num="false" data-toggle="tooltip" data-placement="left" title="" data-original-title="关注后将获得更新提醒">加关注</button>
                                    @elseif(Auth()->user()->id !== $user->user_id)
                                        @if(Auth()->user()->isFollowed(get_class($user->user),$user->user_id))
                                            <button type="button" class="btn btn-success btn-sm followerUser active" data-source_type = "user" data-source_id = "{{ $user->user_id }}"  data-show_num="false"  data-toggle="tooltip" data-placement="left" title="" data-original-title="关注后将获得更新提醒">已关注</button>
                                        @else
                                            <button type="button" class="btn btn-success followerUser btn-sm" data-source_type = "user" data-source_id = "{{ $user->user_id }}"  data-show_num="false" data-toggle="tooltip" data-placement="left" title="" data-original-title="关注后将获得更新提醒">加关注</button>
                                        @endif
                                    @endif
                                </li>
                                <li>
                                    @if(Auth()->guest())
                                        <a href="#" class="btn btn-default btn-sm">向他求助</a>
                                    @elseif(Auth()->user()->id !== $user->user_id)
                                        <a href="#" class="btn btn-default btn-sm">向他求助</a>
                                    @endif

                                </li>
                            </ul>
                        </div>

                    </div>
                </section>
                @endforeach
            </div>
            <div class="text-center">
            </div>
        </div>
        @include('theme::layout.top_user_menu')

    </div>
@endsection