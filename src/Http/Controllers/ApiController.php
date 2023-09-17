<?php namespace Akbsit\NovaCardLog\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;

use Akbsit\NovaCardLog\Helper\LogHelper;

class ApiController extends Controller
{
    private const CODE_SUCCESS_REQUEST = 200;

    public function handle(): JsonResponse
    {
        LogHelper::make()->deleteAll();

        return response()
            ->json($this->getResponseData())
            ->setStatusCode(self::CODE_SUCCESS_REQUEST);
    }

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
