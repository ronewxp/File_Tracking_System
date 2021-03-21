<?php

namespace App\Http\Controllers;


use App\Models\Office;
use Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class OfficesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.offices.index');
        $offices=Office::all();
        return view('office.index',compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.offices.create');

        return view('office.form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.offices.create');
        $user_id = Auth::user()->id;

        $this->validate($request,[
            'name' => 'required|string|max:100',
            'code' => 'required|min:10|numeric',
            'mobile' => 'required|min:11|numeric',
            
        ]);
        
        Office::create([
            'user_id' =>$user_id,
            'name' => $request->name,
            'code' => $request->code,
            'mobile' => $request->mobile,
            'status' => $request->filled('status'),
            'is_starting_office' => $request->filled('is_starting_office')

        ]);

        notify()->success('Office Successfully Added.', 'Added');
        return redirect()->route('app.offices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        Gate::authorize('app.offices.edit');
        return view('office.form',compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        Gate::authorize('app.offices.edit');

        $user_id = Auth::user()->id;

        $this->validate($request,[
            'name' => 'required|string|max:100',
            'code' => 'required|min:10|numeric',
            'mobile' => 'required|min:11|numeric',
            
        ]);
        
        $office->update([
            'user_id' =>$user_id,
            'name' => $request->name,
            'code' => $request->code,
            'mobile' => $request->mobile,
            'status' => $request->filled('status'),
            'is_starting_office' => $request->filled('is_starting_office')

        ]);

        notify()->success('Office updated.', 'Updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        Gate::authorize('app.offices.destroy');
        $office->delete();
        notify()->success('Office Delete.','Success');
        return back();
    }
}
