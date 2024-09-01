<!DOCTYPE html>
<html lang="hu">
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/scripts.js') }}"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolgozók</title>
</head>
<body>

<h1><a href="{{ route('dolgozok.index') }}" style="text-decoration: none; color: inherit;">Dolgozók Listája</a></h1>

<!-- Kereső -->
<form method="GET" action="/dolgozok">
    <input type="text" name="search" placeholder="Keresés..." autocomplete="off" value="{{ request('search') }}" style="width: auto">
    <button type="submit" class="button">Keresés</button>
    <!-- Keresés üzenet -->
    @if (isset($message) && $message)
        <p style="color: red;">{{ $message }}</p>
    @endif

    <!-- Törlés üzenet -->
    @if (session('delete_success'))
        <p style="color: red;">{{ session('delete_success') }}</p>
    @endif

    <!-- Sikeres hozzáadás üzenet -->
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Változások üzenet -->
    @if(session('changes_message'))
        <p style="color: green;">{!! session('changes_message') !!}</p>
    @endif
</form>

<!-- Dolgozó hozzáadása -->
<a href="{{ route('dolgozok.add') }}" class="button edit">Új dolgozó hozzáadása</a>
<br>
<br>
<!-- Dolgozók listája -->
<div class="table-container">
<table id="dolgozok-table" border="1">
    <thead>
    <tr>
        <th>
            <a href="{{ route('dolgozok.index', ['sort_by' => 'id', 'sort_order' => request('sort_by') === 'id' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
               class="{{ request('sort_by') === 'id' ? (request('sort_order') === 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">
                ID
            </a>
        </th>
        <th>
            <a href="{{ route('dolgozok.index', ['sort_by' => 'nev', 'sort_order' => request('sort_by') === 'nev' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
               class="{{ request('sort_by') === 'nev' ? (request('sort_order') === 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">
                Név
            </a>
        </th>
        <th>
            <a href="{{ route('dolgozok.index', ['sort_by' => 'pozicio', 'sort_order' => request('sort_by') === 'pozicio' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
               class="{{ request('sort_by') === 'pozicio' ? (request('sort_order') === 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">
                Pozíció
            </a>
        </th>
        <th>
            <a href="{{ route('dolgozok.index', ['sort_by' => 'vegzettseg', 'sort_order' => request('sort_by') === 'vegzettseg' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
               class="{{ request('sort_by') === 'vegzettseg' ? (request('sort_order') === 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">
                Végzettség
            </a>
        </th>
        <th>
            <a href="{{ route('dolgozok.index', ['sort_by' => 'szuletesi_ido', 'sort_order' => request('sort_by') === 'szuletesi_ido' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
               class="{{ request('sort_by') === 'szuletesi_ido' ? (request('sort_order') === 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">
                Születési idő
            </a>
        </th>
        <th>
            <a href="{{ route('dolgozok.index', ['sort_by' => 'fizetes', 'sort_order' => request('sort_by') === 'fizetes' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
               class="{{ request('sort_by') === 'fizetes' ? (request('sort_order') === 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">
                Fizetés
            </a>
        </th>
        <th>
            <a href="{{ route('dolgozok.index', ['sort_by' => 'mikor_kezdett', 'sort_order' => request('sort_by') === 'mikor_kezdett' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
               class="{{ request('sort_by') === 'mikor_kezdett' ? (request('sort_order') === 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">
                Mikor kezdett
            </a>
        </th>
        <th>
            <a href="{{ route('dolgozok.index', ['sort_by' => 'cipomeret', 'sort_order' => request('sort_by') === 'cipomeret' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
               class="{{ request('sort_by') === 'cipomeret' ? (request('sort_order') === 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">
                Cipőméret
            </a>
        </th>
        <th>
            <a href="{{ route('dolgozok.index', ['sort_by' => 'ruhameret', 'sort_order' => request('sort_by') === 'ruhameret' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
               class="{{ request('sort_by') === 'ruhameret' ? (request('sort_order') === 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">
                Ruhaméret
            </a>
        </th>
        <th>
            <a href="{{ route('dolgozok.index', ['sort_by' => 'tort_szam', 'sort_order' => request('sort_by') === 'tort_szam' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
               class="{{ request('sort_by') === 'tort_szam' ? (request('sort_order') === 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">
                Tört szám
            </a>
        </th>
        <th>
            <a href="{{ route('dolgozok.index', ['sort_by' => 'megjegyzes', 'sort_order' => request('sort_by') === 'megjegyzes' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
               class="{{ request('sort_by') === 'megjegyzes' ? (request('sort_order') === 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">
                Megjegyzés
            </a>
        </th>
        <th style="text-align: center">Módosítás</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($dolgozok as $dolgozo)
        <tr data-id="{{ $dolgozo->id }}">
            <td>{{ $dolgozo->id }}</td>
            <td class="editable" data-name="nev">{{ $dolgozo->nev }}</td>
            <td class="editable" data-name="pozicio">{{ $dolgozo->pozicio }}</td>
            <td class="editable" data-name="vegzettseg">{{ $dolgozo->vegzettseg }}</td>
            <td class="editable" data-name="szuletesi_ido">{{ $dolgozo->szuletesi_ido }}</td>
            <td class="editable" data-name="fizetes">{{ $dolgozo->fizetes }}</td>
            <td class="editable" data-name="mikor_kezdett">{{ $dolgozo->mikor_kezdett }}</td>
            <td class="editable" data-name="cipomeret">{{ $dolgozo->cipomeret }}</td>
            <td class="editable" data-name="ruhameret">{{ $dolgozo->ruhameret }}</td>
            <td class="editable" data-name="tort_szam">{{ $dolgozo->tort_szam }}</td>
            <td class="editable" data-name="megjegyzes">{{ $dolgozo->megjegyzes }}</td>
            <td class="actions">
                <a href="{{ route('dolgozok.edit', $dolgozo->id) }}" class="button edit">Szerkesztés</a>
                <form action="{{ route('dolgozok.delete', $dolgozo->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete" onclick="return confirm('Biztosan törölni szeretnéd?')">Törlés</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
