<?php

namespace AtlasByte\Common;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessor;

abstract class BaseDto {

    private PropertyAccessor $propertyAccessor;

    /**
     * BaseDto constructor.
     * @param PropertyAccess $propertyAccessor
     */
    public function __construct()
    {
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
    }

    public function readAttribute ($data, $key, $default = null) {
        $value =  $this->propertyAccessor->getValue(
            $data, $key
        );
        if ($value) return $value;
        return $default;
    }


}