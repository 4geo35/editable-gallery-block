<?php

namespace GIS\EditableGalleryBlock\Models;

use GIS\EditableBlocks\Traits\ShouldBlockItem;
use GIS\EditableGalleryBlock\Interfaces\GalleryBlockRecordInterface;
use GIS\Fileable\Traits\ShouldGallery;
use Illuminate\Database\Eloquent\Model;

class GalleryBlockRecord extends Model implements GalleryBlockRecordInterface
{
    use ShouldBlockItem, ShouldGallery;

    protected $fillable = [
        "description",
    ];
}
