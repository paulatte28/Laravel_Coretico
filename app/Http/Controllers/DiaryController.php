<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Diary;
use Illuminate\Support\Facades\Log;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        Log::info("Fetching diaries for user ID: " . $userId);
        $diaries = Diary::where('user_id', $userId)->get();
        return view('diary.index', compact('diaries'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('diary.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Diary::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('diary.index')->with('success', 'Diary entry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $diary = Diary::where('user_id', Auth::id())->findOrFail($id);
        return view('diary.show', compact('diary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $diary = Diary::where('user_id', Auth::id())->findOrFail($id);
        return view('diary.edit', compact('diary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $diary = Diary::where('user_id', Auth::id())->findOrFail($id);
        $diary->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('diary.index')->with('success', 'Diary entry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diary = Diary::where('user_id', Auth::id())->findOrFail($id);
        $diary->delete();

        return redirect()->route('diary.index')->with('success', 'Diary entry deleted successfully.');
    }
}
