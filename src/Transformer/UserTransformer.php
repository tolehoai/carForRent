<?php

namespace Tolehoai\CarForRent\Transformer;

use Tolehoai\CarForRent\Model\User;
use Tolehoai\CarForRent\Transfer\UserTransfer;

class UserTransformer
{
    /**
     * @param  UserTransfer|User $model
     * @return void
     */
    public function transform($model): array
    {
        return [
            'id' => $model->getId(),
            'username' => $model->getUsername(),
        ];
    }
}
