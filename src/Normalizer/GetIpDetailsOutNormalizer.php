<?php

namespace Devme\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Devme\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class GetIpDetailsOutNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Devme\\Model\\GetIpDetailsOut';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Devme\\Model\\GetIpDetailsOut';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Devme\Model\GetIpDetailsOut();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('ip', $data)) {
            $object->setIp($data['ip']);
        }
        if (\array_key_exists('countryCode', $data)) {
            $object->setCountryCode($data['countryCode']);
        }
        if (\array_key_exists('registeredCountryCode', $data)) {
            $object->setRegisteredCountryCode($data['registeredCountryCode']);
        }
        if (\array_key_exists('asn', $data)) {
            $object->setAsn($data['asn']);
        }
        if (\array_key_exists('aso', $data)) {
            $object->setAso($data['aso']);
        }
        if (\array_key_exists('city', $data)) {
            $object->setCity($this->denormalizer->denormalize($data['city'], 'Devme\\Model\\GetIpDetailsCityOut', 'json', $context));
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getIp()) {
            $data['ip'] = $object->getIp();
        }
        if (null !== $object->getCountryCode()) {
            $data['countryCode'] = $object->getCountryCode();
        }
        if (null !== $object->getRegisteredCountryCode()) {
            $data['registeredCountryCode'] = $object->getRegisteredCountryCode();
        }
        if (null !== $object->getAsn()) {
            $data['asn'] = $object->getAsn();
        }
        if (null !== $object->getAso()) {
            $data['aso'] = $object->getAso();
        }
        if (null !== $object->getCity()) {
            $data['city'] = $this->normalizer->normalize($object->getCity(), 'json', $context);
        }
        return $data;
    }
}
