<?php

namespace Devme\Endpoint;

class V1GetCountryDetails extends \Devme\Runtime\Client\BaseEndpoint implements \Devme\Runtime\Client\Endpoint
{
    /**
     * Get country facts and information
     *
     * @param array $queryParameters {
     *     @var string $code code - country code ISO 4217
     *     @var array $expand expand - expand properties
     *     @var array $exclude exclude - exclude properties
     *     @var string $language language - localisation language
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
        return '/v1-get-country-details';
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
        $optionsResolver->setDefined(array('code', 'expand', 'exclude', 'language'));
        $optionsResolver->setRequired(array('code'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('code', array('string'));
        $optionsResolver->setAllowedTypes('expand', array('array'));
        $optionsResolver->setAllowedTypes('exclude', array('array'));
        $optionsResolver->setAllowedTypes('language', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Devme\Exception\V1GetCountryDetailsBadRequestException
     * @throws \Devme\Exception\V1GetCountryDetailsUnauthorizedException
     *
     * @return null|\Devme\Model\GetCountryDetailsOut
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Devme\\Model\\GetCountryDetailsOut', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Devme\Exception\V1GetCountryDetailsBadRequestException($serializer->deserialize($body, 'Devme\\Model\\HttpErrorOut', 'json'));
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Devme\Exception\V1GetCountryDetailsUnauthorizedException($serializer->deserialize($body, 'Devme\\Model\\HttpErrorOut', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('APIKeyHeader', 'APIKeyQueryParam');
    }
}
