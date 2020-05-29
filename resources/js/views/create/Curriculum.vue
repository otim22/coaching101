<template>
    <div class="container p-4">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                <h2>Curriculum</h2>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p>
                    Start putting together your course by creating sections, lectures and practice (quizzes, coding exercises and assignments).
                    If you’re intending to offer your course for free, the total length of video content must be less than 2 hours.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card p-3">
                    <div class="d-flex justify-content-between">
                        <div class="one">
                            <p>
                                Leacture 1:
                                Introduction
                            </p>
                        </div>
                        <div class="one">
                            <a href="#" class="btn btn-secondary btn-sm">
                                <svg class="bi bi-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                </svg>
                                Content
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <a href="#" class="btn btn-secondary btn-sm mt-3">
                    <svg class="bi bi-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                    </svg>
                    New section
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "curriculum",
    props: {
        course: {
            type: Object,
            required: true
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
