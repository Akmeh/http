<?php
declare(strict_types=1);

use Akmeh\Http\HttpException;
use Akmeh\Http\InvalidParametersException;
use Akmeh\Http\NoContentException;
use Akmeh\Http\NotFoundException;
use Akmeh\Http\ServerException;
use Codeception\TestCase\Test;
use Illuminate\Http\Response;


/**
 * Class HttpErrorResponseTest
 */
class HttpErrorResponseTest extends Test
{
    /**
     * @test
     */
    public function unauthorizeCall()
    {

        try {
            (new HttpDummy())->when401();
        } catch (HttpException $e) {
            $response = $e->getResponse();
            $this->assertEquals($response['title'], HttpDummy::MESSAGE_401);
            $this->assertEquals($response['status'], Response::HTTP_UNAUTHORIZED);
        }
    }
    /**
     * @test
     */
    public function checkResponseWhenIs500()
    {

        try {
            (new HttpDummy())->when500();
        } catch (HttpException $e) {
            $response = $e->getResponse();
            $this->assertEquals($response['title'], HttpDummy::MESSAGE_500);
            $this->assertEquals($response['status'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @test
     */
    public function checkResponseWhenIs204()
    {

        try {
            (new HttpDummy())->when204();
        } catch (HttpException $e) {
            $response = $e->getResponse();
            $this->assertEquals($response['title'], HttpDummy::MESSAGE_204);
            $this->assertEquals($response['status'], Response::HTTP_NO_CONTENT);
        }
    }


    /**
     * @test
     */
    public function checkResponseWhenIs422()
    {

        try {
            (new HttpDummy())->when422();
        } catch (HttpException $e) {
            $response = $e->getResponse();
            $this->assertEquals($response['title'], HttpDummy::MESSAGE_422);
            $this->assertEquals($response['status'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * @test
     */
    public function checkResponseWhenIs404()
    {

        try {
            (new HttpDummy())->when404();
        } catch (HttpException $e) {
            $response = $e->getResponse();
            $this->assertEquals($response['title'], HttpDummy::MESSAGE_404);
            $this->assertEquals($response['status'], 404);
        }

    }
}


class HttpDummy
{
    const MESSAGE_404 = 'the content does not exists';
    const MESSAGE_422 = 'the parameters are invalid';
    const MESSAGE_204 = 'No content found';

    const MESSAGE_401 = 'No content found';

    const MESSAGE_500 = 'The Server had an issue';

    /**
     * @throws ServerException
     */
    public function when500()
    {
        throw new ServerException(self::MESSAGE_500);
    }

    /**
     * @throws NotFoundException
     */
    public function when404()
    {
        throw new NotFoundException(self::MESSAGE_404);
    }

    /**
     * @throws NoContentException
     */
    public function when204()
    {
        throw new NoContentException(self::MESSAGE_204);
    }

    /**
     * @throws InvalidParametersException
     */
    public function when422()
    {
        throw new InvalidParametersException(self::MESSAGE_422);
    }


    /**
     * @throws \Akmeh\Http\AuthException
     */
    public function when401()
    {
        throw new \Akmeh\Http\AuthException(self::MESSAGE_401);
    }
}
