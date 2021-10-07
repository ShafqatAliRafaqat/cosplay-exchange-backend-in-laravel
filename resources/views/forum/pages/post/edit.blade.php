@extends('forum.inc.master')
@section('content')
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 breadcrumbf">
                            <a href="{{ url('/') }}">Cosplay-Exchange</a> <span class="diviver">&gt;</span> <a href="{{ url('/member/forum') }}">Discussion</a> <span class="diviver">&gt;</span> <a href="#">Edit</a>
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-8">
                            <!-- POST -->
                            <div class="post">
                                <form action="{{ route('member.post.update',$post) }}" class="form newtopic" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="topwrap">
                                        <div class="userinfo pull-left">
                                            <div class="avatar">
                                                <img class="profileImage" src="{{ asset('uploads/'.$post->user->profile->img) }}" alt="" />
                                                <div class="status {{ $post->user->isOnline()?'green':'red' }}">&nbsp;</div>
                                            </div>
                                            <div class="icons"></div>
                                        </div>
                                        <div class="posttext pull-left">

                                            <div>
                                                <input type="text" value="{{ $post->title }}" class="form-control" name="title" required/>
                                            </div>
                                            <div>
                                                <textarea rows="4" cols="50" id="description" name="description" required>{{ $post->description }}</textarea>
                                            </div>
                                            <div style="margin-top: 3%">

                                                <input type="text"
                                                       @if($post->hashtags!=null)
                                                           value="{{ $post->hashtags }}"
                                                       @else
                                                       placeholder="Enter Hashtags Separated by (,)"
                                                       @endif
                                                       class="form-control" name="hashtags"/>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="postinfobot">
                                        <div class="pull-right postreply">
                                            <div class="pull-left"><button type="submit" class="btn btn-primary">Update</button></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

           @endsection
@section('scripts')
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description', {
            height: '15em',
        });
    </script>
    @endsection
