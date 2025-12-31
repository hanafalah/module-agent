<?php

namespace Hanafalah\ModuleAgent\Schemas;

use Hanafalah\ModuleOrganization\{
    Schemas\Organization
};
use Hanafalah\ModuleAgent\Contracts;

class Agent extends Organization implements Contracts\Schemas\Agent
{
    protected string $__entity = 'Agent';
    public $agent_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'agent',
            'tags'     => ['agent', 'agent-index'],
            'forever'  => true
        ]
    ];
}
