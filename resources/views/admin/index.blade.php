@extends('admin.layouts.master')

@section('content')

<div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100">
    <!-- main content -->
    <div class="container-fluid">
        <div class="row font-1">
            <div class="col-lg-4">
                <div class="card card-body flex-row align-items-center">
                    <h5 class="m-0"><i class="material-icons align-middle text-muted md-18">people</i> Total users</h5>
                    <div class="text-primary ml-auto">{{ number_format($userCount) }}</div>
                </div>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.students.index') }}" style="text-decoration: none;">
                    <div class="card card-body flex-row align-items-center">
                        <h5 class="m-0"> Students</h5>
                        <div class="text-primary ml-auto">{{ number_format($studentCount) }}</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.teachers.index') }}" style="text-decoration: none;">
                    <div class="card card-body flex-row align-items-center">
                        <h5 class="m-0"> Teachers</h5>
                        <div class="text-primary ml-auto">{{ number_format($teacherCount) }}</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="card card-body p-2">
            <div class="row row-projects">
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="{{ route('admin.subjects.index') }}" style="text-decoration: none;">
                        <i class="material-icons text-link-color md-36">video_library</i>
                        <div class="mb-1"><h5>Video subjects</h5></div>
                        <h4 class="mb-2">{{ number_format($subjectCount) }}</h4>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="{{ route('admin.books.index') }}" style="text-decoration: none;">
                        <i class="material-icons text-success md-36">import_contacts</i>
                        <div class="mb-1"><h5>Books</h5></div>
                        <h4 class="mb-2">{{ number_format($bookCount) }}</h4>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="{{ route('admin.notes.index') }}" style="text-decoration: none;">
                        <i class="material-icons text-warning md-36">chrome_reader_mode</i>
                        <div class="mb-1"><h5>Notes</h5></div>
                        <h4 class="mb-2">{{ number_format($noteCount) }}</h4>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="{{ route('admin.pastpapers.index') }}" style="text-decoration: none;">
                        <i class="material-icons text-primary md-36">insert_drive_file</i>
                        <div class="mb-1"><h5>Past papers</h5></div>
                        <h4 class="mb-2">{{ number_format($pastpaperCount) }}</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
