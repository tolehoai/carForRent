<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Controller;
use Tolehoai\CarForRent\Boostrap\Request;
use Tolehoai\CarForRent\Boostrap\View;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\RegisterService;
use Tolehoai\CarForRent\Service\SessionService;
use Tolehoai\CarForRent\Service\UserService;
use Tolehoai\CarForRent\Transfer\RegisterTransfer;
use Tolehoai\CarForRent\Transfer\UserTransfer;
use Tolehoai\CarForRent\Validator\RegisterValidator;
use Tolehoai\CarForRent\Validator\UserValidator;

class RegisterController extends BaseController
{
    private UserTransfer $userTransfer;
    private RegisterTransfer $registerTransfer;
    private RegisterValidator $registerValidator;
    private RegisterService $registerService;
    private UserRepository $userRepository;

    public function __construct(
        RegisterTransfer  $registerTransfer,
        RegisterValidator $registerValidator,
        RegisterService   $registerService,
        UserRepository    $userRepository
    )
    {
        $this->registerTransfer = $registerTransfer;
        $this->registerValidator = $registerValidator;
        $this->registerService = $registerService;
        $this->userRepository = $userRepository;
    }

    public function registerAction()
    {
        if ($this->request->isGet()) {
            return $this->render('register');
        }
        $this->registerTransfer->fromArray($this->request->getBody());
        $isUserRegisterValid = $this->registerValidator->validateUserRegister($this->registerTransfer);
        if (!empty($isUserRegisterValid)) {
            $message = ['error' => $isUserRegisterValid,];
            return View::renderView('register', $message);
        }
        $isRegisterSuccess = $this->userRepository->save($this->registerTransfer);
        if (isset($isRegisterSuccess['error'])) {
            $message = [
                'error' => true,
                'message' => $isRegisterSuccess['error']
            ];
            return View::renderView('register', $message);
        }
        $message = [
            'success' => true,
            'message' => 'Register Sucessfully!',
        ];
        return View::renderView('register', $message);
    }

    /**
     * @return UserTransfer
     */
    public function getUserTransfer(): UserTransfer
    {
        return $this->userTransfer;
    }

    /**
     * @param UserTransfer $userTransfer
     */
    public function setUserTransfer(UserTransfer $userTransfer): void
    {
        $this->userTransfer = $userTransfer;
    }

    /**
     * @return RegisterTransfer
     */
    public function getRegisterTransfer(): RegisterTransfer
    {
        return $this->registerTransfer;
    }

    /**
     * @param RegisterTransfer $registerTransfer
     */
    public function setRegisterTransfer(RegisterTransfer $registerTransfer): void
    {
        $this->registerTransfer = $registerTransfer;
    }

    /**
     * @return RegisterValidator
     */
    public function getRegisterValidator(): RegisterValidator
    {
        return $this->registerValidator;
    }

    /**
     * @param RegisterValidator $registerValidator
     */
    public function setRegisterValidator(RegisterValidator $registerValidator): void
    {
        $this->registerValidator = $registerValidator;
    }

    /**
     * @return RegisterService
     */
    public function getRegisterService(): RegisterService
    {
        return $this->registerService;
    }

    /**
     * @param RegisterService $registerService
     */
    public function setRegisterService(RegisterService $registerService): void
    {
        $this->registerService = $registerService;
    }

    /**
     * @return UserRepository
     */
    public function getUserRepository(): UserRepository
    {
        return $this->userRepository;
    }

    /**
     * @param UserRepository $userRepository
     */
    public function setUserRepository(UserRepository $userRepository): void
    {
        $this->userRepository = $userRepository;
    }


}
