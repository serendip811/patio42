<?php
namespace Wandu\Publ\Validator\Option;

use Wandu\Publ\Validator\OptionInterface;

class EqualsOption implements OptionInterface
{
    /** @var string */
    private $target;
    /**
     * @param string $target
     */
    public function __construct($target)
    {
        $this->target = $target;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($name, array $values)
    {
        if (!isset($values[$name]) && !isset($values[$this->target])) {
            return true;
        }
        if (!isset($values[$this->target])) {
            return false;
        }
        return $values[$name] === $values[$this->target];
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorMessage()
    {
        return 'not equal!';
    }
}
