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

class ConvertCurrencyOutNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Devme\\Model\\ConvertCurrencyOut';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Devme\\Model\\ConvertCurrencyOut';
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
        $object = new \Devme\Model\ConvertCurrencyOut();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('from', $data)) {
            $object->setFrom($data['from']);
        }
        if (\array_key_exists('to', $data)) {
            $object->setTo($data['to']);
        }
        if (\array_key_exists('exchangeRate', $data)) {
            $object->setExchangeRate($data['exchangeRate']);
        }
        if (\array_key_exists('rateTime', $data)) {
            $object->setRateTime($data['rateTime']);
        }
        if (\array_key_exists('originalAmount', $data)) {
            $object->setOriginalAmount($data['originalAmount']);
        }
        if (\array_key_exists('convertedAmount', $data)) {
            $object->setConvertedAmount($data['convertedAmount']);
        }
        if (\array_key_exists('convertedText', $data)) {
            $object->setConvertedText($data['convertedText']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getFrom()) {
            $data['from'] = $object->getFrom();
        }
        if (null !== $object->getTo()) {
            $data['to'] = $object->getTo();
        }
        if (null !== $object->getExchangeRate()) {
            $data['exchangeRate'] = $object->getExchangeRate();
        }
        if (null !== $object->getRateTime()) {
            $data['rateTime'] = $object->getRateTime();
        }
        if (null !== $object->getOriginalAmount()) {
            $data['originalAmount'] = $object->getOriginalAmount();
        }
        if (null !== $object->getConvertedAmount()) {
            $data['convertedAmount'] = $object->getConvertedAmount();
        }
        if (null !== $object->getConvertedText()) {
            $data['convertedText'] = $object->getConvertedText();
        }
        return $data;
    }
}
