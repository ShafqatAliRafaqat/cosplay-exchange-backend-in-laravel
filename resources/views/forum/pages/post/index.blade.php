@extends('forum.inc.master')
@section('content')

            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 breadcrumbf">
                            <a href="{{ url('/') }}">Cosplay-Exchange</a> <span class="diviver">&gt;</span> <a href="{{ url('/member/forum') }}">Forum</a> <span class="diviver">&gt;</span> <a href="#">{{ $post->title }}</a>
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-8">

                            <!-- POST -->
                            <div class="post beforepagination" style="background-color: #e7eae9">
                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img class="profileImage" src="{{ asset('uploads/'.$post->user->profile->img) }}" alt="" />
                                            <div class="status {{ $post->user->isOnline()?'green':'red' }}">&nbsp;</div>
                                        </div>

                                        <div class="icons">

                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                        <h2>{{ $post->title }}</h2>
                                        <p>{!! $post->description !!}</p>
                                        <p>{{ $post->hashtags }}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="postinfobot">
                                   <div class="posted pull-left"><i class="fa fa-user"></i> {{ $post->user->profile->username }}</div>
                                    <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : {{ $post->created_at->toDateString() }}</div>

                                    @if($post->user->id == \Illuminate\Support\Facades\Auth::id() || \Illuminate\Support\Facades\Auth::user()->role_id<4)
                                    <div class="posted pull-left">
                                    <i class="fa fa-gear"></i>
                                        <a href="{{ route('member.post.edit',$post) }}" class="editBtn">Edit</a> / <a href="#" class="deleteBtn" data-postid="{{ $post->id }}" data-toggle="modal" data-target="#deletePostModal">Delete</a>
                                    </div>
                                    @endif

                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- POST -->

                            <div class="paginationf">
                                <div class="pull-left"><a href="#" class="prevnext"></a></div>

                                <div class="pull-left"><a href="#" class="prevnext last"></a></div>
                                <div class="clearfix"></div>
                            </div>

                            <!-- POST Comment -->
                            @foreach($comments as $comment)
                            <div class="post">
                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img class="profileImage" src="{{ asset('uploads/'.$comment->user->profile->img) }}" alt="" />
                                            <div class="status {{ $comment->user->isOnline()?'green':'red' }}">&nbsp;</div>
                                        </div>

                                        <div class="icons">

                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                        <p>{!! $comment->description !!}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="postinfobot">
                                    <div class="posted pull-left"><i class="fa fa-user"></i> {{ $comment->user->profile->username }}</div>
                                    <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : {{ $comment->created_at->toDateString() }}</div>
                                    @if($comment->user->id == \Illuminate\Support\Facades\Auth::id() || \Illuminate\Support\Facades\Auth::user()->role_id<4)
                                    <div class="posted pull-left">
                                    <i class="fa fa-gear"></i> <a href="{{ route('member.comment.edit',$comment) }}" class="editBtn">Edit</a> / <a href="#" class="deleteBtn" data-commentid="{{ $comment->id }}" data-toggle="modal" data-target="#deleteCommentModal">Delete</a>
                                    </div>
                                        @endif
                                        <div class="clearfix"></div>
                                </div>
                            </div>
                            @endforeach
                            <!-- POST Comment -->


                            <!-- Comment Form -->
                            <div class="post">
                                <form action="{{ route('member.comment.store') }}" class="form" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="topwrap">
                                        <div class="userinfo pull-left">
                                            <div class="avatar">
                                                <img class="profileImage" src="{{ asset('uploads/'.\Illuminate\Support\Facades\Auth::user()->profile->img) }}" alt="" />
                                                <div class="status green">&nbsp;</div>
                                            </div>

                                            <div class="icons">

                                            </div>
                                        </div>
                                        <div class="posttext pull-left">
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <div class="textwraper">
                                                <div class="postreply">Post a Reply</div>
                                                <textarea name="reply" id="reply" required></textarea>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="postinfobot">
                                        <div class="pull-right postreply">
                                            <div class="pull-left"><button type="submit" class="btn btn-primary">Post Reply</button></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                            <!-- Comment Form -->


                        </div>
                    </div>
                </div>
            </section>



            {{--Post Modal Delete--}}
            <div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('member.post.destroy','test') }}" method="post" id="editForm">
                            @method('DELETE')
                            @csrf
                            <div class="modal-body">
                                <div class="modal-body">
                                    <p class="text-center">
                                        Are you sure you want to delete this?
                                    </p>
                                    <input type="hidden" id="post_id" name="post_id" value="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{--End Post Modal Delete--}}
            {{--Comment Modal Delete--}}
            <div class="modal fade" id="deleteCommentModal" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Comment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('member.comment.destroy','test') }}" method="post" id="editForm">
                            @method('DELETE')
                            @csrf
                            <div class="modal-body">
                                <div class="modal-body">
                                    <p class="text-center">
                                        Are you sure you want to delete this?
                                    </p>
                                    <input type="hidden" id="comment_id" name="comment_id" value="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{--End Comment Modal Delete--}}

           @endsection
@section('scripts')
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('reply', {
            height: '7em',
        });
    </script>
    <script>

        $('#deletePostModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var postid = button.data('postid');
            var modal = $(this);
            modal.find('.modal-body #post_id').val(postid);
        });
        $('#deleteCommentModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var commentid = button.data('commentid');
            var modal = $(this);
            modal.find('.modal-body #comment_id').val(commentid);
        });
    </script>
    @endsection
