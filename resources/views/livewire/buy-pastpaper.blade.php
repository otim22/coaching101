<div>
    @if($pastpaper->price)
        @if($pastpaper->isSubscribedTo)
            <a href="{{ $pastpaper->getFirstMediaUrl('pastpaper') }}" id="round-button-2"
                            name="button"
                            class="btn btn-outline-danger btn-sm" target="_blank">
                            Download pastpaper
            </a>
        @else
            <button type="button" id="round-button-2"
                            name="button"
                            wire:click="checkout({{ $pastpaper->id }})"
                            class="btn btn-outline-danger btn-sm">
                            Buy pastpaper
            </button>
        @endif
    @else
    <a href="{{ $pastpaper->getFirstMediaUrl('pastpaper') }}" id="round-button-2"
                    name="button"
                    class="btn btn-outline-danger btn-sm" target="_blank">
                    Download pastpaper
    </a>
    @endif
</div>
