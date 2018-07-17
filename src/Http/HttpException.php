<?php
declare(strict_types=1);

namespace Akmeh\Http;

/**
 * Class HttpException
 */
class HttpException extends \Exception
{

    public function getResponse()
    {
        return [
            'id' => get_called_class(),
            'links' => '',
            'status' => $this->statusCode,
            'code' => $this->getCode(),
            'title' => $this->getMessage(),
            'detail' => !env('APP_DEBUG') ?? json_encode($this->getTrace()),
        ];
    }
}