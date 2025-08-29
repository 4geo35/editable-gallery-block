<?php

namespace GIS\EditableGalleryBlock\Observers;
use GIS\EditableGalleryBlock\Interfaces\GalleryBlockRecordInterface;

class GalleryBlockRecordObserver
{
    public function updated(GalleryBlockRecordInterface $record): void
    {
        $item = $record->item;
        if (! $item) { return; }
        $item->touch();
    }
}
