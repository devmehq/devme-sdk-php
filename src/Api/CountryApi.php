<?php
/**
 * CountryApi
 *
 * @category Class
 * @package  DevmeSdk
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


namespace DevmeSdk\Api;

use DevmeSdk\ApiException;
use DevmeSdk\Configuration;
use DevmeSdk\HeaderSelector;
use DevmeSdk\Model\GetCountryDetailsOut;
use DevmeSdk\Model\HttpErrorOut;
use DevmeSdk\Model\ListCountriesOut;
use DevmeSdk\ObjectSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use InvalidArgumentException;
use RuntimeException;

/**
 * CountryApi Class Doc Comment
 *
 * @category Class
 * @package  DevmeSdk
 * @author   DEV.ME Team
 */
class CountryApi extends BaseApi
{
    /**
     * Operation v1GetCountryDetails
     *
     * @param string $code code - country code ISO 4217 (required)
     * @param string[]|null $expand expand - expand properties (optional)
     * @param string[]|null $exclude exclude - exclude properties (optional)
     * @param string|null $language language - localisation language (optional)
     *
     * @return GetCountryDetailsOut|HttpErrorOut
     * @throws InvalidArgumentException
     * @throws ApiException|GuzzleException on non-2xx response
     */
    public function v1GetCountryDetails(string $code, array $expand = null, array $exclude = null, string $language = null)
    {
        list($response) = $this->v1GetCountryDetailsWithHttpInfo($code, $expand, $exclude, $language);
        return $response;
    }

