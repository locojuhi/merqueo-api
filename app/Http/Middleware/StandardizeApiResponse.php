<?php

namespace App\Http\Middleware;

use App\Services\Responses\ApiResponseService;
use Closure;

class StandardizeApiResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $originalResponse = $next($request);
        $apiResponse = new ApiResponseService();
        $apiResponseContent = [
            'code' => $originalResponse->getStatusCode(),
            'data' => json_decode($originalResponse->getContent())
        ];

        if ($originalResponse->getStatusCode() != 200) {
            $apiResponse->setStatusCode($originalResponse->getStatusCode());
            $apiResponseContent['message'] = $originalResponse->getContent();
        }
        $apiResponse->setContent($apiResponseContent);

        return $apiResponse;
    }
}
