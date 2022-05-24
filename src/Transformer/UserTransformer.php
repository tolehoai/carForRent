<?php

namespace Tolehoai\CarForRent\Transformer;

class UserTransformer
{
    /**
     * @param User $model
     * @return void
     */
    public function transform( $model): array
    {
        return [
            'id' => $model->getId(),
            'name' => $model->getName(),
            'username' => $model->getUsername(),
            'createAt' => $model->getCreatedAt()
        ];
    }
}