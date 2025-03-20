<?php

namespace Hanafalah\ModuleAgent\Models;

use Hanafalah\ModuleAgent\Resources\Agent\ShowAgent;
use Hanafalah\ModuleAgent\Resources\Agent\ViewAgent;
use Hanafalah\ModuleOrganization\Models\Organization;

class Agent extends Organization
{
    protected $table = 'organizations';

    protected static function booted(): void
    {
        parent::booted();
        static::addGlobalScope('agent', function ($query) {
            $query->whereRaw('UPPER(flag) = "AGENT"');
        });
        static::creating(function ($query) {
            if (!isset($query->flag)) $query->flag = 'AGENT';
        });
    }

    public function toShowApi()
    {
        return new ShowAgent($this);
    }

    public function toViewApi()
    {
        return new ViewAgent($this);
    }
}
