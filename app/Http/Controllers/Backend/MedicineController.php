<?php

namespace App\Http\Controllers\Backend;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:medicine-list|medicine-create|medicine-edit|medicine-delete', ['only' => ['index','show']]);
        $this->middleware('permission:medicine-create', ['only' => ['create','store']]);
        $this->middleware('permission:medicine-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:medicine-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::latest()->paginate(5);
        return view('backend.medicines.index',compact('medicines'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.medicines.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);


        Medicine::create($request->all());


        return redirect()->route('medicines.index')
            ->with('success','Medicine created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        return view('backend.medicines.show',compact('medicine'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        return view('backend.medicines.edit',compact('medicine'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);


        $medicine->update($request->all());


        return redirect()->route('medicines.index')
            ->with('success','Medicine updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();


        return redirect()->route('medicines.index')
            ->with('success','Medicine deleted successfully');
    }
}
