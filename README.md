# Package Filemanager

## Step 1: Add service providers to **config/app.php**

1. Vovantruong\Course\CourseServiceProvider::class,
1. Intervention\Image\ImageServiceProvider::class,

## Step 2: Add class aliases to **config/app.php**

1. 'Image' => Intervention\Image\Facades\Image::class,
1. 'Input' => Illuminate\Support\Facades\Request::class,

## Step 3: Install publish

1. php artisan vendor:publish --provider="Vovantruong\Course\CourseServiceProvider" --force




## Step 4: Publish the package’s config and assets :

1. php artisan vendor:publish --tag=lfm_config
1. php artisan vendor:publish --tag=lfm_public

## Step 5: Clear cache
1. php artisan route:clear
1. php artisan config:clear
1. php artisan storage:link

## Step 6: Migrate and Seeder
Run the following
1. php artisan migrate
1. php artisan db:seed
