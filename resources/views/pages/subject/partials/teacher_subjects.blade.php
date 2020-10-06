
<div class="fast-transition p-4">
    <h4 class="mb-3">Subjects</h4>
    @foreach($subjects as $subject)
    <a href="{{ route('subjects.show', $subject) }}">
        <div class="card mb-3" style="max-height: 120px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ $subject->getFirstMediaUrl() }}" class="card-img" alt="..." height="120px">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">  {{ $subject->title }}</h5>
                        <p class="card-text">Edit / Manage your course</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>
<div class="mt-5">
    {!! $subjects->links() !!}
</div>
