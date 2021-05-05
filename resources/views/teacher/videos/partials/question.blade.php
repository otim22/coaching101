<form action="{{ route('question.store') }}" method="post">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title bold" id="askingAQuestionLabel">Ask a question here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="mb-3">
            <p class="bold">Tips on getting your questions answered faster</p>
            <ul>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 18 18">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg>
                    Search to see if your question has been asked before
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 18 18">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg>
                    Be detailed; on point, or other clues whenever possible
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 18 18">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg>
                    Check grammar and spelling
                </li>
            </ul>
        </div>
        <div class="form-group mb-4">
            <label for="body" class="bold">Your Question</label>
            <textarea class="form-control @error('body') is-invalid @enderror"
                                name="body"
                                placeholder="Example: What is air composed of?"
                                rows="3"
                                required>{{ old('body') }}
            </textarea>
            @error('body')
                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="hidden" id="subject_id" name="subject_id" value="{{ $subject->id }}">
        </div>
    </div>
    <div class="modal-footer">
        <button id="round-button-2" type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button id="round-button-2" type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
</form>
