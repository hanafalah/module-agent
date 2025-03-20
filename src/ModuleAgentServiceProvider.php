<?php

namespace Hanafalah\ModuleAgent;

use Hanafalah\ModuleAgent\{
    Models\Agent,
    Schemas\Agent as SchemaAgent,
};
use Hanafalah\LaravelSupport\Providers\BaseServiceProvider;

class ModuleAgentServiceProvider extends BaseServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMainClass(ModuleAgent::class)
            ->registerCommandService(Providers\CommandServiceProvider::class)
            ->registers([
                '*',
                'Services'  => function () {
                    $this->binds([
                        Contracts\ModuleAgent::class  => Agent::class,
                        Contracts\Agent::class        => SchemaAgent::class,
                    ]);
                },
            ]);
    }

    protected function dir(): string
    {
        return __DIR__ . '/';
    }

    protected function migrationPath(string $path = ''): string
    {
        return database_path($path);
    }
}
