# ValidationHelper Class
## Description
Helper class to validate brazilian common values (CPF, CNPJ, phone, CEP - zip code), dates, geolocations (lat and lng), etc

## Install via Composer
```bash
composer require bkazuo/common-helper-validator
``` 

### Example
```php
require __DIR__.'/vendor/autoload.php';

// New validation object created
$validator = new Helper\ValidationHelper();

// Check if CPF is valid
$isCpf = $validator->isCpf('12345678909');
echo $isCpf ? 'CPF é válido' : 'CPF inválido';
```

**Response:**
The response is always a a boolean type. 

### List of available methos

```php
require __DIR__.'/vendor/autoload.php';

// New validation object created
$validator = new Helper\ValidationHelper();

// Check if CPF is valid
$isCpf = $validator->isCpf('12345678909');

// Check if CNPJ is valid
$isCnpj = $validator->isCnpj('12123123000199');

// Check if email is valid
$isEmail = $validator->isEmail('contact@email.com');

// Check if variable is not null
$isNotBlank = $validator->isNotBlank('Jose');

// Check if a variable is a positive integer
$isPositiveInteger = $validator->isPositiveInteger(5);

// Check if a variable is integer
$isInteger = $validator->isInteger(5);

// Check if a variable is a positive float
$isPositiveFloat = $validator->isPositiveFloat(5);

// Check if a variable is float
$isFloat = $validator->isFloat(5);

// Cehck if string is a date format (YYYY-mm-dd)
$isDate = $validator->isDate('2017-03-03');

// Check if string is a datetime format (YYYY-mm-dd H:i:s)
$isDatetime = $validator->isDateTime('2017-03-03 20:00:00');

// Check if string is a time format (H:i:s)
$isDatetime = $validator->isTime('20:00:00');

// Check if string is a zip code format (CEP)
$isCep = $validator->isCep('01234999');

// Check if is a valid phone
$isPhone= $validator->isPhone('11999998888');

// Check if is a valid brazilian state
$isState= $validator->isState('SP');

// Check if Renavam is valid (driver license number)
$isRenavam= $validator->isRenavam('123456789');
```
