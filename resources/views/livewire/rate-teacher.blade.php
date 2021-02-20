<div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <h5 class="mt-4 mb-3 bold">Leave a rating for your teacher</h5>
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
                        @for($i = 5; $i >= 0; $i--)
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
