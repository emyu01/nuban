<?php

namespace Emyu\Nuban;


/**
 * NUBAN class for validation and generation of nigerian account numbers
 * 
 * @property-read array VALID_CODE_LENGTHS valid lengths of codes for each category of institution
 * 
 * @property-read array INSTITUTIONS list of all financial institutions in Nigeria
 * 
 * @method static string validate()
 * 
 * @method static string generate()
 * 
 * @author Umar Madugu
 * 
 */
class Nuban extends Institutions
{

    private const VALID_CODE_LENGTHS = [
        '3' => 'DMB',
        '5' => 'OFI'
    ];

    public static function validate($institution_code, $accountNumber): string
    {
        $type = static::validate_code($institution_code);

        switch ($type) {
            case 'DMB':
                return
                    Validate::validateDMB($institution_code, $accountNumber);
            case 'OFI':
                return Validate::validateOFI($institution_code, $accountNumber);
            default:
                throw new \Exception("Institution not found");
        }
    }

    public static function generate($institution_code, $serialNumber): string
    {
        $type = static::validate_code($institution_code);

        switch ($type) {
            case 'DMB':
                return
                    Generate::generateDMB($institution_code, $serialNumber);
            case 'OFI':
                return Generate::generateOFI($institution_code, $serialNumber);
            default:
                throw new \Exception("Institution not found");
        }
    }

    private static function validate_code($institution_code): string
    {
        $code_length = strlen($institution_code);
        if (array_key_exists((string)$code_length, static::VALID_CODE_LENGTHS) && array_key_exists($institution_code, self::INSTITUTIONS)) {
            return static::VALID_CODE_LENGTHS[$code_length];
        }
        throw new \Exception("invalid code");
    }
}