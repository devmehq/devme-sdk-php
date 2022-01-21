<?php

namespace DevmeSdk\Authentication;

class APIKeyQueryParamAuthentication implements \Jane\Component\OpenApiRuntime\Client\AuthenticationPlugin
{
    private $apiKey;
    public function __construct(string $apiKey)
    {
        $this->{'apiKey'} = $apiKey;
    }
    public function authentication(\Psr\Http\Message\RequestInterface $request) : \Psr\Http\Message\RequestInterface
    {
        $uri = $request->getUri();
        $query = $uri->getQuery();
        $params = array();
        parse_str($query, $params);
        $params = array_merge($params, array('x-api-key' => $this->{'apiKey'}));
        $query = http_build_query($params, null, '&');
        $uri = $uri->withQuery($query);
        $request = $request->withUri($uri);
        return $request;
    }
    public function getScope() : string
    {
        return 'APIKeyQueryParam';
    }
}