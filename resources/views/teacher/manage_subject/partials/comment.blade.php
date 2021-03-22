<form action="{{ route('comment.store') }}" method="post">
    @csrf
    <div class="form-group mb-3 mt-3">
        <label for="body" class="bold">Add comment</label>
        <textarea class="form-control @error('body') is-invalid @enderror"
                            name="body"
                            placeholder="Example: Air is composed of Oxygen, Carbondioxide"
                            rows="3"
                            required>{{ old('body') }}
        </textarea>
        @error('body')
            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <input type="hidden" name="question_id" value="{{ $question->id }}" />
    </div>
    <div>
        <button id="round-button-2" type="submit" class="btn btn-primary btn-sm float-right mb-3">Comment</button>
    </div>
</form>
