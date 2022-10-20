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

    public function set(string $key, string|array $value): void
    {
        $this->data[$key] = $value;

        $this->update();
    }

    /**
     * Metodo para remover valor da sessao
     * @param string $key
     * @return void
     */

    public function unset(string $key): void
    {
        if (array_key_exists($key, $this->data)) {
            unset($this->data[$key]);
        }
    }

    /**
     * Metodo para verificar se um valor existe na sessao
     * @param string $key
     * @return bool
     */

    public function has(string $key): bool
    {
        if (array_key_exists($key, $this->data)) {
            return true;
        }

        return false;
    }

    /**
     * Metodo para limpar os dados
     * @return void
     */

    public function reset(): void
    {
        $this->data = [];
    }

    /**
     * Metodo para inserir os dados na sessao
     * @access private
     * @return void
     */

    private function update(): void
    {
        foreach ($this->data as $key => $value) :
            $_SESSION[$key] = $value;
        endforeach;
    }

    /**
     * Metodo para iniciar uma sessao
     * @return void
     */

    public function start(): void
    {
       $this->session->start();
       $this->update();
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
