<?php
/**
 * IPApi
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
use DevmeSdk\Model\GetIpDetailsOut;
use DevmeSdk\Model\HttpErrorOut;
use DevmeSdk\ObjectSerializer;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;

/**
 * IPApi Class Doc Comment
 *
 * @category Class
 * @package  DevmeSdk
 * @author   DEV.ME Team
 */
class IPApi extends BaseApi
{

    /**
     * Operation v1GetIpDetails
     *
     * @param string|null $ip ip - IP Address (optional)
     *
     * @return GetIpDetailsOut|HttpErrorOut
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function v1GetIpDetails(string $ip = null)
    {
        list($response) = $this->v1GetIpDetailsWithHttpInfo($ip);
        return $response;
    }

    /**
     * Operation v1GetIpDetailsWithHttpInfo
     *
     * @param string|null $ip ip - IP Address (optional)
     *
     * @return array of \DevmeSdk\Model\GetIpDetailsOut|\DevmeSdk\Model\HttpErrorOut|\DevmeSdk\Model\HttpErrorOut, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException|GuzzleException on non-2xx response
     */
    public function v1GetIpDetailsWithHttpInfo(string $ip = null): array
    {
        $request = $this->v1GetIpDetailsRequest($ip);

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
                    if ('\DevmeSdk\Model\GetIpDetailsOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, GetIpDetailsOut::class, []),
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
                        ObjectSerializer::deserialize($content, HttpErrorOut::class, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = GetIpDetailsOut::class;
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
                        GetIpDetailsOut::class,
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
     * Create request for operation 'v1GetIpDetails'
     *
     * @param string|null $ip ip - IP Address (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    public function v1GetIpDetailsRequest(string $ip = null): Request
    {
        $resourcePath = '/v1-get-ip-details';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($ip !== null) {
            $queryParams['ip'] = $ip;
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
     * Operation v1GetIpDetailsAsync
     *
     * @param string|null $ip ip - IP Address (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1GetIpDetailsAsync(string $ip = null): PromiseInterface
    {
        return $this->v1GetIpDetailsAsyncWithHttpInfo($ip)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v1GetIpDetailsAsyncWithHttpInfo
     *
     * @param string|null $ip ip - IP Address (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1GetIpDetailsAsyncWithHttpInfo(string $ip = null): PromiseInterface
    {
        $returnType = GetIpDetailsOut::class;
        $request = $this->v1GetIpDetailsRequest($ip);

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
