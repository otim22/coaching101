@forelse($question->comments->whereNull('parent_id') as $comment)
    <div class="pb-2">
        @if($comment->user->role == 1)
            <div class="circle_comment">
                <span class="circle_comment__content">{{ InitialGenerator::generate_initials($comment->user->name) }}</span>
            </div>
        @else
            <div class="circle_comment-tr">
                <span class="circle_comment-tr__content">{{ InitialGenerator::generate_initials($comment->user->name) }}</span>
            </div>
        @endif

        {{ $comment->body }}
    </div>
    @foreach($comment->replies as $reply)
        <div class="pb-2">
            @if($reply->user->role == 1)
                <div class="circle_comment">
                    <span class="circle_comment__content">{{ InitialGenerator::generate_initials($reply->user->name) }}</span>
                </div>
            @else
                <div class="circle_comment-tr">
                    <span class="circle_comment-tr__content">{{ InitialGenerator::generate_initials($reply->user->name) }}</span>
                </div>
            @endif
            {{ $reply->body }}
        </div>
    @endforeach
    <div class="pb-4">
        <form method="post" action="{{ route('reply.store') }}">
            @csrf
            <div class="form-group mt-2">
                <input type="text" name="body" class="form-control form-control-sm" required />
                <input type="hidden" name="question_id" value="{{ $question->id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input id="round-button-2" type="submit" class="btn btn-warning btn-sm float-right" value="Reply" />
            </div>
        </form>
    </div>
@empty
    <div class="d-flex justify-content-center">
        <p>No answer yet!</p>
    </div>
@endforelse
