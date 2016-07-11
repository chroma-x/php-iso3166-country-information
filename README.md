# PHP ISO3166 Country Information

[![Build Status](https://travis-ci.org/markenwerk/php-iso3166-country-information.svg?branch=master)](https://travis-ci.org/markenwerk/php-iso3166-country-information)
[![Test Coverage](https://codeclimate.com/github/markenwerk/php-iso3166-country-information/badges/coverage.svg)](https://codeclimate.com/github/markenwerk/php-iso3166-country-information/coverage)
[![Code Climate](https://codeclimate.com/github/markenwerk/php-iso3166-country-information/badges/gpa.svg)](https://codeclimate.com/github/markenwerk/php-iso3166-country-information)
[![Latest Stable Version](https://poser.pugx.org/markenwerk/iso3166-country-information/v/stable)](https://packagist.org/packages/markenwerk/iso3166-country-information)
[![Total Downloads](https://poser.pugx.org/markenwerk/iso3166-country-information/downloads)](https://packagist.org/packages/markenwerk/iso3166-country-information)
[![License](https://poser.pugx.org/markenwerk/iso3166-country-information/license)](https://packagist.org/packages/markenwerk/iso3166-country-information)

ISO3166 util class for validating and listing country codes and getting detailed information for identified countries. 

## Installation

````{json}
{
   	"require": {
        "markenwerk/iso3166-country-information": "~3.0"
    }
}
````

## Usage

### Autoloading and namesapce

````{php}  
require_once('path/to/vendor/autoload.php');

use Markenwerk\Iso3166Country\Iso3166CountryInformation;
use Markenwerk\Iso3166Country\Iso3166Country;
````

---

### Getting information about all countries existing in ISO3166

#### Get all countries as array of hashmaps containing the country information

````{php}  
$arrayOfIso3166Countries = Iso3166CountryInformation::getCountryData();
````

##### Result

````{php}  
…
[RU] => Array
	(
		[iso3166_alpha2] => RU
		[iso3166_alpha3] => RUS
		[iso3166_numeric] => 643
		[iso3166_2] => RU
		[un] => RU
		[tld] => ru
		[name] => Russische Föderation
	)
[SB] => Array
	(
		[iso3166_alpha2] => SB
		[iso3166_alpha3] => SLB
		[iso3166_numeric] => 090
		[iso3166_2] => SB
		[un] => SB
		[tld] => sb
		[name] => Salomonen
)
…
````

---

#### Get all countries as array of Iso3166Country objects

````{php}
$arrayOfIso3166CountryObjects = Iso3166CountryInformation::getCountries();
````

##### Result

````{php}
…
[CX] => Iso3166Country\Iso3166Country Object
	(
		[iso3166Alpha2CountryCode:Iso3166Country\Iso3166Country:private] => CX
		[iso3166Alpha3CountryCode:Iso3166Country\Iso3166Country:private] => CXR
		[iso3166NumericCountryCode:Iso3166Country\Iso3166Country:private] => 162
		[iso3166_2CountryCode:Iso3166Country\Iso3166Country:private] => CX
		[toplevelDomain:Iso3166Country\Iso3166Country:private] => cx
		[unitedNationsCountryCode:Iso3166Country\Iso3166Country:private] => CX
		[name:Iso3166Country\Iso3166Country:private] => Weihnachtsinsel
	)
[EH] => Iso3166Country\Iso3166Country Object
	(
		[iso3166Alpha2CountryCode:Iso3166Country\Iso3166Country:private] => EH
		[iso3166Alpha3CountryCode:Iso3166Country\Iso3166Country:private] => ESH
		[iso3166NumericCountryCode:Iso3166Country\Iso3166Country:private] => 732
		[iso3166_2CountryCode:Iso3166Country\Iso3166Country:private] => EH
		[toplevelDomain:Iso3166Country\Iso3166Country:private] => eh
		[unitedNationsCountryCode:Iso3166Country\Iso3166Country:private] => EH
		[name:Iso3166Country\Iso3166Country:private] => Westsahara
	)
…
````

---

#### Get all countries as a string containing HTML option tags.

````{php}
// Argument 1 ('DE') ist the selected option,
// argument 2 (ISO3166_ALPHA2) property is the value,
// argument 2 (NAME) property is the label.
$optionsOfIso3166Countries = Iso3166CountryInformation::getSelectOptions(
	'DE',
	Iso3166CountryInformation::ISO3166_ALPHA2,
	Iso3166CountryInformation::NAME
);
````

#### Result

````{html}
<option value="AF">Afghanistan</option>
<option value="EG">Ägypten</option>
<option value="AX">Åland</option>
<option value="AL">Albanien</option>
<option value="DZ">Algerien</option>
<option value="AS">Amerikanisch-Samoa</option>
<option value="VI">Amerikanische Jungferninseln</option>
<option value="AD">Andorra</option>
…
<option value="DE" selected="selected">Deutchland</option>
…
````

---

### Getting information about a single country identified by one of the ISO3166 properties

#### Get info for the ISO3166Alpha2 country code 'de' (Germany)

````{php}
$iso3166Country = Iso3166CountryInformation::getByIso3166Alpha2('de');
````

#### Get info for the ISO3166Alpha3 country code 'deu' (Germany)

````{php}
$iso3166Country = Iso3166CountryInformation::getByIso3166Alpha3('deu');
````

#### Get info for the ISO3166Numeric country code '276' (Germany)

````{php}
$iso3166Country = Iso3166CountryInformation::getByIso3166Numeric(276);
````

#### Get info for the ISO3166-2 country code 'de' (Germany)

````{php}
$iso3166Country = Iso3166CountryInformation::getByIso3166v2('de');
````

#### Get info for the ISO3166 top level domain 'de' (Germany)

````{php}
$iso3166Country = Iso3166CountryInformation::getByToplevelDomain('de');
````

#### Get info for the ISO3166 united nations identifier 'de' (Germany)

````{php}
$iso3166Country = Iso3166CountryInformation::getByUnitedNationsId('de');
````

##### Result

````{php}
$iso3166Country => Iso3166Country\Iso3166Country Object
	(
		[iso3166Alpha2CountryCode:Iso3166Country\Iso3166Country:private] => DE
		[iso3166Alpha3CountryCode:Iso3166Country\Iso3166Country:private] => DEU
		[iso3166NumericCountryCode:Iso3166Country\Iso3166Country:private] => 276
		[iso3166_2CountryCode:Iso3166Country\Iso3166Country:private] => DE
		[toplevelDomain:Iso3166Country\Iso3166Country:private] => de
		[unitedNationsCountryCode:Iso3166Country\Iso3166Country:private] => DE
		[name:Iso3166Country\Iso3166Country:private] => Deutschland
	)
````

---

### Validate whether a ISO3166 property is valid (existing)

#### Whether the ISO3166Alpha2 country code 'de' exists

````{php}
$countryExists = Iso3166CountryInformation::validateIso3166Alpha2('de');
````

#### Whether the ISO3166Alpha3 country code 'deu' exists

````{php}
$countryExists = Iso3166CountryInformation::validateIso3166Alpha3('deu');
````

#### Whether the ISO3166Numeric country code '276' exists

````{php}
$countryExists = Iso3166CountryInformation::validateIso3166Numeric(276);
````

#### Whether the ISO3166-2 country code 'de' exists

````{php}
$countryExists = Iso3166CountryInformation::validateIso3166v2('de');
````

#### Whether the ISO3166 top level domain 'de' exists

````{php}
$countryExists = Iso3166CountryInformation::validateToplevelDomain('de');
````

#### Whether the ISO3166 united nations identifier 'de' exists

````{php}
$countryExists = Iso3166CountryInformation::validateUnitedNationsId('de');
````

##### All validation methods return a boolean value.

---

### Methods of the Iso3166Country class

#### Creation of an object by country code

````{php}
use Markenwerk\Iso3166Country\Iso3166CountryInformation;
use Markenwerk\Iso3166Country\Iso3166Country;

$country = new Iso3166Country();
$country->loadByIso3166Alpha2CountryCode('DE');
````

#### Creation of a custom country information object

````{php}
use Iso3166Country\Iso3166CountryInformation;
use Iso3166Country\Iso3166Country;

$utopia = array(
	Iso3166CountryInformation::ISO3166_ALPHA2 => 'UO',
	Iso3166CountryInformation::ISO3166_ALPHA3 => 'UTO',
	Iso3166CountryInformation::ISO3166_NUMERIC => 42,
	Iso3166CountryInformation::ISO3166_2 => 'UO',
	Iso3166CountryInformation::UNITED_NATIONS_ID => 'uo',
	Iso3166CountryInformation::TOP_LEVEL_DOMAIN => 'uo',
	Iso3166CountryInformation::NAME => 'Utopia'
);
$country = new Iso3166Country();
$country->loadByIso3166CountryInformation($utopia);
````

#### Getter for properties

````{php}
$iso3166Alpha2 = $country->getIso3166Alpha2CountryCode();
$iso3166Alpha3 = $country->getIso3166Alpha3CountryCode();
$iso3166Numeric = $country->getIso3166NumericCountryCode();
$iso3166_2 = $country->getIso3166v2CountryCode();
$toplevelDomain = $country->getToplevelDomain();
$unitedNationsIdentifier = $country->getUnitedNationsId();
$name = $country->getName();
````

## Contribution

Contributing to our projects is always very appreciated.  
**But: please follow the contribution guidelines written down in the [CONTRIBUTING.md](https://github.com/markenwerk/php-iso3166-country-information/blob/master/CONTRIBUTING.md) document.**

## License

PHP ISO3166 Country Information is under the MIT license.