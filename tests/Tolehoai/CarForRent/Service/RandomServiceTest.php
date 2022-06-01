<?php

namespace Test\Tolehoai\CarForRent\Service;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Service\RandomService;

class RandomServiceTest extends TestCase
{
    public function testGetUniqueId()
    {
        $randomService = new RandomService();
        $result = $randomService->getUniqueId() !== null;
        $this->assertTrue($result);
    }
}
