<?php
/**
 * Credit & Debit Card Validator
 * PHP 8+ Compatible
 * Updated BIN patterns (2025)
 */

class CreditCard {
    protected static $cards = [
        'visaelectron' => [
            'type' => 'visaelectron',
            'pattern' => '/^4(026|17500|405|508|844|91[37])/',
            'length' => [16],
            'cvcLength' => [3],
            'luhn' => true,
        ],
        'maestro' => [
            'type' => 'maestro',
            'pattern' => '/^(5(018|0[23]|[68])|6(39|7))/',
            'length' => [12, 13, 14, 15, 16, 17, 18, 19],
            'cvcLength' => [3],
            'luhn' => true,
        ],
        'forbrugsforeningen' => [
            'type' => 'forbrugsforeningen',
            'pattern' => '/^600/',
            'length' => [16],
            'cvcLength' => [3],
            'luhn' => true,
        ],
        'dankort' => [
            'type' => 'dankort',
            'pattern' => '/^5019/',
            'length' => [16],
            'cvcLength' => [3],
            'luhn' => true,
        ],
        'visa' => [
            'type' => 'visa',
            'pattern' => '/^4\d{12}(\d{3})?$/',
            'length' => [13, 16, 19],
            'cvcLength' => [3],
            'luhn' => true,
        ],
        'mastercard' => [
            'type' => 'mastercard',
            'pattern' => '/^(5[1-5][0-9]{4}|2[2-7][0-9]{4})/',
            'length' => [16],
            'cvcLength' => [3],
            'luhn' => true,
        ],
        'amex' => [
            'type' => 'amex',
            'pattern' => '/^3[47]/',
            'length' => [15],
            'cvcLength' => [4],
            'luhn' => true,
        ],
        'dinersclub' => [
            'type' => 'dinersclub',
            'pattern' => '/^3(?:0[0-5]|[68])/',
            'length' => [14],
            'cvcLength' => [3],
            'luhn' => true,
        ],
        'discover' => [
            'type' => 'discover',
            'pattern' => '/^6(?:011|5[0-9]{2}|4[4-9][0-9]|22)/',
            'length' => [16, 19],
            'cvcLength' => [3],
            'luhn' => true,
        ],
        'unionpay' => [
            'type' => 'unionpay',
            'pattern' => '/^(62|88)/',
            'length' => [16, 17, 18, 19],
            'cvcLength' => [3],
            'luhn' => false,
        ],
        'jcb' => [
            'type' => 'jcb',
            'pattern' => '/^35(2[89]|[3-8][0-9])/',
            'length' => [16],
            'cvcLength' => [3],
            'luhn' => true,
        ],
        'rupay' => [
            'type' => 'rupay',
            'pattern' => '/^(60|65|81|82|508)/',
            'length' => [16],
            'cvcLength' => [3],
            'luhn' => true,
        ],
        'mir' => [
            'type' => 'mir',
            'pattern' => '/^220[0-4]/',
            'length' => [16],
            'cvcLength' => [3],
            'luhn' => true,
        ],
        'elo' => [
            'type' => 'elo',
            'pattern' => '/^(4011(78|79)|431274|438935|451416|457393|4576(31|32)|504175|506(699|7[0-9]{2})|509[0-9]{3}|627780|636297|636368|6500(31|32|33|51)|6504(85|86|87)|6505(00|01)|6507(03|04)|6509(01|02|03|04)|6516(52|53)|6550(00|01|02|03)|6550(21|22|23))/',
            'length' => [16],
            'cvcLength' => [3],
            'luhn' => true,
        ],
        'hipercard' => [
            'type' => 'hipercard',
            'pattern' => '/^(606282|3841(0[0-9]|[1-9][0-9]))/',
            'length' => [13, 16, 19],
            'cvcLength' => [3],
            'luhn' => true,
        ]
    ];

    public static function validCreditCard($number, $type = null) {
        $ret = ['valid' => false, 'number' => '', 'type' => ''];
        $number = preg_replace('/\D/', '', $number);
        if (empty($type)) {
            $type = self::creditCardType($number);
        }
        if ($type && isset(self::$cards[$type]) && self::validCard($number, $type)) {
            return ['valid' => true, 'number' => $number, 'type' => $type];
        }
        return $ret;
    }

    public static function validCvc($cvc, $type) {
        return (ctype_digit($cvc) && isset(self::$cards[$type]) && self::validCvcLength($cvc, $type));
    }

    public static function validDate($year, $month) {
        $month = str_pad($month, 2, '0', STR_PAD_LEFT);
        if (!preg_match('/^20\d\d$/', $year)) return false;
        if (!preg_match('/^(0[1-9]|1[0-2])$/', $month)) return false;
        if ($year < gmdate('Y') || ($year == gmdate('Y') && $month < gmdate('m'))) return false;
        return true;
    }

    protected static function creditCardType($number) {
        foreach (self::$cards as $type => $card) {
            if (preg_match($card['pattern'], $number)) {
                return $type;
            }
        }
        return '';
    }

    protected static function validCard($number, $type) {
        return (
            self::validPattern($number, $type) &&
            self::validLength($number, $type) &&
            self::validLuhn($number, $type)
        );
    }

    protected static function validPattern($number, $type) {
        return preg_match(self::$cards[$type]['pattern'], $number);
    }

    protected static function validLength($number, $type) {
        return in_array(strlen($number), self::$cards[$type]['length']);
    }

    protected static function validCvcLength($cvc, $type) {
        return in_array(strlen($cvc), self::$cards[$type]['cvcLength']);
    }

    protected static function validLuhn($number, $type) {
        return (!self::$cards[$type]['luhn']) ?: self::luhnCheck($number);
    }

    protected static function luhnCheck($number) {
        $checksum = 0;
        $length = strlen($number);
        for ($i = (2 - ($length % 2)); $i <= $length; $i += 2) {
            $checksum += (int)$number[$i - 1];
        }
        for ($i = ($length % 2) + 1; $i < $length; $i += 2) {
            $digit = (int)$number[$i - 1] * 2;
            $checksum += ($digit < 10) ? $digit : ($digit - 9);
        }
        return ($checksum % 10) === 0;
    }

    public static function title3D($type) {
        switch ($type) {
            case 'jcb':
                return 'JCB J/SECURE';
            case 'amex':
                return 'AMEX SAFEKEY';
            case 'mastercard':
                return 'MASTERCARD SECURE CODE';
            case 'visaelectron':
            case 'visa':
                return 'VERIFIED BY VISA';
            default:
                return '';
        }
    }

    public static function secure3D($type) {
        return in_array($type, ['jcb', 'amex', 'mastercard', 'visaelectron', 'visa']) ? 'secure' : 'nosecure';
    }
}
