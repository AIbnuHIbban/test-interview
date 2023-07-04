<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customers::all();
        return view('customers.index', ['customers' => $customers]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:customers',
            'phone' => 'required|max:20',
        ]);

        $customer = Customers::create($validated);
        return redirect()->route('customers.index');
    }

    public function show($id)
    {
        $customer = Customers::findOrFail($id);
        return view('customers.show', ['customer' => $customer]);
    }

    public function edit($id)
    {
        $customer = Customers::findOrFail($id);
        return view('customers.edit', ['customer' => $customer]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:customers,email,' . $id,
            'phone' => 'required|max:20',
        ]);

        $customer = Customers::findOrFail($id);
        $customer->update($validated);
        return redirect()->route('customers.index');
    }

    public function destroy($id)
    {
        $customer = Customers::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index');
    }
}
