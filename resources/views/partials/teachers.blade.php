<div class="container ">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <h4 class="bold">Our popular teachers</h4>
        </div>
        @foreach($teachers as $teacher)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <a href="{{ route('teachers.index', $teacher->slug) }}" style="text-decoration:none;">
                    <div class="card mb-3" style="max-width: 340px;">
                        <div class="row no-gutters">
                            <div class="col-4">
                                <img src="{{ asset($teacher->getFirstMediaUrl('avatars', 'thumb')) }}" class="card-img" width="100%" height="100%" alt="{{ $teacher->name }}">
                            </div>
                            <div class="col-8">
                                <div class="card-body" style="padding: 0.5rem 0rem 0rem 1rem;">
                                    <span class="bold">{{ $teacher->name }}</span>
                                    <p>Mathematics</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
