<?php

namespace Hanafalah\ModuleAgent;

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
            ->registers(['*']);
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
