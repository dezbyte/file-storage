<?php

namespace FileStorage\Core\Mvc;

use Dez\Authorizer\Adapter\Session;
use Dez\Authorizer\Adapter\Token;
use Dez\Http\Response;
use Dez\Mvc\Controller;

/**
 * @property Token authorizerToken
 * @property Session authorizerSession
 */

class ControllerJson extends Controller {


    /**
     * ControllerJson constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @throws \Dez\Http\Exception
     */
    public function beforeExecute()
    {
        $this->response->setBodyFormat(Response::RESPONSE_API_JSON);
    }

    /**
     * @param array $data
     * @param int $statusCode
     * @return Response
     */
    public function response(array $data = [], $statusCode = 200)
    {
        return $this->response->setContent([
            'status' => 'success',
            'response' => $data
        ])->setStatusCode($statusCode);
    }

    /**
     * @param array $data
     * @param int $statusCode
     * @return Response
     */
    public function error(array $data = [], $statusCode = 403)
    {
        return $this->response->setContent([
            'status' => 'error',
            'response' => $data
        ])->setStatusCode($statusCode);
    }

}