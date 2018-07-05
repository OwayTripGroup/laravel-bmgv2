<?php
/*
 * BmgApiV2
 *
 * This file was automatically generated for bmg by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BmgApiV2Lib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Language implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $code public property
     */
    public $code;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $uuid public property
     */
    public $uuid;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $name Initialization value for $this->name
     * @param string $code Initialization value for $this->code
     * @param string $uuid Initialization value for $this->uuid
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->name = func_get_arg(0);
            $this->code = func_get_arg(1);
            $this->uuid = func_get_arg(2);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['name'] = $this->name;
        $json['code'] = $this->code;
        $json['uuid'] = $this->uuid;

        return $json;
    }
}
