<?php
declare(strict_types=1);

namespace Akmeh\Http;
use Illuminate\Http\Response;

/**
 * Class NotFoundException
 * @package Akmeh\Http
 */
class NoContentException extends HttpException
{
    protected $statusCode = Response::HTTP_NO_CONTENT;

}
