<?php declare(strict_types=1);

namespace AlanVdb\Module;

use AlanVdb\Renderer\Definition\RendererInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use AlanVdb\Router\Definition\UriGeneratorInterface;

abstract class AbstractController
{
    protected $renderer;
    protected $responseFactory;
    protected $streamFactory;
    protected $uriGenerator;

    public function __construct(
        RendererInterface $renderer,
        ResponseFactoryInterface $responseFactory,
        StreamFactoryInterface $streamFactory,
        UriGeneratorInterface $uriGenerator
    ) {
        $this->renderer = $renderer;
        $this->responseFactory = $responseFactory;
        $this->streamFactory = $streamFactory;
        $this->uriGenerator = $uriGenerator;

        if (method_exists($this, 'setup')) {
            $this->setup();
        }
    }

    protected function render(string $template, array $vars = []) : string
    {
        return $this->renderer->render($template, $vars);
    }

    protected function createResponse(string|StreamInterface $view) : ResponseInterface
    {
        $response = $this->responseFactory->createResponse(200);
        if (is_string($view)) {
            $view = $this->streamFactory->createStream($view);
        }
        return $response->withBody($view)->withHeader('Content', 'text/html');
    }
}
