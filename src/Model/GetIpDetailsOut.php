<?php
/**
 * GetIpDetailsOut
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
 * GetIpDetailsOut Class Doc Comment
 *
 * @category Class
 * @package  Devme
 * @author   DEV.ME Team
 * @implements ArrayAccess
 * @template TKey int|null
 * @template TValue mixed|null
 */
class GetIpDetailsOut implements ModelInterface, ArrayAccess, JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'GetIpDetailsOut';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'ip' => 'string',
        'country_code' => 'string',
        'registered_country_code' => 'string',
        'asn' => 'string',
        'aso' => 'string',
        'city' => '\Devme\Model\GetIpDetailsCityOut'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'ip' => null,
        'country_code' => null,
        'registered_country_code' => null,
        'asn' => null,
        'aso' => null,
        'city' => null
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'ip' => 'ip',
        'country_code' => 'countryCode',
        'registered_country_code' => 'registeredCountryCode',
        'asn' => 'asn',
        'aso' => 'aso',
        'city' => 'city'
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'ip' => 'setIp',
        'country_code' => 'setCountryCode',
        'registered_country_code' => 'setRegisteredCountryCode',
        'asn' => 'setAsn',
        'aso' => 'setAso',
        'city' => 'setCity'
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'ip' => 'getIp',
        'country_code' => 'getCountryCode',
        'registered_country_code' => 'getRegisteredCountryCode',
        'asn' => 'getAsn',
        'aso' => 'getAso',
        'city' => 'getCity'
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
        $this->container['ip'] = $data['ip'] ?? null;
        $this->container['country_code'] = $data['country_code'] ?? null;
        $this->container['registered_country_code'] = $data['registered_country_code'] ?? null;
        $this->container['asn'] = $data['asn'] ?? null;
        $this->container['aso'] = $data['aso'] ?? null;
        $this->container['city'] = $data['city'] ?? null;
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
     * Gets ip
     *
     * @return string|null
     */
    public function getIp()
    {
        return $this->container['ip'];
    }

    /**
     * Sets ip
     *
     * @param string|null $ip IP Address
     *
     * @return self
     */
    public function setIp($ip)
    {
        $this->container['ip'] = $ip;

        return $this;
    }

    /**
     * Gets country_code
     *
     * @return string|null
     */
    public function getCountryCode()
    {
        return $this->container['country_code'];
    }

    /**
     * Sets country_code
     *
     * @param string|null $country_code Country Code ISO 3166-1 Alpha-2
     *
     * @return self
     */
    public function setCountryCode($country_code)
    {
        $this->container['country_code'] = $country_code;

        return $this;
    }

    /**
     * Gets registered_country_code
     *
     * @return string|null
     */
    public function getRegisteredCountryCode()
    {
        return $this->container['registered_country_code'];
    }

    /**
     * Sets registered_country_code
     *
     * @param string|null $registered_country_code Registered Country Code ISO 3166-1 Alpha-2
     *
     * @return self
     */
    public function setRegisteredCountryCode($registered_country_code)
    {
        $this->container['registered_country_code'] = $registered_country_code;

        return $this;
    }

    /**
     * Gets asn
     *
     * @return string|null
     */
    public function getAsn()
    {
        return $this->container['asn'];
    }

    /**
     * Sets asn
     *
     * @param string|null $asn autonomous system number
     *
     * @return self
     */
    public function setAsn($asn)
    {
        $this->container['asn'] = $asn;

        return $this;
    }

    /**
     * Gets aso
     *
     * @return string|null
     */
    public function getAso()
    {
        return $this->container['aso'];
    }

    /**
     * Sets aso
     *
     * @param string|null $aso autonomous system organization
     *
     * @return self
     */
    public function setAso($aso)
    {
        $this->container['aso'] = $aso;

        return $this;
    }

    /**
     * Gets city
     *
     * @return GetIpDetailsCityOut|null
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param GetIpDetailsCityOut|null $city city
     *
     * @return self
     */
    public function setCity($city)
    {
        $this->container['city'] = $city;

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
