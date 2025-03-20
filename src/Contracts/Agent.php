<?php

namespace Gii\ModuleAgent\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Zahzah\LaravelSupport\Contracts\DataManagement;

interface Agent extends DataManagement {
    public function getAgent(): mixed;
    public function prepareShowAgent(? Model $model = null): ?Model;
    public function showAgent(? Model $model = null): array;
    public function prepareStoreAgent(? array $attributes = null): Model;
    public function storeAgent(): array;
    public function prepareViewAgentList(): Collection;
    public function viewAgentList(): array;
    public function get(mixed $conditionals = null) : Collection;
    public function refind(mixed $id = null) :  Model|null;
    public function agent(mixed $conditionals=null): Builder;
}