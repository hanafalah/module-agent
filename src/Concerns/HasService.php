<?php

namespace Gii\ModuleAgent\Concerns;

trait HasService{
    public function initialieHasService(){
        $this->ServiceModel()::setIdentityFlags($this->__flags_Service);
    }
}