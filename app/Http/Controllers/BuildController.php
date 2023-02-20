<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildController extends Controller
{
    public function index()
    {
        $builds = Build::all();

        return view('build.index', compact('builds'));
    }

    public function create()
    {
        return view('build.create');
    }

    public function store(Request $request)
    {
        $build = new Build;

        $build->name = $request->name;
        $build->processor = $request->processor;
        $build->memory = $request->memory;
        $build->storage = $request->storage;
        $build->gpu = $request->gpu;

        $build->save();

        return redirect()->route('builds.index')->with('success', 'Build created successfully!');
    }

    public function show($id)
    {
        $build = Build::find($id);

        return view('build.show', compact('build'));
    }

    public function edit($id)
    {
        $build = Build::find($id);

        return view('build.edit', compact('build'));
    }

    public function update(Request $request, $id)
    {
        $build = Build::find($id);

        $build->name = $request->name;
        $build->processor = $request->processor;
        $build->memory = $request->memory;
        $build->storage = $request->storage;
        $build->gpu = $request->gpu;

        $build->save();

        return redirect()->route('builds.index')->with('success', 'Build updated successfully!');
    }

    public function destroy($id)
    {
        $build = Build::find($id);

        $build->delete();

        return redirect()->route('builds.index')->with('success', 'Build deleted successfully!');
    }
}
