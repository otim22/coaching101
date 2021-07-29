<div class="container ">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <h4 class="bold dark-blue_color-2">Our popular teachers</h4>
        </div>
        @foreach($teachers as $teacher)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <a href="{{ route('teachers.index', $teacher->user->slug) }}" style="text-decoration:none;">
                    <div class="card mb-4">
                        <div class="row no-gutters">
                            <div class="col-4">
                                @if($teacher->getFirstMediaUrl('profile'))
                                    <img src="{{ asset($teacher->getFirstMediaUrl('profile')) }}" width="120" height="80" alt="{{ $teacher->user->name }}">
                                @else
                                    <img src="{{ asset('/images/no-image.jpeg') }}" width="120" height="80" alt="{{ $teacher->user->name }}">
                                @endif
                            </div>
                            <div class="col-8">
                                <div class="card-body" style="padding: 1.1rem 0rem 0rem 1rem;">
                                    <span class="bold mb-2">{{ $teacher->user->name }}</span>
                                    <p>{{ $teacher->category->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
