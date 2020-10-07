<div>
    <h4 class="mb-4">My available subjects</h4>
    @forelse($subjects as $subject)
    <a href="{{ route('subjects.show', $subject) }}" style="text-decoration: none">
        <div class="card mb-4" style="max-height: 120px;">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <img src="{{ $subject->cover_image_thumb }}" class="card-img" alt="subject image" height="118px">
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <h5 class="card-title">  {{ $subject->title }}</h5>
                        <p class="card-text">Edit / Manage your subjects</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    @empty
    <p>No available subjects</p>
    @endforelse
    <div class="mt-5">
        {!! $subjects->links() !!}
    </div>
</div>
