<?php

class AuthenticationService
{

    /**
     * @var string $username
     */
    private string $username;

    /**
     * @var string $password
     */
    private string $password;

    public function __construct(Encrypt $encrypt)
    {
        $this->encrypt = $encrypt;
    }

    /**
     * @param string $username
     * @return void
     */

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string username
     */

    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $password
     * @return void
     */

    public function setPassword(string $password): void
    {
        $this->password = $this->encrypt->encrypt($password);
    }

    /**
     * @return string password
     */

    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param UserRepository $userRepository
     * @return bool
     */

    public function authenticate(UserRepository $userRepository)
    {
        $fetchUser = $userRepository->fetchByUsername($this->username);

        if ($this->encrypt->verify($this->password, $fetchUser["password"])) {
            return ["password" => $this->password, "fetchPass" => $fetchUser["password"]];
        }

    }

}
