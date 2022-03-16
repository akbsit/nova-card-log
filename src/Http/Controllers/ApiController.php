<?php namespace Falbar\NovaCardLog\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;

use Falbar\NovaCardLog\Helper\LogHelper;

/**
 * Class ApiController
 * @package Falbar\NovaCardLog\Http\Controllers
 */
class ApiController extends Controller
{
    private const CODE_SUCCESS_REQUEST = 200;

    /* @return JsonResponse */
    public function handle(): JsonResponse
    {
        LogHelper::make()->deleteAll();

        return response()
            ->json($this->getResponseData())
            ->setStatusCode(self::CODE_SUCCESS_REQUEST);
    }

    /* @return array */
    private function getResponseData(): array
    {
        return [
            'status'  => true,
            'data'    => [
                'size' => LogHelper::make()->getTotalSizeFormatted(),
            ],
            'message' => 'Success request',
            'code'    => self::CODE_SUCCESS_REQUEST,
        ];
    }
}
