<?php

namespace Devme\Endpoint;

class V1ListCurrencies extends \Devme\Runtime\Client\BaseEndpoint implements \Devme\Runtime\Client\Endpoint
{
    /**
     * Get list of all currencies
     *
     * @param array $queryParameters {
     *     @var array $code code - currency code ISO 4217
     *     @var array $expand expand - expand properties
     *     @var array $exclude exclude - exclude properties
     *     @var string $language language - localisation language
     *     @var string $type type - type of currency
     *     @var array $sort sort - sort properties
     *     @var string $page page - page number
     *     @var string $pageSize pageSize - page size
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
        return '/v1-list-currencies';
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
        $optionsResolver->setDefined(array('code', 'expand', 'exclude', 'language', 'type', 'sort', 'page', 'pageSize'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('code', array('array'));
        $optionsResolver->setAllowedTypes('expand', array('array'));
        $optionsResolver->setAllowedTypes('exclude', array('array'));
        $optionsResolver->setAllowedTypes('language', array('string'));
        $optionsResolver->setAllowedTypes('type', array('string'));
        $optionsResolver->setAllowedTypes('sort', array('array'));
        $optionsResolver->setAllowedTypes('page', array('string'));
        $optionsResolver->setAllowedTypes('pageSize', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Devme\Exception\V1ListCurrenciesBadRequestException
     * @throws \Devme\Exception\V1ListCurrenciesUnauthorizedException
     *
     * @return null|\Devme\Model\ListCurrenciesOut
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Devme\\Model\\ListCurrenciesOut', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Devme\Exception\V1ListCurrenciesBadRequestException($serializer->deserialize($body, 'Devme\\Model\\HttpErrorOut', 'json'));
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Devme\Exception\V1ListCurrenciesUnauthorizedException($serializer->deserialize($body, 'Devme\\Model\\HttpErrorOut', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('APIKeyHeader', 'APIKeyQueryParam');
    }
}
