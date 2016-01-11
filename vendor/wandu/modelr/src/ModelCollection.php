<?php
namespace Wandu\Modelr;

use Wandu\Library\Collection;

class ModelCollection extends Collection
{
    /**
     * @return array
     */
    public function toArray()
    {
        $arrayToReturn = [];
        foreach ($this->values as $value) {
            $arrayToReturn[] = $value->toArray();
        }
        return $arrayToReturn;
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }
}
