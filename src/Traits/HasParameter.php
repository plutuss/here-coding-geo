<?php

namespace Plutuss\HerePlatform\Traits;

trait HasParameter
{

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->getNestedValue('title');
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->getNestedValue('id');
    }

    /**
     * @return string
     */
    public function language(): string
    {
        return $this->getNestedValue('language');
    }

    /**
     * @return string|null
     */
    public function houseNumberType(): ?string
    {
        return $this->getNestedValue('houseNumberType');
    }

    /**
     * @return string
     */
    public function resultType(): string
    {
        return $this->getNestedValue('resultType');
    }

    /**
     * @return string
     */
    public function localityType(): string
    {
        return $this->getNestedValue('localityType');
    }

    /**
     * @return string
     */
    public function addressLabel(): string
    {
        return $this->getNestedValue('address.label');
    }

    /**
     * @return string
     */
    public function addressCountryCode(): string
    {
        return $this->getNestedValue('address.countryCode');
    }

    /**
     * @return string
     */
    public function addressCountryName(): string
    {
        return $this->getNestedValue('address.countryName');
    }

    /**
     * @return string
     */
    public function addressStateCode(): string
    {
        return $this->getNestedValue('address.stateCode');
    }

    /**
     * @return string
     */
    public function addressState(): string
    {
        return $this->getNestedValue('address.state');
    }

    /**
     * @return string
     */
    public function addressCountyCode(): string
    {
        return $this->getNestedValue('address.countyCode');
    }

    /**
     * @return string
     */
    public function addressCounty(): string
    {
        return $this->getNestedValue('address.county');
    }

    /**
     * @return string
     */
    public function addressCity(): string
    {
        return $this->getNestedValue('address.city');
    }

    /**
     * @return int|null
     */
    public function addressHouseNumber(): ?int
    {
        return $this->getNestedValue('address.houseNumber');
    }

    /**
     * @return int|null
     */
    public function addressPostalCode(): ?int
    {
        return $this->getNestedValue('address.postalCode');
    }

    /**
     * @return string|null
     */
    public function addressStreet(): ?string
    {
        return $this->getNestedValue('address.street');
    }

    /**
     * @return string|null
     */
    public function addressDistrict(): ?string
    {
        return $this->getNestedValue('address.district');
    }

}
