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
        static::addGlobalScope('flag', function ($query) {
            $query->flagIn('Agent');
        });
        static::creating(function ($query) {
            $query->flag = 'Agent';
        });
    }

    public function viewUsingRelation(): array
    {
        return [];
    }

    public function showUsingRelation(): array
    {
        return ['parent'];
    }

    public function getShowResource()
    {
        return ShowAgent::class;
    }

    public function getViewResource()
    {
        return ViewAgent::class;
    }
}
