<?php

class SessionService
{

    /**
     * @var array $data
     */
    private array $data = [];

    /**
     * @var Session $session
     */
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Metodo para setar valores na sessao
     * @param string $key
     * @param string|array $value
     * @return void
     */

    public function setData(string $key, string|array $value): void
    {
        $this->data[$key] = $value;
    }

    /**
     * Metodo para remover valor da sessao
     * @param string $key
     * @return void
     */

    public function removeData(string $key): void
    {
        if (array_key_exists($key, $this->data)) {
            unset($this->data[$key]);
        }
    }

    /**
     * Metodo para iniciar uma sessao
     * @return void
     */

    public function start(): void
    {
        $this->session->start();
    }

    /**
     * Metodo para destruir uma sessao
     * @return void
     */

    public function destroy(): void
    {
        $this->session->destroy();
    }

}
