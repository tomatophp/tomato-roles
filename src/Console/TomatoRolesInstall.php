<?php

namespace TomatoPHP\TomatoRoles\Console;

use Illuminate\Console\Command;
use TomatoPHP\ConsoleHelpers\Traits\HandleFiles;
use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use TomatoPHP\TomatoPHP\Services\Generator\CRUDGenerator;
use TomatoPHP\TomatoRoles\Services\GenerateRoles;

class TomatoRolesInstall extends Command
{
    use RunCommand;
    use HandleFiles;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'tomato-roles:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install tomato roles packages and publish the assets';

    public function __construct()
    {
        parent::__construct();
        $this->publish = __DIR__ . "/../../publish";
    }

    /**
     * @return void
     */
    public function handle(): void
    {
        $this->info('🍅 Publish Roles Vendor Assets');
        $this->handelFile('/config/permission.php', config_path('/permission.php'));
        $this->callSilent('config:cache');
        $this->artisanCommand(['tomato-components:install']);
        $this->callSilent('optimize:clear');
        $this->call('vendor:publish', ['--provider' => 'TomatoPHP\TomatoRoles\TomatoRolesServiceProvider']);
        $this->callSilent('migrate');
        $this->yarnCommand(['build']);
        $this->info('🍅 Try to login /admin/login with user admin@admin and password QTS@2022');
        $this->info('🍅 Tomato Roles installed successfully.');
    }
}
