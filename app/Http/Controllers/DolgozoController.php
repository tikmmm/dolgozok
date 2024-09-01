<?php
namespace App\Http\Controllers;

use App\Models\Dolgozo;
use App\Services\DolgozoService;
use Illuminate\Http\Request;
use App\Http\Requests\DolgozoRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DolgozoController extends Controller
{
    protected DolgozoService $dolgozoService;
    public function __construct(DolgozoService $dolgozoService)
    {
        $this->dolgozoService = $dolgozoService;
    }
    public function index(Request $request): View
    {
        $sortBy = $request->input('sort_by', 'id');
        $sortOrder = $request->input('sort_order', 'asc');
        $search = $request->input('search', '');

        //Dolgozók listázása a keresés és rendezés alapján
        $dolgozok = $this->dolgozoService->searchAndSort($search, $sortBy, $sortOrder);

        //Üzenet beállítása, ha nincs találat
        $message = $dolgozok->total() === 0 && !empty($search) ? 'Nincs találat.' : null;

        return view('dolgozok.index', [
            'dolgozok' => $dolgozok,
            'search' => $search,
            'sort_by' => $sortBy,
            'sort_order' => $sortOrder,
            'message' => $message,
        ]);
    }
    //Dolgozó hozzáadása
    public function add(DolgozoRequest $request): RedirectResponse
    {
        $dolgozo = $this->dolgozoService->addDolgozo($request->validated());
        return redirect('/dolgozok')->with('success', 'Új dolgozó hozzáadva: ' . $dolgozo->nev . ' (ID:' . $dolgozo->id . ')');
    }
    //Dolgozó hozzáadása form
    public function showAddForm(): View
    {
        return view('dolgozok.add');
    }
    //Dolgozó módosítása form
    public function edit(int $id): View
    {
        $dolgozo = Dolgozo::findOrFail($id);
        $dolgozok = Dolgozo::all();
        return view('dolgozok.edit', compact('dolgozo', 'dolgozok'));
    }
    //Dolgozó módosítása
    public function update(DolgozoRequest $request, $id): RedirectResponse
    {
        $result = $this->dolgozoService->updateDolgozo($request->validated(), $id);
        $dolgozo = $result['dolgozo'];
        $changesMessage = $result['changes_message'];

        return redirect('/dolgozok')
            ->with('success', 'Dolgozó frissítve: ' . $dolgozo->nev . ' (ID: ' . $dolgozo->id . ')')
            ->with('changes_message', $changesMessage);
    }

    //Dolgozó törlése
    public function delete($id): RedirectResponse
    {
        $dolgozo = $this->dolgozoService->deleteDolgozo($id);
        return redirect('/dolgozok')->with('delete_success', 'Dolgozó törölve: ' . $dolgozo->nev . ' (ID:' . $dolgozo->id . ')');
    }
}
