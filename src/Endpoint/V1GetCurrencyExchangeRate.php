<?php

namespace Devme\Endpoint;

class V1GetCurrencyExchangeRate extends \Devme\Runtime\Client\BaseEndpoint implements \Devme\Runtime\Client\Endpoint
{
    /**
     * Get exchange rate for a currency
     *
     * @param array $queryParameters {
     *     @var string $from from - currency to get exchange rate from
     *     @var string $to to - currency to get exchange rate to
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
        return '/v1-get-currency-exchange-rate';
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
        $optionsResolver->setDefined(array('from', 'to'));
        $optionsResolver->setRequired(array('from', 'to'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('from', array('string'));
        $optionsResolver->setAllowedTypes('to', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Devme\Exception\V1GetCurrencyExchangeRateBadRequestException
     * @throws \Devme\Exception\V1GetCurrencyExchangeRateUnauthorizedException
     *
     * @return null|\Devme\Model\GetCurrencyExchangeRateOut
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Devme\\Model\\GetCurrencyExchangeRateOut', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Devme\Exception\V1GetCurrencyExchangeRateBadRequestException($serializer->deserialize($body, 'Devme\\Model\\HttpErrorOut', 'json'));
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Devme\Exception\V1GetCurrencyExchangeRateUnauthorizedException($serializer->deserialize($body, 'Devme\\Model\\HttpErrorOut', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('APIKeyHeader', 'APIKeyQueryParam');
    }
}
