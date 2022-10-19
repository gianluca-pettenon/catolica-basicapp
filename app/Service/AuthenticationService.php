<?php

require_once "../Session.php";
require_once "SessionService.php";

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
        $this->password = $password;
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
        $fetchUser = $userRepository->fetchByUsername($this->getUsername());

        if ($this->encrypt->verify($this->getPassword(), $fetchUser["password"])) {

            $sessionService = new SessionService(new Session);

            $sessionService->setData("id", $fetchUser["id"]);
            $sessionService->setData("username", $fetchUser["username"]);

            //$sessionService->start();
            return var_dump($sessionService);

        }

        return ["error" => true, "message" => "Usuário ou senha inválidos."];
    }

}
