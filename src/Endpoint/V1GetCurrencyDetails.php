<?php

namespace DevmeSdk\Endpoint;

class V1GetCurrencyDetails extends \DevmeSdk\Runtime\Client\BaseEndpoint implements \DevmeSdk\Runtime\Client\Endpoint
{
    /**
     * Get currency facts and information
     *
     * @param array $queryParameters {
     *     @var string $code code - currency code ISO 4217
     *     @var array $expand expand - expand properties
     *     @var array $exclude exclude - exclude properties
     *     @var string $language language - localisation language
     *     @var string $type type - type of currency
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
        return '/v1-get-currency-details';
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
        $optionsResolver->setDefined(array('code', 'expand', 'exclude', 'language', 'type'));
        $optionsResolver->setRequired(array('code'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('code', array('string'));
        $optionsResolver->setAllowedTypes('expand', array('array'));
        $optionsResolver->setAllowedTypes('exclude', array('array'));
        $optionsResolver->setAllowedTypes('language', array('string'));
        $optionsResolver->setAllowedTypes('type', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \DevmeSdk\Exception\V1GetCurrencyDetailsBadRequestException
     * @throws \DevmeSdk\Exception\V1GetCurrencyDetailsUnauthorizedException
     *
     * @return null|\DevmeSdk\Model\GetCurrencyDetailsOut
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'DevmeSdk\\Model\\GetCurrencyDetailsOut', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \DevmeSdk\Exception\V1GetCurrencyDetailsBadRequestException($serializer->deserialize($body, 'DevmeSdk\\Model\\HttpErrorOut', 'json'));
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \DevmeSdk\Exception\V1GetCurrencyDetailsUnauthorizedException($serializer->deserialize($body, 'DevmeSdk\\Model\\HttpErrorOut', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('APIKeyHeader', 'APIKeyQueryParam');
    }
}
