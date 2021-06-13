<?php


namespace App\Models\StringCalculator;


class StringCalculator
{

    /**
     * StringCalculator constructor.
     */
    public function __construct()
    {
    }

    public function add($input)
    {
        if($input == '')
        {
            return 0;
        }

        $inputs = ( explode( ',', $input ) );

        $result = 0;

        foreach ( $inputs as $num )
        {
            $result += $num;
        }

        return $result;
    }
}
