<?php
/**
 * GetEmailDetailsOut
 *
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


namespace Devme\Model;

use ArrayAccess;
use Devme\ObjectSerializer;
use JsonSerializable;

/**
 * GetEmailDetailsOut Class Doc Comment
 *
 * @category Class
 * @package  Devme
 * @author   DEV.ME Team
 * @implements ArrayAccess
 * @template TKey int|null
 * @template TValue mixed|null
 */
class GetEmailDetailsOut implements ModelInterface, ArrayAccess, JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'GetEmailDetailsOut';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'email' => 'string',
        'valid_mx' => 'bool',
        'valid_smtp' => 'bool',
        'valid_format' => 'bool',
        'is_disposable' => 'bool',
        'is_free' => 'bool',
        'domain_age' => 'float',
        'score' => 'float'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'email' => null,
        'valid_mx' => null,
        'valid_smtp' => null,
        'valid_format' => null,
        'is_disposable' => null,
        'is_free' => null,
        'domain_age' => null,
        'score' => null
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'email' => 'email',
        'valid_mx' => 'validMx',
        'valid_smtp' => 'validSmtp',
        'valid_format' => 'validFormat',
        'is_disposable' => 'isDisposable',
        'is_free' => 'isFree',
        'domain_age' => 'domainAge',
        'score' => 'score'
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'email' => 'setEmail',
        'valid_mx' => 'setValidMx',
        'valid_smtp' => 'setValidSmtp',
        'valid_format' => 'setValidFormat',
        'is_disposable' => 'setIsDisposable',
        'is_free' => 'setIsFree',
        'domain_age' => 'setDomainAge',
        'score' => 'setScore'
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'email' => 'getEmail',
        'valid_mx' => 'getValidMx',
        'valid_smtp' => 'getValidSmtp',
        'valid_format' => 'getValidFormat',
        'is_disposable' => 'getIsDisposable',
        'is_free' => 'getIsFree',
        'domain_age' => 'getDomainAge',
        'score' => 'getScore'
    ];
    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['email'] = $data['email'] ?? null;
        $this->container['valid_mx'] = $data['valid_mx'] ?? null;
        $this->container['valid_smtp'] = $data['valid_smtp'] ?? null;
        $this->container['valid_format'] = $data['valid_format'] ?? null;
        $this->container['is_disposable'] = $data['is_disposable'] ?? null;
        $this->container['is_free'] = $data['is_free'] ?? null;
        $this->container['domain_age'] = $data['domain_age'] ?? null;
        $this->container['score'] = $data['score'] ?? null;
    }

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Gets email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string|null $email email address
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets valid_mx
     *
     * @return bool|null
     */
    public function getValidMx()
    {
        return $this->container['valid_mx'];
    }

    /**
     * Sets valid_mx
     *
     * @param bool|null $valid_mx is the domain is valid with dns MX record
     *
     * @return self
     */
    public function setValidMx($valid_mx)
    {
        $this->container['valid_mx'] = $valid_mx;

        return $this;
    }

    /**
     * Gets valid_smtp
     *
     * @return bool|null
     */
    public function getValidSmtp()
    {
        return $this->container['valid_smtp'];
    }

    /**
     * Sets valid_smtp
     *
     * @param bool|null $valid_smtp is email address valid with SMTP Connect and Reply
     *
     * @return self
     */
    public function setValidSmtp($valid_smtp)
    {
        $this->container['valid_smtp'] = $valid_smtp;

        return $this;
    }

    /**
     * Gets valid_format
     *
     * @return bool|null
     */
    public function getValidFormat()
    {
        return $this->container['valid_format'];
    }

    /**
     * Sets valid_format
     *
     * @param bool|null $valid_format is email valid format
     *
     * @return self
     */
    public function setValidFormat($valid_format)
    {
        $this->container['valid_format'] = $valid_format;

        return $this;
    }

    /**
     * Gets is_disposable
     *
     * @return bool|null
     */
    public function getIsDisposable()
    {
        return $this->container['is_disposable'];
    }

    /**
     * Sets is_disposable
     *
     * @param bool|null $is_disposable is disposable email
     *
     * @return self
     */
    public function setIsDisposable($is_disposable)
    {
        $this->container['is_disposable'] = $is_disposable;

        return $this;
    }

    /**
     * Gets is_free
     *
     * @return bool|null
     */
    public function getIsFree()
    {
        return $this->container['is_free'];
    }

    /**
     * Sets is_free
     *
     * @param bool|null $is_free is free email
     *
     * @return self
     */
    public function setIsFree($is_free)
    {
        $this->container['is_free'] = $is_free;

        return $this;
    }

    /**
     * Gets domain_age
     *
     * @return float|null
     */
    public function getDomainAge()
    {
        return $this->container['domain_age'];
    }

    /**
     * Sets domain_age
     *
     * @param float|null $domain_age domain age
     *
     * @return self
     */
    public function setDomainAge($domain_age)
    {
        $this->container['domain_age'] = $domain_age;

        return $this;
    }

    /**
     * Gets score
     *
     * @return float|null
     */
    public function getScore()
    {
        return $this->container['score'];
    }

    /**
     * Sets score
     *
     * @param float|null $score quality score
     *
     * @return self
     */
    public function setScore($score)
    {
        $this->container['score'] = $score;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed $value Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
