<div>
    @if($pastpaper->price)
        @if($pastpaper->isSubscribedTo)
            @if($pastpaper->creator)
                <a href="{{ $pastpaper->getFirstMediaUrl('pastpapers') }}" id="round-button-2"
                                name="button"
                                class="btn btn-outline-secondary btn-sm" target="_blank">
                                View pastpaper
                </a>
            @endif
        @else
            <div class="mt-2 d-flex justify-content-between">
                <livewire:add-to-cart :subject="$pastpaper" />
                <livewire:add-to-wish-list :subject="$pastpaper" />
            </div>
        @endif
    @else
        @if($pastpaper->creator)
            <a href="{{ $pastpaper->getFirstMediaUrl('pastpapers') }}" id="round-button-2"
                            name="button"
                            class="btn btn-outline-secondary btn-sm" target="_blank">
                            View pastpaper
            </a>
        @endif
    @endif
</div>
