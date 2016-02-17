# ISO3166 Country Information

ISO3166 util class for validating and listing country codes and getting detailed information for identified countries. 

## Installation

	{
    	"require": {
	        "markenwerk/iso3166-country-information": "~1.0"
	    }
	}

## Usage

<?php
	
	require_once(__DIR__ . '/vendor/autoload.php');
	
	use Iso3166Country\Iso3166CountryInformation;
	
	// Get all countries as array of hashmaps containing the country information
	$arrayOfIso3166Countries = Iso3166CountryInformation::getCountryData();
	
	// Get all countries as array of Iso3166Country objects
	$arrayOfIso3166CountryObjects = Iso3166CountryInformation::getCountries();
	
	// Get all countries as a string containing HTML option tags with 'DE' ist the selected option, the ISO3166Alpha2
	// property is the value and the name property is the label.
	$optionsOfIso3166Countries = Iso3166CountryInformation::getSelectOptions(
		'DE',
		Iso3166CountryInformation::ISO3166_ALPHA2,
		Iso3166CountryInformation::NAME
	);
	/*
	Puts out something like this:
	<option value="AF" ui-active="0">Afghanistan</option>
	<option value="EG" ui-active="0">Ägypten</option>
	<option value="AX" ui-active="0">Åland</option>
	<option value="AL" ui-active="0">Albanien</option>
	<option value="DZ" ui-active="0">Algerien</option>
	<option value="AS" ui-active="0">Amerikanisch-Samoa</option>
	<option value="VI" ui-active="0">Amerikanische Jungferninseln</option>
	<option value="AD" ui-active="0">Andorra</option>
	…
	 */
	echo $optionsOfIso3166Countries;
	
	// Get Iso3166Country object for the ISO3166Alpha2 country code 'de' (Germany)
	$iso3166Country = Iso3166CountryInformation::getByIso3166Alpha2('de');
	
	// Get Iso3166Country object for the ISO3166Alpha3 country code 'deu' (Germany)
	$iso3166Country = Iso3166CountryInformation::getByIso3166Alpha3('deu');
	
	// Get Iso3166Country object for the ISO3166Numeric country code '276' (Germany)
	$iso3166Country = Iso3166CountryInformation::getByIso3166Numeric(276);
	
	// Get Iso3166Country object for the ISO3166-2 country code 'de' (Germany)
	$iso3166Country = Iso3166CountryInformation::getByIso3166_2('de');
	
	// Get Iso3166Country object for the ISO3166 top level domain 'de' (Germany)
	$iso3166Country = Iso3166CountryInformation::getByToplevelDomain('de');
	
	// Get Iso3166Country object for the ISO3166 united nations identifier 'de' (Germany)
	$iso3166Country = Iso3166CountryInformation::getByUnitedNationsIdentifier('de');
	
	// Whether the ISO3166Alpha2 country code 'de' exists
	$countryExists = Iso3166CountryInformation::validateIso3166Alpha2('de');
	
	// Whether the ISO3166Alpha3 country code 'deu' exists
	$countryExists = Iso3166CountryInformation::validateIso3166Alpha3('deu');
	
	// Whether the ISO3166Numeric country code '276' exists
	$countryExists = Iso3166CountryInformation::validateIso3166Numeric(276);
	
	// Whether the ISO3166-2 country code 'de' exists
	$countryExists = Iso3166CountryInformation::validateIso3166_2('de');
	
	// Whether the ISO3166 top level domain 'de' exists
	$countryExists = Iso3166CountryInformation::validateToplevelDomain('de');
	
	// Whether the ISO3166 united nations identifier 'de' exists
	$countryExists = Iso3166CountryInformation::validateUnitedNationsIdentifier('de');
	
