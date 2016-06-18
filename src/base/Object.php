<?php


namespace datork\base;


class Object
{
    /**
     * Matches $array key with $object public properties and sets its values to the object
     * @param Object $object
     * @param $properties
     * @return object copy of $object with overwritten properties
     */
    public static function setProperties($object, $properties)
    {
        $newObject = clone $object;

        $reflect = new \ReflectionObject($newObject);
        $publicReflectionProperties = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
        foreach ($publicReflectionProperties as $reflectionProperty) {
            $propertyName = $reflectionProperty->getName();
            if (!array_key_exists($propertyName, $properties)) {
                continue;
            }
            $newObject->$propertyName = $properties[$propertyName];
        }
        return $newObject;
    }

    /**
     * Matches $array key with $object public properties and sets its values to the object
     * @param string $className
     * @param $properties
     * @return object created from $classname and properties from $properties
     */
    public static function build($className, $properties)
    {
        $object = new $className;
        return self::setProperties($object, $properties);
    }
}