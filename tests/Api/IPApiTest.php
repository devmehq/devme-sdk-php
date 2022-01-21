<?php
/**
 * IPApiTest
 *
 * @category Class
 * @package  Devme
 * @author   DEV.ME Team
 */

/**
 * DEV.ME API Documentation
 *
 * DEV.ME API Documentation [Currency Conversion and Exchange Rates API](https://dev.me/products/currency) - [IP2Location, IP Country, IP Information API](https://dev.me/products/ip) -  [Email Validation, Mailbox Verification](https://dev.me/products/email) - [Phone Number Validation](https://dev.me/products/phone). You can learn more at [dev.me](https://dev.me). For this example you can use api key `demo-key` to test the APIs
 *
 * The version of the OpenAPI document: 1.0.0
 * Contact: support@dev.me
 */


namespace Api;

use Devme\Authentication\APIKeyHeaderAuthentication;
use Jane\Component\OpenApiRuntime\Client\Plugin\AuthenticationRegistry;
use PHPUnit\Framework\TestCase;

/**
 * IPApiTest Class Doc Comment
 *
 * @category Class
 * @package  Devme
 * @author   DEV.ME Team
 */
class IPApiTest extends TestCase
{

    public $apiClient;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass(): void
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * Setup before running each test case
     */
    public function setUp(): void
    {
        if (!$this->apiClient) {
            $authenticationRegistry = new AuthenticationRegistry([new APIKeyHeaderAuthentication('demo-key')]);
            $this->apiClient = \Devme\Client::create(null, [$authenticationRegistry]);
        }
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown(): void
    {
    }

    /**
     * Test case for v1GetIpDetails
     *
     *
     */
    public function testsV1GetIpDetails(): void
    {
        $result = $this->apiClient->v1GetIpDetails([ 'ip' => '52.45.23.11']);
        $this->assertSame($result->getCountryCode(), 'US');
        $this->assertSame($result->getIp(), '52.45.23.11');
        $this->assertSame($result->getAso(), 'AMAZON-AES');
        $this->assertSame($result->getAsn(), '14618');
    }
}
