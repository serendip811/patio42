<?php
namespace Wandu\Publ\Validator;

interface OptionInterface
{
    /**
     * @param string $name
     * @param array $values
     * @return bool
     */
    public function validate($name, array $values);

    /**
     * @return string
     */
    public function getErrorMessage();
}
