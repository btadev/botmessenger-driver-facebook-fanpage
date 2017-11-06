<?php

namespace ChienIT\BotMessenger\Drivers\Facebook\Extensions;

use JsonSerializable;

class ReceiptAddress implements JsonSerializable
{
    /** @var string */
    protected $street_1;

    /** @var string */
    protected $street_2;

    /** @var string */
    protected $city;

    /** @var string */
    protected $postal_code;

    /** @var string */
    protected $state;

    /** @var string */
    protected $country;

    /**
     * @return static
     */
    public static function create()
    {
        return new static;
    }

    /**
     * @param string $street
     * @return $this
     */
    public function street1($street)
    {
        $this->street_1 = $street;

        return $this;
    }

    /**
     * @param string $street
     * @return $this
     */
    public function street2($street)
    {
        $this->street_2 = $street;

        return $this;
    }

    /**
     * @param $city
     * @return $this
     */
    public function city($city)
    {
        $this->city = $city;

        return $this;
            return $this->user_info['profile_pic'];
