<?php

namespace App\Rule;

use App\Http\Controllers\Thing\ThingController;
use App\Models\Rule;

class RuleParser
{
    /**
     * $listener.
     *
     * @var string
     */
    private $listener;

    /**
     * $jsonRule.
     *
     * @var json
     */
    private $jsonRule;

    /**
     * $event.
     *
     * @var string
     */
    private $event;

    /**
     * __construct.
     *
     * @param mixed $thing
     * @param mixed $channel
     */
    public function __construct($thing = null, $channel = null)
    {
        if (!is_null($thing) || !is_null($channel)) {
            $this->listener = $thing;
            $this->event = $channel;
        }
    }

    /**
     * executeRules
     * Execute all rules for the triggered thing.
     */
    public function executeRules()
    {
        // Retrieve rules for the current thing
        $rules = Rule::where('thingListener', $this->listener)->get();
        foreach ($rules as $rule) {
            if (true === $this->validateJson($rule->jsonRule)) {
                $this->jsonRule = json_decode($rule->jsonRule);
                $this->parseJson();
            }
        }

        return;
    }

    /**
     * validateJson
     * Check if $json is json-formatted.
     *
     * @param mixed $json
     */
    private function validateJson($json)
    {
        $isJson = json_decode($json);

        if ($isJson instanceof \stdClass) {
            return true;
        }

        return false;
    }

    /**
     * parseJson
     * Parse JSON and execute then-block if condition evaluates as true.
     */
    private function parseJson($generateJob = 0)
    {
        // Grab RuleName from json
        $ruleName = $this->jsonRule->rule;

        // Grab all if & then conditions
        $ifConditions = get_object_vars($this->jsonRule->if);
        $thenConditions = get_object_vars($this->jsonRule->then);


       /* echo '<pre>';
        print_r($this->jsonRule);
        echo '</pre>'; exit;*/

        /*
        Allowed if rules:
            - time: "09:00:00"
            - thing: {name: xy, channel: xy}
        */

        // Parse each ifCondition
        foreach ($ifConditions as $type => $value) {
            // Semantic analysis for the conditions
            switch ($type) {
                case 'time':
                    // time handler
                    // this event is handled by the generateEventListener
                    $time = $this->jsonRule->if->time;
                    $TaskList = $this->parseThenCondition($thenConditions,1);
                    //print($time);
                   // print_r($thenConditions);
                    foreach($TaskList as $task => $value){
                    // print("Trigger " . $value["channel"] . " for " . $value["thing"] . " at " . $time);
                    }
                   // print("Trigger " . $TaskList[0]["channel"] . " for " . $TaskList[0]["thing"] . " at " . $time);

                    break;
                case 'thing':
                    if($generateJob == 0) { break; } // if generator == 1, only time jobs are processed
                    // thing handler
                    if (!empty($this->jsonRule->if->thing->name)) {
                        if ($this->event == $this->jsonRule->if->thing->channel) {
                            // Parse then condition for the thing-block if condition is true
                            $this->parseThenCondition($thenConditions);
                            break;
                        }
                    }
                    break;
            }
        }
    }

    private function parseThenCondition($thenConditions, $generateJob = 0)
    {
        $taskList = array();

        // Parse each thenCondition
        foreach ($thenConditions as $type => $value) {
            // Semantic analysis for the conditions
            switch ($type) {
                case 'thing':
                    // thing handler
                    if (!empty($this->jsonRule->then->thing->name)) {
                        $thing = $this->jsonRule->then->thing->name;
                        $channel = $this->jsonRule->then->thing->channel;

                        if($generateJob == 0) {
                            $controller = new ThingController();
                            $controller->touch($thing, $channel);
                            break;
                        }
                        $newTask = [
                            "thing" => $thing,
                            "channel" => $channel
                        ];
                        array_push($taskList, $newTask);
                        break;
                }
            }
            break;
        }
        return $taskList;
    }

    /**
     * generateJobs
     *
     * @param mixed $rules
     * @return void
     */
    public function generateJobs($rules){
       
        foreach ($rules as $rule) {
            if (true === $this->validateJson($rule->jsonRule)) {
                $this->jsonRule = json_decode($rule->jsonRule);
                $this->parseJson(1);
            }
        }
    }
}