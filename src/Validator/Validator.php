<?php
namespace Wandu\Publ\Validator;

use Wandu\Publ\Validator\Option\EmailOption;
use Wandu\Publ\Validator\Option\EqualsOption;
use Wandu\Publ\Validator\Option\LengthOption;
use Wandu\Publ\Validator\Option\RequiredOption;

class Validator
{
    /**
     * @param $name
     * @return EqualsOption
     */
    public static function equals($name)
    {
        return new EqualsOption($name);
    }

    /**
     * @param int $min
     * @param int $max
     * @return LengthOption
     */
    public static function length($min, $max = -1)
    {
        return new LengthOption($min, $max);
    }

    /**
     * @return EmailOption
     */
    public static function email()
    {
        return new EmailOption();
    }

    /**
     * @return EmailOption
     */
    public static function required()
    {
        return new RequiredOption();
    }

    /** @var OptionInterface[]|OptionInterface[][] */
    private $types;

    /** @var string */
    private $errorMessage;

    /**
     * @param OptionInterface[]|OptionInterface[][] $types
     */
    public function __construct(array $types)
    {
        $this->types = $types;
    }

    /**
     * @param array $values
     * @return bool
     */
    public function validate(array $values)
    {
        foreach ($this->types as $name => $options) {
            if (!is_array($options)) {
                $options = [$options];
            }
            foreach ($options as $option) {
                if (!$option->validate($name, $values)) {
                    $this->errorMessage = $option->getErrorMessage();
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
}
