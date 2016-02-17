<?php

namespace Iso3166Country;

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
	private $unitedNationsCountryCode;

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
		$this->iso3166Alpha2CountryCode = $countryInformation['iso3166_alpha2'];
		$this->iso3166Alpha3CountryCode = $countryInformation['iso3166_alpha3'];
		$this->iso3166NumericCountryCode = $countryInformation['iso3166_numeric'];
		$this->iso3166_2CountryCode = $countryInformation['iso3166_2'];
		$this->unitedNationsCountryCode = $countryInformation['un'];
		$this->toplevelDomain = $countryInformation['tld'];
		$this->name = $countryInformation['name'];
		return $this;
	}

	/**
	 * @param array $iso3166CountryInformation
	 * @return $this
	 */
	public function loadByIso3166CountryInformation(array $iso3166CountryInformation)
	{
		$this->iso3166Alpha2CountryCode = $iso3166CountryInformation['iso3166_alpha2'];
		$this->iso3166Alpha3CountryCode = $iso3166CountryInformation['iso3166_alpha3'];
		$this->iso3166NumericCountryCode = $iso3166CountryInformation['iso3166_numeric'];
		$this->iso3166_2CountryCode = $iso3166CountryInformation['iso3166_2'];
		$this->unitedNationsCountryCode = $iso3166CountryInformation['un'];
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
	public function getUnitedNationsCountryCode()
	{
		return $this->unitedNationsCountryCode;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

}
