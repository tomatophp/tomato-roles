<?php

namespace TomatoPHP\TomatoRoles\Menus;

use TomatoPHP\TomatoPHP\Services\Menu\Menu;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenu;

class ALCMenu extends TomatoMenu
{
    /**
     * @var ?string
     * @example ACL
     */
    public ?string $group;

    /**
     * @var ?string
     * @example dashboard
     */
    public ?string $menu = "dashboard";

    public function __construct()
    {
        $this->group = trans('tomato-roles::global.menu.group');
    }

    /**
     * @return array
     */
    public static function handler(): array
    {
        return [
            Menu::make()
                ->label(trans('tomato-roles::global.menu.users'))
                ->icon("bx bxs-user")
                ->route("admin.users.index"),
            Menu::make()
                ->label(trans('tomato-roles::global.menu.roles'))
                ->icon("bx bxs-lock")
                ->route("admin.roles.index"),
        ];
    }
}
