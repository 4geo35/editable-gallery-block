<?php

namespace GIS\EditableGalleryBlock\Templates;


use Intervention\Image\Interfaces\ImageInterface;
use Intervention\Image\Interfaces\ModifierInterface;

class GalleryRecordVertical implements ModifierInterface
{
    public function apply(ImageInterface $image): ImageInterface
    {
        return $image->cover( 270, 480);
    }
}
