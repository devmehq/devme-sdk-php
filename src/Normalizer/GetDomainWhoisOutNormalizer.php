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

class GetDomainWhoisOutNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'DevmeSdk\\Model\\GetDomainWhoisOut';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'DevmeSdk\\Model\\GetDomainWhoisOut';
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
        $object = new \DevmeSdk\Model\GetDomainWhoisOut();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('domain', $data)) {
            $object->setDomain($data['domain']);
        }
        if (\array_key_exists('whoisText', $data)) {
            $object->setWhoisText($data['whoisText']);
        }
        if (\array_key_exists('whoisJson', $data)) {
            $object->setWhoisJson($data['whoisJson']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getDomain()) {
            $data['domain'] = $object->getDomain();
        }
        if (null !== $object->getWhoisText()) {
            $data['whoisText'] = $object->getWhoisText();
        }
        if (null !== $object->getWhoisJson()) {
            $data['whoisJson'] = $object->getWhoisJson();
        }
        return $data;
    }
}
