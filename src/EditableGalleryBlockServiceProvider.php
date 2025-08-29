<?php

namespace GIS\EditableGalleryBlock;

use GIS\EditableBlocks\Traits\ExpandBlocksTrait;
use GIS\Fileable\Traits\ExpandTemplatesTrait;
use Illuminate\Support\ServiceProvider;
class EditableGalleryBlockServiceProvider extends ServiceProvider
{
    use ExpandBlocksTrait, ExpandTemplatesTrait;

    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->mergeConfigFrom(__DIR__ . "/config/editable-gallery-block.php", 'editable-gallery-block');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'egb');
        $this->addLivewireComponents();
        $this->expandConfiguration();
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
}
