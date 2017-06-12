<?php

namespace Cracker182\Modules\Providers;

use Illuminate\Support\ServiceProvider;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $generators = [
            'command.make.module'            => \Cracker182\Modules\Console\Generators\MakeModuleCommand::class,
            'command.make.module.controller' => \Cracker182\Modules\Console\Generators\MakeControllerCommand::class,
            'command.make.module.middleware' => \Cracker182\Modules\Console\Generators\MakeMiddlewareCommand::class,
            'command.make.module.migration'  => \Cracker182\Modules\Console\Generators\MakeMigrationCommand::class,
            'command.make.module.model'      => \Cracker182\Modules\Console\Generators\MakeModelCommand::class,
            'command.make.module.policy'     => \Cracker182\Modules\Console\Generators\MakePolicyCommand::class,
            'command.make.module.provider'   => \Cracker182\Modules\Console\Generators\MakeProviderCommand::class,
            'command.make.module.request'    => \Cracker182\Modules\Console\Generators\MakeRequestCommand::class,
            'command.make.module.seeder'     => \Cracker182\Modules\Console\Generators\MakeSeederCommand::class,
            'command.make.module.test'       => \Cracker182\Modules\Console\Generators\MakeTestCommand::class,
            'command.make.module.event'      => \Cracker182\Modules\Console\Generators\MakeEventCommand::class,
        ];

        foreach ($generators as $slug => $class) {
            $this->app->singleton($slug, function ($app) use ($slug, $class) {
                return $app[$class];
            });

            $this->commands($slug);
        }
    }
}
