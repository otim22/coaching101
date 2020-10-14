<div>
    <h4 class="mb-4 bold">My available subjects</h4>
    @forelse($subjects as $subject)
        <div class="diff-content-card mb-4">
            <div>
                <a href="{{ route('subjects.show', $subject) }}" style="text-decoration: none">
                    <img src="{{ $subject->image_thumb }}" alt="subject image" height="140px">
                </a>
            </div>

            <div class="description">
                <h5>  {{ $subject->short_title }}</h5>
                <div>
                    <a href="{{ route('subjects.show', $subject) }}" style="text-decoration: none">
                        Edit / Manage your subject
                    </a>
                </div>
                <p type="button" class="red_color bold mt-2"data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fa subject-avail-icon fa-trash mr-4"></i> Delete
                </p>
            </div>

            <!-- Confirm Deletion Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Are you sure?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Do you really want to delete this subject? This process will delete the subject with all the topics inclusive and cannot be undone.
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            {!! Form::open(['route' => ['subjects.destroy', $subject],
                                    'method' => 'delete',
                                    'data-confirmation-text' => __('Are you sure to delete :name?', ['title' => $subject->title])
                                ])
                            !!}
                            <button type="submit" href="{{ route('subjects.destroy', $subject) }}" class="btn btn-primary btn-sm">Understood</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
    <p>No available subjects</p>
    @endforelse
    <div class="mt-5">
        {!! $subjects->links() !!}
    </div>
</div>
