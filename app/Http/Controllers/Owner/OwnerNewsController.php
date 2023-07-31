<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Target;

class OwnerNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::with('target')->get();
        return Inertia::render('Owner/News/Index', [
            "news" => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $target = Target::get();
        return Inertia::render('Owner/News/Create', [
            "target"  => $target,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $news = new News;
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->target_id = $request->input('target.id');
        
        $news->save();

        $news = News::with('target')->get();
        return Inertia::render('Owner/News/Index', [
            "news" => $news
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $news = News::with('target')->findOrFail($id);
        return Inertia::render('Owner/News/Show', [
            "news" => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::with('target')->findOrFail($id);
        $target = Target::get();
        return Inertia::render('Owner/News/Edit', [
            "news" => $news,
            "target" => $target,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::with('target')->findOrFail($id);
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->target_id = $request->input('target.id');

        $news->update();
        
        $allNews = News::with('target')->get();
        return Inertia::render('Owner/News/Index', [
            "news" => $allNews
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
