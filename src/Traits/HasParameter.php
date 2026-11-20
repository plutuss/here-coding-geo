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
     * @return string|null
     */
    public function language(): ?string
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
     * @return string|null
     */
    public function localityType(): ?string
    {
        return $this->getNestedValue('localityType');
    }

    /**
     * @return string|null
     */
    public function addressLabel(): ?string
    {
        return $this->getNestedValue('address.label');
    }

    /**
     * @return string|null
     */
    public function addressCountryCode(): ?string
    {
        return $this->getNestedValue('address.countryCode');
    }

    /**
     * @return string|null
     */
    public function addressCountryName(): ?string
    {
        return $this->getNestedValue('address.countryName');
    }

    /**
     * @return string|null
     */
    public function addressStateCode(): ?string
    {
        return $this->getNestedValue('address.stateCode');
    }

    /**
     * @return string|null
     */
    public function addressState(): ?string
    {
        return $this->getNestedValue('address.state');
    }

    /**
     * @return string|null
     */
    public function addressCountyCode(): ?string
    {
        return $this->getNestedValue('address.countyCode');
    }

    /**
     * @return string|null
     */
    public function addressCounty(): ?string
    {
        return $this->getNestedValue('address.county');
    }

    /**
     * @return string|null
     */
    public function addressCity(): ?string
    {
        return $this->getNestedValue('address.city');
    }

    /**
     * @return string|null
     */
    public function addressHouseNumber(): ?string
    {
        return $this->getNestedValue('address.houseNumber');
    }

    /**
     * @return string|null
     */
    public function addressPostalCode(): ?string
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
