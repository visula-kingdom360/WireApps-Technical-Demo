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
        $customers = Customer::get();
        // return $customers;
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function edit(int $id)
    {
        $customer = Customer::findOrFail($id);
        // $customer = Customer::find($id); // empty page
        return view('customer.edit', compact('customer'));
        // return view('customer.create');
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
        // return view('customer.create');
    }

    public function destroy(int $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        // $customer = Customer::find($id); // empty page
        return redirect()->back()->with('status', 'Customer Deleted');
        // return view('customer.edit', compact('customer'));
        // return view('customer.create');
    }
}
