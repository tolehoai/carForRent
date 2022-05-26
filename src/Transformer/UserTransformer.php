<?php

namespace Tolehoai\CarForRent\Transformer;

class UserTransformer
{
    /**
     * @param  User $model
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
