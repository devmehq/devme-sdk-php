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

class GetPhoneDetailsOutNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'DevmeSdk\\Model\\GetPhoneDetailsOut';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'DevmeSdk\\Model\\GetPhoneDetailsOut';
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
        $object = new \DevmeSdk\Model\GetPhoneDetailsOut();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('number', $data)) {
            $object->setNumber($data['number']);
        }
        if (\array_key_exists('valid', $data)) {
            $object->setValid($data['valid']);
        }
        if (\array_key_exists('country', $data)) {
            $object->setCountry($data['country']);
        }
        if (\array_key_exists('callingCode', $data)) {
            $object->setCallingCode($data['callingCode']);
        }
        if (\array_key_exists('nationalNumber', $data)) {
            $object->setNationalNumber($data['nationalNumber']);
        }
        if (\array_key_exists('type', $data)) {
            $object->setType($data['type']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getNumber()) {
            $data['number'] = $object->getNumber();
        }
        if (null !== $object->getValid()) {
            $data['valid'] = $object->getValid();
        }
        if (null !== $object->getCountry()) {
            $data['country'] = $object->getCountry();
        }
        if (null !== $object->getCallingCode()) {
            $data['callingCode'] = $object->getCallingCode();
        }
        if (null !== $object->getNationalNumber()) {
            $data['nationalNumber'] = $object->getNationalNumber();
        }
        if (null !== $object->getType()) {
            $data['type'] = $object->getType();
        }
        return $data;
    }
}
