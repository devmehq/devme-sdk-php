<?php

namespace DevmeSdk\Endpoint;

class V1GetDomainWhois extends \DevmeSdk\Runtime\Client\BaseEndpoint implements \DevmeSdk\Runtime\Client\Endpoint
{
    /**
     * Get domain WHOIS details and registration information
     *
     * @param array $queryParameters {
     *     @var string $domain domain - Domain name to get details for
     * }
     */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    use \DevmeSdk\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/v1-get-domain-whois';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('domain'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('domain', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \DevmeSdk\Exception\V1GetDomainWhoisBadRequestException
     * @throws \DevmeSdk\Exception\V1GetDomainWhoisUnauthorizedException
     *
     * @return null|\DevmeSdk\Model\GetDomainWhoisOut
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'DevmeSdk\\Model\\GetDomainWhoisOut', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \DevmeSdk\Exception\V1GetDomainWhoisBadRequestException($serializer->deserialize($body, 'DevmeSdk\\Model\\HttpErrorOut', 'json'));
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \DevmeSdk\Exception\V1GetDomainWhoisUnauthorizedException($serializer->deserialize($body, 'DevmeSdk\\Model\\HttpErrorOut', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('APIKeyHeader', 'APIKeyQueryParam');
    }
}
