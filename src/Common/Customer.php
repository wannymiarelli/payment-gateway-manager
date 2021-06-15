<?php


namespace AtlasByte\Common;

/**
 * Customer object is used to build payments. Payments requires customer data to be created
 * like firstname and lastname but also email. The details are sent to the gateway along with the
 * charge details.
 * @package AtlasByte\Common
 */
class Customer
{

    private string $firstName;
    private string $lastName;
    private string $email;
    private string $mobilePhone;

    /**
     * Customer constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $phone
     */
    public function __construct(string $firstName, string $lastName, string $email, string $phone)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->mobilePhone = $phone;
    }


    /**
     * First name of the customer
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Last name of the cutomer
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Email of the customer (used to generate payment link if requested)
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Mobile phone number of the custoemr
     * @return string
     */
    public function getMobilePhone(): string
    {
        return $this->mobilePhone;
    }



}