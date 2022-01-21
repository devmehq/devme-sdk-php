<?php

namespace DevmeSdk\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use DevmeSdk\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class GetIpDetailsCityOutNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'DevmeSdk\\Model\\GetIpDetailsCityOut';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'DevmeSdk\\Model\\GetIpDetailsCityOut';
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
        $object = new \DevmeSdk\Model\GetIpDetailsCityOut();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('accuracyRadius', $data)) {
            $object->setAccuracyRadius($data['accuracyRadius']);
        }
        if (\array_key_exists('latitude', $data)) {
            $object->setLatitude($data['latitude']);
        }
        if (\array_key_exists('longitude', $data)) {
            $object->setLongitude($data['longitude']);
        }
        if (\array_key_exists('timeZone', $data)) {
            $object->setTimeZone($data['timeZone']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getAccuracyRadius()) {
            $data['accuracyRadius'] = $object->getAccuracyRadius();
        }
        if (null !== $object->getLatitude()) {
            $data['latitude'] = $object->getLatitude();
        }
        if (null !== $object->getLongitude()) {
            $data['longitude'] = $object->getLongitude();
        }
        if (null !== $object->getTimeZone()) {
            $data['timeZone'] = $object->getTimeZone();
        }
        if (null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        return $data;
    }
}