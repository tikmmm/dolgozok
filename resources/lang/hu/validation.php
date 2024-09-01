<?php

return [
    'required' => 'A(z) :attribute mező kitöltése kötelező.',
    'string' => 'A(z) :attribute karakterlánc legyen.',
    'max' => [
        'string' => 'A(z) :attribute nem lehet hosszabb, mint :max karakter.',
    ],
    'min' => [
        'string' => 'A(z) :attribute legalább :min karakter hosszú legyen.',
    ],
    'date' => 'A(z) :attribute érvényes dátum legyen.',
    'numeric' => 'A(z) :attribute számnak kell lennie.',
    'between' => [
        'numeric' => 'A(z) :attribute értéke :min és :max között legyen.',
    ],
    'in' => 'A(z) :attribute értéke nem érvényes.',
    'regex' => 'A(z) :attribute formátuma érvénytelen.',
    'before_or_equal' => 'A(z) :attribute nem lehet későbbi dátum, mint :date.',
    'after_or_equal' => 'A(z) :attribute nem lehet korábbi dátum, mint :date.',
    'integer' => 'A(z) :attribute egész számnak kell lennie.',
    'nullable' => 'A(z) :attribute mező nem kötelező.',

    'custom' => [
        'nev' => [
            'required' => 'A név mező kitöltése kötelező!',
            'string' => 'A névnek szövegnek kell lennie!',
            'max' => 'A név nem lehet hosszabb, mint 255 karakter.',
            'regex' => 'Vezetéknév és keresztnév megadása kötelező',
        ],
        'pozicio' => [
            'required' => 'A pozíció mező kitöltése kötelező!',
            'string' => 'A pozíciónak szövegnek kell lennie!',
            'max' => 'A pozíció nem lehet hosszabb, mint 255 karakter.',
        ],
        'vegzettseg' => [
            'required' => 'A végzettség mező kitöltése kötelező!',
            'string' => 'A végzettségnek szövegnek kell lennie!',
            'max' => 'A végzettség nem lehet hosszabb, mint 255 karakter.',
        ],
        'szuletesi_ido' => [
            'required' => 'A születési idő mező kitöltése kötelező!',
            'before_or_equal' => 'A születési idő nem lehet jövőbeli dátum.',
        ],
        'fizetes' => [
            'required' => 'A fizetés mező kitöltése kötelező!',
            'numeric' => 'A fizetésnek számnak kell lennie!',
            'between' => 'A fizetés értéke 0 és 99,999,999.99 között legyen.',
            'regex' => 'A fizetés maximum két tizedesjegyetet tartalmazhat!',
        ],
        'mikor_kezdett' => [
            'required' => 'A mező kitöltése kötelező!',
            'after_or_equal' => 'A kezdés dátuma nem lehet korábbi, mint a születési dátum.',
        ],
        'cipomeret' => [
            'required' => 'A cipőméret mező kitöltése kötelező!',
            'integer' => 'A cipőméretnek egész számnak kell lennie!',
            'min' => 'A cipőméret nem lehet kisebb, mint 0.',
            'max' => 'A cipőméret nem lehet nagyobb, mint 99.',
        ],
        'ruhameret' => [
            'required' => 'A ruhaméret mező kitöltése kötelező!',
            'in' => 'A ruhaméretnek az alábbi értékek egyikének kell lennie: XXXS, XXS, XS, S, M, L, XL, XXL, XXXL.',
        ],
        'tort_szam' => [
            'required' => 'A tört szám mező kitöltése kötelező!',
            'numeric' => 'A tört számnak számnak kell lennie!',
            'between' => 'A tört szám értéke 0 és 999.9 között legyen.',
            'regex' => 'A tört számnak egy tizedesjegyet kell tartalmaznia!',
        ],
        'megjegyzes' => [
            'nullable' => 'A megjegyzés mező nem kötelező!',
            'string' => 'A megjegyzésnek karakterláncnak kell lennie!',
        ],
    ],
];
