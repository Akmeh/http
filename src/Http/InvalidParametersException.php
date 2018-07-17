<?php
declare(strict_types=1);

namespace Akmeh\Http;
use Illuminate\Http\Response;

/**
 * Class NotFoundException
 * @package Akmeh\Http
 */
class InvalidParametersException extends HttpException
{
    protected $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY;

}
