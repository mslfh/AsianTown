<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchaser;
use App\Models\User;
class PurchaserController extends Controller
{
    public function index()
    {
        $purchasers = Purchaser::with('user')->get()->toArray();
        return view('purchasers.index', compact('purchasers'));
    }

    public function create()
    {
        $users = User::all();
        return view('purchasers.create', compact('users'));
    }

    public function show(Purchaser $purchaser)
    {
        dd($purchaser);
        return view('purchasers.show', compact('purchaser'));
    }

    public function edit(Purchaser $purchaser)
    {
        return view('purchasers.edit', compact('purchaser'));
    }

    public function store(Request $request)
    {
        $purchaser = new Purchaser;
        $purchaser->name = $request->input('name');
        $purchaser->user_id = $request->input('user_id');
        $purchaser->phone = $request->input('phone');
        $purchaser->address = $request->input('address');
        $purchaser->remark = $request->input('remark');
        $purchaser->save();
        return redirect()->route('purchasers.index');
    }

    public function update(Request $request, Purchaser $purchaser)
    {
        $purchaser->name = $request->input('name');
        $purchaser->user_id = $request->input('user_id');
        $purchaser->phone = $request->input('phone');
        $purchaser->address = $request->input('address');
        $purchaser->remark = $request->input('remark');
        $purchaser->save();
        return redirect()->route('purchasers.index');
    }

    public function destroy(Purchaser $purchaser)
    {
        $purchaser->delete();
        return redirect()->route('purchasers.index');
    }
}
