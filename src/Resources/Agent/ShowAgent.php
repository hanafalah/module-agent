<?php

namespace Hanafalah\ModuleAgent\Resources\Agent;

use Hanafalah\ModuleOrganization\Resources\Organization\ShowOrganization;

class ShowAgent extends ViewAgent
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $resquest
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray(\Illuminate\Http\Request $request): array
  {
    $arr = [];
    $show = $this->resolveNow(new ShowOrganization($this));
    $arr = $this->mergeArray(parent::toArray($request), $show, $arr);
    return $arr;
  }
}
