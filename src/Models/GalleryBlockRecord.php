<?php

namespace GIS\EditableGalleryBlock\Models;

use GIS\EditableBlocks\Traits\ShouldBlockItem;
use GIS\EditableGalleryBlock\Interfaces\GalleryBlockRecordInterface;
use GIS\Fileable\Traits\ShouldGallery;
use GIS\TraitsHelpers\Traits\ShouldMarkdown;
use Illuminate\Database\Eloquent\Model;

class GalleryBlockRecord extends Model implements GalleryBlockRecordInterface
{
    use ShouldBlockItem, ShouldGallery, ShouldMarkdown;

    protected $fillable = [
        "description",
        "is_vertical",
        "show_signatures",
    ];
}
