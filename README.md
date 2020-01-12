Mukadi Wallet Bundle
====================

This is a symfony wrapper for the [mbo2olivier/core-wallet-manager](https://github.com/mbo2olivier/core-wallet-manager) library, the bundle provide a storage layer implementation for Doctrine ORM support.

## Installation

Before install the bundle, edit your composer.json file and specify the following options:

```yaml
"extra": {
    ...
    "symfony": {
        ...
        "allow-contrib": "true" # allow symfony flex to install recipe (if your are using symfony flex)
    }
    ...
},
```

Run `php composer.phar require mukadi/wallet-bundle` and let Symfony Flex configure the bundle.