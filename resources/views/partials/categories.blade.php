<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="bold dark-blue_color-2">Explore top subjects</h3>
        </div>
    </div>
    <div class="row">
        @foreach($topCategories as $category)
            <div class="col-sm-6 col-md-4 col-lg-2 mt-3">
                <a href="{{ route('categories.index', $category->slug) }}" style="text-decoration: none">
                    <div class="top-card make-it-slow text-center pt-2 pb-2">
                        <span class="bold categories-text">{{ $category->name }}</span>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
