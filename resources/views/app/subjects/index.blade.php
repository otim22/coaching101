@extends('layouts.app')

@section('content')

<section class="section-one bg-subject text-white">
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <h4>Heading</h4>
            </div>
        </div>
    </div>
</section>

<section class="section-two">
    <div class="container">
        <div class="row">
          <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <h5>Plan Your Subject</h5>
                <a class="nav-link" id="v-pills-subject-intro-tab" data-toggle="pill" href="#v-pills-subject-intro" role="tab" aria-controls="v-pills-subject-intro" aria-selected="true">Subject introduction</a>
                <a class="nav-link" id="v-pills-subject-structure-tab" data-toggle="pill" href="#v-pills-subject-structure" role="tab" aria-controls="v-pills-subject-structure" aria-selected="false">Subject structure</a>
                <h5 class="mt-3">Create Your Content</h5>
                <a class="nav-link" id="v-pills-film-edit-tab" data-toggle="pill" href="#v-pills-film-edit" role="tab" aria-controls="v-pills-film-edit" aria-selected="false">Film & edit</a>
                <a class="nav-link" id="v-pills-subject-outline-tab" data-toggle="pill" href="#v-pills-subject-outline" role="tab" aria-controls="v-pills-subject-outline" aria-selected="false">Subject outline</a>
                <h5 class="mt-3">Your Audience</h5>
                <a class="nav-link" id="v-pills-target-students-tab" data-toggle="pill" href="#v-pills-target-students" role="tab" aria-controls="v-pills-target-students" aria-selected="false">Target your students</a>
                <a class="nav-link" id="v-pills-subject-messages-tab" data-toggle="pill" href="#v-pills-subject-messages" role="tab" aria-controls="v-pills-subject-messages" aria-selected="false">Subject messages</a>
            </div>
            <div class="mt-5">
                <a type="button" name="button" class="btn btn-outline-secondary">View Subject</a>
            </div>
          </div>
          <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-subject-intro" role="tabpanel" aria-labelledby="v-pills-subject-intro-tab">
                    @include('app.subject_introduction.index')
                </div>
                <div class="tab-pane fade" id="v-pills-subject-structure" role="tabpanel" aria-labelledby="v-pills-subject-structure-tab">
                    @include('app.subject_structure.index')
                </div>
                <div class="tab-pane fade" id="v-pills-film-edit" role="tabpanel" aria-labelledby="v-pills-film-edit-tab">
                    @include('app.film_edit.index')
                </div>
                <div class="tab-pane fade" id="v-pills-subject-outline" role="tabpanel" aria-labelledby="v-pills-subject-outline-tab">
                    @include('app.subject_outline.index')
                </div>
                <div class="tab-pane fade" id="v-pills-target-students" role="tabpanel" aria-labelledby="v-pills-target-students-tab">
                    @include('app.target_students.index')
                </div>
                <div class="tab-pane fade" id="v-pills-subject-messages" role="tabpanel" aria-labelledby="v-pills-subject-messages-tab">
                    @include('app.subject_messages.index')
                </div>
            </div>
          </div>
        </div>
    </div>
</section>

@endsection