    /**
     * Operation v1GetCountryDetailsWithHttpInfo
     *
     * @param string $code code - country code ISO 4217 (required)
     * @param string[]|null $expand expand - expand properties (optional)
     * @param string[]|null $exclude exclude - exclude properties (optional)
     * @param string|null $language language - localisation language (optional)
     *
     * @return array of \DevmeSdk\Model\GetCountryDetailsOut|\DevmeSdk\Model\HttpErrorOut|\DevmeSdk\Model\HttpErrorOut, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException|GuzzleException on non-2xx response
     */
    public function v1GetCountryDetailsWithHttpInfo(string $code, array $expand = null, array $exclude = null, string $language = null): array
    {
        $request = $this->v1GetCountryDetailsRequest($code, $expand, $exclude, $language);

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
                    if ('\DevmeSdk\Model\GetCountryDetailsOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DevmeSdk\Model\GetCountryDetailsOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                case 400:
                    if ('\DevmeSdk\Model\HttpErrorOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DevmeSdk\Model\HttpErrorOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DevmeSdk\Model\GetCountryDetailsOut';
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
                        '\DevmeSdk\Model\GetCountryDetailsOut',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DevmeSdk\Model\HttpErrorOut',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'v1GetCountryDetails'
     *
     * @param string $code code - country code ISO 4217 (required)
     * @param string[]|null $expand expand - expand properties (optional)
     * @param string[]|null $exclude exclude - exclude properties (optional)
     * @param string|null $language language - localisation language (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    public function v1GetCountryDetailsRequest(string $code, array $expand = null, array $exclude = null, string $language = null): Request
    {
        // verify the required parameter 'code' is set
        if ($code === null || (is_array($code) && count($code) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $code when calling v1GetCountryDetails'
            );
        }

        $resourcePath = '/v1-get-country-details';
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
     * Operation v1GetCountryDetailsAsync
     *
     * @param string $code code - country code ISO 4217 (required)
     * @param string[]|null $expand expand - expand properties (optional)
     * @param string[]|null $exclude exclude - exclude properties (optional)
     * @param string|null $language language - localisation language (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1GetCountryDetailsAsync(string $code, array $expand = null, array $exclude = null, string $language = null): PromiseInterface
    {
        return $this->v1GetCountryDetailsAsyncWithHttpInfo($code, $expand, $exclude, $language)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v1GetCountryDetailsAsyncWithHttpInfo
     *
     * @param string $code code - country code ISO 4217 (required)
     * @param string[]|null $expand expand - expand properties (optional)
     * @param string[]|null $exclude exclude - exclude properties (optional)
     * @param string|null $language language - localisation language (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1GetCountryDetailsAsyncWithHttpInfo(string $code, array $expand = null, array $exclude = null, string $language = null): PromiseInterface
    {
        $returnType = GetCountryDetailsOut::class;
        $request = $this->v1GetCountryDetailsRequest($code, $expand, $exclude, $language);

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
     * Operation v1ListCountries
     *
     * @param string[]|null $code code - country code ISO 4217 (optional)
     * @param string[]|null $expand expand - expand properties (optional)
     * @param string[]|null $exclude exclude - exclude properties (optional)
     * @param string|null $language language - localisation language (optional)
     * @param string[]|null $sort sort - sort properties (optional)
     * @param string|null $page page - page number (optional)
     * @param string|null $page_size pageSize - page size (optional)
     *
     * @return ListCountriesOut|HttpErrorOut
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     */
    public function v1ListCountries(array $code = null, array $expand = null, array $exclude = null, string $language = null, array $sort = null, string $page = null, string $page_size = null)
    {
        list($response) = $this->v1ListCountriesWithHttpInfo($code, $expand, $exclude, $language, $sort, $page, $page_size);
        return $response;
    }

    /**
     * Operation v1ListCountriesWithHttpInfo
     *
     * @param string[]|null $code code - country code ISO 4217 (optional)
     * @param string[]|null $expand expand - expand properties (optional)
     * @param string[]|null $exclude exclude - exclude properties (optional)
     * @param string|null $language language - localisation language (optional)
     * @param string[]|null $sort sort - sort properties (optional)
     * @param string|null $page page - page number (optional)
     * @param string|null $page_size pageSize - page size (optional)
     *
     * @return array of \DevmeSdk\Model\ListCountriesOut|\DevmeSdk\Model\HttpErrorOut|\DevmeSdk\Model\HttpErrorOut, HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException|GuzzleException
     */
    public function v1ListCountriesWithHttpInfo(array $code = null, array $expand = null, array $exclude = null, string $language = null, array $sort = null, string $page = null, string $page_size = null): array
    {
        $request = $this->v1ListCountriesRequest($code, $expand, $exclude, $language, $sort, $page, $page_size);

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
                    if ('\DevmeSdk\Model\ListCountriesOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DevmeSdk\Model\ListCountriesOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                case 400:
                    if ('\DevmeSdk\Model\HttpErrorOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DevmeSdk\Model\HttpErrorOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DevmeSdk\Model\ListCountriesOut';
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
                        ListCountriesOut::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        HttpErrorOut::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'v1ListCountries'
     *
     * @param string[]|null $code code - country code ISO 4217 (optional)
     * @param string[]|null $expand expand - expand properties (optional)
     * @param string[]|null $exclude exclude - exclude properties (optional)
     * @param string|null $language language - localisation language (optional)
     * @param string[]|null $sort sort - sort properties (optional)
     * @param string|null $page page - page number (optional)
     * @param string|null $page_size pageSize - page size (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    public function v1ListCountriesRequest(array $code = null, array $expand = null, array $exclude = null, string $language = null, array $sort = null, string $page = null, string $page_size = null): Request
    {

        $resourcePath = '/v1-list-countries';
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
     * Operation v1ListCountriesAsync
     *
     * @param string[]|null $code code - country code ISO 4217 (optional)
     * @param string[] $expand expand - expand properties (optional)
     * @param string[] $exclude exclude - exclude properties (optional)
     * @param string $language language - localisation language (optional)
     * @param string[] $sort sort - sort properties (optional)
     * @param string $page page - page number (optional)
     * @param string $page_size pageSize - page size (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1ListCountriesAsync(array $code = null, $expand = null, $exclude = null, $language = null, $sort = null, $page = null, $page_size = null): PromiseInterface
    {
        return $this->v1ListCountriesAsyncWithHttpInfo($code, $expand, $exclude, $language, $sort, $page, $page_size)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v1ListCountriesAsyncWithHttpInfo
     *
     * @param string[]|null $code code - country code ISO 4217 (optional)
     * @param string[]|null $expand expand - expand properties (optional)
     * @param string[]|null $exclude exclude - exclude properties (optional)
     * @param string|null $language language - localisation language (optional)
     * @param string[]|null $sort sort - sort properties (optional)
     * @param string|null $page page - page number (optional)
     * @param string|null $page_size pageSize - page size (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1ListCountriesAsyncWithHttpInfo(array $code = null, array $expand = null, array $exclude = null, string $language = null, array $sort = null, string $page = null, string $page_size = null): PromiseInterface
    {
        $returnType = ListCountriesOut::class;
        $request = $this->v1ListCountriesRequest($code, $expand, $exclude, $language, $sort, $page, $page_size);

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
