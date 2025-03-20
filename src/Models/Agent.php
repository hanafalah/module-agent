<?php

namespace Gii\ModuleAgent\Models;

use Gii\ModuleAgent\Resources\Agent\ShowAgent;
use Gii\ModuleAgent\Resources\Agent\ViewAgent;
use Gii\ModuleOrganization\Models\Organization; 

class Agent extends Organization {
    protected $table = 'organizations';

    protected static function booted(): void{
        parent::booted();
        static::addGlobalScope('agent',function($query){
            $query->whereRaw('UPPER(flag) = "AGENT"');
        });
        static::creating(function($query){
            if (!isset($query->flag)) $query->flag = 'AGENT';
        });
    }

    public function toShowApi(){
        return new ShowAgent($this);
    }

    public function toViewApi(){
        return new ViewAgent($this);
    }
}