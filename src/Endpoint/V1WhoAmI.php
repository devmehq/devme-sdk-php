<?php

namespace DevmeSdk\Endpoint;

class V1WhoAmI extends \DevmeSdk\Runtime\Client\BaseEndpoint implements \DevmeSdk\Runtime\Client\Endpoint
{
    use \DevmeSdk\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/v1-who-am-i';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     *
     * @return null|\DevmeSdk\Model\WhoAmIOut
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'DevmeSdk\\Model\\WhoAmIOut', 'json');
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('APIKeyHeader', 'APIKeyQueryParam');
    }
}
