<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    protected $feildValidation = [
        'code' => [
            'required',
            'min:3',
            'max:100',
            'string'
            ],
        'name' => [
            'required',
            'min:3',
            'max:100',
            'string'
            ],
    ];

    protected $errorResponse = [
        'code.required' => 'Name cannot be empty',
        'name.required' => 'Name cannot be empty',
        'name.min' => 'Give atleast 3 charatcters',
        'name.max' => 'Give less than 100 characters'
    ];

    public function index() 
    {
        $inventories = Inventory::get();
        // return $inventories;
        // return view('tempdata', compact('inventories'));
        return view('inventory.index', compact('inventories'));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function edit(int $id)
    {
        $inventory = Inventory::findOrFail($id);
        // $Inventory = Inventory::find($id); // empty page
        return view('inventory.edit', compact('inventory'));
        // return view('Inventory.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->feildValidation, $this->errorResponse);

        Inventory::create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description ?? '',
            'status' => 'A'
        ]);

        return redirect('inventory/create')->with('status', 'Inventory Created');
        // return view('Inventory.create');
    }

    public function update(Request $request, int $id)
    {
        $request->validate($this->feildValidation, $this->errorResponse);

        Inventory::findOrFail($id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description ?? '',
            'status' => 'A'
        ]);

        return redirect()->back()->with('status', 'Inventory Update');
        // return view('Inventory.create');
    }

    public function destroy(int $id)
    {
        $Inventory = Inventory::findOrFail($id);
        $Inventory->delete();
        // $Inventory = Inventory::find($id); // empty page
        return redirect()->back()->with('status', 'Inventory Deleted');
        // return view('Inventory.edit', compact('Inventory'));
        // return view('Inventory.create');
    }

    public function getAPI()
    {
        return Inventory::get();
    }
}
