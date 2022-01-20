<?php
/**
 * PhoneApi
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
use Devme\Model\GetPhoneDetailsOut;
use Devme\Model\HttpErrorOut;
use Devme\ObjectSerializer;
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
 * PhoneApi Class Doc Comment
 *
 * @category Class
 * @package  Devme
 * @author   DEV.ME Team
 */
class PhoneApi extends BaseApi
{
    /**
     * Operation v1GetPhoneDetails
     *
     * @param string $phone phone - phone number to validate (required)
     *
     * @return GetPhoneDetailsOut|HttpErrorOut
     * @throws InvalidArgumentException
     * @throws ApiException|GuzzleException on non-2xx response
     */
    public function v1GetPhoneDetails(string $phone)
    {
        list($response) = $this->v1GetPhoneDetailsWithHttpInfo($phone);
        return $response;
    }

    /**
     * Operation v1GetPhoneDetailsWithHttpInfo
     *
     * @param string $phone phone - phone number to validate (required)
     *
     * @return array of \Devme\Model\GetPhoneDetailsOut|\Devme\Model\HttpErrorOut|\Devme\Model\HttpErrorOut, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException|GuzzleException on non-2xx response
     */
    public function v1GetPhoneDetailsWithHttpInfo(string $phone): array
    {
        $request = $this->v1GetPhoneDetailsRequest($phone);

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
                    if ('\Devme\Model\GetPhoneDetailsOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Devme\Model\GetPhoneDetailsOut', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
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
            }

            $returnType = '\Devme\Model\GetPhoneDetailsOut';
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
                        '\Devme\Model\GetPhoneDetailsOut',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                case 400:
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
     * Create request for operation 'v1GetPhoneDetails'
     *
     * @param string $phone phone - phone number to validate (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    public function v1GetPhoneDetailsRequest(string $phone): Request
    {
        // verify the required parameter 'phone' is set
        if ($phone === null || (is_array($phone) && count($phone) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $phone when calling v1GetPhoneDetails'
            );
        }

        $resourcePath = '/v1-get-phone-details';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($phone !== null) {
            if (is_array($phone)) {
                foreach ($phone as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['phone'] = $phone;
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
     * Operation v1GetPhoneDetailsAsync
     *
     * @param string $phone phone - phone number to validate (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1GetPhoneDetailsAsync(string $phone): PromiseInterface
    {
        return $this->v1GetPhoneDetailsAsyncWithHttpInfo($phone)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v1GetPhoneDetailsAsyncWithHttpInfo
     *
     * @param string $phone phone - phone number to validate (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1GetPhoneDetailsAsyncWithHttpInfo(string $phone): PromiseInterface
    {
        $returnType = GetPhoneDetailsOut::class;
        $request = $this->v1GetPhoneDetailsRequest($phone);

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
