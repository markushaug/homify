<?php

namespace App\Http\Controllers\Thing;

use App\Http\Controllers\Controller;
use App\Rule;
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
     * touch
     *
     * @param mixed $thingName
     * @param mixed $channel
     * @param mixed $input
     * @return void
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

        // Concatenate the module's namespace with its binder.
        $classString = 'Modules\\' . $this->meta->binding . '\\Thing\\' . $this->meta->binding;

         // Catch Error Messages from Thing Constructor
        try {
            // Instantiate the class.
            $this->thing = new $classString($this->meta);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    
        // Send Input
        $this->thing->setInput($this->input);

        // Call the Channel/Method of class if the channel exists.
        if ($this->thing->hasChannel($this->thing, $channel) === true) {

            // Certain Modules create .env variables. For such cases, we repeat the channel execution 2 times
            $msg = NULL;
            $retries = 2;
            for ($try = 0; $try < $retries; $try++) {
                try {
                    $this->thing->$channel();
                } catch (\Exception $ex) {
                    $msg = $ex->getMessage();
                    sleep(1);   
                    continue;
                }
                if ($try == $retries) {
                    return $msg;
                }
                break;
            }

            if(!is_null($this->thing->getStatus())){
                Thing::where('thing', $thingName)
                    ->update(['state' => $this->thing->getStatus()]);
            } 
            $lv_thing = Thing::where('thing', $thingName)->first();
            $this->thing->setStatus($lv_thing->state);
            
            // handling the rules
            $ruleParser = new \App\Rule\RuleParser($thingName, $channel);
            $ruleParser->executeRules();
            return $this->thing->getStatus();
        }
        return 'Channel <b>"' . $channel . '"</b> not defined';
    }

    /**
     * create
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
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

        if (\Module::find($data['binding'])) {
            $classString = 'Modules\\' . $data['binding']. '\\Thing\\Create' . $data['binding'];
            // Instantiate the class.
            $creator = new $classString($data);
            $creator->create();
            return back();
        }
    }

    /**
     * update
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        if (is_null($request->json)) {
            $validator = \Validator::make($request->all(), [
                'thingID' => 'required|exists:things,id',
               // 'thingname' => 'required|unique:things,thing|max:191',
                'binding' => 'required',
                'room' => 'exists:rooms,id'
            ])->validate();
        } else {
            $validator = \Validator::make($request->all(), [
                'thingID' => 'required|exists:things,id',
               // 'thingname' => 'required|unique:things,thing|max:191',
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
                "json" => json_decode($request->json, true)
            ];
        
            
        if (\Module::find($data['binding'])) {
            $classString = 'Modules\\' . $data['binding']. '\\Thing\\Update' . $data['binding'];
            // Instantiate the class.
            $updater = new $classString($data);
            $updater->update();
            return back();
        }
    }
}