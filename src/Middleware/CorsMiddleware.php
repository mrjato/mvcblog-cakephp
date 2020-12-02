<?php
namespace App\Middleware;

use Cake\Http\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CorsMiddleware implements MiddlewareInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $allowedOrigins = ['*'];
        $allowedMethods = ['POST', 'PUT', 'GET', 'DELETE'];
        $maxAge = 300;

        if (strtoupper($request->getMethod()) === 'OPTIONS') {
            $response = new Response(array('status' => 200));
            
            return $response
                ->cors($request)
                ->allowOrigin($allowedOrigins)
                ->allowMethods($allowedMethods)
                ->allowHeaders(explode(',', $request->getHeaderLine('Access-Control-Request-Headers')))
                ->allowCredentials()
                ->maxAge($maxAge)
                ->build();
        } else {
            $response = $handler->handle($request);

            if ($request->getHeader('Origin')) {
                $response = $response
                    ->withHeader('Access-Control-Allow-Origin', $allowedOrigins)
                    ->withHeader('Access-Control-Allow-Credentials', 'true')
                    ->withHeader('Access-Control-Max-Age', strval($maxAge));
            };

            return $response;
        }
    }
}
?>
