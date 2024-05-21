
---

## Usage:

<details>
<summary><strong>getCities()</strong></summary>

## Purpose:
To retrieve a list of cities based on a specified state.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The state information used to get the cities list. By default, this will take the ID of the state.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - **Default**: `id`

## Allowed Columns:
- `id`
- `name`

## Example Usage:

```php
// Using default parameters
$cities = $this->getCities($stateId);

// Specifying a column to compare with
$cities = $this->getCities($stateName, 'name');
```
</details>


<details>
<summary><strong>getCityBy()</strong></summary>

## Purpose:
To retrieve or fetch a city based on a specified property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The city information used to get the city object. By default, this will take the ID of the city.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `name`

## Example Usage:

```php
// Using default parameters
$cities = $this->getCityBy($cityId);

// Specifying a column to compare with
$cities = $this->getCityBy($cityName, 'name');
```
</details>

<details>
<summary><strong>getStateByCity()</strong></summary>

## Purpose:
To retrieve or fetch a state based on a specified city property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The city information used to get the state object. By default, this will take the ID of the city.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `name`

## Example Usage:

```php
// Using default parameters
$cities = $this->getStateByCity($cityId);

// Specifying a column to compare with
$cities = $this->getStateByCity($cityName, 'name');
```
</details>

<details>
<summary><strong>getCountries()</strong></summary>

## Purpose:
To retrieve or fetch list of countries.

## Expected Arguments:
### Total: 0

## Example Usage:

```php
// Using default parameters
$cities = $this->getCountries();
```
</details>

<details>
<summary><strong>getCountryBy()</strong></summary>

## Purpose:
To retrieve or fetch a country based on a specified property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The country information used to get the country object. By default, this will take the ID of the country.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `name`
- `iso3`
- `iso2`
- `phone_code`
- `native`
- `capital`
- `tld` (top-level domain)

## Example Usage:

```php
// Using default parameters
$cities = $this->getCountryBy($countryId);

// Specifying a column to compare with
$cities = $this->getCountryBy($countryName, 'name');

// Specifying a column to compare with
$cities = $this->getCountryBy($countryCode, 'iso2');
```
</details>

<details>
<summary><strong>getCountryStates()</strong></summary>

## Purpose:
To retrieve country states based on a specified property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The country information used to get the country states. By default, this will take the ID of the country.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `name`
- `iso3`
- `iso2`
- `phone_code`
- `native`
- `capital`
- `tld` (top-level domain)

## Example Usage:

```php
// Using default parameters
$cities = $this->getCountryStates($countryId);

// Specifying a column to compare with
$cities = $this->getCountryStates($countryName, 'name');

// Specifying a column to compare with
$cities = $this->getCountryStates($countryCode, 'iso2');
```
</details>

<details>
<summary><strong>getCountryCurrencies()</strong></summary>

## Purpose:
To retrieve country currencies based on a specified property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The country information used to get the country currencies. By default, this will take the ID of the country.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `name`
- `iso3`
- `iso2`
- `phone_code`
- `native`
- `capital`
- `tld` (top-level domain)

## Example Usage:

```php
// Using default parameters
$cities = $this->getCountryCurrencies($countryId);

// Specifying a column to compare with
$cities = $this->getCountryCurrencies($countryName, 'name');

// Specifying a column to compare with
$cities = $this->getCountryCurrencies($countryCode, 'iso2');
```
</details>

<details>
<summary><strong>getCountryTimezones()</strong></summary>

## Purpose:
To retrieve country timezones based on a specified property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The country information used to get the country timezones. By default, this will take the ID of the country.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `name`
- `iso3`
- `iso2`
- `phone_code`
- `native`
- `capital`
- `tld` (top-level domain)

## Example Usage:

```php
// Using default parameters
$cities = $this->getCountryTimezones($countryId);

// Specifying a column to compare with
$cities = $this->getCountryTimezones($countryName, 'name');

// Specifying a column to compare with
$cities = $this->getCountryTimezones($countryCode, 'iso2');
```
</details>

<details>
<summary><strong>getCountryPaymentProducts()</strong></summary>

