<div class="container ">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <h4 class="bold">Our popular teachers</h4>
        </div>
        @foreach($teachers as $teacher)
            @if($teacher->profile)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <a href="{{ route('teachers.index', $teacher->slug) }}" style="text-decoration:none;">
                        <div class="card mb-4">
                            <div class="row no-gutters">
                                <div class="col-4">
                                    @if($teacher->profile->getFirstMediaUrl('profile'))
                                        <img src="{{ asset($teacher->profile->getFirstMediaUrl('profile')) }}" width="120" height="80" alt="{{ $teacher->name }}">
                                    @else
                                        <img src="{{ asset('/images/no-image.jpeg') }}" width="120" height="80" alt="{{ $teacher->name }}">
                                    @endif
                                </div>
                                <div class="col-8">
                                    <div class="card-body" style="padding: 1.1rem 0rem 0rem 1rem;">
                                        <span class="bold mb-2">{{ $teacher->name }}</span>
                                        <p>{{ \App\Models\Category::where('id', $teacher->profile->category_id)->firstOrFail()->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
</div>
