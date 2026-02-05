<div>
    <h3 class="text-2xl font-medium mb-indent-half">{{ $item->title }}</h3>
    <div class="prose max-w-[952px] mb-indent-half">{!! $item->recordable->markdown !!}</div>
    <div class="mb-indent-half">
        <span class="inline-block mr-2 font-semibold">Использовать вертикальную ориентацию изображений:</span>
        <span class="{{ $item->recordable->is_vertical ? 'text-success' : 'text-danger' }}">
            {{ $item->recordable->is_vertical ? 'Да' : 'Нет' }}
        </span>
    </div>
    <div class="">
        <span class="inline-block mr-2 font-semibold">Отображать подписи изображений при выводе:</span>
        <span class="{{ $item->recordable->show_signatures ? 'text-success' : 'text-danger' }}">
            {{ $item->recordable->show_signatures ? 'Да' : 'Нет' }}
        </span>
    </div>
</div>
