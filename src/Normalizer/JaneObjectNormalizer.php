<?php

namespace DevmeSdk\Normalizer;

use DevmeSdk\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    protected $normalizers = array('DevmeSdk\\Model\\ConvertCurrencyOut' => 'DevmeSdk\\Normalizer\\ConvertCurrencyOutNormalizer', 'DevmeSdk\\Model\\Error' => 'DevmeSdk\\Normalizer\\ErrorNormalizer', 'DevmeSdk\\Model\\GetCountryDetailsOut' => 'DevmeSdk\\Normalizer\\GetCountryDetailsOutNormalizer', 'DevmeSdk\\Model\\GetCurrencyDetailsOut' => 'DevmeSdk\\Normalizer\\GetCurrencyDetailsOutNormalizer', 'DevmeSdk\\Model\\GetCurrencyExchangeRateOut' => 'DevmeSdk\\Normalizer\\GetCurrencyExchangeRateOutNormalizer', 'DevmeSdk\\Model\\GetDomainWhoisOut' => 'DevmeSdk\\Normalizer\\GetDomainWhoisOutNormalizer', 'DevmeSdk\\Model\\GetEmailDetailsOut' => 'DevmeSdk\\Normalizer\\GetEmailDetailsOutNormalizer', 'DevmeSdk\\Model\\GetIpDetailsCityOut' => 'DevmeSdk\\Normalizer\\GetIpDetailsCityOutNormalizer', 'DevmeSdk\\Model\\GetIpDetailsOut' => 'DevmeSdk\\Normalizer\\GetIpDetailsOutNormalizer', 'DevmeSdk\\Model\\GetPhoneDetailsOut' => 'DevmeSdk\\Normalizer\\GetPhoneDetailsOutNormalizer', 'DevmeSdk\\Model\\HttpErrorOut' => 'DevmeSdk\\Normalizer\\HttpErrorOutNormalizer', 'DevmeSdk\\Model\\ListCountriesItem' => 'DevmeSdk\\Normalizer\\ListCountriesItemNormalizer', 'DevmeSdk\\Model\\ListCountriesOut' => 'DevmeSdk\\Normalizer\\ListCountriesOutNormalizer', 'DevmeSdk\\Model\\ListCurrenciesItem' => 'DevmeSdk\\Normalizer\\ListCurrenciesItemNormalizer', 'DevmeSdk\\Model\\ListCurrenciesOut' => 'DevmeSdk\\Normalizer\\ListCurrenciesOutNormalizer', 'DevmeSdk\\Model\\WhoAmIOut' => 'DevmeSdk\\Normalizer\\WhoAmIOutNormalizer', '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => '\\DevmeSdk\\Runtime\\Normalizer\\ReferenceNormalizer'), $normalizersCache = array();
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return array_key_exists($type, $this->normalizers);
    }
    /**
     * @return bool
     */
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $normalizerClass = $this->normalizers[get_class($object)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($object, $format, $context);
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $denormalizerClass = $this->normalizers[$class];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $class, $format, $context);
    }
    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }
    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;
        return $normalizer;
    }
}