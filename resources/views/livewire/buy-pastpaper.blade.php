<div>
    @if($pastpaper->price)
        @if($pastpaper->isSubscribedTo)
            @if($pastpaper->creator)
                <a href="{{ $pastpaper->getFirstMediaUrl('teacher_pastpaper') }}" id="round-button-2"
                                name="button"
                                class="btn btn-outline-secondary btn-sm" target="_blank">
                                View pastpaper
                </a>
            @else
                <a href="{{ $pastpaper->getFirstMediaUrl('pastpaper') }}" id="round-button-2"
                                name="button"
                                class="btn btn-outline-secondary btn-sm" target="_blank">
                                View pastpaper
                </a>
            @endif
        @else
            <!-- <button type="button" id="round-button-2"
                            name="button"
                            wire:click="checkout({{ $pastpaper->id }})"
                            class="btn btn-outline-danger btn-sm">
                            Buy pastpaper
            </button> -->
            <div class="mt-2 d-flex justify-content-between">
                <livewire:add-to-cart :subject="$pastpaper" />
                <livewire:add-to-wish-list :subject="$pastpaper" />
            </div>
        @endif
    @else
        @if($pastpaper->creator)
            <a href="{{ $pastpaper->getFirstMediaUrl('teacher_pastpaper') }}" id="round-button-2"
                            name="button"
                            class="btn btn-outline-secondary btn-sm" target="_blank">
                            View pastpaper
            </a>
        @else
            <a href="{{ $pastpaper->getFirstMediaUrl('pastpaper') }}" id="round-button-2"
                            name="button"
                            class="btn btn-outline-secondary btn-sm" target="_blank">
                            View pastpaper
            </a>
        @endif
    @endif
</div>
