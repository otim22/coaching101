<div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <h5 class="mt-4 mb-3 bold">Leave a rating for your teacher</h5>
        @if($subject->averageRating)
            <div class="star-display mb-3">
                @for($i = $subject->averageRating; $i >= 1; $i--)
                    <label for="rate-{{$i}}" class="fa fa-star"></label>
                @endfor
                @if($subject->isSubscribedTo)
                    <span class="author-font ml-3">({{ $subject->subscriptionCount }}) students</span><br />
                @endif
            </div>
        @else
            <div class="rating mb-2">
                @for($i = 0; $i < 5; $i++)
                    <svg class="bi bi-star-fill" width="0.7em" height="0.7em" viewBox="0 0 16 16" fill="grey" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                @endfor
                @if($subject->isSubscribedTo)
                    <span class="author-font ml-2">({{ $subject->subscriptionCount }}) students</span><br />
                @endif
            </div>
        @endif
        <div>
            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('message') }}
            </div>
            @endif
        </div>
        <form wire:submit.prevent="submit">
            <div class="rate-container">
                <div class="star-widget">
                    <div>
                        @for($i = 5; $i >= 1; $i--)
                            <input type="radio" wire:model="rating" id="rate-{{$i}}" value="{{$i}}">
                            <label for="rate-{{$i}}" class="fa fa-star"></label>
                        @endfor
                        <header></header>
                    </div>
                    @error('rating') <span class="error error-message">{{ $message }}</span> @enderror
                    <div class="pt-4 pb-3">
                        <button  type="submit" id="round-button-2" class="btn btn-secondary btn-block rate-button">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
