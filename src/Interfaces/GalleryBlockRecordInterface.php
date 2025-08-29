<?php

namespace GIS\EditableGalleryBlock\Interfaces;

use ArrayAccess;
use GIS\Fileable\Interfaces\ShouldGalleryInterface;
use JsonSerializable;
use Stringable;
use GIS\EditableBlocks\Interfaces\ShouldBlockItemInterface;
use Illuminate\Contracts\Broadcasting\HasBroadcastChannel;
use Illuminate\Contracts\Queue\QueueableEntity;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\CanBeEscapedWhenCastToString;
use Illuminate\Contracts\Support\Jsonable;

interface GalleryBlockRecordInterface extends Arrayable, ArrayAccess, CanBeEscapedWhenCastToString,
    HasBroadcastChannel, Jsonable, JsonSerializable, QueueableEntity, Stringable, UrlRoutable, ShouldBlockItemInterface, ShouldGalleryInterface
{

}
