<?php
namespace Wandu\Publ\Security;

use Wandu\Publ\Facade\Session;

class Csrf
{
    /** @var string */
    private $salt;

    /**
     * @param string $salt
     */
    public function __construct($salt = 'SALT')
    {
        $this->salt = $salt;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        $token = sha1(uniqid() . $this->salt);
        Session::set('_csrf_token', $token);
        return $token;
    }

    /**
     * @param string $token
     * @return bool
     */
    public function isInSafety($token)
    {
        return Session::get('_csrf_token') === $token;
    }
}
