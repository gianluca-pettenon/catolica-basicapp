<?php

class Encrypt
{

    /**
     * @var string PASSWORD_ENCRIPTATION
     */

    private const PASSWORD_ENCRYPT = PASSWORD_DEFAULT;

    /**
     * @param string $value
     * @return string
     */

    public function encrypt(string $value): string
    {
        return password_hash($value, static::PASSWORD_ENCRYPT);
    }

    /**
     * @param string $value
     * @param string $hash
     * @return bool
     */

    public function verify(string $value, $hash): bool
    {
        return password_verify($value, $hash);
    }

}
