<?php

namespace Iso3166Country;

/**
 * Class Iso3166CountryInformationTest
 *
 * @package Iso3166Country
 */
class Iso3166CountryInformationTest extends \PHPUnit_Framework_TestCase
{

	public function testGetCountryData()
	{
		$countries = Iso3166CountryInformation::getCountryData();
		$this->assertArrayHasKey('DE', $countries);
		$country = $countries['DE'];
		$this->assertArrayHasKey(Iso3166CountryInformation::ISO3166_ALPHA2, $country);
		$this->assertArrayHasKey(Iso3166CountryInformation::ISO3166_ALPHA3, $country);
		$this->assertArrayHasKey(Iso3166CountryInformation::ISO3166_NUMERIC, $country);
		$this->assertArrayHasKey(Iso3166CountryInformation::ISO3166_2, $country);
		$this->assertArrayHasKey(Iso3166CountryInformation::TOP_LEVEL_DOMAIN, $country);
		$this->assertArrayHasKey(Iso3166CountryInformation::UNITED_NATIONS_ID, $country);
		$this->assertArrayHasKey(Iso3166CountryInformation::NAME, $country);
	}

	public function testGetCountries()
	{
		$countries = Iso3166CountryInformation::getCountries();
		$this->assertArrayHasKey('DE', $countries);
		$country = $countries['DE'];
		$this->assertInstanceOf('Iso3166Country\\Iso3166Country', $country);
	}

	public function testGetByIso3166Alpha2()
	{
		$country = Iso3166CountryInformation::getByIso3166Alpha2('de');
		$this->assertInstanceOf('Iso3166Country\\Iso3166Country', $country);
		$country = Iso3166CountryInformation::getByIso3166Alpha2('xx');
		$this->assertNull($country);
	}

	public function testGetByIso3166Alpha3()
	{
		$country = Iso3166CountryInformation::getByIso3166Alpha3('deu');
		$this->assertInstanceOf('Iso3166Country\\Iso3166Country', $country);
		$country = Iso3166CountryInformation::getByIso3166Alpha3('xxx');
		$this->assertNull($country);
	}

	public function testGetByIso3166Numeric()
	{
		$country = Iso3166CountryInformation::getByIso3166Numeric(276);
		$this->assertInstanceOf('Iso3166Country\\Iso3166Country', $country);
		$country = Iso3166CountryInformation::getByIso3166Numeric('276');
		$this->assertInstanceOf('Iso3166Country\\Iso3166Country', $country);
		$country = Iso3166CountryInformation::getByIso3166Numeric(20000);
		$this->assertNull($country);
	}

	public function testGetByIso3166_2()
	{
		$country = Iso3166CountryInformation::getByIso3166v2('de');
		$this->assertInstanceOf('Iso3166Country\\Iso3166Country', $country);
		$country = Iso3166CountryInformation::getByIso3166v2('xx');
		$this->assertNull($country);
	}

	public function testGetByToplevelDomain()
	{
		$country = Iso3166CountryInformation::getByToplevelDomain('de');
		$this->assertInstanceOf('Iso3166Country\\Iso3166Country', $country);
		$country = Iso3166CountryInformation::getByToplevelDomain('xx');
		$this->assertNull($country);
	}

	public function testGetByUnitedNationsIdentifier()
	{
		$country = Iso3166CountryInformation::getByUnitedNationsId('de');
		$this->assertInstanceOf('Iso3166Country\\Iso3166Country', $country);
		$country = Iso3166CountryInformation::getByUnitedNationsId('xx');
		$this->assertNull($country);
	}

	public function testValidateIso3166Alpha2()
	{
		$valid = Iso3166CountryInformation::validateIso3166Alpha2('de');
		$this->assertTrue($valid);
		$valid = Iso3166CountryInformation::validateIso3166Alpha2('xx');
		$this->assertFalse($valid);
	}

	public function testValidateIso3166Alpha3()
	{
		$valid = Iso3166CountryInformation::validateIso3166Alpha3('deu');
		$this->assertTrue($valid);
		$valid = Iso3166CountryInformation::validateIso3166Alpha3('xxx');
		$this->assertFalse($valid);
	}

	public function testValidateIso3166Numeric()
	{
		$valid = Iso3166CountryInformation::validateIso3166Numeric(276);
		$this->assertTrue($valid);
		$valid = Iso3166CountryInformation::validateIso3166Numeric('276');
		$this->assertTrue($valid);
		$valid = Iso3166CountryInformation::validateIso3166Numeric(20000);
		$this->assertFalse($valid);
	}

	public function testValidateIso3166_2()
	{
		$valid = Iso3166CountryInformation::validateIso3166v2('de');
		$this->assertTrue($valid);
		$valid = Iso3166CountryInformation::validateIso3166v2('xx');
		$this->assertFalse($valid);
	}

	public function testValidateToplevelDomain()
	{
		$valid = Iso3166CountryInformation::validateToplevelDomain('de');
		$this->assertTrue($valid);
		$valid = Iso3166CountryInformation::validateToplevelDomain('xx');
		$this->assertFalse($valid);
	}

	public function testValidateUnitedNationsIdentifier()
	{
		$valid = Iso3166CountryInformation::validateUnitedNationsId('de');
		$this->assertTrue($valid);
		$valid = Iso3166CountryInformation::validateUnitedNationsId('xx');
		$this->assertFalse($valid);
	}

	public function testGetSelectOptions()
	{
		$options = Iso3166CountryInformation::getSelectOptions();
		$this->assertStringStartsWith('<option value="', $options);
		$this->assertStringEndsWith('</option>', $options);
	}

}
