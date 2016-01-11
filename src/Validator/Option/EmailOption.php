<?php
namespace Wandu\Publ\Validator\Option;

use Wandu\Publ\Validator\OptionInterface;

class EmailOption implements OptionInterface
{
    /**
     * {@inheritdoc}
     */
    public function validate($name, array $values)
    {
        return filter_var($values[$name], \FILTER_VALIDATE_EMAIL);
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorMessage()
    {
        return 'not email!';
    }
}
