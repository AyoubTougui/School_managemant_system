<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function index(){

        $rooms = ClassRoom::get(); 
        return view('backend.class_room.index',compact('rooms'));
    }

    public function create()
    {   
        return view('backend.class_room.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required'
        ]);

        ClassRoom::create([
            'name'        => $request->name
        ]);

        return redirect()->route('class_room.index');
    }


    public function destroy($id)
    {
        $room = ClassRoom::findOrFail($id);
        $room->delete();

        return back();
    }


    public function edit($id)
    {
        $room = ClassRoom::findOrFail($id);
        return view('backend.class_room.edit',compact('room'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required'
        ]);

        $room = ClassRoom::findOrFail($id);

        $room->update([
            'name'        => $request->name
        ]);

        return redirect()->route('class_room.index');
    }

}
