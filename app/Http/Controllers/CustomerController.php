<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CustomerController extends Controller
{

    protected $feildValidation = [
        'name' => [
            'required',
            'min:3',
            'max:100',
            'string'
            ],
    ];

    protected $errorResponse = [
        'name.required' => 'Name cannot be empty',
        'name.min' => 'Give atleast 3 charatcters',
        'name.max' => 'Give less than 100 characters'
    ];

    public function index() 
    {
        $customers = Customer::where(['status' => 'A'])->get();
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function edit(int $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    public function store(Request $request)
    {
        $request->validate($this->feildValidation, $this->errorResponse);

        Customer::create([
            'name' => $request->name,
            'address' => $request->address ?? '',
            'contactno' => $request->contactno ?? '',
            'email' => $request->email ?? '',
            'dob' => $request->dob ?? '',
            'status' => 'A'
        ]);

        return redirect('customer/create')->with('status', 'Customer Created');
        // return view('customer.create');
    }

    public function update(Request $request, int $id)
    {
        $request->validate($this->feildValidation, $this->errorResponse);

        Customer::findOrFail($id)->update([
            'name' => $request->name,
            'address' => $request->address ?? '',
            'contactno' => $request->contactno ?? '',
            'email' => $request->email ?? '',
            'dob' => $request->dob ?? '',
            'status' => 'A'
        ]);

        return redirect()->back()->with('status', 'Customer Update');
    }

    public function deactivate(int $id)
    {
        Customer::findOrFail($id)->update([
            'status' => 'D'
        ]);

        return redirect()->back()->with('status', 'Customer Removed');
    }

    public function destroy(int $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->back()->with('status', 'Customer Deleted');
    }

    public function getAPI()
    {
        return response()->json(['Customer' => Customer::where(['status' => 'A'])->all()], 200);

    }

    public function getIdDetailsAPI($id)
    {
        $customer = Customer::where(['id' => $id])->get();

        if(count($customer) > 0){
            return response()->json(['Customer' => $customer], 200);
        }else{
            return response()->json(['message' => 'ID not found'], 404);
        }
    }
}
