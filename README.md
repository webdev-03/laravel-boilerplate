# laravel-boilerplate 💯

Laravel boilerplate contains all the required configuration and database schema with a seeder and integrated AdminLTE 3 layout for admin to kickStart the project.

## Installation
```php
  composer i
```
It will load all the required packages.

## Used Dependencies, CDN, Packages

|      CDN's           |        Dependencies           |
|:--------------------:|:-----------------------------:|
|    AdminLTE 3        |    barryvdh/laravel-debugbar  |
|    FontAwesome       |    laravel/ui                 |
|    JQuery            |    maatwebsite/excel          |
|    DataTables        |    orangehill/iseed           |
|    OverlayScrollbar  |    spatie/laravel-permission  |
|    Select2           |    sven/artisan-view          |
|    Toastr            |    yajra/laravel-datatables   |
|    Ionicons          |                               |
|    Google Fonts      |                               |
|    Popper JS         |                               |
|    Bootstrap JS      |                               |
|    Chart JS          |                               |


## Available Artisan Commands

All the default artisan command are available and some additional command are available to with the used packages

* laravel/ui
    * // Generate basic scaffolding...
    * php artisan ui bootstrap
    * php artisan ui vue
    * php artisan ui react
    * 
    * // Generate login / registration scaffolding...
    * php artisan ui bootstrap --auth
    * php artisan ui vue --auth
    * php artisan ui react --auth
    
* maatwebsite/excel
    * php artisan make:export UsersExport --model=User
    * php artisan make:import UsersImport --model=User
    
* orangehill/iseed
    * php artisan iseed tablename,tablename2
    
* spatie/laravel-permission
    * php artisan permission:cache-reset
    * php artisan permission:create-permission
    * php artisan permission:create-role
    * php artisan permission:show

* sven/artisan-view
    * php artisan make:view home
    * php artisan scrap:view home
    
* yajra/laravel-datatables
    * php artisan datatables:editor ClassName
    * php artisan datatables:html ClassName
    * php artisan datatables:make ClassName
    * php artisan datatables:scope ClassName
    
## Requirements

- [ ] PHP: ^7.2\|^8.0
- [ ] Laravel: ^5.8
- [ ] PhpSpreadsheet: ^1.15
- [ ] PHP extension php_zip enabled
- [ ] PHP extension php_xml enabled
- [ ] PHP extension php_gd2 enabled
- [ ] PHP extension php_iconv enabled
- [ ] PHP extension php_simplexml enabled
- [ ] PHP extension php_xmlreader enabled
- [ ] PHP extension php_zlib enabled

## License

The MIT Public License. Please see [LICENSE](LICENSE) for more information.
