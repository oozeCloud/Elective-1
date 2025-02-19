<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathController extends Controller
{
    public function calculate($num1, $operation1, $num2, $num3, $operation2, $num4)
    {
        // Check if all inputs are numbers
        if (!is_numeric($num1) || !is_numeric($num2) || !is_numeric($num3) || !is_numeric($num4)) {
            return view('result', [
                'num1' => $num1, 'num2' => $num2,
                'num3' => $num3, 'num4' => $num4,
                'operation1' => $operation1, 'operation2' => $operation2,
                'result1' => ['error' => 'Error: Hindi valid ang input!'],
                'result2' => ['error' => 'Error: Hindi valid ang input!']
            ]);
        }

        // First operation
        $result1 = $this->performOperation($operation1, $num1, $num2);

        // Second operation
        $result2 = $this->performOperation($operation2, $num3, $num4);

        return view('result', compact('num1', 'num2', 'num3', 'num4', 'operation1', 'operation2', 'result1', 'result2'));
    }

    private function performOperation($operation, $a, $b)
    {
        switch ($operation) {
            case 'add': return $a + $b;
            case 'subtract': return $a - $b;
            case 'multiply': return $a * $b;
            case 'divide': return ($b == 0) ? ['error' => 'Error: Hindi maaaring mag-divide sa zero!'] : $a / $b;
            default: return ['error' => 'Error: Hindi valid ang input!'];
        }
    }
}
