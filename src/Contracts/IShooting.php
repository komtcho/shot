<?php

namespace Komtcho\Shot\Contracts;

interface IShooting
{
    /**
     * Method for the call request.
     */
    public function call();

    /**
     * Handle response.
     */
    public function response($body);
}
