<?php

namespace App\Http\Controllers;

use App\Models\File_Subject;
use Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class FileSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.fileSubject.index');
        $fileSubjects=File_Subject::all();
        return view('fileSubject.index',compact('fileSubjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.fileSubject.create');

        return view('fileSubject.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.fileSubject.create');
        $user_id = Auth::user()->id;

        $this->validate($request,[
            'name' => 'required|string|max:100',
            
        ]);
        
        File_Subject::create([
            'user_id' =>$user_id,
            'name' => $request->name,
            'status' => $request->filled('status'),

        ]);

        notify()->success('File Subject Successfully Added.', 'Added');
        return redirect()->route('app.fileSubject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File_Subject  $file_Subject
     * @return \Illuminate\Http\Response
     */
    public function show(File_Subject $file_Subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File_Subject  $file_Subject
     * @return \Illuminate\Http\Response
     */
    public function edit(File_Subject $fileSubject)
    {
        Gate::authorize('app.fileSubject.edit');
        return view('fileSubject.form',compact('fileSubject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File_Subject  $file_Subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File_Subject $fileSubject)
    {
        Gate::authorize('app.fileSubject.edit');
        $user_id = Auth::user()->id;

        $this->validate($request,[
            'name' => 'required|string|max:100',
            
        ]);
        
        $fileSubject->update([
            'user_id' =>$user_id,
            'name' => $request->name,
            'status' => $request->filled('status'),
        ]);

        notify()->success('File Subject updated.', 'Updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File_Subject  $file_Subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(File_Subject $fileSubject)
    {
        Gate::authorize('app.fileSubject.destroy');
        $fileSubject->delete();
        notify()->success('File Subject Delete.','Success');
        return back();
    }
}