<!-- Találatok száma -->
@if ($dolgozok->total())
    <p>Összes találat: {{ $dolgozok->total() }}</p>
@endif

<!-- Lapozás -->
<div class="pagination-container">
    <ul class="pagination">
        @if ($dolgozok->currentPage() > 1)
            <li>
                <a href="{{ $dolgozok->appends(['search' => request('search'), 'sort_by' => request('sort_by', 'nev'), 'sort_order' => request('sort_order', 'asc')])->url(1) }}" class="first" aria-label="Legelső oldal" title="Legelső oldal">«</a>
            </li>
        @else
            <li><span class="first" aria-label="Nincs legelső oldal" style="color: #ddd;">«</span></li>
        @endif

        @if ($dolgozok->currentPage() > 1)
            <li>
                <a href="{{ $dolgozok->appends(['search' => request('search'), 'sort_by' => request('sort_by', 'nev'), 'sort_order' => request('sort_order', 'asc')])->previousPageUrl() }}" class="previous" aria-label="Előző oldal" title="Előző oldal">←</a>
            </li>
        @else
            <li><span class="previous" aria-label="Nincs előző oldal" style="color: #ddd;">←</span></li>
        @endif

        @for ($i = max(1, $dolgozok->currentPage() - 1); $i <= min($dolgozok->lastPage(), $dolgozok->currentPage() + 1); $i++)
            @if ($i == $dolgozok->currentPage())
                <li><span class="current">{{ $i }}</span></li>
            @else
                <li>
                    <a href="{{ $dolgozok->appends(['search' => request('search'), 'sort_by' => request('sort_by', 'nev'), 'sort_order' => request('sort_order', 'asc')])->url($i) }}" title="{{ $i }}. oldal">{{ $i }}</a>
                </li>
            @endif
        @endfor

        @if ($dolgozok->hasMorePages())
            <li>
                <a href="{{ $dolgozok->appends(['search' => request('search'), 'sort_by' => request('sort_by', 'nev'), 'sort_order' => request('sort_order', 'asc')])->nextPageUrl() }}" class="next" aria-label="Következő oldal" title="Következő oldal">→</a>
            </li>
        @else
            <li><span class="next" aria-label="Nincs következő oldal" style="color: #ddd;">→</span></li>
        @endif

        @if ($dolgozok->currentPage() < $dolgozok->lastPage())
            <li>
                <a href="{{ $dolgozok->appends(['search' => request('search'), 'sort_by' => request('sort_by', 'nev'), 'sort_order' => request('sort_order', 'asc')])->url($dolgozok->lastPage()) }}" class="last" aria-label="Legutolsó oldal" title="Legutolsó oldal">»</a>
            </li>
        @else
            <li><span class="last" aria-label="Nincs legutolsó oldal" style="color: #ddd;">»</span></li>
        @endif
    </ul>
</div>
</body>
</html>
