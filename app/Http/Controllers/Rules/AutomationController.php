<?php

namespace App\Http\Controllers\Rules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Rule\RuleParser;
use App\Models\Room;
use App\Models\Thing;
use App\Models\Rule;

/**
 * Class AutomationController
 */
class AutomationController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        $defaultRoom = Room::where('roomName', 'default_room')
               ->first();
        $things = Thing::where('room_id', $defaultRoom->id)->get();

        if (count($defaultRoom) != 1) {
            return "Default room is missing!";
        }

        $rules = Rule::all();

        $data = array(
            'rooms' => $rooms,
            'currentRoom' => $defaultRoom,
            'defaultRoom' => $defaultRoom,
            'things' => $things,
            'rules' => $rules
        );
        
        return \View::make('rules.rules')->with($data);
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
            'thingname' => 'required|exists:things,thing',
            'json' => 'required|json'
        ])->validate();

        // Decode json-input to array
        $json = json_decode($request->json);

        // Check if $json->rule is unique
        $counter = count(Rule::where('ruleName', $json->rule)->get());
        if ($counter > 0) {
            return back()->with([ "error" => "ups"]);
        }
        
        if (isset($json->rule)) {
            // Create Rule
            $rule = new Rule();
            $rule->ruleName = $json->rule;
            $rule->thingListener = $request->thingname;
            $rule->jsonRule = $request->json;
            $rule->save();

            return back();
        }
        return;
    }

    /**
     * generateEventListeners
     * 
     * Looks up every rule for time and date event triggers
     * and generate cron-jobs
     * 
     * @return void
     */ 
    public function generateEventListeners()
    {
        // Collect all Rules
        $rules = Rule::all();

        // 

       // (new RuleParser())->registerRules();
        

        return back();
    }
}
