<div>
    <div id="displayed-questions" class="mb-3">
        @foreach($questions as $question)
            @if($question->subject_id == $subject->id)
                @if(count($questions->where('subject_id', $subject->id)) >= 10)
                    <form action="{{ route('search') }}" method="GET" class="form-inline question-search mb-4">
                        <div class="input-group space-bottom">
                            <input type="text" name="query" class="form-control" placeholder="Search for all questions...">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit" id="question-search-button">
                                    <svg class="bi bi-search question-search-svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                @endif

                <h5 class="bold mb-4">All questions in this course ({{ count($questions->where('subject_id', $subject->id)) }})</h5>
                <p type="button" data-toggle="modal" data-target="#singleQuestion{{ $question->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 18 18">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg>
                    {{ $question->body }}
                </p>

                <div class="modal fade" id="singleQuestion{{ $question->id }}" tabindex="-1" aria-labelledby="askingAQuestionLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <form action="{{ route('comment.store') }}" method="post">
                                    @csrf
                                    <div class="modal-header">
                                        <p class="bold">{{ $question->body }}</p>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @forelse($comments as $comment)
                                            <div class="mb-3">
                                                {{ $comment->body }}
                                            </div>
                                        @empty
                                            <div class="d-flex justify-content-center">
                                                <p>No answer yet!</p>
                                            </div>
                                        @endforelse
                                        <div class="form-group mb-4">
                                            <label for="body" class="bold">Add reply</label>
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
                                    </div>
                                    <div class="modal-footer">
                                        <button id="round-button-2" type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        <button id="round-button-2" type="submit" class="btn btn-primary btn-sm">Submit</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            @endif
        @endforeach
        <button id="round-button-2" type="button" class="btn btn-secondary btn-outline btn-sm mt-4" data-toggle="modal" data-target="#askingAQuestion">Ask a new question</button>
    </div>

    <div class="modal fade" id="askingAQuestion" tabindex="-1" aria-labelledby="askingAQuestionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
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
            </div>
        </div>
    </div>
</div>
