<?php
namespace App\Services;

use App\Models\Dolgozo;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;

class DolgozoService
{
    public function searchAndSort($search, $sortBy, $sortOrder): LengthAwarePaginator
    {
        //Keresés
        $query = Dolgozo::query();
        if (!empty($search)) {
            $search = strtolower($search);
            $columns = [
                'nev', 'pozicio', 'vegzettseg', 'szuletesi_ido',
                'fizetes', 'mikor_kezdett', 'cipomeret',
                'ruhameret', 'tort_szam', 'megjegyzes'
            ];
            $query->where(function ($q) use ($search, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'ILIKE', "%$search%");
                }
            });
        }
        //Rendezés
        if (in_array($sortBy, ['nev', 'pozicio', 'vegzettseg', 'megjegyzes'])) {
            $query->orderByRaw('LOWER(' . $sortBy . ') ' . $sortOrder);
        } else {
            $query->orderBy($sortBy, $sortOrder);
        }
        //Lapozás
        return $query->paginate(10);
    }

    // Dolgozó hozzáadása
    public function addDolgozo($validatedData)
    {
        $dolgozo = Dolgozo::create($validatedData);
        //Logolás
        Log::info('Új dolgozó hozzáadva:', [
            'id' => $dolgozo->id,
            'nev' => $dolgozo->nev,
            'timestamp' => now()
        ]);
        return $dolgozo;
    }

    //Dolgozó módosítás
    public function updateDolgozo($validatedData, $id): array
    {
        $dolgozo = Dolgozo::findOrFail($id);
        // Változások
        $changesMessage = '';
        foreach ($validatedData as $key => $value) {
            if ($dolgozo->$key != $value) {
                $changesMessage .= "$key: " . $dolgozo->$key . " → " . $value . "<br>";
            }
        }
        // Dolgozó frissítése
        $dolgozo->update($validatedData);
        // Log
        Log::info('Dolgozó frissítve:', [
            'id' => $dolgozo->id,
            'changes_message' => $changesMessage,
            'timestamp' => now(),
        ]);
        return ['dolgozo' => $dolgozo, 'changes_message' => $changesMessage];
    }

    //Dolgozó törlés
    public function deleteDolgozo(int $id)
    {
        $dolgozo = Dolgozo::findOrFail($id);
        $dolgozo->delete();
        // Logolás
        Log::info('Dolgozó törölve:', [
            'id' => $dolgozo->id,
            'nev' => $dolgozo->nev,
            'timestamp' => now()
        ]);
        return $dolgozo;
    }
}
