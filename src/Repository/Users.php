<?php
namespace Wandu\Publ\Repository;

use Wandu\Modelr\Repository;
use Wandu\Publ\Model\User;

class Users extends Repository
{
    /** @var string */
    protected $name = 'publ_users';

    /**
     * @return \Wandu\Modelr\Model|User
     */
    public function factory()
    {
        return new User($this);
    }

    /**
     * @param array $arrayToInsert
     * @return array
     */
    public function toDatabaseFilter(array $arrayToInsert)
    {
        if (isset($arrayToInsert['password'])) {
            $arrayToInsert['password'] = $this->hashing($arrayToInsert['password']);
        }
        return $arrayToInsert;
    }

    /**
     * @param string $data
     * @return string
     */
    public function hashing($data)
    {
        for ($i = 0; $i < 42; $i++) {
            $data = sha1('*******' . $data . '******');
        }
        return base64_encode($data);
    }
}
