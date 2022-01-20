<?php
/**
 * CurrencyApi
 *
 * @category Class
 * @package  Devme
 * @author   DEV.ME Team
 */

/**
 * DEV.ME API Documentation
 *
 * DEV.ME API Documentation [Currency Conversion and Exchange Rates API](https://dev.me/products/currency) - [IP2Location, IP Country, IP Information API](https://dev.me/products/ip) -  [Email Validation, Mailbox Verification](https://dev.me/products/email) - [Phone Number Validation](https://dev.me/products/phone). You can learn more at [dev.me](https://dev.me). For this example you can use api key `demo-key` to tests the APIs
 *
 * The version of the OpenAPI document: 1.0.0
 * Contact: support@dev.me
 */


namespace Devme\Api;

use Devme\ApiException;
use Devme\Configuration;
use Devme\HeaderSelector;
use Devme\Model\ConvertCurrencyOut;
use Devme\Model\GetCurrencyDetailsOut;
use Devme\Model\GetCurrencyExchangeRateOut;
use Devme\Model\HttpErrorOut;
use Devme\Model\ListCurrenciesOut;
use Devme\ObjectSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use InvalidArgumentException;
use RuntimeException;

/**
 * CurrencyApi Class Doc Comment
 *
 * @category Class
 * @package  Devme
 * @author   DEV.ME Team
 */
class CurrencyApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface|null $client
     * @param Configuration|null $config
     * @param HeaderSelector|null $selector
     * @param int $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration   $config = null,
        HeaderSelector  $selector = null,
        int             $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation v1ConvertCurrency
     *
     * @param string $from from - currency to convert from (required)
     * @param string $to to - currency to convert to (required)
     * @param float $amount amount - amount to convert (optional)
     *
     * @return ConvertCurrencyOut|HttpErrorOut|HttpErrorOut
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function v1ConvertCurrency($from, $to, $amount = null)
    {
        list($response) = $this->v1ConvertCurrencyWithHttpInfo($from, $to, $amount);
        return $response;
    }

    /**
     * Operation v1ConvertCurrencyWithHttpInfo
     *
     * @param string $from from - currency to convert from (required)
     * @param string $to to - currency to convert to (required)
     * @param float $amount amount - amount to convert (optional)
     *
     * @return array of \Devme\Model\ConvertCurrencyOut|\Devme\Model\HttpErrorOut|\Devme\Model\HttpErrorOut, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function v1ConvertCurrencyWithHttpInfo($from, $to, $amount = null)
    {
        $request = $this->v1ConvertCurrencyRequest($from, $to, $amount);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int)$e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string)$e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int)$e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string)$request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string)$response->getBody()
                );
            }

            switch ($statusCode) {
                case 200:
                    if ('\Devme\Model\ConvertCurrencyOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Devme\Model\ConvertCurrencyOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Devme\Model\HttpErrorOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Devme\Model\HttpErrorOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Devme\Model\HttpErrorOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Devme\Model\HttpErrorOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Devme\Model\ConvertCurrencyOut';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string)$response->getBody();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Devme\Model\ConvertCurrencyOut',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Devme\Model\HttpErrorOut',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Devme\Model\HttpErrorOut',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'v1ConvertCurrency'
     *
     * @param string $from from - currency to convert from (required)
     * @param string $to to - currency to convert to (required)
     * @param float $amount amount - amount to convert (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    public function v1ConvertCurrencyRequest($from, $to, $amount = null)
    {
        // verify the required parameter 'from' is set
        if ($from === null || (is_array($from) && count($from) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $from when calling v1ConvertCurrency'
            );
        }
        // verify the required parameter 'to' is set
        if ($to === null || (is_array($to) && count($to) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $to when calling v1ConvertCurrency'
            );
        }

        $resourcePath = '/v1-convert-currency';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($amount !== null) {
            if (is_array($amount)) {
                foreach ($amount as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['amount'] = $amount;
            }
        }
        // query params
        if ($from !== null) {
            if (is_array($from)) {
                foreach ($from as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['from'] = $from;
            }
        }
        // query params
        if ($to !== null) {
            if (is_array($to)) {
                foreach ($to as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['to'] = $to;
            }
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $queryParams['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @return array of http client options
     * @throws RuntimeException on file opening failure
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }

    /**
     * Operation v1ConvertCurrencyAsync
     *
     * @param string $from from - currency to convert from (required)
     * @param string $to to - currency to convert to (required)
     * @param float $amount amount - amount to convert (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1ConvertCurrencyAsync($from, $to, $amount = null)
    {
        return $this->v1ConvertCurrencyAsyncWithHttpInfo($from, $to, $amount)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v1ConvertCurrencyAsyncWithHttpInfo
     *
     * @param string $from from - currency to convert from (required)
     * @param string $to to - currency to convert to (required)
     * @param float $amount amount - amount to convert (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1ConvertCurrencyAsyncWithHttpInfo($from, $to, $amount = null)
    {
        $returnType = '\Devme\Model\ConvertCurrencyOut';
        $request = $this->v1ConvertCurrencyRequest($from, $to, $amount);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string)$response->getBody()
                    );
                }
            );
    }

    /**
     * Operation v1GetCurrencyDetails
     *
     * @param string $code code - currency code ISO 4217 (required)
     * @param string[]|null $expand expand - expand properties (optional)
     * @param string[]|null $exclude exclude - exclude properties (optional)
     * @param string|null $language language - localisation language (optional)
     * @param string|null $type type - type of currency (optional)
     *
     * @return GetCurrencyDetailsOut|HttpErrorOut|HttpErrorOut
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function v1GetCurrencyDetails(string $code, array $expand = null, array $exclude = null, string $language = null, string $type = null)
    {
        list($response) = $this->v1GetCurrencyDetailsWithHttpInfo($code, $expand, $exclude, $language, $type);
        return $response;
    }

    /**
     * Operation v1GetCurrencyDetailsWithHttpInfo
     *
     * @param string $code code - currency code ISO 4217 (required)
     * @param string[] $expand expand - expand properties (optional)
     * @param string[] $exclude exclude - exclude properties (optional)
     * @param string $language language - localisation language (optional)
     * @param string $type type - type of currency (optional)
     *
     * @return array of \Devme\Model\GetCurrencyDetailsOut|\Devme\Model\HttpErrorOut|\Devme\Model\HttpErrorOut, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function v1GetCurrencyDetailsWithHttpInfo($code, $expand = null, $exclude = null, $language = null, $type = null)
    {
        $request = $this->v1GetCurrencyDetailsRequest($code, $expand, $exclude, $language, $type);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int)$e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string)$e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int)$e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string)$request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string)$response->getBody()
                );
            }

            switch ($statusCode) {
                case 200:
                    if ('\Devme\Model\GetCurrencyDetailsOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, GetCurrencyDetailsOut::class, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Devme\Model\HttpErrorOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Devme\Model\HttpErrorOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Devme\Model\HttpErrorOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Devme\Model\HttpErrorOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Devme\Model\GetCurrencyDetailsOut';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string)$response->getBody();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Devme\Model\GetCurrencyDetailsOut',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Devme\Model\HttpErrorOut',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Devme\Model\HttpErrorOut',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'v1GetCurrencyDetails'
     *
     * @param string $code code - currency code ISO 4217 (required)
     * @param string[] $expand expand - expand properties (optional)
     * @param string[] $exclude exclude - exclude properties (optional)
     * @param string $language language - localisation language (optional)
     * @param string $type type - type of currency (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    public function v1GetCurrencyDetailsRequest($code, $expand = null, $exclude = null, $language = null, $type = null)
    {
        // verify the required parameter 'code' is set
        if ($code === null || (is_array($code) && count($code) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $code when calling v1GetCurrencyDetails'
            );
        }

        $resourcePath = '/v1-get-currency-details';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($code !== null) {
            if (is_array($code)) {
                foreach ($code as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['code'] = $code;
            }
        }
        // query params
        if ($expand !== null) {
            if (is_array($expand)) {
                foreach ($expand as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['expand'] = $expand;
            }
        }
        // query params
        if ($exclude !== null) {
            if (is_array($exclude)) {
                foreach ($exclude as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['exclude'] = $exclude;
            }
        }
        // query params
        if ($language !== null) {
            if (is_array($language)) {
                foreach ($language as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['language'] = $language;
            }
        }
        // query params
        if ($type !== null) {
            if (is_array($type)) {
                foreach ($type as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['type'] = $type;
            }
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $queryParams['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v1GetCurrencyDetailsAsync
     *
     * @param string $code code - currency code ISO 4217 (required)
     * @param string[] $expand expand - expand properties (optional)
     * @param string[] $exclude exclude - exclude properties (optional)
     * @param string $language language - localisation language (optional)
     * @param string $type type - type of currency (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1GetCurrencyDetailsAsync($code, $expand = null, $exclude = null, $language = null, $type = null)
    {
        return $this->v1GetCurrencyDetailsAsyncWithHttpInfo($code, $expand, $exclude, $language, $type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v1GetCurrencyDetailsAsyncWithHttpInfo
     *
     * @param string $code code - currency code ISO 4217 (required)
     * @param string[] $expand expand - expand properties (optional)
     * @param string[] $exclude exclude - exclude properties (optional)
     * @param string $language language - localisation language (optional)
     * @param string $type type - type of currency (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1GetCurrencyDetailsAsyncWithHttpInfo($code, $expand = null, $exclude = null, $language = null, $type = null)
    {
        $returnType = '\Devme\Model\GetCurrencyDetailsOut';
        $request = $this->v1GetCurrencyDetailsRequest($code, $expand, $exclude, $language, $type);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string)$response->getBody()
                    );
                }
            );
    }

    /**
     * Operation v1GetCurrencyExchangeRate
     *
     * @param string $from from - currency to get exchange rate from (required)
     * @param string $to to - currency to get exchange rate to (required)
     *
     * @return GetCurrencyExchangeRateOut|HttpErrorOut|HttpErrorOut
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function v1GetCurrencyExchangeRate($from, $to)
    {
        list($response) = $this->v1GetCurrencyExchangeRateWithHttpInfo($from, $to);
        return $response;
    }

    /**
     * Operation v1GetCurrencyExchangeRateWithHttpInfo
     *
     * @param string $from from - currency to get exchange rate from (required)
     * @param string $to to - currency to get exchange rate to (required)
     *
     * @return array of \Devme\Model\GetCurrencyExchangeRateOut|\Devme\Model\HttpErrorOut|\Devme\Model\HttpErrorOut, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function v1GetCurrencyExchangeRateWithHttpInfo($from, $to)
    {
        $request = $this->v1GetCurrencyExchangeRateRequest($from, $to);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int)$e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string)$e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int)$e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string)$request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string)$response->getBody()
                );
            }

            switch ($statusCode) {
                case 200:
                    if ('\Devme\Model\GetCurrencyExchangeRateOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Devme\Model\GetCurrencyExchangeRateOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Devme\Model\HttpErrorOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Devme\Model\HttpErrorOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Devme\Model\HttpErrorOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Devme\Model\HttpErrorOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Devme\Model\GetCurrencyExchangeRateOut';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string)$response->getBody();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Devme\Model\GetCurrencyExchangeRateOut',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Devme\Model\HttpErrorOut',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Devme\Model\HttpErrorOut',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'v1GetCurrencyExchangeRate'
     *
     * @param string $from from - currency to get exchange rate from (required)
     * @param string $to to - currency to get exchange rate to (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    public function v1GetCurrencyExchangeRateRequest($from, $to)
    {
        // verify the required parameter 'from' is set
        if ($from === null || (is_array($from) && count($from) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $from when calling v1GetCurrencyExchangeRate'
            );
        }
        // verify the required parameter 'to' is set
        if ($to === null || (is_array($to) && count($to) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $to when calling v1GetCurrencyExchangeRate'
            );
        }

        $resourcePath = '/v1-get-currency-exchange-rate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($from !== null) {
            if (is_array($from)) {
                foreach ($from as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['from'] = $from;
            }
        }
        // query params
        if ($to !== null) {
            if (is_array($to)) {
                foreach ($to as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['to'] = $to;
            }
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $queryParams['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v1GetCurrencyExchangeRateAsync
     *
     * @param string $from from - currency to get exchange rate from (required)
     * @param string $to to - currency to get exchange rate to (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1GetCurrencyExchangeRateAsync($from, $to)
    {
        return $this->v1GetCurrencyExchangeRateAsyncWithHttpInfo($from, $to)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v1GetCurrencyExchangeRateAsyncWithHttpInfo
     *
     * @param string $from from - currency to get exchange rate from (required)
     * @param string $to to - currency to get exchange rate to (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1GetCurrencyExchangeRateAsyncWithHttpInfo($from, $to)
    {
        $returnType = '\Devme\Model\GetCurrencyExchangeRateOut';
        $request = $this->v1GetCurrencyExchangeRateRequest($from, $to);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string)$response->getBody()
                    );
                }
            );
    }

    /**
     * Operation v1ListCurrencies
     *
     * @param string[] $code code - currency code ISO 4217 (optional)
     * @param string[] $expand expand - expand properties (optional)
     * @param string[] $exclude exclude - exclude properties (optional)
     * @param string $language language - localisation language (optional)
     * @param string $type type - type of currency (optional)
     * @param string[] $sort sort - sort properties (optional)
     * @param string $page page - page number (optional)
     * @param string $page_size pageSize - page size (optional)
     *
     * @return ListCurrenciesOut|HttpErrorOut|HttpErrorOut
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function v1ListCurrencies($code = null, $expand = null, $exclude = null, $language = null, $type = null, $sort = null, $page = null, $page_size = null)
    {
        list($response) = $this->v1ListCurrenciesWithHttpInfo($code, $expand, $exclude, $language, $type, $sort, $page, $page_size);
        return $response;
    }

    /**
     * Operation v1ListCurrenciesWithHttpInfo
     *
     * @param string[] $code code - currency code ISO 4217 (optional)
     * @param string[] $expand expand - expand properties (optional)
     * @param string[] $exclude exclude - exclude properties (optional)
     * @param string $language language - localisation language (optional)
     * @param string $type type - type of currency (optional)
     * @param string[] $sort sort - sort properties (optional)
     * @param string $page page - page number (optional)
     * @param string $page_size pageSize - page size (optional)
     *
     * @return array of \Devme\Model\ListCurrenciesOut|\Devme\Model\HttpErrorOut|\Devme\Model\HttpErrorOut, HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function v1ListCurrenciesWithHttpInfo($code = null, $expand = null, $exclude = null, $language = null, $type = null, $sort = null, $page = null, $page_size = null)
    {
        $request = $this->v1ListCurrenciesRequest($code, $expand, $exclude, $language, $type, $sort, $page, $page_size);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int)$e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string)$e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int)$e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string)$request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string)$response->getBody()
                );
            }

            switch ($statusCode) {
                case 200:
                    if ('\Devme\Model\ListCurrenciesOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Devme\Model\ListCurrenciesOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Devme\Model\HttpErrorOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Devme\Model\HttpErrorOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Devme\Model\HttpErrorOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Devme\Model\HttpErrorOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Devme\Model\ListCurrenciesOut';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string)$response->getBody();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Devme\Model\ListCurrenciesOut',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Devme\Model\HttpErrorOut',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Devme\Model\HttpErrorOut',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'v1ListCurrencies'
     *
     * @param string[] $code code - currency code ISO 4217 (optional)
     * @param string[] $expand expand - expand properties (optional)
     * @param string[] $exclude exclude - exclude properties (optional)
     * @param string $language language - localisation language (optional)
     * @param string $type type - type of currency (optional)
     * @param string[] $sort sort - sort properties (optional)
     * @param string $page page - page number (optional)
     * @param string $page_size pageSize - page size (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    public function v1ListCurrenciesRequest($code = null, $expand = null, $exclude = null, $language = null, $type = null, $sort = null, $page = null, $page_size = null)
    {

        $resourcePath = '/v1-list-currencies';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($code !== null) {
            if (is_array($code)) {
                foreach ($code as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['code'] = $code;
            }
        }
        // query params
        if ($expand !== null) {
            if (is_array($expand)) {
                foreach ($expand as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['expand'] = $expand;
            }
        }
        // query params
        if ($exclude !== null) {
            if (is_array($exclude)) {
                foreach ($exclude as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['exclude'] = $exclude;
            }
        }
        // query params
        if ($language !== null) {
            if (is_array($language)) {
                foreach ($language as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['language'] = $language;
            }
        }
        // query params
        if ($type !== null) {
            if (is_array($type)) {
                foreach ($type as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['type'] = $type;
            }
        }
        // query params
        if ($sort !== null) {
            if (is_array($sort)) {
                foreach ($sort as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['sort'] = $sort;
            }
        }
        // query params
        if ($page !== null) {
            if (is_array($page)) {
                foreach ($page as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['page'] = $page;
            }
        }
        // query params
        if ($page_size !== null) {
            if (is_array($page_size)) {
                foreach ($page_size as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['pageSize'] = $page_size;
            }
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $queryParams['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v1ListCurrenciesAsync
     *
     * @param string[] $code code - currency code ISO 4217 (optional)
     * @param string[] $expand expand - expand properties (optional)
     * @param string[] $exclude exclude - exclude properties (optional)
     * @param string $language language - localisation language (optional)
     * @param string $type type - type of currency (optional)
     * @param string[] $sort sort - sort properties (optional)
     * @param string $page page - page number (optional)
     * @param string $page_size pageSize - page size (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1ListCurrenciesAsync($code = null, $expand = null, $exclude = null, $language = null, $type = null, $sort = null, $page = null, $page_size = null)
    {
        return $this->v1ListCurrenciesAsyncWithHttpInfo($code, $expand, $exclude, $language, $type, $sort, $page, $page_size)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v1ListCurrenciesAsyncWithHttpInfo
     *
     * @param string[] $code code - currency code ISO 4217 (optional)
     * @param string[] $expand expand - expand properties (optional)
     * @param string[] $exclude exclude - exclude properties (optional)
     * @param string $language language - localisation language (optional)
     * @param string $type type - type of currency (optional)
     * @param string[] $sort sort - sort properties (optional)
     * @param string $page page - page number (optional)
     * @param string $page_size pageSize - page size (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1ListCurrenciesAsyncWithHttpInfo($code = null, $expand = null, $exclude = null, $language = null, $type = null, $sort = null, $page = null, $page_size = null)
    {
        $returnType = '\Devme\Model\ListCurrenciesOut';
        $request = $this->v1ListCurrenciesRequest($code, $expand, $exclude, $language, $type, $sort, $page, $page_size);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string)$response->getBody()
                    );
                }
            );
    }
}
