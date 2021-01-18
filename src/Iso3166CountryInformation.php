<?php

namespace ChromaX\Iso3166Country;

use ChromaX\Iso3166Country\Exception\Iso3166CountryException;
use Exception;

/**
 * Class Iso3166CountryInformation
 *
 * @package ChromaX\Iso3166Country
 */
class Iso3166CountryInformation
{

	const ISO3166_ALPHA2 = 'iso3166_alpha2';
	const ISO3166_ALPHA3 = 'iso3166_alpha3';
	const ISO3166_NUMERIC = 'iso3166_numeric';
	const ISO3166_2 = 'iso3166_2';
	const UNITED_NATIONS_ID = 'un';
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
			} catch (Exception $exception) {
				continue;
			}
		}
		return $countries;
	}

	/**
	 * @param string $countryCode
	 * @return Iso3166Country|null
	 * @throws Iso3166CountryException
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
	 * @throws Iso3166CountryException
	 */
	public static function getByIso3166Alpha3($countryCode)
	{
		$countryCode = strtoupper($countryCode);
		return self::getBy(self::ISO3166_ALPHA3, $countryCode);
	}

	/**
	 * @param int $countryCode
	 * @return Iso3166Country|null
	 * @throws Iso3166CountryException
	 */
	public static function getByIso3166Numeric($countryCode)
	{
		$countryCodePadded = str_pad((string)$countryCode, 3, '0', STR_PAD_LEFT);
		return self::getBy(self::ISO3166_NUMERIC, $countryCodePadded);
	}

	/**
	 * @param string $countryCode
	 * @return Iso3166Country|null
	 * @throws Iso3166CountryException
	 */
	public static function getByIso3166v2($countryCode)
	{
		$countryCode = strtoupper($countryCode);
		return self::getBy(self::ISO3166_2, $countryCode);
	}

	/**
	 * @param string $unitedNationsId
	 * @return Iso3166Country|null
	 * @throws Iso3166CountryException
	 */
	public static function getByUnitedNationsId($unitedNationsId)
	{
		$unitedNationsId = strtoupper($unitedNationsId);
		return self::getBy(self::UNITED_NATIONS_ID, $unitedNationsId);
	}

	/**
	 * @param string $toplevelDomain
	 * @return Iso3166Country|null
	 * @throws Iso3166CountryException
	 */
	public static function getByToplevelDomain($toplevelDomain)
	{
		$toplevelDomain = strtolower(trim($toplevelDomain, '.'));
		return self::getBy(self::TOP_LEVEL_DOMAIN, $toplevelDomain);
	}

	/**
	 * @param string $identifier
	 * @param string $code
	 * @return Iso3166Country|null
	 * @throws Iso3166CountryException
	 */
	private static function getBy($identifier, $code)
	{
		$countryDataList = self::getCountryData();
		foreach ($countryDataList as $countryData) {
			if ($countryData[$identifier] === $code) {
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
		return self::validateBy(self::ISO3166_ALPHA3, $countryCode);
	}

	/**
	 * @param int $countryCode
	 * @return bool
	 */
	public static function validateIso3166Numeric($countryCode)
	{
		$countryCodePadded = str_pad((string)$countryCode, 3, '0', STR_PAD_LEFT);
		return self::validateBy(self::ISO3166_NUMERIC, $countryCodePadded);
	}

	/**
	 * @param string $countryCode
	 * @return bool
	 */
	public static function validateIso3166v2($countryCode)
	{
		$countryCode = strtoupper($countryCode);
		return self::validateBy(self::ISO3166_2, $countryCode);
	}

	/**
	 * @param string $unitedNationsId
	 * @return bool
	 */
	public static function validateUnitedNationsId($unitedNationsId)
	{
		$unitedNationsId = strtoupper($unitedNationsId);
		return self::validateBy(self::UNITED_NATIONS_ID, $unitedNationsId);
	}

	/**
	 * @param string $toplevelDomain
	 * @return bool
	 */
	public static function validateToplevelDomain($toplevelDomain)
	{
		$toplevelDomain = strtolower(trim($toplevelDomain, '.'));
		return self::validateBy(self::TOP_LEVEL_DOMAIN, $toplevelDomain);
	}

	/**
	 * @param string $identifier
	 * @param string $code
	 * @return bool
	 */
	private static function validateBy($identifier, $code)
	{
		$countryDataList = self::getCountryData();
		foreach ($countryDataList as $countryData) {
			if ($countryData[$identifier] === $code) {
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
	public static function getSelectOptions(
		$selectedValue = null,
		$valueKey = self::ISO3166_ALPHA2,
		$nameKey = self::NAME
	) {
		$selectedValue = strtoupper($selectedValue);
		$countryDataList = self::getCountryData();
		$options = array();
		foreach ($countryDataList as $countryData) {
			$selected = ($countryData[$valueKey] === $selectedValue) ? 'selected="selected"' : '';
			$value = $countryData[$valueKey];
			$name = $countryData[$nameKey];
			$options[] = '<option value="' . $value . '" ' . $selected . '>' . $name . '</option>';
		}
		return implode(PHP_EOL, $options);
	}

}
