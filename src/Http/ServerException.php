<?php
declare(strict_types=1);

namespace Akmeh\Http;
use Illuminate\Http\Response;

/**
 * Class NotFoundException
 * @package Akmeh\Http
 */
class ServerException extends HttpException
{
    protected $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;

}
