<?php

namespace Test\Tolehoai\CarForRent\Validator;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Exception\LoginException;
use Tolehoai\CarForRent\Exception\ValidationException;
use Tolehoai\CarForRent\Transfer\UserTransfer;
use Tolehoai\CarForRent\Validator\UserValidator;

class UserValidatorTest extends TestCase
{
    /**
     * @dataProvider LoginValidatorSuccessDataProvider
     * @return       void
     */
    public function testLoginValidatorSuccess($params, $expected): void
    {
        $testLoginValidator = new UserValidator();
        $result = $testLoginValidator->validateUserLogin($params['userRequest']);

        $this->assertEquals($expected, $result);
    }

    public function LoginValidatorSuccessDataProvider(): array
    {
        $request1 = new UserTransfer();
        $request1->setUsername('khaitri');
        $request1->setPassword('123');
        $request2 = new UserTransfer();
        $request2->setUsername('hoaito');
        $request2->setPassword('1aaa');
        $request3 = new UserTransfer();
        $request3->setUsername('minhkha');
        $request3->setPassword('1aaa11');
        return [
            'case-1' => [
                'params' => [
                    'userRequest' => $request1
                ],
                'expected' => true
            ],
            'case-2' => [
                'params' => [
                    'userRequest' => $request2
                ],
                'expected' => true
            ],
            'case-3' => [
                'params' => [
                    'userRequest' => $request3
                ],
                'expected' => true
            ]
        ];
    }

    /**
     * @dataProvider LoginValidatorExceptionDataProvider
     * @return       void
     */
    public function testLoginValidatorException($params, $expected): void
    {
        $testLoginValidator = new UserValidator();
        $this->expectException(ValidationException::class);
        $testLoginValidator->validateUserLogin($params['userRequest']);
    }

    public function LoginValidatorExceptionDataProvider(): array
    {
        $request1 = new UserTransfer();
        $request1->setUsername('');
        $request1->setPassword('');
        $request2 = new UserTransfer();
        $request2->setUsername('');
        $request2->setPassword('');
        $request3 = new UserTransfer();
        $request3->setUsername('');
        $request3->setPassword('');
        return [
            'case-1' => [
                'params' => [
                    'userRequest' => $request1
                ],
                'expected' => true
            ],
            'case-2' => [
                'params' => [
                    'userRequest' => $request2
                ],
                'expected' => true
            ],
            'case-3' => [
                'params' => [
                    'userRequest' => $request3
                ],
                'expected' => true
            ]
        ];
    }
}
