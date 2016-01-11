<?php
namespace Wandu\Publ\Validator\Option;

use Wandu\Publ\Validator\OptionInterface;

class RequiredOption implements OptionInterface
{
    /**
     * {@inheritdoc}
     */
    public function validate($name, array $values)
    {
        return isset($values[$name]) && $values[$name] !== '';
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorMessage()
    {
        return 'required!';
    }
}
