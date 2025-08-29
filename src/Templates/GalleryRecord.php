<?php

namespace GIS\EditableGalleryBlock\Templates;


use Intervention\Image\Interfaces\ImageInterface;
use Intervention\Image\Interfaces\ModifierInterface;

class GalleryRecord implements ModifierInterface
{
    public function apply(ImageInterface $image): ImageInterface
    {
        return $image->cover(342, 236);
    }
}
