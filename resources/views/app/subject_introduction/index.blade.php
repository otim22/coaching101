<div class="fast-transition">
    <div class="row m-2 pt-2">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3>Subject introduction</h3> <hr />
        </div>
    </div>
    <div class="row m-2 pb-2">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <form action="{{ url('introduction_submission') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Subject title</label>
                    <div class="input-group">
                        <input type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    placeholder="Your subject title"
                                    aria-label="Your subject title"
                                    aria-describedby="title"
                                    name="title"
                                    value="{{ old('title') }}" required>
                        <div class="input-group-append mb-2">
                            <span class="input-group-text">50</span>
                        </div>
                    </div>
                    @error('title')
                    <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subtitle">Sub title</label>
                    <div class="input-group">
                        <input type="text"
                                    class="form-control @error('subtitle') is-invalid @enderror"
                                    id="subtitle"
                                    placeholder="Write your sub title"
                                    aria-label="Write your sub title"
                                    aria-describedby="subtitle"
                                    name="subtitle">
                        <div class="input-group-append mb-2">
                            <span class="input-group-text">100</span>
                        </div>
                        @error('subtitle')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description of the subject" name="description" rows="3" required></textarea>
                    @error('description')
                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cover_image">Cover Image</label>
                    <input type="file" name="cover_image" class="form-control-file" id="cover_image" required>
                    @error('cover_image')
                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-md mt-5">Save</button>
            </form>
        </div>
    </div>
</div>
