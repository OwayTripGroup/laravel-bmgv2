<?php

namespace BmgApiV2Lib\Tests\Feature;

use BmgApiV2Lib\Models\City;
use BmgApiV2Lib\Tests\TestCase;
use BmgApiV2Lib\Models\Location;
use BmgApiV2Lib\Models\Countries;

class LocationFromConfigTest extends TestCase
{
    /**
     * @var \BmgApiV2Lib\Models\Locations Locations response
     */
    protected static $locations;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        $config = self::$bmg->client()->getConfig()->data;
        self::$locations = $config->locations;
    }

    public function testLocationsDataContainsLocationAsItem()
    {
        $this->assertContainsOnlyInstancesOf(
            Location::class,
            self::$locations->data
        );
    }

    public function testLocationHasManyCountries()
    {
        $location = self::$locations->data[0];

        $this->assertInstanceOf(
            Countries::class,
            $location->countries
        );
    }

    public function testCityStructrue()
    {
        // remainder: city may not have
        // in the locations in real-world
        $city = self::$locations
            ->data[0]
            ->countries
            ->data[0]
            ->states
            ->data[0]
            ->cities
            ->data[0];

        $this->assertInstanceOf(
            City::class,
            $city
        );

        $this->assertEquals(
            ['name', 'uuid'],
            array_keys($city->jsonSerialize())
        );
    }
}
