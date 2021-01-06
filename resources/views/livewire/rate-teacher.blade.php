<div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <h4 class="mt-4 mb-3 bold">Leave a rating for your teacher</h4>
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
                        <input type="radio" wire:model="rating" id="rate-5" value="5">
                        <label for="rate-5" class="fa fa-star"></label>

                        <input type="radio" wire:model="rating" id="rate-4" value="4">
                        <label for="rate-4" class="fa fa-star"></label>

                        <input type="radio" wire:model="rating" id="rate-3" value="3">
                        <label for="rate-3" class="fa fa-star"></label>

                        <input type="radio" wire:model="rating" id="rate-2" value="2">
                        <label for="rate-2" class="fa fa-star"></label>

                        <input type="radio" wire:model="rating" id="rate-1" value="1">
                        <label for="rate-1" class="fa fa-star"></label>

                        <header></header>
                    </div>
                    @error('rating') <span class="error error-message">{{ $message }}</span> @enderror

                    <div>
                        <input type="hidden" wire:model="user_id" value="{{ $this->user->id }}">

                        <input type="hidden" wire:model="subject_id" value="{{ $subject['id'] }}">
                    </div>


                    <div class="textarea pt-3 pb-2">
                        <textarea wire:model="comment" cols="30" placeholder="Describe your experience.."></textarea>
                    </div>
                    @error('comment') <span class="error error-message">{{ $message }}</span> @enderror

                    <div class="pt-4 pb-3">
                        <button  type="submit" id="round-button-2" class="btn btn-secondary btn-block rate-button">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
        <ul>
            @foreach($studentRatings as $rating)
            <li  class="mb-3">
                <span>{{ $rating->comment }}</span><br />
                <span><small>By {{ \App\Models\User::where('id', $rating->user_id)->first()->name }}</small></span>
            </li>
            @endforeach
            <div class="pt-3">
                {{ $studentRatings->links() }}
            </div>
        </ul>
    </div>
</div>
