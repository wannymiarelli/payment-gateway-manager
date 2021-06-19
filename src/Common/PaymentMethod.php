<?php

namespace AtlasByte\Common\Http;

class PaymentMethod
{

    private string $name;
    private string $logo;
    private string $type;
    private ?string $userRedirect = null;

    /**
     * PaymentMethod constructor.
     * @param string $name
     * @param string $logo
     * @param string $type
     */
    public function __construct(string $name, string $logo, string $type)
    {
        $this->name = $name;
        $this->logo = $logo;
        $this->type = $type;
    }

        /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getUserRedirect(): ?string
    {
        return $this->userRedirect;
    }

    /**
     * @param string|null $userRedirect
     */
    public function setUserRedirect(?string $userRedirect): void
    {
        $this->userRedirect = $userRedirect;
    }

}