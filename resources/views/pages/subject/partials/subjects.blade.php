<div>
    <h4 class="mb-4">My available subjects</h4>
    @forelse($subjects as $subject)
        <div class="card mb-4" style="max-height: 120px;">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <a href="{{ route('subjects.show', $subject) }}" style="text-decoration: none">
                        <img src="{{ $subject->cover_image_thumb }}" class="card-img" alt="subject image" height="118px">
                    </a>
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <h5 class="card-title">  {{ $subject->short_title }}</h5>
                        <p class="card-text">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="{{ route('subjects.show', $subject) }}" style="text-decoration: none">
                                        Edit / Manage your subject
                                    </a>
                                </div>
                                <div class="red_color">
                                    <button class="btn btn-danger btn-sm"
                                                    type="button"
                                                    data-toggle="modal"
                                                    data-target="#staticBackdrop">
                                        Delete
                                    </button>
                                </div>
                            </div>
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
                            Do you really want to delete this subject? This process will also delete all topics related to the subject and cannot be undone.
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
            </div>
        </div>
    @empty
    <p>No available subjects</p>
    @endforelse
    <div class="mt-5">
        {!! $subjects->links() !!}
    </div>
</div>
