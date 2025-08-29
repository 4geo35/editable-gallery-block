@props(["block", "isFullPage" => true])
@if ($block->items->count())
    @if ($block->render_title)
        <x-tt::h2 class="mb-indent-half">{{ $block->render_title }}</x-tt::h2>
    @endif
    <div {{ $attributes->merge(["class" => "flex flex-col gap-indent"]) }}>
        @foreach($block->items as $index => $item)
            @if ($isFullPage) <x-egb::types.gallery.item :$item />
            @else <x-egb::types.gallery.two-thirds-item :$item />
            @endif
        @endforeach
    </div>
@endif
