<?php

namespace AtlasByte\Common;

class ApiUriResolver
{

    private string $sandBoxUri = "";
    private string $productionUri = "";
    private bool $testMode = true;

    /**
     * ApiUriResolver constructor.
     * @param string $sandBoxUri
     * @param string $productionUri
     */
    public function __construct(string $sandBoxUri, string $productionUri, bool $testMode = true)
    {
        $this->sandBoxUri = $sandBoxUri;
        $this->productionUri = $productionUri;
    }


    public function resolveUri (): string
    {
        if ($this->testMode) return $this->sandBoxUri;
        return $this->productionUri;
    }

}