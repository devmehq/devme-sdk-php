<?php

namespace Devme\Normalizer;

use Devme\Runtime\Normalizer\CheckArray;
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
    protected $normalizers = array('Devme\\Model\\ConvertCurrencyOut' => 'Devme\\Normalizer\\ConvertCurrencyOutNormalizer', 'Devme\\Model\\Error' => 'Devme\\Normalizer\\ErrorNormalizer', 'Devme\\Model\\GetCountryDetailsOut' => 'Devme\\Normalizer\\GetCountryDetailsOutNormalizer', 'Devme\\Model\\GetCurrencyDetailsOut' => 'Devme\\Normalizer\\GetCurrencyDetailsOutNormalizer', 'Devme\\Model\\GetCurrencyExchangeRateOut' => 'Devme\\Normalizer\\GetCurrencyExchangeRateOutNormalizer', 'Devme\\Model\\GetDomainWhoisOut' => 'Devme\\Normalizer\\GetDomainWhoisOutNormalizer', 'Devme\\Model\\GetEmailDetailsOut' => 'Devme\\Normalizer\\GetEmailDetailsOutNormalizer', 'Devme\\Model\\GetIpDetailsCityOut' => 'Devme\\Normalizer\\GetIpDetailsCityOutNormalizer', 'Devme\\Model\\GetIpDetailsOut' => 'Devme\\Normalizer\\GetIpDetailsOutNormalizer', 'Devme\\Model\\GetPhoneDetailsOut' => 'Devme\\Normalizer\\GetPhoneDetailsOutNormalizer', 'Devme\\Model\\HttpErrorOut' => 'Devme\\Normalizer\\HttpErrorOutNormalizer', 'Devme\\Model\\ListCountriesItem' => 'Devme\\Normalizer\\ListCountriesItemNormalizer', 'Devme\\Model\\ListCountriesOut' => 'Devme\\Normalizer\\ListCountriesOutNormalizer', 'Devme\\Model\\ListCurrenciesItem' => 'Devme\\Normalizer\\ListCurrenciesItemNormalizer', 'Devme\\Model\\ListCurrenciesOut' => 'Devme\\Normalizer\\ListCurrenciesOutNormalizer', 'Devme\\Model\\WhoAmIOut' => 'Devme\\Normalizer\\WhoAmIOutNormalizer', '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => '\\Devme\\Runtime\\Normalizer\\ReferenceNormalizer'), $normalizersCache = array();
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
