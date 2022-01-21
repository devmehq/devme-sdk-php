<?php

namespace DevmeSdk;

class Client extends \DevmeSdk\Runtime\Client\Client
{
    /**
     * Convert currency to another currency
     *
     * @param array $queryParameters {
     *     @var float $amount amount - amount to convert
     *     @var string $from from - currency to convert from
     *     @var string $to to - currency to convert to
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \DevmeSdk\Exception\V1ConvertCurrencyBadRequestException
     * @throws \DevmeSdk\Exception\V1ConvertCurrencyUnauthorizedException
     *
     * @return null|\DevmeSdk\Model\ConvertCurrencyOut|\Psr\Http\Message\ResponseInterface
     */
    public function v1ConvertCurrency(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \DevmeSdk\Endpoint\V1ConvertCurrency($queryParameters), $fetch);
    }
    /**
     * Get country facts and information
     *
     * @param array $queryParameters {
     *     @var string $code code - country code ISO 4217
     *     @var array $expand expand - expand properties
     *     @var array $exclude exclude - exclude properties
     *     @var string $language language - localisation language
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \DevmeSdk\Exception\V1GetCountryDetailsBadRequestException
     * @throws \DevmeSdk\Exception\V1GetCountryDetailsUnauthorizedException
     *
     * @return null|\DevmeSdk\Model\GetCountryDetailsOut|\Psr\Http\Message\ResponseInterface
     */
    public function v1GetCountryDetails(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \DevmeSdk\Endpoint\V1GetCountryDetails($queryParameters), $fetch);
    }
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
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \DevmeSdk\Exception\V1GetCurrencyDetailsBadRequestException
     * @throws \DevmeSdk\Exception\V1GetCurrencyDetailsUnauthorizedException
     *
     * @return null|\DevmeSdk\Model\GetCurrencyDetailsOut|\Psr\Http\Message\ResponseInterface
     */
    public function v1GetCurrencyDetails(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \DevmeSdk\Endpoint\V1GetCurrencyDetails($queryParameters), $fetch);
    }
    /**
     * Get exchange rate for a currency
     *
     * @param array $queryParameters {
     *     @var string $from from - currency to get exchange rate from
     *     @var string $to to - currency to get exchange rate to
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \DevmeSdk\Exception\V1GetCurrencyExchangeRateBadRequestException
     * @throws \DevmeSdk\Exception\V1GetCurrencyExchangeRateUnauthorizedException
     *
     * @return null|\DevmeSdk\Model\GetCurrencyExchangeRateOut|\Psr\Http\Message\ResponseInterface
     */
    public function v1GetCurrencyExchangeRate(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \DevmeSdk\Endpoint\V1GetCurrencyExchangeRate($queryParameters), $fetch);
    }
    /**
     * Get domain WHOIS details and registration information
     *
     * @param array $queryParameters {
     *     @var string $domain domain - Domain name to get details for
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \DevmeSdk\Exception\V1GetDomainWhoisBadRequestException
     * @throws \DevmeSdk\Exception\V1GetDomainWhoisUnauthorizedException
     *
     * @return null|\DevmeSdk\Model\GetDomainWhoisOut|\Psr\Http\Message\ResponseInterface
     */
    public function v1GetDomainWhois(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \DevmeSdk\Endpoint\V1GetDomainWhois($queryParameters), $fetch);
    }
    /**
     * Get email validation details
     *
     * @param array $queryParameters {
     *     @var string $email email - email address
     *     @var bool $verifyMx verifyMx - verify domain dns for MX record
     *     @var bool $verifySmtp verifySmtp - verify mailbox with SMTP Connect and Reply
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \DevmeSdk\Exception\V1GetEmailDetailsBadRequestException
     * @throws \DevmeSdk\Exception\V1GetEmailDetailsUnauthorizedException
     *
     * @return null|\DevmeSdk\Model\GetEmailDetailsOut|\Psr\Http\Message\ResponseInterface
     */
    public function v1GetEmailDetails(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \DevmeSdk\Endpoint\V1GetEmailDetails($queryParameters), $fetch);
    }
    /**
     * Get IP GEO Location and ISP details
     *
     * @param array $queryParameters {
     *     @var string $ip ip - IP Address
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \DevmeSdk\Exception\V1GetIpDetailsBadRequestException
     * @throws \DevmeSdk\Exception\V1GetIpDetailsUnauthorizedException
     *
     * @return null|\DevmeSdk\Model\GetIpDetailsOut|\Psr\Http\Message\ResponseInterface
     */
    public function v1GetIpDetails(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \DevmeSdk\Endpoint\V1GetIpDetails($queryParameters), $fetch);
    }
    /**
     * Get phone validation details
     *
     * @param array $queryParameters {
     *     @var string $phone phone - phone number to validate
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \DevmeSdk\Exception\V1GetPhoneDetailsBadRequestException
     * @throws \DevmeSdk\Exception\V1GetPhoneDetailsUnauthorizedException
     *
     * @return null|\DevmeSdk\Model\GetPhoneDetailsOut|\Psr\Http\Message\ResponseInterface
     */
    public function v1GetPhoneDetails(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \DevmeSdk\Endpoint\V1GetPhoneDetails($queryParameters), $fetch);
    }
    /**
     * Get list of all countries
     *
     * @param array $queryParameters {
     *     @var array $code code - country code ISO 4217
     *     @var array $expand expand - expand properties
     *     @var array $exclude exclude - exclude properties
     *     @var string $language language - localisation language
     *     @var array $sort sort - sort properties
     *     @var string $page page - page number
     *     @var string $pageSize pageSize - page size
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \DevmeSdk\Exception\V1ListCountriesBadRequestException
     * @throws \DevmeSdk\Exception\V1ListCountriesUnauthorizedException
     *
     * @return null|\DevmeSdk\Model\ListCountriesOut|\Psr\Http\Message\ResponseInterface
     */
    public function v1ListCountries(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \DevmeSdk\Endpoint\V1ListCountries($queryParameters), $fetch);
    }
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
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \DevmeSdk\Exception\V1ListCurrenciesBadRequestException
     * @throws \DevmeSdk\Exception\V1ListCurrenciesUnauthorizedException
     *
     * @return null|\DevmeSdk\Model\ListCurrenciesOut|\Psr\Http\Message\ResponseInterface
     */
    public function v1ListCurrencies(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \DevmeSdk\Endpoint\V1ListCurrencies($queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return null|\DevmeSdk\Model\WhoAmIOut|\Psr\Http\Message\ResponseInterface
     */
    public function v1WhoAmI(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \DevmeSdk\Endpoint\V1WhoAmI(), $fetch);
    }
    public static function create($httpClient = null, array $additionalPlugins = array())
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = array();
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUrlFactory()->createUri('https://api.dev.me');
            $plugins[] = new \Http\Client\Common\Plugin\AddHostPlugin($uri);
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $serializer = new \Symfony\Component\Serializer\Serializer(array(new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \DevmeSdk\Normalizer\JaneObjectNormalizer()), array(new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(array('json_decode_associative' => true)))));
        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
