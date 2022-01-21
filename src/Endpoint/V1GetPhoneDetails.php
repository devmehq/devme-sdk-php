<?php

namespace Devme\Endpoint;

class V1GetPhoneDetails extends \Devme\Runtime\Client\BaseEndpoint implements \Devme\Runtime\Client\Endpoint
{
    /**
     * Get phone validation details
     *
     * @param array $queryParameters {
     *     @var string $phone phone - phone number to validate
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
        return '/v1-get-phone-details';
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
        $optionsResolver->setDefined(array('phone'));
        $optionsResolver->setRequired(array('phone'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('phone', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Devme\Exception\V1GetPhoneDetailsBadRequestException
     * @throws \Devme\Exception\V1GetPhoneDetailsUnauthorizedException
     *
     * @return null|\Devme\Model\GetPhoneDetailsOut
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Devme\\Model\\GetPhoneDetailsOut', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Devme\Exception\V1GetPhoneDetailsBadRequestException($serializer->deserialize($body, 'Devme\\Model\\HttpErrorOut', 'json'));
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Devme\Exception\V1GetPhoneDetailsUnauthorizedException($serializer->deserialize($body, 'Devme\\Model\\HttpErrorOut', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('APIKeyHeader', 'APIKeyQueryParam');
    }
}
