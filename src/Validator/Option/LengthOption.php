<?php
namespace Wandu\Publ\Validator\Option;

use Wandu\Publ\Validator\OptionInterface;

class LengthOption implements OptionInterface
{
    /** @var int */
    private $min;

    /** @var int */
    private $max;

    /**
     * @param int $min
     * @param int $max
     */
    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($name, array $values)
    {
        $length = mb_strlen($values[$name], "UTF-8");
        return $length >= $this->min && ($this->min === -1 || $length <= $this->max);
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorMessage()
    {
        return 'length...';
    }
}
