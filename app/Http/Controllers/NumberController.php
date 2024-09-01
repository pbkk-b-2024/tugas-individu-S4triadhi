<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumberController extends Controller
{
    // Menampilkan form input untuk jumlah n
    public function index(Request $request)
    {
        $operation = $request->query('operation');
        return view('number.index', compact('operation'));
    }

    // Menghitung dan menampilkan bilangan Genap dan Ganjil
    public function genapGanjil(Request $request)
    {
        $n = $request->input('n');
        $numbers = [];

        for ($i = 1; $i <= $n; $i++) {
            $numbers[] = [
                'number' => $i,
                'type' => $i % 2 == 0 ? 'Genap' : 'Ganjil'
            ];
        }

        return view('number.genapGanjil', compact('numbers', 'n'));
    }

    // Menghitung dan menampilkan deret Fibonacci
    public function fibonacci(Request $request)
    {
        $n = $request->input('n');
        $fibonacci = [0, 1];

        for ($i = 2; $i < $n; $i++) {
            $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
        }

        return view('number.fibonacci', compact('fibonacci', 'n'));
    }

    // Menghitung dan menampilkan bilangan Prima
    public function prima(Request $request){
        $n = $request->input('n');
        $numbers = [];

        for ($i = 1; $i <= $n; $i++) {
            $numbers[] = [
                'number' => $i,
                'is_prime' => $this->isPrime($i)
            ];
        }

        return view('number.prima', compact('numbers', 'n'));
    }


    // Fungsi untuk mengecek bilangan prima
    private function isPrime($num)
    {
        if ($num < 2) {
            return false;
        }

        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }

        return true;
    }
}
