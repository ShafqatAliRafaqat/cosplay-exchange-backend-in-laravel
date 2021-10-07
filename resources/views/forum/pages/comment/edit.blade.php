@extends('forum.inc.master')
@section('content')
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 breadcrumbf">
                            <a href="{{ url('/') }}">Cosplay-Exchange</a> <span class="diviver">&gt;</span> <a href="#">Discussion</a> <span class="diviver">&gt;</span> <a href="#">Edit Comment</a>
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-8">
                            <!-- POST -->
                            <div class="post">
                                <form action="{{ route('member.comment.update',$comment) }}" class="form newtopic" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="topwrap">
                                        <div class="userinfo pull-left">
                                            <div class="avatar">
                                                <img class="profileImage" src="{{ asset('uploads/'.$comment->user->profile->img) }}" alt="" />
                                                <div class="status {{ $comment->user->isOnline()?'green':'red' }}">&nbsp;</div>
                                            </div>
                                            <div class="icons"></div>
                                        </div>
                                        <div class="posttext pull-left">
                                            <div>
                                                <textarea rows="4" cols="50" id="description" name="description" required>{{ $comment->description }}</textarea>
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
            height: '7em',
        });
    </script>
    @endsection
