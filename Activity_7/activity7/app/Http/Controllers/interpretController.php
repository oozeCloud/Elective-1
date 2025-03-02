<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class interpretController extends Controller
{
    public function interpre($number){
        $num = $number;
        $denominations = [
            '1000' => 0,
            '500' => 0,
            '200' => 0,
            '100' => 0,
            '50' => 0,
            '20' => 0,
            '10' => 0,
            '5' => 0,
            '1' => 0,
        ];

        $words = $this->numberToWords($num);
        
        foreach ($denominations as $value => $count) {
            while ($num >= $value) {
                $num -= $value;
                $denominations[$value]++;
            }
        }


        return view('result', [
            'denominations' => $denominations,
            'words' => $words,
            'money' => $number
        ]);
    }

    private function numberToWords($num) {
        $ones = [
            0 => 'zero',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen'
        ];

        $tens = [
            2 => 'twenty',
            3 => 'thirty',
            4 => 'forty',
            5 => 'fifty',
            6 => 'sixty',
            7 => 'seventy',
            8 => 'eighty',
            9 => 'ninety'
        ];

        if ($num < 20) {
            return $ones[$num];
        } elseif ($num < 100) {
            return $tens[intval($num / 10)] . ($num % 10 != 0 ? '-' . $ones[$num % 10] : '');
        } elseif ($num < 1000) {
            return $ones[intval($num / 100)] . ' hundred' . ($num % 100 != 0 ? ' and ' . $this->numberToWords($num % 100) : '');
        } else {
            return $this->numberToWords(intval($num / 1000)) . ' thousand' . ($num % 1000 != 0 ? ' ' . $this->numberToWords($num % 1000) : '');
        }
    }
}