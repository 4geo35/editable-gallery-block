@props(["item", "image"])
@php($template = $item->recordable->is_vertical ? "gallery-record-vertical" : "gallery-record")
<div class="relative h-full min-h-[40px]">
    <a data-fslightbox="lightbox-{{ $item->id }}"
       href="{{ route('thumb-img', ['template' => 'original', 'filename' => $image->file_name]) }}">
        <img src="{{ route('thumb-img', ['template' => $template, 'filename' => $image->file_name]) }}" alt=""
             class="rounded-base">
    </a>
    @if ($item->recordable->show_signatures)
        <div class="absolute bottom-0 w-full rounded-b-base bg-body/60 text-white text-center text-xs sm:text-sm px-indent-sm py-indent-xs truncate">
            {{ $image->name }}
        </div>
    @endif
</div>
