<?php

namespace Iso3166Country;

/**
 * Class Iso3166CountryInformation
 *
 * @package Iso3166Country
 */
class Iso3166CountryInformation
{

	const ISO3166_ALPHA2 = 'iso3166_alpha2';
	const ISO3166_ALPHA3 = 'iso3166_alpha3';
	const ISO3166_NUMERIC = 'iso3166_numeric';
	const ISO3166_2 = 'iso3166_2';
	const UNITED_NATIONS_NAME = 'un';
	const TOP_LEVEL_DOMAIN = 'tld';
	const NAME = 'name';

	private static $countryData;

	/**
	 * Gets all country data
	 *
	 * @return array
	 */
	public static function getCountryData()
	{
		if (is_null(self::$countryData)) {
			self::$countryData = include(__DIR__ . '/Iso3166CountryInformation.include.php');
		}
		return self::$countryData;
	}

	/**
	 * @return Iso3166Country[]
	 */
	public static function getCountries()
	{
		$countries = self::getCountryData();
		foreach ($countries as &$country) {
			try {
				$countryData = $country;
				$country = new Iso3166Country();
				$country->loadByIso3166CountryInformation($countryData);
			} catch (\Exception $exception) {
				continue;
			}
		}
		return $countries;
	}

	/**
	 * @param string $countryCode
	 * @return Iso3166Country|null
	 */
	public static function getByIso3166Alpha2($countryCode)
	{
		$countryCode = strtoupper($countryCode);
		$countryDataList = self::getCountryData();
		if (isset($countryDataList[$countryCode])) {
			$iso3166Country = new Iso3166Country();
			return $iso3166Country->loadByIso3166CountryInformation($countryDataList[$countryCode]);
		}
		return null;
	}

	/**
	 * @param string $countryCode
	 * @return Iso3166Country|null
	 */
	public static function getByIso3166Alpha3($countryCode)
	{
		$countryCode = strtoupper($countryCode);
		$countryDataList = self::getCountryData();
		foreach ($countryDataList as $countryData) {
			if ($countryData[self::ISO3166_ALPHA3] == $countryCode) {
				$iso3166Country = new Iso3166Country();
				return $iso3166Country->loadByIso3166CountryInformation($countryData);
			}
		}
		return null;
	}

	/**
	 * @param int $countryCode
	 * @return Iso3166Country|null
	 */
	public static function getByIso3166Numeric($countryCode)
	{
		$countryCode = str_pad((string)$countryCode, 3, '0', STR_PAD_LEFT);
		$countryDataList = self::getCountryData();
		foreach ($countryDataList as $countryData) {
			if ($countryData[self::ISO3166_NUMERIC] == $countryCode) {
				$iso3166Country = new Iso3166Country();
				return $iso3166Country->loadByIso3166CountryInformation($countryData);
			}
		}
		return null;
	}

	/**
	 * @param string $countryCode
	 * @return Iso3166Country|null
	 */
	public static function getByIso3166_2($countryCode)
	{
		$countryCode = strtoupper($countryCode);
		$countryDataList = self::getCountryData();
		foreach ($countryDataList as $countryData) {
			if ($countryData[self::ISO3166_2] == $countryCode) {
				$iso3166Country = new Iso3166Country();
				return $iso3166Country->loadByIso3166CountryInformation($countryData);
			}
		}
		return null;
	}

	/**
	 * @param string $unitedNationsIdentifier
	 * @return Iso3166Country|null
	 */
	public static function getByUnitedNationsIdentifier($unitedNationsIdentifier)
	{
		$unitedNationsIdentifier = strtoupper($unitedNationsIdentifier);
		$countryDataList = self::getCountryData();
		foreach ($countryDataList as $countryData) {
			if ($countryData[self::UNITED_NATIONS_NAME] == $unitedNationsIdentifier) {
				$iso3166Country = new Iso3166Country();
				return $iso3166Country->loadByIso3166CountryInformation($countryData);
			}
		}
		return null;
	}

	/**
	 * @param string $toplevelDomain
	 * @return Iso3166Country|null
	 */
	public static function getByToplevelDomain($toplevelDomain)
	{
		$toplevelDomain = trim(strtolower($toplevelDomain), '.');
		$countryDataList = self::getCountryData();
		foreach ($countryDataList as $countryData) {
			if ($countryData[self::TOP_LEVEL_DOMAIN] == $toplevelDomain) {
				$iso3166Country = new Iso3166Country();
				return $iso3166Country->loadByIso3166CountryInformation($countryData);
			}
		}
		return null;
	}

	/**
	 * @param string $countryCode
	 * @return bool
	 */
	public static function validateIso3166Alpha2($countryCode)
	{
		$countryCode = strtoupper($countryCode);
		$countryData = self::getCountryData();
		return isset($countryData[$countryCode]);
	}

	/**
	 * @param string $countryCode
	 * @return bool
	 */
	public static function validateIso3166Alpha3($countryCode)
	{
		$countryCode = strtoupper($countryCode);
		$countryDataList = self::getCountryData();
		foreach ($countryDataList as $countryData) {
			if ($countryData[self::ISO3166_ALPHA3] == $countryCode) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @param int $countryCode
	 * @return bool
	 */
	public static function validateIso3166Numeric($countryCode)
	{
		$countryCode = str_pad((string)$countryCode, 3, '0', STR_PAD_LEFT);
		$countryDataList = self::getCountryData();
		foreach ($countryDataList as $countryData) {
			if ($countryData[self::ISO3166_NUMERIC] == $countryCode) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @param string $countryCode
	 * @return bool
	 */
	public static function validateIso3166_2($countryCode)
	{
		$countryCode = strtoupper($countryCode);
		$countryDataList = self::getCountryData();
		foreach ($countryDataList as $countryData) {
			if ($countryData[self::ISO3166_2] == $countryCode) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @param string $unitedNationsIdentifier
	 * @return bool
	 */
	public static function validateUnitedNationsIdentifier($unitedNationsIdentifier)
	{
		$unitedNationsIdentifier = strtoupper($unitedNationsIdentifier);
		$countryDataList = self::getCountryData();
		foreach ($countryDataList as $countryData) {
			if ($countryData[self::UNITED_NATIONS_NAME] == $unitedNationsIdentifier) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @param string $toplevelDomain
	 * @return bool
	 */
	public static function validateToplevelDomain($toplevelDomain)
	{
		$toplevelDomain = trim(strtolower($toplevelDomain), '.');
		$countryDataList = self::getCountryData();
		foreach ($countryDataList as $countryData) {
			if ($countryData[self::TOP_LEVEL_DOMAIN] == $toplevelDomain) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @param string $selectedValue
	 * @param string $valueKey
	 * @param string $nameKey
	 * @return string
	 */
	public static function getSelectOptions($selectedValue = null, $valueKey = self::ISO3166_ALPHA2, $nameKey = self::NAME)
	{
		$selectedValue = strtoupper($selectedValue);
		$countryDataList = self::getCountryData();
		$options = array();
		foreach ($countryDataList as $countryData) {
			$selected = ($countryData[$valueKey] == $selectedValue) ? ' selected="selected"' : '';
			$options[] = '<option value="' . $countryData[$valueKey] . '"' . $selected . '>' . $countryData[$nameKey] . '</option>';
		}
		return implode(PHP_EOL, $options);
	}

}
