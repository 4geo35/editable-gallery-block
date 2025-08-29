<?php

namespace GIS\EditableGalleryBlock;

use GIS\EditableBlocks\Traits\ExpandBlocksTrait;
use GIS\EditableGalleryBlock\Helpers\GalleryBlockRenderActionsManager;
use GIS\EditableGalleryBlock\Models\GalleryBlockRecord;
use GIS\EditableGalleryBlock\Observers\GalleryBlockRecordObserver;
use GIS\Fileable\Traits\ExpandTemplatesTrait;
use Illuminate\Support\ServiceProvider;
class EditableGalleryBlockServiceProvider extends ServiceProvider
{
    use ExpandBlocksTrait, ExpandTemplatesTrait;

    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->mergeConfigFrom(__DIR__ . "/config/editable-gallery-block.php", 'editable-gallery-block');
        $this->initFacades();
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'egb');
        $this->addLivewireComponents();
        $this->expandConfiguration();

        $galleryRecordClass = config("editable-gallery-block.customGalleryBlockRecordModel") ?? GalleryBlockRecord::class;
        $galleryRecordObserverClass = config("editable-gallery-block.customGalleryBlockRecordModelObserverClass") ?? GalleryBlockRecordObserver::class;
        $galleryRecordClass::observe($galleryRecordObserverClass);
    }

    protected function addLivewireComponents(): void
    {
    }

    protected function expandConfiguration(): void
    {
        $egb = app()->config["editable-gallery-block"];
        $this->expandBlocks($egb);
        $this->expandBlockRender($egb);
        $this->expandTemplates($egb);
    }

    protected function initFacades(): void
    {
        $this->app->singleton("gallery-block-render-actions", function () {
            $managerClass = config("editable-gallery-block.customBlockRenderActionsManager") ?? GalleryBlockRenderActionsManager::class;
            return new $managerClass;
        });
    }
}
