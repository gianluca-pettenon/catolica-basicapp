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
     * Metdo para setar valores na sessao
     * @param string $key
     * @param string|array $value
     * @return void
     */

    public function setData(string $key, string|array $value): void
    {
        $this->data[$key] = $value;
    }

    public function removeData(string $key): void
    {
        if (array_key_exists($key, $this->data)) {
            unset($this->data[$key]);
        }
    }

    public function destroy(): void
    {
        $this->data = [];
    }

}
