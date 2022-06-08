<?php

namespace Tolehoai\CarForRent\Controller;

use TheSeer\Tokenizer\Token;
use Tolehoai\CarForRent\Boostrap\Controller;
use Tolehoai\CarForRent\Boostrap\Request;
use Tolehoai\CarForRent\Boostrap\Response;
use Tolehoai\CarForRent\Service\TokenService;
use Tolehoai\CarForRent\Service\LoginService;
use Tolehoai\CarForRent\Transfer\UserTransfer;
use Tolehoai\CarForRent\Transformer\UserTransformer;
use Tolehoai\CarForRent\Validator\UserValidator;

class UserApiController extends Controller
{
    private $request;
    private $userTransfer;
    private $userValidator;
    private $userService;
    private $response;
    private $userTransformer;
    private $tokenService;

    public function __construct(
        Request $request,
        UserTransfer $userTransfer,
        UserValidator $userValidator,
        LoginService $userService,
        Response $response,
        UserTransformer $userTransformer,
        TokenService $tokenService,
    ) {
        $this->request = $request;
        $this->userTransfer = $userTransfer;
        $this->userValidator = $userValidator;
        $this->userService = $userService;
        $this->response = $response;
        $this->userTransformer = $userTransformer;
        $this->tokenService = $tokenService;
    }

    public function login()
    {
        try {
            if ($this->request->isGet()) {
                return "GET Method";
            }
            $errorMessage = '';
            $this->userTransfer->fromArray($this->request->getJSONBody());
            $this->userValidator->validateUserLogin($this->userTransfer);
            $userTransformer = $this->userService->login($this->userTransfer);

            if (!$userTransformer) {
                $errorMessage = 'Username or Password Invalid';
                return $this->response->setResponseDataFailed($errorMessage);
            }
            $accessToken = $this->tokenService->jwtEncodeData($userTransformer);

            return $this->response->setResponseDataSuccess([...$userTransformer,'token'=>$accessToken]);
        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
        }

    }
}
