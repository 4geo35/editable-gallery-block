@props(["item"])
@php
    $hasDescription = (bool) $item->recordable->description;
@endphp
<div>
    @if ($item->title)
        <x-tt::h3 class="mb-indent-half">{{ $item->title }}</x-tt::h3>
    @endif
    @if ($hasDescription)
        <div class="prose max-w-none mb-indent">
            {!! $item->recordable->markdown !!}
        </div>
    @endif
    <div class="row">
        @foreach($item->recordable->orderedImages as $image)
            <div class="col w-1/2 xl:w-1/3 mb-indent">
                <a data-fslightbox="lightbox-{{ $item->id }}" href="{{ route('thumb-img', ['template' => 'original', 'filename' => $image->file_name]) }}">
                    <img src="{{ route('thumb-img', ['template' => 'gallery-record', 'filename' => $image->file_name]) }}" alt="" class="rounded-base">
                </a>
            </div>
        @endforeach
    </div>
</div>
