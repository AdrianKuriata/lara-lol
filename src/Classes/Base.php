<?php

namespace Devtemple\Laralol\Classes;

use Devtemple\Laralol\Interfaces\TypeInterface;

/**
 * Base class with basics functions
 */
class Base implements TypeInterface {

    /**
     * All function which getting all endpoint data
     * @return object
     */
    public function all()
    {
        return $this->response();
    }

    /**
     * Get function which let us getting specific fields from endpoint
     * @param mixed $fields string|array Let you define which field or fields should be getted from response
     * @return object
     */
    public function get($fields)
    {
        $response = $this->response();

        if (is_array($fields)) {
            $data = [];
            foreach ($fields as $field) {
                $data[$field] = $response->{$field};
            }

            return (object) $data;
        }

        if (is_string($fields)) {
            return $response->{$fields};
        }
    }
}
