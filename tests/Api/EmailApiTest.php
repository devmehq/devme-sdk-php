<?php
/**
 * EmailApiTest
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

use DevmeSdk\Authentication\APIKeyHeaderAuthentication;
use Jane\Component\OpenApiRuntime\Client\Plugin\AuthenticationRegistry;
use PHPUnit\Framework\TestCase;

/**
 * EmailApiTest Class Doc Comment
 *
 * @category Class
 * @package  Devme
 * @author   DEV.ME Team
 */
class EmailApiTest extends TestCase
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
            $this->apiClient = \DevmeSdk\Client::create(null, [$authenticationRegistry]);
        }
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown(): void
    {
    }

    /**
     * Test case for v1GetEmailDetails
     *
     *
     */
    public function testsV1GetEmailDetails(): void
    {
        $result = $this->apiClient->v1GetEmailDetails(['email' => 'email@yop.com', 'verifyMx' => true, 'verifySmtp' => true, 'timeout' => 3]);
        $this->assertEquals(false, $result->getValidMx());
        $this->assertEquals(false, $result->getValidSmtp());
        $this->assertEquals(true, $result->getValidFormat());
        sleep(1);

        $result = $this->apiClient->v1GetEmailDetails(['email' => 'email@yopmail.com', 'verifyMx' => true, 'verifySmtp' => true, 'timeout' => 5]);
        $this->assertEquals(true, $result->getValidMx());
        $this->assertEquals(true, $result->getValidSmtp());
        $this->assertEquals(true, $result->getValidFormat());
        $this->assertEquals(true, $result->getIsFree());
        $this->assertEquals(true, $result->getIsDisposable());
        sleep(1);

        $result = $this->apiClient->v1GetEmailDetails(['email' => 'email@googlemail.com', 'verifyMx' => true, 'verifySmtp' => false, 'timeout' => 3]);
        $this->assertEquals(true, $result->getValidMx());
        $this->assertEquals(false, $result->getValidSmtp());
        $this->assertEquals(true, $result->getValidFormat());
        $this->assertEquals(true, $result->getIsFree());
        $this->assertEquals(false, $result->getIsDisposable());
        sleep(1);

        $result = $this->apiClient->v1GetEmailDetails(['email' => 'myemail@yahoo.com', 'verifyMx' => true, 'verifySmtp' => true, 'timeout' => 3]);
        $this->assertEquals(true, $result->getValidMx());
        $this->assertEquals(true, $result->getValidSmtp());
        $this->assertEquals(true, $result->getValidFormat());
        $this->assertEquals(true, $result->getIsFree());
        $this->assertEquals(false, $result->getIsDisposable());
        sleep(1);

        $result = $this->apiClient->v1GetEmailDetails(['email' => 'support@dev.me', 'verifyMx' => true, 'verifySmtp' => true, 'timeout' => 3]);
        $this->assertEquals(true, $result->getValidMx());
        $this->assertEquals(true, $result->getValidSmtp());
        $this->assertEquals(true, $result->getValidFormat());
        $this->assertEquals(false, $result->getIsFree());
        $this->assertEquals(false, $result->getIsDisposable());
    }
}
