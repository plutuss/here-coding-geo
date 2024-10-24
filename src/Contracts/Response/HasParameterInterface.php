<?php

namespace Plutuss\HerePlatform\Contracts\Response;

interface HasParameterInterface
{

    public function title(): string;

    public function id(): string;

    public function language(): string;

    public function houseNumberType(): ?string;

    public function resultType(): string;

    public function localityType(): string;

    public function addressLabel(): string;

    public function addressCountryCode(): string;

    public function addressCountryName(): string;

    public function addressStateCode(): string;

    public function addressState(): string;

    public function addressCountyCode(): string;

    public function addressCounty(): string;

    public function addressCity(): string;

    public function addressHouseNumber(): ?int;

    public function addressPostalCode(): ?int;

    public function addressStreet(): ?string;

    public function addressDistrict(): ?string;

}
