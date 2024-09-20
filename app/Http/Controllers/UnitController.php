<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{

    public function index()
    {
        $units = Unit::all();
        return view('units.index', compact('units'));
    }

    public function create()
    {
        return view('units.create');
    }

    public function show(Unit $unit)
    {
        return view('units.show', compact('unit'));
    }

    public function edit(Unit $unit)
    {
        return view('units.edit', compact('unit'));
    }

    public function store(Request $request)
    {
        $unit = new Unit;
        $unit->title = $request->input('title');
        $unit->chinese_title = $request->input('chinese_title');
        $unit->norm = $request->input('item_specs').$request->input('unit');
        $unit->save();
        return redirect()->route('units.index');
    }

    public function update(Request $request, Unit $unit)
    {
        $unit->title = $request->input('title');
        $unit->norm = $request->input('norm');
        $unit->save();
        return redirect()->route('units.index');
    }
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->route('units.index');
    }
}