## Purpose:
To retrieve country payment products based on a specified property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The country information used to get the country payment products. By default, this will take the ID of the country.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `name`
- `iso3`
- `iso2`
- `phone_code`
- `native`
- `capital`
- `tld` (top-level domain)

## Example Usage:

```php
// Using default parameters
$cities = $this->getCountryPaymentProducts($countryId);

// Specifying a column to compare with
$cities = $this->getCountryPaymentProducts($countryName, 'name');

// Specifying a column to compare with
$cities = $this->getCountryPaymentProducts($countryCode, 'iso2');
```
</details>

<details>
<summary><strong>getCurrencies()</strong></summary>

## Purpose:
To retrieve currencies.

## Expected Arguments:
### Total: 0

## Example Usage:

```php
// Using default parameters
$cities = $this->getCurrencies();
```
</details>

<details>
<summary><strong>getCurrencyBy()</strong></summary>

## Purpose:
To retrieve currency based on a specified property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The currency information used to get the currency object. By default, this will take the ID of the currency.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `code`

## Example Usage:

```php
// Using default parameters
$cities = $this->getCurrencyBy($currencyId);

// Specifying a column to compare with
$cities = $this->getCurrencyBy($currencyName, 'code');
```
</details>

<details>
<summary><strong>getCountriesBasedOnSupportedCurrency()</strong></summary>

## Purpose:
To retrieve supported countries based on a specified currency property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The currency information used to get the currency supported countries. By default, this will take the ID of the currency.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `code`

## Example Usage:

```php
// Using default parameters
$cities = $this->getCountriesBasedOnSupportedCurrency($currencyId);

// Specifying a column to compare with
$cities = $this->getCountriesBasedOnSupportedCurrency($currencyName, 'code');
```
</details>

<details>
<summary><strong>getPaymentMethods()</strong></summary>

## Purpose:
To retrieve payment methods.

## Expected Arguments:
### Total: 0

## Example Usage:

```php
// Using default parameters
$cities = $this->getPaymentMethods();
```
</details>

<details>
<summary><strong>getPaymentMethodBy()</strong></summary>

## Purpose:
To retrieve payment methods based on a specified payment method property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The payment method information used to get the payment methods. By default, this will take the ID of the payment method.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `code`

## Example Usage:

```php
// Using default parameters
$cities = $this->getPaymentMethodBy($paymentMethodId);

// Specifying a column to compare with
$cities = $this->getPaymentMethodBy($paymentMethodName, 'code');
```
</details>

<details>
<summary><strong>getPaymentMethodProducts()</strong></summary>

## Purpose:
To retrieve payment method products with logos based on a specified payment method property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The payment method information used to get the payment method products. By default, this will take the ID of the payment method.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `code`

## Example Usage:

```php
// Using default parameters
$cities = $this->getPaymentMethodProducts($paymentMethodId);

// Specifying a column to compare with
$cities = $this->getPaymentMethodProducts($paymentMethodName, 'code');
```
</details>

<details>
<summary><strong>getPaymentProducts()</strong></summary>

## Purpose:
To retrieve payment products with logos.

## Expected Arguments:
### Total: 0

## Example Usage:

```php
// Using default parameters
$cities = $this->getPaymentProducts();
```
</details>

<details>
<summary><strong>getPaymentProductBy()</strong></summary>

## Purpose:
To retrieve payment products with logos based on a specified payment product property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The payment product information used to get the payment product. By default, this will take the ID of the payment product.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `name`
- `code`

## Example Usage:

```php
// Using default parameters
$cities = $this->getPaymentProductBy($paymentProductId);

// Specifying a column to compare with
$cities = $this->getPaymentProductBy($paymentProductName, 'code');
```
</details>

<details>
<summary><strong>getStates()</strong></summary>

## Purpose:
To retrieve states.

## Expected Arguments:
### Total: 0

## Example Usage:

```php
// Using default parameters
$cities = $this->getStates($paymentProductId);
```
</details>

<details>
<summary><strong>getStateBy()</strong></summary>

## Purpose:
To retrieve state based on a specified state property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The state information used to get the state object. By default, this will take the ID of the state.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `name`
- `code`

## Example Usage:

