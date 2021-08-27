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
        if($input == '') {
            return 0;
        }

        //$inputs = ( explode( ',', $input ) );

        $inputs = preg_split('/\r\n|\r|\n|\,/', $input);
        
        $result = 0;
        
        foreach ( $inputs as $num )
        {
            if( $num == "") {
                $num = 0; 
            }

            $result += $num;
        }

        return $result;
    }
}
