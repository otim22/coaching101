<div class="fast-transition mb-3">
    <div class="row m-2 pt-2">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3>Subject outline</h3><hr />
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12">
            <p>
                Start putting together your subject by creating sections, lectures and practice (quizzes, coding exercises and assignments).
                If you’re intending to offer your subject for free, the total length of video content must be less than 2 hours.
            </p>
        </div>
    </div>

    <div class="row m-2">
        <form action="{{ url('subject_outline_submission') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card card-body">
                    <div class="form-group">
                        <div class="float-right">
                            <p class="btn btn-secondary btn-sm" type="button">
                                <span class="mr-1">
                                    <svg class="bi bi-trash" width="1.3em" height="1.3em" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </span>
                                Remove topic
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content_title">Topic title</label>
                        <input type="text"
                                    class="form-control @error('content_title') is-invalid @enderror"
                                    id="content_title"
                                    placeholder="Your topic title"
                                    aria-label="Your content title"
                                    aria-describedby="content_title"
                                    name="content_title">
                        @error('content_title')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content_file_path">Content files</label>
                        <div class="custom-file">
                            <input type="file"
                                        id="content_file_path"
                                        class="custom-file-input @error('content_file_path') is-invalid @enderror"
                                        name="content_file_path">
                            <label class="custom-file-label" for="content_file_path">Choose file</label>
                            @error('content_file_path')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content_description">Content description</label>
                        <textarea type="text"
                                            id="content_description"
                                            rows="3"
                                            class="form-control @error('content_description') is-invalid @enderror"
                                            placeholder="Include a description. What students will be able to do after completing the class."
                                            name="content_description">
                        </textarea>
                        @error('content_description')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" form-group">
                        <label for="resource_attachment_path">Resource attachments</label>
                        <div class="controls">
                            <div class="entry input-group mb-2">
                                <div class="resource_attachment_input">
                                    <input type="file" class="form-control-file @error('resource_attachment_path.0') is-invalid @enderror"
                                                                        id="resource_attachment_path"
                                                                        name="resource_attachment_path[]">
                                </div>
                                <div>
                                    <p class="btn btn-upload btn-success  btn-sm btn-add pr-3" type="button">
                                        <svg width="1.8em" height="1.8em" viewBox="0 0 16 20" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>
                                        Add
                                    </p>
                                </div>
                            </div>
                        </div>
                        @error('resource_attachment_path.0')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                      </div>
                      <small id="emailHelp" class="form-text text-muted">
                          <strong>Note:</strong>  A resource is for any type of document that can be used to help students in the class. This file is going to be more like an extra class. Make sure everything the file size is less than 500 MB.
                      </small>

                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 mt-5">
                <div class="d-flex justify-content-end">
                    <div>
                        <p type="button">
                            <span class="mr-1 ">
                                <svg class="bi bi-plus-circle" width="1.4em" height="1.4em" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                </svg>
                            </span>
                            Add topic
                        </p>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm ml-5 pl-4 pr-4">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/subject_outline.js')}}" type="text/javascript"></script>
@endpush

@prepend('scripts')
    <script src="{{ asset('vendor/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/js/popper.min.js') }}" type="text/javascript"></script>
@endprepend
