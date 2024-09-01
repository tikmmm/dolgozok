<!DOCTYPE html>
<html lang="hu">
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolgozó Szerkesztése</title>
</head>
<body>
<h1>Dolgozó Szerkesztése</h1>
@if ($dolgozok->isEmpty())
    <p class="error-message">"{{ request('search') }}" Nincs találat.</p>
@endif
<form method="POST" action="{{ route('dolgozok.update', $dolgozo->id) }}" autocomplete="off">
    @csrf
    @foreach ([
        'nev' => 'Név',
        'pozicio' => 'Pozíció',
        'vegzettseg' => 'Végzettség',
        'szuletesi_ido' => 'Születési idő',
        'fizetes' => 'Fizetés',
        'mikor_kezdett' => 'Mikor kezdett',
        'cipomeret' => 'Cipőméret',
        'ruhameret' => 'Ruhaméret',
        'tort_szam' => 'Tört szám',
        'megjegyzes' => 'Megjegyzés'
    ] as $field => $label)
        <div class="form-group">
            <label for="{{ $field }}">{{ $label }}:</label>
            @if ($field === 'ruhameret')
                <div class="select-wrapper">
                    <select id="{{ $field }}" name="{{ $field }}" required>
                        <option value="" disabled selected>Válasszon ruhaméretet</option>
                        @foreach(['XXXS', 'XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL'] as $size)
                            <option value="{{ $size }}" {{ old($field, $dolgozo->$field) === $size ? 'selected' : '' }}>{{ $size }}</option>
                        @endforeach
                    </select>
                </div>
            @else
                <input type="{{ $field === 'szuletesi_ido' || $field === 'mikor_kezdett' ? 'date' : 'text' }}"
                       id="{{ $field }}"
                       name="{{ $field }}"
                       value="{{ old($field, $dolgozo->$field) }}" {{ $field === 'megjegyzes' ? '' : 'required' }}>
            @endif
            @error($field)
            <div class="validation-errors">{{ $message }}</div>
            @enderror
        </div>
    @endforeach
    <button type="submit" class="button">Mentés</button>
    <!-- Vissza gomb -->
    <a href="{{ url('/dolgozok') }}">
        <button type="button" class="delete">Vissza</button>
    </a>
</form>
</body>
</html>
