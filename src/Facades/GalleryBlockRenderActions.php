<?php

namespace GIS\EditableGalleryBlock\Facades;

use GIS\EditableGalleryBlock\Helpers\GalleryBlockRenderActionsManager;
use GIS\EditableGalleryBlock\Interfaces\GalleryBlockRecordInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void expandGalleryBlockRecord(GalleryBlockRecordInterface $record)
 *
 * @see GalleryBlockRenderActionsManager
 */
class GalleryBlockRenderActions extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return "gallery-block-render-actions";
    }
}
