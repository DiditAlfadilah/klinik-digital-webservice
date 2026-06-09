<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\LogModel;

class LogAPI
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        LogModel::create([
            'method' => $request->method(),
            'endpoint' => $request->path(),
            'request_data' => json_encode($request->all()),
            'response_data' => $response->getContent(),
            'status' => $response->status()
        ]);

        return $response;
    }
}