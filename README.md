![Screenshot](https://github.com/tomatophp/tomato-roles/blob/master/art/screenshot.png)

# Tomato Roles

🍅 ACL Roles / Permissions for [TomatoPHP](https://docs.tomatophp.com/) build with [Splade](https://splade.dev/) build with [Laravel-permission](https://spatie.be/docs/laravel-permission/v5/introduction)

## Installation

```bash
composer require tomatophp/tomato-roles
```
after install use this command to install the package and publish assets

```bash
php artisan tomato-roles:install
```

## Prepare Your Model

to make your model accept roles you must add this trait to it

```php
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    
```

## Using

you can use the package by GUI and you can generate a new permission by set the permission name to the route name and after that use `tomato-roles.php` config to set the custom permission you need for this route when you add a new one you will get the new permission when you edit the role or add new and the package will auto create the permission for you.

if you need to build a full resource permission when you use [Tomato Admin](https://github.com/queents/tomato-admin) you can use this command and it will auto generate it for you

```bash
php artisan tomato:roles
```

and just gave it the name of the table.

## Support

you can join our discord server to get support [TomatoPHP](https://discord.gg/Xqmt35Uh)

## Docs

you can check docs of this package on [Docs](https://docs.tomatophp.com/tomato-roles)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Fady Mondy](https://www.github.com/3x1io)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
