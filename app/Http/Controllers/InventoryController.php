<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // use StocksController;

    protected $feildValidation = [
        // 'code' => [
        //     'required',
        //     'min:5',
        //     'max:5',
        //     'string'
        //     ],
        'name' => [
            'required',
            'min:3',
            'max:100',
            'string'
            ],
    ];

    protected $errorResponse = [
        // 'code.required' => 'Name cannot be empty',
        'name.required' => 'Name cannot be empty',
        'name.min' => 'Give atleast 3 charatcters',
        'name.max' => 'Give less than 100 characters'
    ];

    public function index() 
    {
        $inventories = Inventory::where(['status' => 'A'])->get();
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
            'name' => $request->name,
            'description' => $request->description ?? '',
            'price' => $request->price ?? 0,
            'quantity' => $request->quantity ?? 0,
            'status' => 'A'
        ]);

        return redirect('inventory/create')->with('status', 'Inventory Created');
        // return view('Inventory.create');
    }

    public function update(Request $request, int $id)
    {
        $request->validate($this->feildValidation, $this->errorResponse);

        Inventory::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description ?? '',
            'price' => $request->price ?? 0,
            'quantity' => $request->quantity ?? 0,
            'status' => 'A'
        ]);

        return redirect()->back()->with('status', 'Inventory Update');
        // return view('Inventory.create');
    }

    public function deactivate(int $id)
    {
        Inventory::findOrFail($id)->update([
            'status' => 'D'
        ]);

        return redirect()->back()->with('status', 'Inventory Removed');
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
        return response()->json(['Inventory' => Inventory::where(['status' => 'A'])->all()], 200);
    }

    public function getCodeDetailsAPI($code)
    {
        $inventory = Inventory::where(['code' => $code])->get();

        if(count($inventory) > 0){
            return response()->json(['Inventory' => $inventory], 200);
        }else{
            return response()->json(['message' => 'ID not found'], 404);
        }
    }
}