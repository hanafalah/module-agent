<?php

use Gii\ModuleAgent\{
    Models as ModuleAgent,
    Contracts
};

return [
    'contracts' => [
        'agent'        => Contracts\Agent::class,
        'module_agent' => Contracts\ModuleAgent::class
    ],
    'database' => [
        'models' => [
            'Agent' => ModuleAgent\Agent::class,
        ]
    ],
];