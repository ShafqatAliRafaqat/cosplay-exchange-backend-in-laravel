@extends('forum.inc.master')
@section('content')
    <!-- <section class="content">
                <div class="container" >
                    <div class="row " >
                        <div>
                            <!-- POST --
                            @if($posts->count()>0)
                            @foreach($posts as $post)
                            <div class="post">
                                <div class="wrap-ut pull-left">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img class="profileImage" src="{{ asset('uploads/'.$post->user->profile->img) }}" alt="" />
                                            <div class="status {{ $post->user->isOnline()?'green':'red' }}">&nbsp;</div>
                                        </div>
                                        <div class="icons"></div>
                                    </div>
                                    <div class="posttext pull-left">
                                        <h2><a href="{{ route('member.post.show',$post) }}">{{ $post->title }}</a></h2>
                                        <p>{!!  Str::limit($post->description, 300)   !!}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="postinfo pull-left">
                                    <div class="comments">
                                        <div class="commentbg">
                                            {{ $post->comments()->count() }}
                                            <div class="mark"></div>
                                        </div>

                                    </div>
                                    <div class="views"><i class="fa fa-user"></i> {{ $post->user->profile->username }}</div>
                                    <div class="views"><i class="fa fa-eye"></i> {{ $post->views }}</div>
                                    <div class="time"><i class="fa fa-clock-o"></i> {{ $post->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endforeach

                                @else
                                <div class="post">
                                    <div class="wrap-ut pull-left">
                                        <div class="userinfo pull-left">
                                            <div class="avatar">

                                            </div>
                                            <div class="icons"></div>
                                        </div>
                                        <div class="posttext pull-left">

                                            <p>No Posts Found!</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="postinfo pull-left">


                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                    @endif


                        </div>
                    </div>
                </div>



                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xs-12">
                            <div class="pull-left">
                                <ul class="paginationforum">
                                    {{ $posts->render() }}
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </section> -->
   @endsection
