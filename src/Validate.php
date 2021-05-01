<?php

namespace Emyu\Nuban;

/**
 * Validate class for validation of nigerian account numbers
 * 
 * @method static string validateDMB()
 * 
 * @method static string validateOFI()
 *  
 */
class Validate
{
    public static function validateDMB($bankCode, $accountNumber)
    {
        if (strlen($bankCode) == 3 && strlen($accountNumber) == 10) {

            $serialNumber = substr($accountNumber, 0, -1);
            $checkDigit = substr($accountNumber, -1);
            $nubanFormat = '000' . $bankCode . $serialNumber;

            $nubanArray = str_split($nubanFormat);
            $algoDigits = [3, 7, 3, 3, 7, 3, 3, 7, 3, 3, 7, 3, 3, 7, 3];

            $checkSum = 0;

            foreach ($nubanArray as $key => $value) {
                $checkSum += ($value * $algoDigits[$key]);
            }

            $calculatedCheckDigit = 10 - ($checkSum % 10);
            $validatedCheckDigit = $calculatedCheckDigit == 10 ? 0 : $calculatedCheckDigit;

            return $checkDigit == $validatedCheckDigit ? 'Valid' : 'Invalid';
        } else {
            throw new \Exception("Error, Invalid Bank Code or Account Number");
        }
    }

    public static function validateOFI($bankCode, $accountNumber)
    {
        if (strlen($bankCode) == 5 && strlen($accountNumber) == 10) {

            $serialNumber = substr($accountNumber, 0, -1);
            $checkDigit = substr($accountNumber, -1);
            $nubanFormat = '9' . $bankCode . $serialNumber;

            $nubanArray = str_split($nubanFormat);
            $algoDigits = [3, 7, 3, 3, 7, 3, 3, 7, 3, 3, 7, 3, 3, 7, 3];

            $checkSum = 0;

            foreach ($nubanArray as $key => $value) {
                $checkSum += ($value * $algoDigits[$key]);
            }

            $calculatedCheckDigit = 10 - ($checkSum % 10);
            $validatedCheckDigit = $calculatedCheckDigit == 10 ? 0 : $calculatedCheckDigit;

            return $checkDigit == $validatedCheckDigit ? 'Valid' : 'Invalid';
        } else {
            throw new \Exception("Error, Invalid Bank Code or Account Number");
        }
    }
}