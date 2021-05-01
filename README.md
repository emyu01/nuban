# Nigeria Uniform Bank Account Number (NUBAN)

This is an easy to use PHP package for verifying and generating NUBAN numbers for all Nigerian financial institutions in accordance with the CBN revised standard 2020.

There are two categories of financial institutions, Deposit Money Banks (DMB) with 3 digit bank code, and Other Financial Institutions (OFI) with 5 digit bank code. The account number to validate must be 10 digits, while serial number for account number generation must be 9 digits.

## How to use

There are two use cases for this package. 'Validation' and 'Generation'

### Validation

Follow these steps to validate an account number.

> Get a valid bank code (DMB or OFI) and an account number you wish to verify belonging to the bank.

> Import the Nuban class using the 'use Emyu/Nuban/Nuban'

> Call the Nuban class with it's static method as 'Nuban::validate($bankCode, $accountNumber)' to validate your account number.

> It returns 'Valid' if account number is correct and belongs to the bank with the code. Returns 'Invalid' otherwise.

```php

    use Emyu\Nuban\Nuban;

    class ExampleClass {

        public $bankCode = '011';

        public $accountNumber = '0000014579';

        function exampleFunction($bankCode, $accountNumber){

           // validate a Deposit Money Bank account number
           $status = Nuban::validate($bankCode, $accountNumber);

           // value of $status = 'Valid'
        }
    }
```

### Generation

Follow these steps to generate an account number.

> Get a valid bank code (DMB or OFI) and a 9 digit serial number you wish to use as an account number.

> Import the Nuban class using the 'use Emyu/Nuban/Nuban'

> Call the Nuban class with it's static method as 'Nuban::generate($bankCode, $serialNumber)' to generate a valid account number.

> It returns valid account number for the bank with the code if bank code is valid. Throws an error message if otherwise.

```php

    use Emyu\Nuban\Nuban;

    class ExampleClass {

        public $bankCode = '011';

        public $serialNumber = '000001457';

        function exampleFunction($bankCode, $serialNumber){

           // generate a Deposit Money Bank account number
           $accountNumber = Nuban::generate($bankCode, $serialNumber);

           // value of $accountNumber = '0000014579'
        }
    }
```

### Incoming features

- Get bank name from a NUBAN number
- Support for more financial institutions
- Ability to input bank alias in place of bank code
- much more

### Want to Contribute?

- Create an issue or

- Make a fork of this repository
- Create a new branch on your repository.
- Make contributions on that branch.
- Add tests for new features.
- Commit your changes and Push.
- Make a pull request to the base branch. VOILA!!

### Love this package?

> Please star this repo.

Follow me on [Twitter](https://twitter.com/iemyu_) for more updates!
