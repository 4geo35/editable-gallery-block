<?php

namespace GIS\EditableGalleryBlock\Livewire\Admin\Types;

use GIS\EditableBlocks\Traits\CheckBlockAuthTrait;
use GIS\EditableBlocks\Traits\EditBlockTrait;
use GIS\EditableBlocks\Traits\PlaceholderBlockTrait;
use GIS\EditableGalleryBlock\Interfaces\GalleryBlockRecordInterface;
use GIS\EditableGalleryBlock\Models\GalleryBlockRecord;
use Illuminate\View\View;
use Livewire\Component;

class GalleryWire extends Component
{
    use EditBlockTrait, CheckBlockAuthTrait, PlaceholderBlockTrait;

    public bool $displayData = false;
    public bool $displayDelete = false;

    public int|null $itemId = null;
    public string $title = "";
    public string $description = "";
    public bool $isVertical = false;
    public bool $showSignatures = false;

    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string', 'max:255'],
            "description" => ["nullable", "string"],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'title' => 'Заголовок',
            "description" => "Описание",
        ];
    }

    public function render(): View
    {
        $items = $this->block->items()->with("recordable")->orderBy("priority")->get();
        return view('egb::livewire.admin.types.gallery-wire', compact('items'));
    }

    public function closeData(): void
    {
        $this->resetFields();
        $this->displayData = false;
    }

    public function showCreate(): void
    {
        $this->resetFields();
        if (! $this->checkAuth("create")) { return; }
        $this->displayData = true;
    }

    public function store(): void
    {
        if (! $this->checkAuth("create")) { return; }
        $this->validate();

        $galleryRecordModelClass = config("editable-gallery-block.customGalleryBlockRecordModel") ?? GalleryBlockRecord::class;
        $record = $galleryRecordModelClass::create([
            "description" => $this->description,
            "is_vertical" => $this->isVertical ? now() : null,
            "show_signatures" => $this->showSignatures ? now() : null,
        ]);
        /**
         * @var GalleryBlockRecordInterface $record
         */
        $record->item()->create([
            "title" => $this->title,
            "block_id" => $this->block->id,
        ]);

        $this->closeData();
        session()->flash("item-{$this->block->id}-success", "Элемент успешно добавлен");
    }

    public function showEdit(int $id): void
    {
        $this->resetFields();
        $this->itemId = $id;
        $item = $this->findModel();
        if (! $item) { return; }
        if (! $this->checkAuth("update", true)) { return; }
        $record = $item->recordable;

        $this->title = $item->title;
        $this->description = $record->description;
        $this->isVertical = (bool) $record->is_vertical;
        $this->showSignatures = (bool) $record->show_signatures;

        $this->displayData = true;
    }

    public function update(): void
    {
        $item = $this->findModel();
        if (! $item) { return; }
        if (! $this->checkAuth("update", true)) { return; }
        $record = $item->recordable;
        /**
         * @var GalleryBlockRecordInterface $record
         */
        $this->validate();
        $record->update([
            "description" => $this->description,
            "is_vertical" => $this->isVertical ? now() : null,
            "show_signatures" => $this->showSignatures ? now() : null,
        ]);
        $item->update([
            "title" => $this->title,
        ]);

        $this->closeData();
        session()->flash("item-{$this->block->id}-success", "Элемент успешно обновлен");
    }

    protected function resetFields(): void
    {
        $this->reset("itemId", "title", "description", "isVertical", "showSignatures");
    }
}