```php
// Using default parameters
$cities = $this->getStateBy($stateId);

// Specifying a column to compare with
$cities = $this->getStateBy($stateName, 'code');
```
</details>

<details>
<summary><strong>getStateCities()</strong></summary>

## Purpose:
To retrieve state cities based on a specified state property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The state information used to get the state cities list. By default, this will take the ID of the state.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `name`
- `code`

## Example Usage:

```php
// Using default parameters
$cities = $this->getStateCities($stateId);

// Specifying a column to compare with
$cities = $this->getStateCities($stateName, 'code');
```
</details>

<details>
<summary><strong>getStateCurrencies()</strong></summary>

## Purpose:
To retrieve state currencies based on a specified state property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The state information used to get the state currencies list. By default, this will take the ID of the state.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `name`
- `code`

## Example Usage:

```php
// Using default parameters
$cities = $this->getStateCurrencies($stateId);

// Specifying a column to compare with
$cities = $this->getStateCurrencies($stateName, 'code');
```
</details>

<details>
<summary><strong>getCountryBasedOnGivenState()</strong></summary>

## Purpose:
To retrieve state country based on a specified state property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The state information used to get the state country. By default, this will take the ID of the state.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `name`
- `code`

## Example Usage:

```php
// Using default parameters
$cities = $this->getCountryBasedOnGivenState($stateId);

// Specifying a column to compare with
$cities = $this->getCountryBasedOnGivenState($stateName, 'code');
```
</details>

<details>
<summary><strong>getTimezones()</strong></summary>

## Purpose:
To retrieve timezones.

## Expected Arguments:
### Total: 0

## Example Usage:

```php
// Using default parameters
$cities = $this->getTimezones();
```
</details>

<details>
<summary><strong>getTimezoneBy()</strong></summary>

## Purpose:
To retrieve timezone based on a specified state property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The timezone information used to get the timezone object. By default, this will take the ID of the timezone.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `zone_name`
- `abbreviation`
- `tz_name`

## Example Usage:

```php
// Using default parameters
$cities = $this->timezone($timezoneId);

// Specifying a column to compare with
$cities = $this->timezone($timezoneAbbreviation, 'abbreviation');
```
</details>

<details>
<summary><strong>getCountryBasedOnTimezone()</strong></summary>

## Purpose:
To retrieve timezone country based on a specified timezone property and value.

## Expected Arguments:
### Total: 2

1. **Value**:
   - **Description**: The timezone information used to get the timezone country. By default, this will take the ID of the timezone.
   - **Type**: Mixed (integer or string)
   - **Required**: Yes

2. **Column**:
   - **Description**: The column name to compare with or check. By default, this will consider `id` as the column.
   - **Type**: String
   - **Required**: No
   - Default: `id`

## Allowed Columns:
- `id`
- `zone_name`
- `abbreviation`
- `tz_name`

## Example Usage:

```php
// Using default parameters
$cities = $this->getCountryBasedOnTimezone($timezoneId);

// Specifying a column to compare with
$cities = $this->getCountryBasedOnTimezone($timezoneAbbreviation, 'abbreviation');
```
</details>

---

## Exception:

<details>
<summary><strong>InvalidColumn</strong></summary>

The `InvalidColumn` class is a custom exception class that inherits from the `RuntimeException` class.

It is used to represent errors related to invalid columns in Eloquent operations.

### Methods

#### notFound(string $column, string $table): self

This method throws an exception when a column is not found in a table.

**Parameters:**

* `column` (string): The name of the column that was not found.
* `table` (string): The name of the table where the column was not found.

**Returns:**

An `InvalidColumn` exception object.

#### notAllowed(string $column, array $allowed): self

This method throws an exception when a given column is not allowed for the Eloquent operation.

**Parameters:**

* `column` (string): The name of the column that is not allowed.
* `allowed` (array): An array of allowed columns for the Eloquent operation.

**Returns:**

An `InvalidColumn` exception object.

#### notSpecified(array $allowed): self

This method throws an exception when a valid column is not specified.

**Parameters:**

* `allowed` (array): An array of allowed columns.

**Returns:**

An `InvalidColumn` exception object.

</details>
