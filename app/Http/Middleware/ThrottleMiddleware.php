<?php

namespace App\Http\Middleware;

use Predis\Client as Predis;
use App\Base\AbstractMiddleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ThrottleMiddleware extends AbstractMiddleware
{

	protected $redis;

	protected $requests = 2;

	protected $perSecond = 1;

	protected $identifier;

	protected $limitExceededHandler = null;

	protected $storageKey = 'rate:%s:requests';

	public function __construct(Predis $redis)
	{
		$this->redis = $redis;
		$this->identifier = $this->getIdentifier();
	}

	public function setRateLimit($requests, $perSecond)
	{
		$this->requests = $requests;
		$this->perSecond = $perSecond;

		return $this;
	}

	public function setStorageKey($storageKey)
	{
		$this->storageKey = $storageKey;

		return $this;
	}

	public function setIdentifier($identifier)
	{
		$this->identifier = $identifier;

		return $this;
	}

	protected function getIdentifier($identifier = null)
	{
		if (is_null($identifier)) {
			return $_SERVER['REMOTE_ADDR'];
		}

		return $identifier;
	}

	protected function defaultLimitExceededHandler()
	{
		return function (ServerRequestInterface $request, ResponseInterface $response, callable $next) {
			return $response->withStatus(429)->write('Rate limit exceeded');
		};
	}

	public function setLimitedExceededHandler(callable $handler)
	{
		$this->limitExceededHandler = $handler;

		return $this;
	}

	protected function getLimitExceededHandler()
	{
		if (is_null($this->limitExceededHandler)) {
			return $this->defaultLimitExceededHandler();
		}
		return $this->limitExceededHandler;	
	}

	/**
     * Example middleware invokable class
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        if ($this->hasExceededRateLimit()) {
        	return $this->getLimitExceededHandler()($request, $response, $next);
        }

        $this->incrementRequestCount();

        return $next($request, $response);
    }

    protected function incrementRequestCount()
    {
    	$this->redis->incr($this->getStorageKey());
    	$this->redis->expire($this->getStorageKey(), $this->perSecond);
    }

    protected function getStorageKey()
    {
    	return sprintf($this->storageKey, $this->identifier);
    }

    protected function hasExceededRateLimit()
    {
    	if ($this->redis->get($this->getStorageKey()) >= $this->requests) {
    		return true;
    	}

    	return false;
    }
}