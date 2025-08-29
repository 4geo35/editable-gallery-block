<?php

namespace GIS\EditableGalleryBlock\Helpers;

use GIS\EditableGalleryBlock\Interfaces\GalleryBlockRecordInterface;

class GalleryBlockRenderActionsManager
{
    public function expandGalleryBlockRecord(GalleryBlockRecordInterface $record): void
    {
        $record->load("images");
    }
}
