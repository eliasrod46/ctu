<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSupplierRequest;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Inertia\Inertia;

class SupplierController extends Controller
{
    
    // Display a listing of the resource.
    public function index(){
        $suppliers = Supplier::all();
        return Inertia::render('Suppliers/index',['suppliers' => $suppliers]);
    }

    // Store a newly created resource in storage.
    public function store(CreateSupplierRequest $request){
       $request['lastname'] = strtoupper($request->lastname);
       $request['name'] = strtoupper($request->lastname);
       $request['cbu'] = (ctype_digit( $request->cbu )) ? $request->cbu : 'notNumericCbuGived';

       $supplier = new Supplier($request->input());
       $supplier->save();

       return redirect()->route("suppliers.index");
    }

    // Update the specified resource in storage.
    public function update(Request $request, string $id){
        $request['lastname'] = strtoupper($request->lastname);
        $request['name'] = strtoupper($request->name);
        $request['cbu'] = (ctype_digit( $request->cbu )) ? $request->cbu : 'notNumericCbuGived';
        
        $supplier = Supplier::find($id);

        $supplier->lastname = $request->lastname;
        $supplier->name = $request->name;
        $supplier->dni = $request->dni;
        $supplier->state = $request->state;
        $supplier->cbu = $request->cbu;
        $supplier->alias = $request->alias;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
 
        $supplier->save();


        return redirect()->route("suppliers.index");
    }

    // Show the form for creating a new resource.
    public function create(){
        return Inertia::render('Suppliers/create');
    }
   

    // Display the specified resource.
    public function show(string $id){
        //
    }

    // Show the form for editing the specified resource.
    public function edit(string $id){
        //
    }


    // Remove the specified resource from storage.
    public function destroy(string $id){
        $supplier = Supplier::find($id);
        $supplier->delete(); 
        return redirect()->route("suppliers.index");
    }
}
