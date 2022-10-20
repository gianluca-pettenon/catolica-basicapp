<?php

class Session
{
    /**
     * Metodo para iniciar uma sessao
     * @return bool
     */

    public function start(): bool
    {
        return session_start();
    }

    /**
     * Metodo para destruir uma sessao
     * @return bool
     */

    public function destroy(): bool
    {
        return session_destroy();
    }

}
