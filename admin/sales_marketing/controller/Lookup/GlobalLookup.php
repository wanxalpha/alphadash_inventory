<?php

abstract class GlobalLookup
{
    private $const = NULL;

    private function __construct($valueName)
    {
        $this->const = $valueName;
    }

    public static function __callStatic($methodName, $arguments)
    {
        $className = get_called_class();
        return new $className($methodName);
    }

    function __toString()
    {
        return $this->const;
    }

    public static function getConstants($assoc = false, $exclude = [])
    {
        $class = get_called_class();

        $reflector = new ReflectionClass($class);
        $constants = $reflector->getConstants();

        $values = [];

        foreach ($constants as $constant => $value) {
            if (in_array($value, $exclude)) {
                continue;
            }
            if ($assoc) {
                $values[$value] = ucwords(strtolower(str_replace('_', ' ', $constant)));
            } else {
                $values[] = ucwords(strtolower(str_replace('_', ' ', $constant)));
            }
        }

        return $values;
    }

    /**
     * get lists of constant for class 
     */
    public static function getLists()
    {
        $constants = self::getConstants(true);
        return $constants;
    }

    public static function getListsName()
    {
        $constants = self::getConstants(false);
        return $constants;
    }

    /**
     * get constant desc
     * 
     * @param Const constant 
     */
    public static function getName($constant)
    {
        $constants = self::getConstants(true);

        return isset($constants[$constant]) ? $constants[$constant] : null;
    }

    public static function asComment($delimiter = ' | ')
    {
        $constants = self::getConstants(true);
        $result = implode($delimiter, array_map(function ($value, $key) {
            return $key . "=" . $value;
        }, $constants, array_keys($constants)));

        return  $result;
    }
}
