<?php

namespace Hanafalah\ModuleAgent\Schemas;

use Illuminate\Database\Eloquent\Collection;
use Hanafalah\ModuleOrganization\{
    Schemas\Organization
};
use Hanafalah\ModuleAgent\Contracts;
use Hanafalah\ModuleAgent\Resources\Agent\ShowAgent;
use Hanafalah\ModuleAgent\Resources\Agent\ViewAgent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Agent extends Organization implements Contracts\Agent
{
    protected string $__entity = 'Agent';
    public static $agent_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'agent',
            'tags'     => ['agent', 'agent-index'],
            'forever'  => true
        ]
    ];

    protected array $__resources = [
        'view' => ViewAgent::class,
        'show' => ShowAgent::class
    ];

    public function getAgent(): mixed
    {
        return static::$agent_model;
    }

    protected function showUsingRelation()
    {
        return [];
    }

    public function prepareShowAgent(?Model $model = null): ?Model
    {
        $this->booting();

        $model ??= $this->getAgent();
        $id = request()->id;
        if (!request()->has('id')) throw new \Exception('No id provided', 422);

        if (!isset($model)) $model = $this->AgentModel()->find($id);
        return static::$agent_model = $model;
    }

    public function showAgent(?Model $model = null): array
    {
        return $this->transforming($this->__resources['show'], $this->prepareShowAgent($model));
    }

    public function prepareStoreAgent(?array $attributes = null): Model
    {
        $attributes ??= request()->all();

        $agent = $this->AgentModel();
        if (isset($attributes['id'])) $agent = $agent->find($attributes['id']);

        $exceptions = [];
        foreach ($attributes as $key => $attribute) {
            if ($this->inArray($key, $exceptions)) continue;
            $agent->{$key} = $attribute;
        }
        $agent->save();

        static::$agent_model = $agent;
        $this->flushTagsFrom('index');
        return $agent;
    }

    public function storeAgent(): array
    {
        return $this->transaction(function () {
            return $this->showAgent($this->prepareStoreAgent());
        });
    }

    public function prepareViewAgentList(): Collection
    {
        return static::$agent_model = $this->cacheWhen(!$this->isSearch(), $this->__cache['index'], function () {
            return $this->agent()->orderBy('name', 'asc')->get();
        });
    }

    public function viewAgentList(): array
    {
        return $this->transforming($this->__resources['index'], function () {
            return $this->prepareViewAgentList();
        });
    }

    public function get(mixed $conditionals = null): Collection
    {
        return $this->agent()->get();
    }

    public function refind(mixed $id = null): Model|null
    {
        return $this->agent(function ($query) use ($id) {
            $query->where($this->OrganizationModel()->getKeyName(), request()->id);
        })->first();
    }

    public function agent(mixed $conditionals = null): Builder
    {
        $this->booting();
        return $this->AgentModel()->conditionals($conditionals)
            ->with('parent');

        // return $this->organization(
        //     fn($q) => $q->setIdentityFlags(['Agent'])->with("parent", function($subQ) {
        //         $subQ->setIdentityFlags(["Payer"]);
        //  }))->conditionals($conditionals);
    }
}
