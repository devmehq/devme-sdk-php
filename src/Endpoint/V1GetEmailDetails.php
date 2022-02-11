<?php

namespace DevmeSdk\Endpoint;

class V1GetEmailDetails extends \DevmeSdk\Runtime\Client\BaseEndpoint implements \DevmeSdk\Runtime\Client\Endpoint
{
    /**
     * Get email validation details
     *
     * @param array $queryParameters {
     *     @var string $email email - email address
     *     @var bool $verifyMx verifyMx - verify domain dns for MX record
     *     @var bool $verifySmtp verifySmtp - verify mailbox with SMTP Connect and Reply
     *     @var numeric $timeout timeout - timeout in milliseconds max 10000 (10 seconds)
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
        $optionsResolver->setDefined(array('email', 'verifyMx', 'verifySmtp', 'timeout'));
        $optionsResolver->setRequired(array('email'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('email', array('string'));
        $optionsResolver->setAllowedTypes('verifyMx', array('bool'));
        $optionsResolver->setAllowedTypes('verifySmtp', array('bool'));
        $optionsResolver->setAllowedTypes('timeout', array('numeric'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \DevmeSdk\Exception\V1GetEmailDetailsBadRequestException
     * @throws \DevmeSdk\Exception\V1GetEmailDetailsUnauthorizedException
     *
     * @return null|\DevmeSdk\Model\GetEmailDetailsOut
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'DevmeSdk\\Model\\GetEmailDetailsOut', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \DevmeSdk\Exception\V1GetEmailDetailsBadRequestException($serializer->deserialize($body, 'DevmeSdk\\Model\\HttpErrorOut', 'json'));
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \DevmeSdk\Exception\V1GetEmailDetailsUnauthorizedException($serializer->deserialize($body, 'DevmeSdk\\Model\\HttpErrorOut', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('APIKeyHeader', 'APIKeyQueryParam');
    }
}
