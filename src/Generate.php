<?php

namespace Emyu\Nuban;

/**
 * Generate class for generation of nigerian account numbers
 * 
 * @method static string generateDMB()
 * 
 * @method static string generateOFI()
 *  
 */
class Generate
{
    public static function generateDMB($bankCode, $serialNumber)
    {
        if (strlen($bankCode) == 3 && strlen($serialNumber) == 9) {

            $bankCodeSplit = str_split('000' . $bankCode);

            $serialNumberSplit = str_split($serialNumber);

            $nubanAlgo = $bankCodeSplit[0] * 3 + $bankCodeSplit[1] * 7 + $bankCodeSplit[2] * 3 + $bankCodeSplit[3] * 3 + $bankCodeSplit[4] * 7 + $bankCodeSplit[5] * 3 + $serialNumberSplit[0] * 3 + $serialNumberSplit[1] * 7 + $serialNumberSplit[2] * 3 + $serialNumberSplit[3] * 3 + $serialNumberSplit[4] * 7 + $serialNumberSplit[5] * 3 + $serialNumberSplit[6] * 3 + $serialNumberSplit[7] * 7 + $serialNumberSplit[8] * 3;

            $standardLength = 10;

            $modulus = $nubanAlgo % $standardLength;

            $checkDigit = $standardLength - $modulus;
            if ($checkDigit == 10) {
                $checkDigit = 0;
            }
            return $serialNumber . $checkDigit;
        }
        throw new \Exception('Error, invalid bankcode or serial number');
    }

    public static function generateOFI($bankcode, $serialNumber)
    {
        if (strlen($bankcode) == 5 && strlen($serialNumber) == 9) {

            $bankCodeSplit = str_split('9' . $bankcode);

            $serialNumberSplit = str_split($serialNumber);

            $nubanAlgo = $bankCodeSplit[0] * 3 + $bankCodeSplit[1] * 7 + $bankCodeSplit[2] * 3 + $bankCodeSplit[3] * 3 + $bankCodeSplit[4] * 7 + $bankCodeSplit[5] * 3 + $serialNumberSplit[0] * 3 + $serialNumberSplit[1] * 7 + $serialNumberSplit[2] * 3 + $serialNumberSplit[3] * 3 + $serialNumberSplit[4] * 7 + $serialNumberSplit[5] * 3 + $serialNumberSplit[6] * 3 + $serialNumberSplit[7] * 7 + $serialNumberSplit[8] * 3;

            $standardLength = 10;

            $modulus = $nubanAlgo % $standardLength;

            $checkDigit = $standardLength - $modulus;
            if ($checkDigit == 10) {
                $checkDigit = 0;
            }
            return $serialNumber . $checkDigit;
        }
        throw new \Exception('Error, invalid bankcode or serial number');
    }
}