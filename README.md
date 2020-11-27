# laravel-boilerplate 💯

Laravel boilerplate contains all the required configuration and database schema with a seeder and integrated AdminLTE 3 layout for admin to kickStart the project.

## Installation
```php
  composer i
```
It will load all the required packages.

### Steps to reproduce.

* Copy the .env.example to .env
* Make the nesseary changes to .env
* Run this command to migrate database
```php
    php artisan migrate:fresh --seed
```

## Default UserID Password

Email - [gulgulia17@gmail.com](mailto:gulgulia17@gmail.com)
Number - [8890070352](call:8890070352)
Username - gulgulia17
Password - 12345678


-- You can log in with any of the ones it can be either Email, Number, Username

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

All the default artisan command are available and some additional command is available too with the used packages

* [laravel/ui](https://github.com/laravel/ui)
    // Generate basic scaffolding...
    * php artisan ui bootstrap
    * php artisan ui vue
    * php artisan ui react
     
    // Generate login / registration scaffolding...
    * php artisan ui bootstrap --auth
    * php artisan ui vue --auth
    * php artisan ui react --auth
    
* [maatwebsite/excel](https://docs.laravel-excel.com/3.1/getting-started/)
    * php artisan make:export UsersExport --model=User
    * php artisan make:import UsersImport --model=User
    
* [orangehill/iseed](https://github.com/orangehill/iseed)
    * php artisan iseed tablename,tablename2
    
* [spatie/laravel-permission](https://spatie.be/docs/laravel-permission/v3/introduction)
    * php artisan permission:cache-reset
    * php artisan permission:create-permission
    * php artisan permission:create-role
    * php artisan permission:show

* [sven/artisan-view](https://github.com/svenluijten/artisan-view)
    * php artisan make:view home
    * php artisan scrap:view home
    
* [yajra/laravel-datatables](https://yajrabox.com/docs/laravel-datatables/master/installation)
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
