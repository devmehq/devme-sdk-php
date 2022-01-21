<?php

namespace Devme\Endpoint;

class V1GetDomainWhois extends \Devme\Runtime\Client\BaseEndpoint implements \Devme\Runtime\Client\Endpoint
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
    use \Devme\Runtime\Client\EndpointTrait;
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
     * @throws \Devme\Exception\V1GetDomainWhoisBadRequestException
     * @throws \Devme\Exception\V1GetDomainWhoisUnauthorizedException
     *
     * @return null|\Devme\Model\GetDomainWhoisOut
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Devme\\Model\\GetDomainWhoisOut', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Devme\Exception\V1GetDomainWhoisBadRequestException($serializer->deserialize($body, 'Devme\\Model\\HttpErrorOut', 'json'));
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Devme\Exception\V1GetDomainWhoisUnauthorizedException($serializer->deserialize($body, 'Devme\\Model\\HttpErrorOut', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('APIKeyHeader', 'APIKeyQueryParam');
    }
}
