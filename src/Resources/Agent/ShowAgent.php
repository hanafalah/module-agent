<?php

namespace Gii\ModuleAgent\Resources\Agent;

use Gii\ModuleOrganization\Resources\ShowOrganization;

class ShowAgent extends ShowOrganization
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $resquest
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(\Illuminate\Http\Request $request) : array{
      $arr = [
      ];
      $arr = $this->mergeArray(parent::toArray($request),$arr);
      
      return $arr;
  }
}