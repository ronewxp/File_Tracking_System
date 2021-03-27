<?php

namespace App\Http\Controllers;

use App\Models\FileUser;
use App\Models\User;
use App\Models\Office;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class FileUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.fileUser.index');
        $fileUsers=FileUser::all();
        return view('fileUser.index',compact('fileUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.fileUser.create');
        $users = User::all();
        $offices = Office::all();

        return view('fileUser.form',compact('users','offices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.fileUser.create');
        $this->validate($request,[

        ]);
        
        FileUser::create([
            'user_id' =>$request->user,
            'office_id' =>$request->office,
            'is_file_manager' => $request->filled('is_file_manager'),
            'is_receive_comments' => $request->filled('is_receive_comments'),
            'status' => $request->filled('status'),

        ]);

        notify()->success('File User Successfully Added.', 'Added');
        return redirect()->route('app.fileUser.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileUser  $fileUser
     * @return \Illuminate\Http\Response
     */
    public function show(FileUser $fileUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileUser  $fileUser
     * @return \Illuminate\Http\Response
     */
    public function edit(FileUser $fileUser)
    {
        Gate::authorize('app.fileUser.edit');
        $users = User::all();
        $offices = Office::all();

        return view('fileUser.form',compact('users','offices','fileUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileUser  $fileUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileUser $fileUser)
    {
         Gate::authorize('app.fileUser.edit');
        $this->validate($request,[

        ]);
        
        $fileUser->update([
            'user_id' =>$request->user,
            'office_id' =>$request->office,
            'is_file_manager' => $request->filled('is_file_manager'),
            'is_receive_comments' => $request->filled('is_receive_comments'),
            'status' => $request->filled('status'),

        ]);

        notify()->success('File User Successfully updated.', 'updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileUser  $fileUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileUser $fileUser)
    {
        //
    }
}
