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

class WhoAmIOutNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Devme\\Model\\WhoAmIOut';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Devme\\Model\\WhoAmIOut';
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
        $object = new \Devme\Model\WhoAmIOut();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('userId', $data)) {
            $object->setUserId($data['userId']);
        }
        if (\array_key_exists('email', $data)) {
            $object->setEmail($data['email']);
        }
        if (\array_key_exists('username', $data)) {
            $object->setUsername($data['username']);
        }
        if (\array_key_exists('reqIpAddress', $data)) {
            $object->setReqIpAddress($data['reqIpAddress']);
        }
        if (\array_key_exists('reqIpCountry', $data)) {
            $object->setReqIpCountry($data['reqIpCountry']);
        }
        if (\array_key_exists('reqUserAgent', $data)) {
            $object->setReqUserAgent($data['reqUserAgent']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getUserId()) {
            $data['userId'] = $object->getUserId();
        }
        if (null !== $object->getEmail()) {
            $data['email'] = $object->getEmail();
        }
        if (null !== $object->getUsername()) {
            $data['username'] = $object->getUsername();
        }
        if (null !== $object->getReqIpAddress()) {
            $data['reqIpAddress'] = $object->getReqIpAddress();
        }
        if (null !== $object->getReqIpCountry()) {
            $data['reqIpCountry'] = $object->getReqIpCountry();
        }
        if (null !== $object->getReqUserAgent()) {
            $data['reqUserAgent'] = $object->getReqUserAgent();
        }
        return $data;
    }
}
