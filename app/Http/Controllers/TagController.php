<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Tag;


class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();
        return view('tag.index',compact('tags'));
    }
    public function create(){
        return view('tag.create');
    }
    public function store(Request $request){
        $request->validate([
            'tag_name' => 'required',
        ]);
        Tag::create($request->post());


        return redirect()->route('tag.index')->with('success','Tag has been added');
    }
    public function edit(Tag $tag){
        return view('tag.edit',compact('tag'));
    }
    public function update(Request $request,Tag $tag){
        $request->validate([
            'tag_name' => 'required',
        ]);
        $tag->fill($request->post())->save();


        return redirect()->route('tag.index')->with('success','Tag has been updated');
    }
    public function destroy(Tag $tag){
        $tag->delete();
        return redirect()->route('tag.index')->with('success','Tag has been deleted');
    }


}
