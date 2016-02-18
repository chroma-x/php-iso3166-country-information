<?php

namespace Iso3166Country;

use Iso3166Country\Exception\Iso3166CountryException;

/**
 * Class Iso3166Country
 *
 * @package Iso3166Country
 */
class Iso3166Country
{

	/**
	 * @var string
	 */
	private $iso3166Alpha2CountryCode;

	/**
	 * @var string
	 */
	private $iso3166Alpha3CountryCode;

	/**
	 * @var string
	 */
	private $iso3166NumericCountryCode;

	/**
	 * @var string
	 */
	private $iso3166_2CountryCode;

	/**
	 * @var string
	 */
	private $toplevelDomain;

	/**
	 * @var string
	 */
	private $unitedNationsIdentifier;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @param string $iso3166Alpha2CountryCode
	 * @return $this
	 * @throws Exception\Iso3166CountryException
	 */
	public function loadByIso3166Alpha2CountryCode($iso3166Alpha2CountryCode)
	{
		$countryInformation = Iso3166CountryInformation::getByIso3166Alpha2($iso3166Alpha2CountryCode);
		if (is_null($countryInformation)) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_NOT_FOUND');
		}
		$this->iso3166Alpha2CountryCode = $countryInformation[Iso3166CountryInformation::ISO3166_ALPHA2];
		$this->iso3166Alpha3CountryCode = $countryInformation[Iso3166CountryInformation::ISO3166_ALPHA3];
		$this->iso3166NumericCountryCode = $countryInformation[Iso3166CountryInformation::ISO3166_NUMERIC];
		$this->iso3166_2CountryCode = $countryInformation[Iso3166CountryInformation::ISO3166_2];
		$this->unitedNationsIdentifier = $countryInformation[Iso3166CountryInformation::UNITED_NATIONS_IDENTIFIER];
		$this->toplevelDomain = $countryInformation[Iso3166CountryInformation::TOP_LEVEL_DOMAIN];
		$this->name = $countryInformation[Iso3166CountryInformation::NAME];
		return $this;
	}

	/**
	 * @param array $iso3166CountryInformation
	 * @return $this
	 * @throws Iso3166CountryException
	 */
	public function loadByIso3166CountryInformation(array $iso3166CountryInformation)
	{
		if (
			!isset($iso3166CountryInformation[Iso3166CountryInformation::ISO3166_ALPHA2])
			|| mb_strlen($iso3166CountryInformation[Iso3166CountryInformation::ISO3166_ALPHA2]) != 2
		) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_INFORMATION_INVALID');
		}
		if (
			!isset($iso3166CountryInformation[Iso3166CountryInformation::ISO3166_ALPHA3])
			|| mb_strlen($iso3166CountryInformation[Iso3166CountryInformation::ISO3166_ALPHA3]) != 3
		) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_INFORMATION_INVALID');
		}
		if (
			!isset($iso3166CountryInformation[Iso3166CountryInformation::ISO3166_NUMERIC])
			|| !is_numeric($iso3166CountryInformation[Iso3166CountryInformation::ISO3166_NUMERIC])
		) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_INFORMATION_INVALID');
		}
		if (
			!isset($iso3166CountryInformation[Iso3166CountryInformation::ISO3166_2])
			|| mb_strlen($iso3166CountryInformation[Iso3166CountryInformation::ISO3166_2]) != 2
		) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_INFORMATION_INVALID');
		}
		if (
			!isset($iso3166CountryInformation[Iso3166CountryInformation::UNITED_NATIONS_IDENTIFIER])
			|| mb_strlen($iso3166CountryInformation[Iso3166CountryInformation::UNITED_NATIONS_IDENTIFIER]) == 0
		) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_INFORMATION_INVALID');
		}
		if (
			!isset($iso3166CountryInformation[Iso3166CountryInformation::TOP_LEVEL_DOMAIN])
			|| mb_strlen($iso3166CountryInformation[Iso3166CountryInformation::TOP_LEVEL_DOMAIN]) < 2
			|| mb_strlen($iso3166CountryInformation[Iso3166CountryInformation::TOP_LEVEL_DOMAIN]) > 4
		) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_INFORMATION_INVALID');
		}
		if (
			!isset($iso3166CountryInformation[Iso3166CountryInformation::NAME])
			|| mb_strlen($iso3166CountryInformation[Iso3166CountryInformation::NAME]) == 0
		) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_INFORMATION_INVALID');
		}
		$this->iso3166Alpha2CountryCode = $iso3166CountryInformation['iso3166_alpha2'];
		$this->iso3166Alpha3CountryCode = $iso3166CountryInformation['iso3166_alpha3'];
		$this->iso3166NumericCountryCode = $iso3166CountryInformation['iso3166_numeric'];
		$this->iso3166_2CountryCode = $iso3166CountryInformation['iso3166_2'];
		$this->unitedNationsIdentifier = $iso3166CountryInformation['un'];
		$this->toplevelDomain = $iso3166CountryInformation['tld'];
		$this->name = $iso3166CountryInformation['name'];
		return $this;
	}

	/**
	 * @return string
	 */
	public function getIso3166Alpha2CountryCode()
	{
		return $this->iso3166Alpha2CountryCode;
	}

	/**
	 * @return string
	 */
	public function getIso3166Alpha3CountryCode()
	{
		return $this->iso3166Alpha3CountryCode;
	}

	/**
	 * @return string
	 */
	public function getIso3166NumericCountryCode()
	{
		return $this->iso3166NumericCountryCode;
	}

	/**
	 * @return string
	 */
	public function getIso31662CountryCode()
	{
		return $this->iso3166_2CountryCode;
	}

	/**
	 * @return string
	 */
	public function getToplevelDomain()
	{
		return $this->toplevelDomain;
	}

	/**
	 * @return string
	 */
	public function getUnitedNationsIdentifier()
	{
		return $this->unitedNationsIdentifier;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

}
