<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community; 
class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::all();
        return view('communities.index', compact('communities'));
    }
    public function create()
    {
        return view('communities.create');
    }


    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Community::create($request->all());
        return redirect()->route('communities.index')->with('success', 'Created successfully');
    }

    public function edit(Community $community)
    {
        return view('communities.edit', compact('community'));
    }

    public function update(Request $request, Community $community)
    {
        $request->validate(['name' => 'required']);
        $community->update($request->all());
        return redirect()->route('communities.index')->with('success', 'Updated successfully');
    }

    public function destroy(Community $community)
    {
        $community->delete();
        return redirect()->route('communities.index')->with('success', 'Deleted successfully');
    }
}