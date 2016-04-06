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
	private $iso3166v2CountryCode;

	/**
	 * @var string
	 */
	private $toplevelDomain;

	/**
	 * @var string
	 */
	private $unitedNationsId;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @param string $iso3166Alpha2Code
	 * @return $this
	 * @throws Exception\Iso3166CountryException
	 */
	public function loadByIso3166Alpha2Code($iso3166Alpha2Code)
	{
		$countryInformation = Iso3166CountryInformation::getByIso3166Alpha2($iso3166Alpha2Code);
		if (is_null($countryInformation)) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_NOT_FOUND');
		}
		$this->iso3166Alpha2CountryCode = $countryInformation[Iso3166CountryInformation::ISO3166_ALPHA2];
		$this->iso3166Alpha3CountryCode = $countryInformation[Iso3166CountryInformation::ISO3166_ALPHA3];
		$this->iso3166NumericCountryCode = $countryInformation[Iso3166CountryInformation::ISO3166_NUMERIC];
		$this->iso3166v2CountryCode = $countryInformation[Iso3166CountryInformation::ISO3166_2];
		$this->unitedNationsId = $countryInformation[Iso3166CountryInformation::UNITED_NATIONS_ID];
		$this->toplevelDomain = $countryInformation[Iso3166CountryInformation::TOP_LEVEL_DOMAIN];
		$this->name = $countryInformation[Iso3166CountryInformation::NAME];
		return $this;
	}

	/**
	 * @param array $iso3166CountryInfo
	 * @return $this
	 * @throws Iso3166CountryException
	 */
	public function loadByIso3166CountryInformation(array $iso3166CountryInfo)
	{
		if (!$this->validateInfoByIso3166Alpha2CountryCode($iso3166CountryInfo)) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_INFORMATION_INVALID');
		}
		if (!$this->validateInfoByIso3166Alpha3CountryCode($iso3166CountryInfo)) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_INFORMATION_INVALID');
		}
		if (!$this->validateInfoByIso3166NumericCountryCode($iso3166CountryInfo)) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_INFORMATION_INVALID');
		}
		if (!$this->validateInfoByIso3166v2CountryCode($iso3166CountryInfo)) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_INFORMATION_INVALID');
		}
		if (!$this->validateInfoByUnitedNationsId($iso3166CountryInfo)) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_INFORMATION_INVALID');
		}
		if (!$this->validateInfoByToplevelDomain($iso3166CountryInfo)) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_INFORMATION_INVALID');
		}
		if (!$this->validateInfoByName($iso3166CountryInfo)) {
			throw new Exception\Iso3166CountryException('ISO_3166_COUNTRY_INFORMATION_INVALID');
		}
		$this->iso3166Alpha2CountryCode = $iso3166CountryInfo['iso3166_alpha2'];
		$this->iso3166Alpha3CountryCode = $iso3166CountryInfo['iso3166_alpha3'];
		$this->iso3166NumericCountryCode = $iso3166CountryInfo['iso3166_numeric'];
		$this->iso3166v2CountryCode = $iso3166CountryInfo['iso3166_2'];
		$this->unitedNationsId = $iso3166CountryInfo['un'];
		$this->toplevelDomain = $iso3166CountryInfo['tld'];
		$this->name = $iso3166CountryInfo['name'];
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
	public function getIso3166v2CountryCode()
	{
		return $this->iso3166v2CountryCode;
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
	public function getUnitedNationsId()
	{
		return $this->unitedNationsId;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param array $iso3166CountryInfo
	 * @return bool
	 */
	private function validateInfoByIso3166Alpha2CountryCode(array $iso3166CountryInfo)
	{
		if (
			!isset($iso3166CountryInfo[Iso3166CountryInformation::ISO3166_ALPHA2])
			|| mb_strlen($iso3166CountryInfo[Iso3166CountryInformation::ISO3166_ALPHA2]) != 2
		) {
			return false;
		}
		return true;
	}

	/**
	 * @param array $iso3166CountryInfo
	 * @return bool
	 */
	private function validateInfoByIso3166Alpha3CountryCode(array $iso3166CountryInfo)
	{
		if (
			!isset($iso3166CountryInfo[Iso3166CountryInformation::ISO3166_ALPHA3])
			|| mb_strlen($iso3166CountryInfo[Iso3166CountryInformation::ISO3166_ALPHA3]) != 3
		) {
			return false;
		}
		return true;
	}

	/**
	 * @param array $iso3166CountryInfo
	 * @return bool
	 */
	private function validateInfoByIso3166NumericCountryCode(array $iso3166CountryInfo)
	{
		if (
			!isset($iso3166CountryInfo[Iso3166CountryInformation::ISO3166_NUMERIC])
			|| !is_numeric($iso3166CountryInfo[Iso3166CountryInformation::ISO3166_NUMERIC])
		) {
			return false;
		}
		return true;
	}

	/**
	 * @param array $iso3166CountryInfo
	 * @return bool
	 */
	private function validateInfoByIso3166v2CountryCode(array $iso3166CountryInfo)
	{
		if (
			!isset($iso3166CountryInfo[Iso3166CountryInformation::ISO3166_2])
			|| mb_strlen($iso3166CountryInfo[Iso3166CountryInformation::ISO3166_2]) != 2
		) {
			return false;
		}
		return true;
	}

	/**
	 * @param array $iso3166CountryInfo
	 * @return bool
	 */
	private function validateInfoByUnitedNationsId(array $iso3166CountryInfo)
	{
		if (
			!isset($iso3166CountryInfo[Iso3166CountryInformation::UNITED_NATIONS_ID])
			|| mb_strlen($iso3166CountryInfo[Iso3166CountryInformation::UNITED_NATIONS_ID]) == 0
		) {
			return false;
		}
		return true;
	}

	/**
	 * @param array $iso3166CountryInfo
	 * @return bool
	 */
	private function validateInfoByToplevelDomain(array $iso3166CountryInfo)
	{
		if (
			!isset($iso3166CountryInfo[Iso3166CountryInformation::TOP_LEVEL_DOMAIN])
			|| mb_strlen($iso3166CountryInfo[Iso3166CountryInformation::TOP_LEVEL_DOMAIN]) < 2
			|| mb_strlen($iso3166CountryInfo[Iso3166CountryInformation::TOP_LEVEL_DOMAIN]) > 4
		) {
			return false;
		}
		return true;
	}

	/**
	 * @param array $iso3166CountryInfo
	 * @return bool
	 */
	private function validateInfoByName(array $iso3166CountryInfo)
	{
		if (
			!isset($iso3166CountryInfo[Iso3166CountryInformation::NAME])
			|| mb_strlen($iso3166CountryInfo[Iso3166CountryInformation::NAME]) == 0
		) {
			return false;
		}
		return true;
	}

}
