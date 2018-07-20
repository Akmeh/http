<?php
declare(strict_types=1);

namespace Akmeh\Http;

/**
 * Class HttpException
 */
class HttpException extends \Exception
{
    /**
     *
     * Declare the status code for each case
     * @var int
     */
    protected $statusCode;

    /**
     * @return int
     */
    public function getStatusCode() : int
    {
        return $this->statusCode;
    }

    /**
     * Get Response as a String for Log propose
     * @return string
     */
    public function getResponseAsString() : string
    {
        $response = '';
        foreach ($this->getResponse() as $key => $val) {
            $response .= "\n" . $key . ' :: ' . $val;
        }
        return $response;
    }

    /**
     * @return array
     */
    public function getResponse(): array
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
