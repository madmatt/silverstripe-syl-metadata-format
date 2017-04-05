# SilverStripe Metadata Schema for Syl Search

This repository describes the schema that SilverStripe will adhere to when supplying documents (fragments of content) to 
the [Syl Search](http://www.sylresearch.co.nz/) enterprise federated search appliance.

## Schema Status: Draft

This schema is currently in draft form and may change at any time.

[The schema can be found here.](schema.json)

## Testing the schema is valid

We use the Composer package `league/json-guard` to test schema validity. The test suite checks the validity of all files
in the examples/ directory, and ensures they all pass validation.

```
composer install
composer test
```