<?php

namespace AtlasByte\Contracts;

interface IHttpClient
{

    public function get (string $uri, array $options);
    public function post (string $uri, array $options);
    public function put (string $uri, array $options);
    public function patch (string $uri, array $options);
    public function delete (string $uri, array $options);

}