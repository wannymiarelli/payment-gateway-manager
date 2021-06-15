<?php

namespace AtlasByte\Gateways;

use AtlasByte\Contracts\IPaymentGateway;
use AtlasByte\Exceptions\InvalidConfigurationException;

abstract class AbstractPaymentGateway implements IPaymentGateway {

    /**
     * Structure of the configuration for the gateway, used internally to validate the provided
     * configuration object to check if it meets all the required keys
     * @var array|string[]
     */
    protected array $candidateConfiguration;

    /**
     * Gateway configuration
     * @var array
     */
    protected array $configuration = [];

    /**
     * AbstractPaymentGateway constructor.
     * @throws InvalidConfigurationException
     */
    public function __construct(array $configuration) {
        $this->configuration = $configuration;
        // validate the given configuration
        $this->validateConfiguration();
    }

    /**
     * Return the current gateway configuration
     * @return array
     */
    public function getConfiguration(): array
    {
        return $this->configuration;
    }

    /**
     * Validates the gateway configuration. The method takes care of checking every required key
     * of the configuration to be present, if not it raises an exception
     * @return bool
     * @throws InvalidConfigurationException
     */
    public function validateConfiguration () : bool {
        $missingKeys = array_diff_key($this->candidateConfiguration, $this->configuration);
        if (count($missingKeys) > 0) {
            throw new InvalidConfigurationException("Invalid configuration for the gateway, missing keys: " . join(",", array_keys($missingKeys)));
        }
        return true;
    }

}