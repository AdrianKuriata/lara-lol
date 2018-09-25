<?php

namespace Devtemple\Laralol\Endpoints;

use Devtemple\Laralol\Interfaces\TypeInterface;

/**
 * Base class with basics functions
 */
class Base implements TypeInterface {
    /** Remove all function and let everything with get function
     * Get function which let us getting specific fields from endpoint
     * @param mixed $fields string|array Let you define which field or fields should be getted from response
     * @return object
     */
    public function get($fields = null)
    {
        $response = $this->response();

        if (is_null($fields)) {
            return $response;
        }

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
