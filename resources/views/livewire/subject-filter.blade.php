@if(!empty($subjects))
<div class="row">
        @foreach($subjects as $subject)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <a href="{{ route('subjects.show', $subject->slug) }}" style="text-decoration: none">
                    <div class="card mb-4">
                        <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none">
                            <img src="{{ $subject->image_thumb}}" alt="{{ $subject->very_short_title }}" width="100%" height="150">
                        </a>
                        <div class="card-body card-body_custom">
                            <a href="{{ route('subjects.index', $subject->slug) }}" style="text-decoration: none" class="title-font">
                                <span class="bold">{{ $subject->very_short_title }}</span><br />
                                <span class="author-font">By {{$subject->creator->name }}</span><br />
                                <span class="author-font">cat {{$subject->category_id }}</span><br />
                                <span class="author-font">Year {{$subject->year_id }}</span>
                                @if($subject->averageRating)
                                    <div class="star-display">
                                        @for($i = 0; $i <= $subject->averageRating; $i++)
                                            <label for="rate-{{$i}}" class="fa fa-star"></label>
                                        @endfor
                                        <span class="author-font">({{ $subject->getSubscriptionCount() }}) students</span>
                                    </div>
                                @else
                                <div class="rating">
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <span class="author-font ml-2">({{ $subject->getSubscriptionCount() }}) students</span><br />
                                </div>
                                @endif

                                @if($subject->price)
                                    <span class="bold">UGX {{ number_format($subject->price) }}/-</span>
                                @else
                                    <span class="bold paid_color">Free</span>
                                @endif
                            </a>
                            <div class="mt-2 d-flex justify-content-between">
                                <livewire:add-to-cart :subject="$subject" :key="$subject->id" />
                                <livewire:add-to-wish-list :subject="$subject" :key="$subject->id" />
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @else
    <div class="col-lg-12 col-md-12 col-sm-12">
        <p class="text-center" >No Subjects found.</p>
    </div>
</div>
@endif
