### Установка

Добавить в `tailwind.admin.config.js`, созданный в пакете `tailwindcss-theme`.

    "./vendor/4geo35/editable-gallery-block/src/resources/views/livewire/admin/**/*.blade.php",
    "./vendor/4geo35/editable-gallery-block/src/resources/views/admin/**/*.blade.php",

Добавить в `tailwind.config.js`, созданный в пакете `tailwindcss-theme`.

    "./vendor/4geo35/editable-gallery-block/src/resources/views/components/**/*.blade.php",

Запустить миграции для создания таблиц `php artisan migrate`

Установить lightbox `npm install fslightbox`, добавить в `app.js`:

    import "fslightbox"

#### Views

Сокращение для представлений: `egb`

#### Config

Название файла: `editable-gallery-block`  
Название типа блока: `gallery`
