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

class ListCountriesOutNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'DevmeSdk\\Model\\ListCountriesOut';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'DevmeSdk\\Model\\ListCountriesOut';
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
        $object = new \DevmeSdk\Model\ListCountriesOut();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('page', $data)) {
            $object->setPage($data['page']);
        }
        if (\array_key_exists('total', $data)) {
            $object->setTotal($data['total']);
        }
        if (\array_key_exists('list', $data)) {
            $values = array();
            foreach ($data['list'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'DevmeSdk\\Model\\ListCountriesItem', 'json', $context);
            }
            $object->setList($values);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getPage()) {
            $data['page'] = $object->getPage();
        }
        if (null !== $object->getTotal()) {
            $data['total'] = $object->getTotal();
        }
        if (null !== $object->getList()) {
            $values = array();
            foreach ($object->getList() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['list'] = $values;
        }
        return $data;
    }
}
