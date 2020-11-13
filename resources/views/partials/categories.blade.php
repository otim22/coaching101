<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="bold">Top categories</h3>
        </div>
    </div>
    <div class="row">
        @foreach($topCategories as $topCategory)
        <div class="col-sm-6 col-md-4 col-lg-2 mt-3">
            <a href="{{ route('categories.index', $topCategory) }}" style="text-decoration: none">
                <div class="top-card make-it-slow text-center">
                    <p class="bold">{{ $topCategory->name }}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
