<?php

namespace AtlasByte\Common\Http;

use AtlasByte\Contracts\IHttpClient;

abstract class AbstractHttpClient implements IHttpClient
{

    protected array $headers = [];

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }



}