<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Thing;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        $defaultRoom = Room::where('roomName', 'default_room')
               ->first();
        $things = Thing::where('room_id',$defaultRoom->id)->get();

        if( $defaultRoom === null ){
            return "Default room is missing!";
        }

        $data = array(
            'rooms' => $rooms,
            'currentRoom' => $defaultRoom,
            'defaultRoom' => $defaultRoom,
            'things' => $things
        );
        
        return \View::make('home')->with($data);
    }


    public function room($roomName){
        $rooms = Room::all();

        $defaultRoom = Room::where('roomName', 'default_room')
               ->first();

        $currentRoom = Room::where('room', $roomName)->first();

        if( count($defaultRoom) != 1){
            return "<b>Default room</b> is missing!";
        } else if( count($currentRoom) != 1 ){
            return "Room <b>". $roomName . "</b> not found!";
        }
        $things = Thing::where('room_id',$currentRoom->id)->get();


        $data = array(
            'rooms' => $rooms,
            'currentRoom' => $currentRoom,
            'defaultRoom' => $defaultRoom,
            'things' => $things
        );
        
        return \View::make('home')->with($data);
    }

    public function editRoom($roomName){

        $rooms = Room::all();

        $defaultRoom = Room::where('roomName', 'default_room')
               ->first();

        $currentRoom = Room::where('room', $roomName)->first();

        if( count($defaultRoom) != 1){
            return "<b>Default room</b> is missing!";
        } else if( count($currentRoom) != 1 ){
            return "Room <b>". $roomName . "</b> not found!";
        }
        $things = Thing::where('room_id',$currentRoom->id)->get();

        $data = array(
            'rooms' => $rooms,
            'currentRoom' => $currentRoom,
            'defaultRoom' => $defaultRoom,
            'things' => $things
        );
        
        return \View::make('editRoom')->with($data);

    }

}
