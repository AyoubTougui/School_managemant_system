<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Grade;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::get(); 
        return view('backend.group.index',compact('groups'));
    }

    public function create()
    {   
        $classes = Grade::get();
        return view('backend.group.create',compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'id_class'       => 'required'
        ]);

        Group::create([
            'name'        => $request->name,
            'id_class'    => $request->id_class
        ]);
        return redirect()->route('group.index');
    }


    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return back();
    }


    public function edit($id)
    {
        $classes = Grade::get();
        $group = Group::findOrFail($id);
        $current_class = Grade::where('id',$group->id_class)->value('class_name');
        return view('backend.group.edit',compact('group','classes','current_class'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'id_class'       => 'required'
        ]);

        $group = Group::findOrFail($id);

        $group->update([
            'name'        => $request->name,
            'id_class'    => $request->id_class
        ]);

        return redirect()->route('group.index');
    }

}
