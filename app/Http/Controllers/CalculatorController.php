<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $expression = $request->input('expression');

        $result = $this->evaluate($expression);

        return response()->json(['result' => $result]);
    }

    private function evaluate($expression) {
        $result = 0;
        $operator = '+';
        $term = 0;
        $dj = '';
        $allowedOperators = ['+', '-', '*', '/', '**', '%'];
        $allowedFunctions = ['sin', 'cos', 'tan', 'asin', 'acos', 'atan', 'log', 'sqrt'];
        
        for ($i = 0; $i < strlen($expression); $i++) {
            $char = $expression[$i]??0;
            if (is_numeric($char)) {
                $term .= $char;
            }else{
                if (in_array($char, $allowedOperators)) {
                    if ($char === '+' || $char === '-') {
                        $result = $this->applyOperator($result, $term, $operator);
                        $operator = $char;
                        $term = '';
                    } elseif ($char === '*' || $char === '/') {
                        $nextTerm = '';
                        $j = $i + 1;
                        while ($j < strlen($expression) && is_numeric($expression[$j])) {
                            $nextTerm .= $expression[$j];
                            $j++;
                        }
                        $term = $this->applyOperator($term, $nextTerm, $char);
                        $i = $j - 1;
                    }else{
                        $result = $this->applyOperator($result, $term, $operator);
                        $operator = $char;
                        $term = '';
                    }
                    $dj = 'allowedOp';
                }
                else if(in_array($char, $allowedFunctions)){
                    $dj = 'allowedfn';
                    $result = $this->applyFunction($expression);
                }
            } 
        }
        
        return $dj=='allowedOp' ? $this->applyOperator($result, $term, $operator) : $this->applyFunction($expression);
    }
    
    private function applyOperator($leftOperand, $rightOperand, $operator) {
        switch ($operator) {
            case '+':
                return $leftOperand + $rightOperand;
            case '-':
                return $leftOperand - $rightOperand;
            case '*':
                return $leftOperand * $rightOperand;
            case '/':
                return $leftOperand / $rightOperand;
            case '%':
                return $leftOperand / 100;
            default:
                return 0;
        }
    }
    
    private function applyFunction($expression)
    {
        $allowedOperators = ['+', '-', '*', '/', '**', '%'];

        $allowedFunctions = ['sin', 'cos', 'tan', 'asin', 'acos', 'atan', 'log', 'sqrt'];

        // Split the expression into operators, functions, and numbers
        preg_match_all('/(\d+(?:\.\d+)?|[\+\-\*\/\(\)\%\^]|sin|cos|tan|asin|acos|atan|log|sqrt)/', $expression, $matches);

        $tokens = $matches[1];

        // Reverse the order of the tokens so we can use a stack to evaluate them
        $tokens = array_reverse($tokens);

        $stack = [];

        foreach ($tokens as $token) {
            // If it's an operator or function, pop the necessary number of values off the stack and apply the operation
            if (in_array($token, $allowedOperators) || in_array($token, $allowedFunctions)) {
                $numArgs = 2;

                if (in_array($token, ['sqrt'])) {
                    $numArgs = 1;
                }

                $args = [];

                for ($i = 0; $i < $numArgs; $i++) {
                    $args[] = array_pop($stack);
                }

                $args = array_reverse($args);

                if ($token == '+') {
                    $result = $args[0] + $args[1];
                } elseif ($token == '-') {
                    $result = $args[0] - $args[1];
                } elseif ($token == '*') {
                    $result = $args[0] * $args[1];
                } elseif ($token == '/') {
                    $result = $args[0] / $args[1];
                } elseif ($token == '**') {
                    $result = $args[0] ** $args[1];
                } elseif ($token == '%') {
                    $result = $args[0] % $args[1];
                } elseif ($token == 'sin') {
                    $result = sin($args[0]);
                } elseif ($token == 'cos') {
                    $result = cos($args[0]);
                } elseif ($token == 'tan') {
                    $result = tan($args[0]);
                } elseif ($token == 'asin') {
                    $result = asin($args[0]);
                } elseif ($token == 'acos') {
                    $result = acos($args[0]);
                } elseif ($token == 'atan') {
                    $result = atan($args[0]);
                } elseif ($token == 'log') {
                    $result = log($args[0], $args[1]);
                } elseif ($token == 'sqrt') {
                    $result = sqrt($args[0]);
                }

                array_push($stack, $result);
            } else {
                // If it's a number, push it onto the stack
                array_push($stack, $token);
            }
        }

        return array_pop($stack);
    }

    // private function evaluate($expression)
    // {
    //     $allowedOperators = ['+', '-', '*', '/', '**', '%'];

    //     $allowedFunctions = ['sin', 'cos', 'tan', 'asin', 'acos', 'atan', 'log', 'sqrt'];

    //     // Split the expression into operators, functions, and numbers
    //     preg_match_all('/(\d+(?:\.\d+)?|[\+\-\*\/\(\)\%\^]|sin|cos|tan|asin|acos|atan|log|sqrt)/', $expression, $matches);

    //     $tokens = $matches[1];

    //     // Reverse the order of the tokens so we can use a stack to evaluate them
    //     $tokens = array_reverse($tokens);

    //     $stack = [];

    //     foreach ($tokens as $token) {
    //         // If it's an operator or function, pop the necessary number of values off the stack and apply the operation
    //         if (in_array($token, $allowedOperators) || in_array($token, $allowedFunctions)) {
    //             $numArgs = 2;

    //             if (in_array($token, ['sqrt'])) {
    //                 $numArgs = 1;
    //             }

    //             $args = [];

    //             for ($i = 0; $i < $numArgs; $i++) {
    //                 $args[] = array_pop($stack);
    //             }

    //             $args = array_reverse($args);

    //             if ($token == '+') {
    //                 $result = $args[0] + $args[1];
    //             } elseif ($token == '-') {
    //                 $result = $args[0] - $args[1];
    //             } elseif ($token == '*') {
    //                 $result = $args[0] * $args[1];
    //             } elseif ($token == '/') {
    //                 $result = $args[0] / $args[1];
    //             } elseif ($token == '**') {
    //                 $result = $args[0] ** $args[1];
    //             } elseif ($token == '%') {
    //                 $result = $args[0] % $args[1];
    //             } elseif ($token == 'sin') {
    //                 $result = sin($args[0]);
    //             } elseif ($token == 'cos') {
    //                 $result = cos($args[0]);
    //             } elseif ($token == 'tan') {
    //                 $result = tan($args[0]);
    //             } elseif ($token == 'asin') {
    //                 $result = asin($args[0]);
    //             } elseif ($token == 'acos') {
    //                 $result = acos($args[0]);
    //             } elseif ($token == 'atan') {
    //                 $result = atan($args[0]);
    //             } elseif ($token == 'log') {
    //                 $result = log($args[0], $args[1]);
    //             } elseif ($token == 'sqrt') {
    //                 $result = sqrt($args[0]);
    //             }

    //             array_push($stack, $result);
    //         } else {
    //             // If it's a number, push it onto the stack
    //             array_push($stack, $token);
    //         }
    //     }

    //     return array_pop($stack);
    // }
}

