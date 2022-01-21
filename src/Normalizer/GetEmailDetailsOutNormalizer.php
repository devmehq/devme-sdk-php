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

class GetEmailDetailsOutNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Devme\\Model\\GetEmailDetailsOut';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Devme\\Model\\GetEmailDetailsOut';
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
        $object = new \Devme\Model\GetEmailDetailsOut();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('email', $data)) {
            $object->setEmail($data['email']);
        }
        if (\array_key_exists('validMx', $data)) {
            $object->setValidMx($data['validMx']);
        }
        if (\array_key_exists('validSmtp', $data)) {
            $object->setValidSmtp($data['validSmtp']);
        }
        if (\array_key_exists('validFormat', $data)) {
            $object->setValidFormat($data['validFormat']);
        }
        if (\array_key_exists('isDisposable', $data)) {
            $object->setIsDisposable($data['isDisposable']);
        }
        if (\array_key_exists('isFree', $data)) {
            $object->setIsFree($data['isFree']);
        }
        if (\array_key_exists('domainAge', $data)) {
            $object->setDomainAge($data['domainAge']);
        }
        if (\array_key_exists('score', $data)) {
            $object->setScore($data['score']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getEmail()) {
            $data['email'] = $object->getEmail();
        }
        if (null !== $object->getValidMx()) {
            $data['validMx'] = $object->getValidMx();
        }
        if (null !== $object->getValidSmtp()) {
            $data['validSmtp'] = $object->getValidSmtp();
        }
        if (null !== $object->getValidFormat()) {
            $data['validFormat'] = $object->getValidFormat();
        }
        if (null !== $object->getIsDisposable()) {
            $data['isDisposable'] = $object->getIsDisposable();
        }
        if (null !== $object->getIsFree()) {
            $data['isFree'] = $object->getIsFree();
        }
        if (null !== $object->getDomainAge()) {
            $data['domainAge'] = $object->getDomainAge();
        }
        if (null !== $object->getScore()) {
            $data['score'] = $object->getScore();
        }
        return $data;
    }
}
