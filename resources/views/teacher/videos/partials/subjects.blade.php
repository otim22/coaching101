<div>
    <div class="d-flex justify-content-between mb-4">
        <div>
            <h4 class="mb-3 bold">My available video subjects</h4>
        </div>
        <div>
            <a id="round-button-2" class="btn btn-primary" type="button" href="{{ route('subjects') }}">
                <svg width="1.3em" height="1.3em" viewBox="0 0 20 20" class="bi bi-layout-sidebar" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M14 2H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z"/>
                    <path fill-rule="evenodd" d="M4 14V2h1v12H4z"/>
                </svg>
                Create video subject
            </a>
        </div>
    </div>
    @forelse($subjects as $subject)
        <div class="diff-content-card mb-4">
            <div>
                <a href="{{ route('subjects.show', $subject) }}" style="text-decoration: none">
                    <img src="{{ $subject->cover_image }}" alt="subject image" width="140" height="140">
                </a>
            </div>

            <div class="description">
                <div class="d-flex justify-content-between">
                    <div class="mr-4">
                        <h5>  {{ $subject->short_title }}</h5>
                    </div>
                    <div>
                        @if($subject->is_approved)
                            <span class="badge badge-success">Approved</span>
                        @else
                            <span class="badge badge-warning">Pending</span>
                        @endif
                    </div>
                </div>
                <div>
                    <a href="{{ route('subjects.show', $subject) }}" style="text-decoration: none">
                        Edit / Manage your subject
                    </a>
                </div>
                <p type="button" class="red_color bold mt-2" data-toggle="modal" data-target="#staticBackdrop{{ $subject->id }}">
                    <i class="fa subject-avail-icon fa-trash mr-4"></i> Delete
                </p>
            </div>

            <!-- Confirm Deletion Modal -->
            <div class="modal fade" id="staticBackdrop{{ $subject->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title bold" id="staticBackdropLabel">Are you sure?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Do you really want to delete this subject? This process will delete the subject with all the topics inclusive and cannot be undone.
                        </div>
                        <div class="modal-footer">
                            <button id="round-button-2" type="button" class="btn btn-secondary btn-sm mr-2" data-dismiss="modal">Cancel</button>
                            {!! Form::open(['route' => ['subjects.destroy', $subject], 'method' => 'delete']) !!}
                                <button id="round-button-2" type="submit" class="btn btn-danger btn-sm">Understood</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
    <div>
        <hr />
        <p>No available subjects</p>
    </div>
    @endforelse

    <div class="mt-5">
        {!! $subjects->links() !!}
    </div>
</div>
