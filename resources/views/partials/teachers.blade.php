<div class="container ">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <h4 class="dark-blue_color bold">Our popular teachers</h4>
        </div>
        @foreach($teachers as $teacher)
            @if($teacher->profile)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <a href="{{ route('teachers.index', $teacher->slug) }}" style="text-decoration:none;">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-4">
                                    <img src="{{ asset($teacher->profile->getFirstMediaUrl('profile')) }}" width="150" height="100" alt="{{ $teacher->name }}">
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
