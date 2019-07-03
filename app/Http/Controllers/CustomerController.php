<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\EditCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::paginate(5);
        $cities = City::all();
        return view('customers.index', compact('customers', 'cities'));
    }

    public function create()
    {
        $cities = City::all();
        return view('customers.create', compact('cities'));
    }

    public function add(CreateCustomerRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->age = $request->age;
        $customer->email = $request->email;
        $customer->city_id = $request->city_id;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $path = $image->store('images', 'public');
            $customer->images = $path;
        }

        $customer->save();
        return redirect()->route('customers.index');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $cities = City::all();
        return view('customers.edit', compact('customer', 'cities'));
    }

    public function update(EditCustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->age = $request->age;
        $customer->email = $request->email;
        $customer->city_id = $request->city_id;
        $customer->save();
        Session::flash('success', 'Cập nhật khách hàng thành công');
        return redirect()->route('customers.index');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index');
    }

    public function filterByCity(Request $request)
    {
        $idCity = $request->city_id;
        $cityFilter = City::findOrFail($idCity);
        $customers = Customer::where('city_id', $cityFilter->id)->paginate(5);
        $totalCustomerFilter = count($customers);
        $cities = City::all();
        return view('customers.index', compact('customers', 'totalCustomerFilter', 'cities', 'cityFilter'));
    }
}
