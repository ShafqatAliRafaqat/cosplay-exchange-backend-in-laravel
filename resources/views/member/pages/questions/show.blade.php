@extends('member.inc.master')
@section('styles')

@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-question"></i>
            Answer
        </div>
        <div class="card-body">
            <form action="{{ route('cosplay.answer.store' )}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <div class="row">
                    <div class="col-md-6">
                        <label>Costume</label>
                        <input type="text" class="form-control" value="{{ $question->costumes->title }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label>Asked By</label>
                        <input type="text" class="form-control"  value="{{ $question->user->profile->username }}" readonly>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label>Question</label>
                    <span  class="form-control">{!! $question->question !!}</span>
                </div>

                @if($question->answers->count()>0)
                <div class="card mb-3">
                    <div class="card-header alert-warning">
                        Replies
                    </div>
                    <div class="card-body">
                        @foreach($question->answers as $reply)
                        <blockquote class="blockquote mb-0">
                            <p>{!! $reply->answer !!}</p>
                            <footer class="blockquote-footer">{{ $reply->user->profile->username}} <small><strong>{{  $reply->created_at->diffForHumans() }}</strong></small> </footer>
                        </blockquote>
                        @endforeach
                    </div>
                </div>
@endif

                <div class="form-group mt-3">
                    <label>Answer</label>
                    <textarea class="form-control" id="answer" name="answer" required ></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Reply</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script>
        // CKEDITOR.replace( 'editor' );
        CKEDITOR.replace('answer', {
            height: '10em',
        });
    </script>
@endsection


