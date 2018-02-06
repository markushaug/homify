<?php

namespace App\Http\Controllers\Thing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thing;

/**
 * Class ThingController
 * @package App\Http\Controllers\Bindings
 */
class ThingController extends Controller
{

    /**
     * @var
     */
    protected $thing;

    /**
     * @var
     */
    protected $meta;

    /**
     * @var
     */
    protected $input;


    /**
     * @param      $thingName
     * @param      $channel
     * @param null $input
     * @return string
     */
    public function touch($thingName, $channel, $input = null)
    {
        // Set input if it's not NULL
        if (!is_null($input)) {
            $this->input = $input;
        }
        
        $channel = strtolower($channel);

        // Get all the metadata of the thing to be controlled.
        $this->meta = Thing::where('thing', $thingName)->first();

        // If no thing was found, an error message is issued.
        if (empty($this->meta)) {
            return 'Thing "' . $thingName . '" not found';
        }

        $classString = 'Modules\\' . $this->meta->binding . '\\Thing\\' . $this->meta->binding;

        // Instantiate the class.
        $this->thing = new $classString($this->meta);

        // Send Input to Class
        $this->thing->setInput($this->input);

        // Call the Channel/Method of class if the channel is existing.
        if ($this->thing->hasChannel($this->thing, $channel) === true) {
            $this->thing->$channel();
            Thing::where('thing', $thingName)
                    ->update(['state' => $this->thing->getStatus()]);
                    return 'Success. Status: ' . $this->thing->getStatus();
        } else {
            return 'Channel <b>"' . $channel . '"</b> not defined';
        }
    }

    public function create(Request $request){
        $validator = \Validator::make($request->all(), [
                    'thingname' => 'required|unique:things,thing|max:191',
                    'binding' => 'required',
                    'room' => 'exists:rooms,id',
                    'json' => 'json'
                ])->validate();
        
        $data = [
            "thingname" => $request->thingname,
            "binding" => $request->binding,
            "room" => $request->room,
            "json" => $request->json
        ];

        if(\Module::find($data['binding'])){
            $classString = 'Modules\\' . $data['binding']. '\\Thing\\Create' . $data['binding'];
            // Instantiate the class.
            $creator = new $classString($data);
            $creator->create();
            return back();
        }
    }

    public function update(Request $request){
        if(is_null($request->json)) {
            $validator = \Validator::make($request->all(), [
                'thingID' => 'required|exists:things,id',
                'thingname' => 'required|unique:things,thing|max:191',
                'binding' => 'required',
                'room' => 'exists:rooms,id'
            ])->validate();
        } else {
            $validator = \Validator::make($request->all(), [
                'thingID' => 'required|exists:things,id',
                'thingname' => 'required|unique:things,thing|max:191',
                'binding' => 'required',
                'room' => 'exists:rooms,id',
                'json' => 'sometimes|json'
            ])->validate();
        }

            $data = [
                "thingID" => $request->thingID,
                "thingname" => $request->thingname,
                "binding" => $request->binding,
                "room" => $request->room,
                "json" => json_decode($request->json,true)
            ];
        
            
        if(\Module::find($data['binding'])){
            $classString = 'Modules\\' . $data['binding']. '\\Thing\\Update' . $data['binding'];
            // Instantiate the class.
            $updater = new $classString($data);
            $updater->update();
            return back();
        }
    }


}
