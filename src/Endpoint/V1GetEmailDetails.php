<?php

namespace Devme\Endpoint;

class V1GetEmailDetails extends \Devme\Runtime\Client\BaseEndpoint implements \Devme\Runtime\Client\Endpoint
{
    /**
     * Get email validation details
     *
     * @param array $queryParameters {
     *     @var string $email email - email address
     *     @var bool $verifyMx verifyMx - verify domain dns for MX record
     *     @var bool $verifySmtp verifySmtp - verify mailbox with SMTP Connect and Reply
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
        return '/v1-get-email-details';
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
        $optionsResolver->setDefined(array('email', 'verifyMx', 'verifySmtp'));
        $optionsResolver->setRequired(array('email'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('email', array('string'));
        $optionsResolver->setAllowedTypes('verifyMx', array('bool'));
        $optionsResolver->setAllowedTypes('verifySmtp', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Devme\Exception\V1GetEmailDetailsBadRequestException
     * @throws \Devme\Exception\V1GetEmailDetailsUnauthorizedException
     *
     * @return null|\Devme\Model\GetEmailDetailsOut
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Devme\\Model\\GetEmailDetailsOut', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Devme\Exception\V1GetEmailDetailsBadRequestException($serializer->deserialize($body, 'Devme\\Model\\HttpErrorOut', 'json'));
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Devme\Exception\V1GetEmailDetailsUnauthorizedException($serializer->deserialize($body, 'Devme\\Model\\HttpErrorOut', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('APIKeyHeader', 'APIKeyQueryParam');
    }
}
