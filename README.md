# ISO3166 Country Information

ISO3166 util class for validating and listing country codes and getting detailed information for identified countries. 

## Installation

	{
    	"require": {
	        "markenwerk/iso3166-country-information": "~1.0"
	    }
	}

## Usage

### Autoloading and namesapce

	require_once(__DIR__ . '/vendor/autoload.php');

	use Iso3166Country\Iso3166CountryInformation;

### Getting information about all countries existing in ISO3166

#### Get all countries as array of hashmaps containing the country information

	$arrayOfIso3166Countries = Iso3166CountryInformation::getCountryData();

##### Result

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

#### Get all countries as array of Iso3166Country objects

	$arrayOfIso3166CountryObjects = Iso3166CountryInformation::getCountries();

##### Result

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

#### Get all countries as a string containing HTML option tags.

	// Argument 1 ('DE') ist the selected option,
	// argument 2 (ISO3166_ALPHA2) property is the value,
	// argument 2 (NAME) property is the label.
	$optionsOfIso3166Countries = Iso3166CountryInformation::getSelectOptions(
		'DE',
		Iso3166CountryInformation::ISO3166_ALPHA2,
		Iso3166CountryInformation::NAME
	);

#### Result

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

### Getting information about a single country identified by one of the ISO3166 properties

#### Get Iso3166Country object for the ISO3166Alpha2 country code 'de' (Germany)

	$iso3166Country = Iso3166CountryInformation::getByIso3166Alpha2('de');

#### Get Iso3166Country object for the ISO3166Alpha3 country code 'deu' (Germany)

	$iso3166Country = Iso3166CountryInformation::getByIso3166Alpha3('deu');

#### Get Iso3166Country object for the ISO3166Numeric country code '276' (Germany)

	$iso3166Country = Iso3166CountryInformation::getByIso3166Numeric(276);

#### Get Iso3166Country object for the ISO3166-2 country code 'de' (Germany)

	$iso3166Country = Iso3166CountryInformation::getByIso3166_2('de');

#### Get Iso3166Country object for the ISO3166 top level domain 'de' (Germany)

	$iso3166Country = Iso3166CountryInformation::getByToplevelDomain('de');

#### Get Iso3166Country object for the ISO3166 united nations identifier 'de' (Germany)

	$iso3166Country = Iso3166CountryInformation::getByUnitedNationsIdentifier('de');

##### Result

	$iso3166Country => Iso3166Country\Iso3166Country Object
		(
			[iso3166Alpha2CountryCode:Iso3166Country\Iso3166Country:private] => VE
			[iso3166Alpha3CountryCode:Iso3166Country\Iso3166Country:private] => VEN
			[iso3166NumericCountryCode:Iso3166Country\Iso3166Country:private] => 862
			[iso3166_2CountryCode:Iso3166Country\Iso3166Country:private] => VE
			[toplevelDomain:Iso3166Country\Iso3166Country:private] => ve
			[unitedNationsCountryCode:Iso3166Country\Iso3166Country:private] => VE
			[name:Iso3166Country\Iso3166Country:private] => Venezuela
		)

### Validate whether a ISO3166 property is valid (existing)

#### Whether the ISO3166Alpha2 country code 'de' exists

	$countryExists = Iso3166CountryInformation::validateIso3166Alpha2('de');

#### Whether the ISO3166Alpha3 country code 'deu' exists

	$countryExists = Iso3166CountryInformation::validateIso3166Alpha3('deu');

#### Whether the ISO3166Numeric country code '276' exists

	$countryExists = Iso3166CountryInformation::validateIso3166Numeric(276);

#### Whether the ISO3166-2 country code 'de' exists

	$countryExists = Iso3166CountryInformation::validateIso3166_2('de');

#### Whether the ISO3166 top level domain 'de' exists

	$countryExists = Iso3166CountryInformation::validateToplevelDomain('de');

#### Whether the ISO3166 united nations identifier 'de' exists

	$countryExists = Iso3166CountryInformation::validateUnitedNationsIdentifier('de');

##### All validation methods return a boolean value.

### Methods of the Iso3166Country class

#### Creation of an object by country code

	use Iso3166Country\Iso3166CountryInformation;
	use Iso3166Country\Iso3166Country;

	$country = new Iso3166Country();
	$country->loadByIso3166Alpha2CountryCode('DE');

#### Creation of an object by country information

	$countries = Iso3166CountryInformation::getCountryData();
	$country->loadByIso3166CountryInformation($countries['DE']);

#### Getter for properties

	$iso3166Alpha2 = $country->getIso3166Alpha2CountryCode();
	$iso3166Alpha3 = $country->getIso3166Alpha3CountryCode();
	$iso3166Numeric = $country->getIso3166NumericCountryCode();
	$iso3166_2 = $country->getIso31662CountryCode();
	$toplevelDomain = $country->getToplevelDomain();
	$unitedNationsIdentifier = $country->getUnitedNationsIdentifier();
	$name = $country->getName();
	
## License

ISO3166 Country Information is under the MIT license.