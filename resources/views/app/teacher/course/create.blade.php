@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="mb-4">
                    <h5 class="side-font mb-3">Plan your course</h5>
                    <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                <a href="#">
                                    Tailor for your students
                                </a>
                            </label>
                    </div>
                    <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                <a href="#">
                                    Course structure
                                </a>
                            </label>
                    </div>
                    <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                <a href="#">
                                    Setup & test video
                                </a>
                            </label>
                    </div>
                </div>
                <div class="mb-4">
                    <h5 class="side-font mb-3">Create your content</h5>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            <a href="#">Film & edit</a>
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            <a href="#">Curriculum</a>
                        </label>
                    </div>
                </div>
                <div class="mb-4">
                    <h5 class="side-font mb-3">Publish your course</h5>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            <a href="#">Course landing page</a>
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            <a href="#">Pricing</a>
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            <a href="#">Promotions</a>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            <a href="#">Course messages</a>
                        </label>
                    </div>
                <button type="button"class="btn btn-primary mt-5" name="button">Submit for review</button>
            </div>
        </div>
        <div class="col-sm-12 col-md-9 col-lg-9 fast-transition">
            <p>Test</p>
        </div>
    </div>
</section>
@endsection
