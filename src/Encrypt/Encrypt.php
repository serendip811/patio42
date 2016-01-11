<?php
namespace Wandu\Publ\Encrypt;

use RuntimeException;

class Encrypt
{
    /** @var string */
    private $salt = null;

    /** @var string */
    private $key256 = null;

    /**
     * @param string $key256
     * @param string $salt
     */
    public function __construct($key256, $salt = "__default__")
    {
        $this->key256 = $key256;
        $this->salt = $salt;
    }

    /**
     * @param $plainData
     * @return string
     */
    public function encoding($plainData)
    {
        $data = serialize($plainData);
        $key = $this->key256;

        if (function_exists("mcrypt_encrypt")) {
            if (32 !== strlen($key)) {
                $key = hash('SHA256', $key, true);
            }
            $padding = 16 - (strlen($data) % 16);
            $data .= str_repeat(chr($padding), $padding);
            $data = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
        }

        return base64_encode($data);
    }

    /**
     * @param string $encryptedData
     * @return mixed
     */
    public function decoding($encryptedData)
    {
        $data = base64_decode($encryptedData);
        $key = $this->key256;

        if (function_exists("mcrypt_encrypt")) {
            if (32 !== strlen($key)) {
                $key = hash('SHA256', $key, true);
            }
            $data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
            $padding = ord($data[strlen($data) - 1]);
            $data = substr($data, 0, -$padding);
        }
        $ret = @unserialize($data);
        if ($ret === false) {
            throw new RuntimeException('This Data is unable to be decoded.');
        }
        return $ret;
    }
}
