<?php

namespace Hanafalah\ModuleAgent\Resources\Agent;

use Hanafalah\ModuleOrganization\Resources\ViewOrganization;

class ViewAgent extends ViewOrganization
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
    $arr = $this->mergeArray(parent::toArray($request), $arr);

    return $arr;
  }
}
