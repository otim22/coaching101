@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row">
            @if($searchResults->count() === 0)
                <div class="col-lg-12 col-md-12 col-sm-12 mb-4 mt-4">
                    <h4>Sorry, no results found for "{{ request('query') }}"</h4>
                </div>
            @else
            <div class="col-lg-12 col-md-12 col-sm-12 mb-4 mt-4">
                <h4>{{ $searchResults->count() }} results for "{{ request('query') }}"</h4>
            </div>
            @endif
        </div>

        <div class="row">
            @if($searchResults->count())
            <div class="col-md-3 col-12 mb-3">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                        <form class="" action="index.html" method="post">
                            <h5 class="pt-3 bold">Sort by:</h5>
                            <h6 class="pt-3 bold">Category</h6>
                            <hr />
                            <div class="limit-category-items">
                                <input type='checkbox' id='category-show-all'>
                                <label for='category-show-all' class='category-text-show'>More</label>
                                <label for='category-show-all' class='category-text-hide'>Less</label>

                                <div class="category-items pl-3">
                                    @foreach($categories as $category)
                                        <div class="form-group" id="unique-category">
                                            <input type="checkbox" class="form-check-input" id="{{ $category->id }}">
                                            <label class="form-check-label" for="{{ $category->id }}">{{ $category->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <h6 class="pt-3 bold">Year</h6>
                            <hr />
                            <div class="limit-level-items">
                                <input type='checkbox' id='level-show-all'>
                                <label for='level-show-all' class='level-text-show'>More</label>
                                <label for='level-show-all' class='level-text-hide'>Less</label>

                                <div class="level-items pl-3">
                                    <div class="form-group" id="unique-level">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Senior one</label>
                                    </div>
                                    <div class="form-group"  id="unique-level">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Senior two</label>
                                    </div>
                                    <div class="form-group" id="unique-level">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Senior three</label>
                                    </div>
                                    <div class="form-group" id="unique-level">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Senior four</label>
                                    </div>
                                    <div class="form-group" id="unique-level">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Senior five</label>
                                    </div>
                                    <div class="form-group" id="unique-level">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Senior six</label>
                                    </div>
                                </div>
                            </div>

                            <h6 class="pt-3 bold">Term</h6>
                            <hr />
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Term one</label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Term two</label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Term three</label>
                            </div>

                            <h6 class="pt-3 bold">Price</h6>
                            <hr />
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Free</label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Paid</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-12">
                <div class="row">
                    @foreach($searchResults as $search)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <div class="card">
                                <a href="{{ route('subjects.index', $search->searchable->slug) }}" style="text-decoration: none">
                                    <img src="{{ $search->searchable->image_thumb}}" alt="{{ $search->searchable->very_short_title }}" width="100%" height="130">
                                </a>
                                <div class="card-body card-body_custom">
                                    <a href="{{ route('subjects.index', $search->searchable->slug) }}" style="text-decoration: none" class="title-font">
                                        <span class="bold">{{ $search->searchable->very_short_title }}</span><br />
                                        <span class="author-font">{{$search->searchable->creator->name }}</span>
                                        <div class="rating">
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg class="bi bi-star-half" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M5.354 5.119L7.538.792A.516.516 0 018 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0116 6.32a.55.55 0 01-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 01-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 01-.171-.403.59.59 0 01.084-.302.513.513 0 01.37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 01.163-.505l2.906-2.77-4.052-.576a.525.525 0 01-.393-.288L8.002 2.223 8 2.226v9.8z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="title-font">(1000)</span>
                                        </div>
                                        <span class="bold">UGX {{ number_format($search->searchable->price) }}/-</span>
                                    </a>
                                    <div class="mt-2 d-flex justify-content-between">
                                        <livewire:add-to-cart :subject="$search->searchable" :key="$search->searchable->id" />
                                        <livewire:add-to-wish-list :subject="$search->searchable" :key="$search->searchable->id" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>
            @endif
        </div>
    </div>
</section>

<section class="bg-white">
    @include('partials.categories')
</section>

@endsection
