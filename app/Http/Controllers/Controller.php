<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Throwable;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $httpCode;
    /**
     * ResponseSuccess function
     *
     * @param [type] $data
     * @param [type] $message
     * @return void
     */
    public function responseSuccess($data, $message = "", $httpCode = null)
    {
        $this->httpCode = Response::HTTP_OK;
        if (!empty($httpCode)) {
            $this->httpCode = $httpCode;
        }

        return response()->json([
                "data" => $data,
                "message" => empty($message) ? "Success!" : $message,
            ], $this->httpCode);
    }

    /**
     * ResponseError function
     *
     * @param [type] $data
     * @param [type] $message
     * @return void
     */
    public function responseError($data = null, $message = "", $httpCode = null)
    {
        $this->httpCode = Response::HTTP_BAD_REQUEST;
        if (!empty($httpCode)) {
            $this->httpCode = $httpCode;
        }
        return response()->json([
                "data" => $data,
                "message" => empty($message) ? "Error!" : $message,
            ], $this->httpCode);
    }

        /**
     * Function return Unauthorized response.
     *
     * @param [type] $method     method
     * @param [type] $parameters parameters
     *
     * @return void
     */
    public function callAction($method, $parameters)
    {
        try {
            return parent::callAction($method, $parameters);
        } catch (Throwable $e) {
            if (request()->wantsJson()) {
                return $this->responseError(null, $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            throw $e;
        }
    }
}
