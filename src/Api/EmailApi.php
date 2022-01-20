<?php
/**
 * EmailApi
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
use Devme\Model\GetEmailDetailsOut;
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
 * EmailApi Class Doc Comment
 *
 * @category Class
 * @package  Devme
 * @author   DEV.ME Team
 */
class EmailApi extends BaseApi
{

    /**
     * Operation v1GetEmailDetails
     *
     * @param string $email email - email address (required)
     * @param bool|null $verify_mx verifyMx - verify domain dns for MX record (optional)
     * @param bool|null $verify_smtp verifySmtp - verify mailbox with SMTP Connect and Reply (optional)
     *
     * @return GetEmailDetailsOut|HttpErrorOut|HttpErrorOut
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function v1GetEmailDetails(string $email, bool $verify_mx = null, bool $verify_smtp = null)
    {
        list($response) = $this->v1GetEmailDetailsWithHttpInfo($email, $verify_mx, $verify_smtp);
        return $response;
    }

    /**
     * Operation v1GetEmailDetailsWithHttpInfo
     *
     * @param string $email email - email address (required)
     * @param bool|null $verify_mx verifyMx - verify domain dns for MX record (optional)
     * @param bool|null $verify_smtp verifySmtp - verify mailbox with SMTP Connect and Reply (optional)
     *
     * @return array of \Devme\Model\GetEmailDetailsOut|\Devme\Model\HttpErrorOut|\Devme\Model\HttpErrorOut, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException|GuzzleException on non-2xx response
     */
    public function v1GetEmailDetailsWithHttpInfo(string $email, bool $verify_mx = null, bool $verify_smtp = null): array
    {
        $request = $this->v1GetEmailDetailsRequest($email, $verify_mx, $verify_smtp);

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
                    if ('\Devme\Model\GetEmailDetailsOut' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Devme\Model\GetEmailDetailsOut', []),
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

            $returnType = '\Devme\Model\GetEmailDetailsOut';
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
                        '\Devme\Model\GetEmailDetailsOut',
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
     * Create request for operation 'v1GetEmailDetails'
     *
     * @param string $email email - email address (required)
     * @param bool $verify_mx verifyMx - verify domain dns for MX record (optional)
     * @param bool $verify_smtp verifySmtp - verify mailbox with SMTP Connect and Reply (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    public function v1GetEmailDetailsRequest($email, $verify_mx = null, $verify_smtp = null)
    {
        // verify the required parameter 'email' is set
        if ($email === null || (is_array($email) && count($email) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $email when calling v1GetEmailDetails'
            );
        }

        $resourcePath = '/v1-get-email-details';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($email !== null) {
            if (is_array($email)) {
                foreach ($email as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['email'] = $email;
            }
        }
        // query params
        if ($verify_mx !== null) {
            if (is_array($verify_mx)) {
                foreach ($verify_mx as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['verifyMx'] = $verify_mx;
            }
        }
        // query params
        if ($verify_smtp !== null) {
            if (is_array($verify_smtp)) {
                foreach ($verify_smtp as $key => $value) {
                    $queryParams[$key] = $value;
                }
            } else {
                $queryParams['verifySmtp'] = $verify_smtp;
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
     * Operation v1GetEmailDetailsAsync
     *
     * @param string $email email - email address (required)
     * @param bool|null $verify_mx verifyMx - verify domain dns for MX record (optional)
     * @param bool|null $verify_smtp verifySmtp - verify mailbox with SMTP Connect and Reply (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1GetEmailDetailsAsync(string $email, bool $verify_mx = null, bool $verify_smtp = null): PromiseInterface
    {
        return $this->v1GetEmailDetailsAsyncWithHttpInfo($email, $verify_mx, $verify_smtp)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v1GetEmailDetailsAsyncWithHttpInfo
     *
     * @param string $email email - email address (required)
     * @param bool|null $verify_mx verifyMx - verify domain dns for MX record (optional)
     * @param bool|null $verify_smtp verifySmtp - verify mailbox with SMTP Connect and Reply (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function v1GetEmailDetailsAsyncWithHttpInfo(string $email, bool $verify_mx = null, bool $verify_smtp = null): PromiseInterface
    {
        $returnType = GetEmailDetailsOut::class;
        $request = $this->v1GetEmailDetailsRequest($email, $verify_mx, $verify_smtp);

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
