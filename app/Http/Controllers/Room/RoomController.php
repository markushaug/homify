<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room as Room;

/**
 * Class RoomController
 * @package App\Http\Controllers\Bindings
 */
class RoomController extends Controller
{

    /**
     * @var
     */
    protected $input;  
   

    /**
     * create
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $validator = \Validator::make($request->all(), [
                    'roomname' => 'required|unique:rooms,room|max:191'
                ])->validate();
        
        $data = [
            "roomname" => $request->roomname
        ];

        $room = new Room;
        $room->room = $data['roomname'];
        $room->save();
        return back();
    }

    
}