<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(){
        return view('customer.index',['customers' => Customer::all()]);
    }

    public function create(){
        return view('customer.create');
    }

    public function store (Request $request){
        $data_customer = $request->validate([
            'nameCustomer' => ['required'],
            'emailCustomer' => ['required'],
            'phoneCustomer' => ['required'],
        ]);
    if ($request->member) {
        $data_customer['member'] = 1;
    } else {
        $data_customer['member'] = 0;
    }

        Customer::create($data_customer);
        
        return redirect('/customer')->with('success', 'Data Customer has been created');
    }

    public function edit($id){
        return view('customer.edit',[
            'customer' => Customer::where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id){
        $data_customer = $request->validate([
            'nameCustomer' => ['required'],
            'emailCustomer' => ['required'],
            'phoneCustomer' => ['required'],
        ]);
        
        if ($request->member) {
            $data_customer['member'] = 1;
        } else {
            $data_customer['member'] = 0;
        }
        
        Customer::where('id', $id)->update($data_customer);

        return redirect('/customer')->with('success', 'Data customer has been updated');
    }

    public function destroy($id){
        Customer::where('id', $id)->delete();

        return back()->with('success', 'Data customer Has been Deleted');
    }
}
