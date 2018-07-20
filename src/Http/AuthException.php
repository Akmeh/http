<?php
declare(strict_types=1);

namespace Akmeh\Http;
use Illuminate\Http\Response;

/**
 * Class AuthException
 * @package Akmeh\Http
 */
class AuthException extends HttpException
{
    protected $statusCode = Response::HTTP_UNAUTHORIZED;

}
