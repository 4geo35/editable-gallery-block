<?php

return [
    "availableTypes" => [
        "gallery" => [
            "title" => "Галерея",
            "admin" => "egb-gallery",
            "render" => "egb::types.gallery",
        ],
    ],

    "expandRender" => [
        "expandGalleryBlockRecord" => [
            "class" => \GIS\EditableGalleryBlock\Facades\GalleryBlockRenderActions::class,
            "method" => "expandGalleryBlockRecord",
        ],
    ],

    // Admin
    "customGalleryBlockRecordModel" => null,
    "customGalleryBlockRecordModelObserverClass" => null,

    // Manager
    "customBlockRenderActionsManager" => null,

    // Components
    "customGalleryComponent" => null,

    // Templates
    "templates" => [
        "gallery-record" => \GIS\EditableGalleryBlock\Templates\GalleryRecord::class,

        "gallery-record-right" => \GIS\EditableGalleryBlock\Templates\GalleryRecordRight::class,
    ],
];
