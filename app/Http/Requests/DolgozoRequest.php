<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DolgozoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'nev' => [
                'required',
                'string',
                'max:255',
                'regex:/^(?![0-9]+$)(?=.*[a-zA-Z])\S+\s+\S+$/', // Legalább két szó és nem lehet csak szám
            ],
            'pozicio' => 'required|string|max:255',
            'vegzettseg' => 'required|string|max:255',
            'szuletesi_ido' => 'required|date|before_or_equal:today', // Nem lehet jövőbeni dátum
            'fizetes' => [
                'required',
                'numeric',
                'regex:/^\d+(\.\d{2})?$/', // Max két tizedesjegy
                'between:0,99999999.99',
                ],
            'mikor_kezdett' => 'required|date|after_or_equal:szuletesi_ido', // Nem lehet korábbi, mint a születési dátum
            'cipomeret' => 'required|integer|min:0|max:99',
            'ruhameret' => 'required|string|in:XXXS,XXS,XS,S,M,L,XL,XXL,XXXL',
            'tort_szam' => [
                'required',
                'numeric',
                'regex:/^\d+\.\d{1}$/', // Egy tizedesjegy
                'between:0,999.9',
            ],
            'megjegyzes' => 'nullable|string',
        ];
    }
}
