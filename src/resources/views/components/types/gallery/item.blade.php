@props(["item"])
@php
    $hasDescription = (bool) $item->recordable->description;
    $grid = $item->recordable->is_vertical ? 'w-1/2 xs:w-1/3 lg:w-1/4 xl:w-1/5' : 'w-1/2 lg:w-1/3 xl:w-1/4';
@endphp
<div>
    @if ($item->title)
        <x-tt::h3 class="mb-indent-half">{{ $item->title }}</x-tt::h3>
    @endif
    @if ($hasDescription)
        <div class="row mb-indent">
            <div class="col w-full lg:w-2/3">
                <div class="prose max-w-none">
                    {!! $item->recordable->markdown !!}
                </div>
            </div>
            @if ($item->recordable->cover)
                <div class="col w-full lg:w-1/3 hidden lg:block">
                    <a data-fslightbox="lightbox-{{ $item->recordable->cover->id }}" href="{{ route('thumb-img', ['template' => 'original', 'filename' => $item->recordable->cover->file_name]) }}">
                        <img src="{{ route('thumb-img', ['template' => 'gallery-record-right', 'filename' => $item->recordable->cover->file_name]) }}" alt="" class="rounded-base">
                    </a>
                </div>
            @endif
        </div>
    @endif
    <div class="row">
        @foreach($item->recordable->orderedImages as $image)
            <div class="col {{ $grid }} {{ $loop->first && $hasDescription ? 'lg:hidden' : '' }} mb-indent">
                <x-egb::item.image :$item :$image />
            </div>
        @endforeach
    </div>
</div>
