<template>
    <div class="container p-4">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h3>Subject introduction</h3>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12  mt-4">
                <form action="{{ url('introduction_submission') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="subject_title">Subject title</label>
                        <div class="input-group">
                            <input type="text"
                                        class="form-control"
                                        id="subject_title"
                                        placeholder="Your subject title"
                                        aria-label="Your subject title"
                                        aria-describedby="subject_title"
                                        name="introduction.subject_title" required>
                            <div class="input-group-append mb-2">
                                    <span class="input-group-text" id="subject_title">50</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subtitle">Subject sub-title</label>
                        <div class="input-group">
                            <input type="text"
                                        class="form-control"
                                        id="subject_subtitle"
                                        placeholder="Write your sub-title"
                                        aria-label="Write your sub-title"
                                        aria-describedby="subject_subtitle"
                                        name="introduction.subject_subtitle">
                            <div class="input-group-append mb-2">
                                <span class="input-group-text" id="subject_subtitle">100</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Subject description</label>
                        <textarea type="text"
                                    class="form-control mb-2"
                                    id="description"
                                    rows="3"
                                    placeholder="Description of the subject"
                                    name="introduction.subject_description" required />
                    </div>

                    <div class="form-group">
                        <label for="resource">Cover image</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file"
                                            class="custom-file-input"
                                            aria-describedby="custom-file-input" required>
                                <label class="custom-file-label" for="select-file">
                                    <p>No image added</p>
                                </label>
                            </div>
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary btn-block btn-md mt-5">Save</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "subject-introduction",
}
</script>
