<div>
    <h4 class="mb-4 bold">My available subjects</h4>
    @forelse($subjects as $subject)
        <div class="diff-content-card mb-4">
            <div>
                <a href="{{ route('subjects.show', $subject) }}" style="text-decoration: none">
                    <img src="{{ $subject->image_thumb }}" alt="subject image" width="140" height="140">
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
                            <button type="button" class="btn btn-secondary btn-sm mr-4" data-dismiss="modal">Cancel</button>
                            {!! Form::open(['route' => ['subjects.destroy', $subject], 'method' => 'delete']) !!}
                                <button type="submit" class="btn btn-primary btn-sm">Understood</button>
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
