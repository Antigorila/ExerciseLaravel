<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('files.index', ['user' => Auth::user()]);
        //return response()->json(Auth::user()->files);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('files.create', ['user' => Auth::user()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFileRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'content' => 'required|string',
        ]);

        File::create([
            'name' => $validatedData['name'],
            'folder_name' => Auth::user()->folder_name,
            'description' => $request->input('description'),
            'content' => $validatedData['content'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('files.index')->with('success', 'File created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        $file->views++;
        $file->save();

        return view('files.show', ['file' => $file]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        return view('files.edit', ['file' => $file]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        $file->update($request->all());
        $file->save();

        return view('files.index', ['user' => Auth::user()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        foreach($file->suspends as $suspend)
        {
            $suspend->delete();
        }

        foreach($file-> comments as $comment)
        {
            foreach($comment->replies as $reply)
            {
                $reply->delete();
            }
            $comment->delete();
        }

        $file->delete();
        return view('files.index', ['user' => Auth::user()]);
    }
}
