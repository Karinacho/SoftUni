<?php
/**
 * Created by PhpStorm.
 * User: Mihail
 * Date: 10/29/2018
 * Time: 15:38
 */

namespace Core;


class DataBinder implements DataBinderInterface
{


    public function bind(array $from, $className)
    {

        $object = new $className;
        foreach ($from as $key => $value) {
            $methodName = 'set' . implode("",
                    array_map(function ($el) {
                        return ucfirst($el);
                    }, explode("_", $key))
                );

            if (method_exists($object, $methodName)) {
                $object->$methodName($value);
            }
        }

        return $object;
    }
}