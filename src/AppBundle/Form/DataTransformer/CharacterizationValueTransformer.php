<?php

namespace AppBundle\Form\DataTransformer;

use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\ChoiceList\ChoiceListInterface;
use AppBundle\Entity\CharacterizationValue;
use Doctrine\ORM\EntityManager;

class CharacterizationValueTransformer implements DataTransformerInterface
{  
    /**
     *
     * @var type ChoiceListInterface
     */
    private $choiceList;

    /**
     *
     * @var type EntityManager
     */
    private $manager;

    /**
     * Constructor.
     *
     * @param ChoiceListInterface $choiceList
     */
    public function __construct(ChoiceListInterface $choiceList, EntityManager $em)
    {
        $this->choiceList = $choiceList; 
        $this->manager = $em;
    }

    /**
     * @param array $array
     *
     * @return array
     *
     * @throws TransformationFailedException If the given value is not an array.
     */
    public function transform($array)
    {
        if (null === $array) {
            return array();
        }

        if (!is_array($array)) {
            throw new TransformationFailedException('Expected an array.');
        }

        return $this->choiceList->getValuesForChoices($array);
    }

    /**
     * 
     * @param type $array
     * @return type
     * @throws TransformationFailedException
     */
    public function reverseTransform($array)
    {   
        $existingValues = array();
        $newValues = array();

        foreach ($array as $value) {
             if ((string) $value === (string) (int) $value) {
                 $existingValues[] = $value;
             } else {
                 $newValues[] = (string) trim($value);
             }
        }

        if ($newValues) {
            $this->addNewValues($newValues, $existingValues);
        }

        if (null === $existingValues) {
            return array();
        }

        if (!is_array($existingValues)) {
            throw new TransformationFailedException('Expected an array.');
        }

        $choices = $this->choiceList->getChoicesForValues($existingValues);

        if (count($choices) !== count($existingValues)) {
            throw new TransformationFailedException('Could not find all matching choices for the given values');
        }

        return $choices;
    }

    /**
     * 
     * @param type $newValues
     * @param type $values
     */
    private function addNewValues($newValues, &$existingValues)
    { 
        $newValuesUnique = array_unique($newValues);

        $repository = $this->manager->getRepository('AppBundle:CharacterizationValue');

        $entities = $repository->findEntitiesByNames($newValuesUnique);

        foreach ($newValuesUnique as $newValue) {

            $entity = $this->findEntityByName($newValue, $entities);

            if ($entity && $this->isIdEntityExistInChoiceList($entity->getId(), $existingValues)) {
                continue;
            }

            if ($entity) {
                $existingValues[] = (string) $entity->getId();
            } else {
                $entityNew = $this->createEntity($newValue);                
                $existingValues[] = (string) $entityNew->getId();
            }
        }
    }

    /**
     * 
     * @param type $name
     * @param type $entities
     * @return boolean
     */
    private function findEntityByName($name, $entities)
    {       
        if (!$entities) {
            return;
        }

        $key = array_search($name, array_column($entities, 'name'));

        if (is_bool($key)) {
            return false;
        }

        return $entities[$key];
    }

    /**
     *
     * @param type $id
     * @param type $values
     * @return type
     */
    private function isIdEntityExistInChoiceList($id, $values)
    {
        return in_array($id, $values);
    }

    /**
     * 
     * @param type $name
     * @return CharacterizationValue
     */
    private function createEntity($name)
    {
        $characterizationValue = new CharacterizationValue();
        $characterizationValue->setName($name);
        $this->manager->persist($characterizationValue);
        $this->manager->flush($characterizationValue);

        return $characterizationValue;
    }
}