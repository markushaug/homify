<?php 
namespace App\Rule;

use App\Http\Controllers\Thing\ThingController;
use App\Models\Rule;
use Validator;

class RuleParser
{

    /**
     * $listener
     *
     * @var string
     */
    private $listener;

    /**
     * $jsonRule
     *
     * @var json
     */
    private $jsonRule;

    /**
     * $event
     *
     * @var string
     */
    private $event;

    /**
     * __construct
     *
     * @param mixed $thing
     * @param mixed $channel
     * @return void
     */
    public function __construct($thing, $channel){
        $this->listener = $thing;
        $this->event = $channel;
    }

    /**
    * registerRules
    *
    * @return void
    */
    public function registerRules(){
        // Retrieve rules for the current thing
        $rules = Rule::where('thingListener', $this->listener)->get();
        foreach($rules as $rule){
            if($this->validateJson($rule->jsonRule) === true){
                $this->jsonRule = json_decode($rule->jsonRule);
                $this->parseJson();
            }
        }
        return;
    }

    
    /**
     * validateJson
     *
     * @param mixed $json
     * @return void
     */
    private function validateJson($json){
        $isJson = json_decode($json);

        if ($isJson instanceof \stdClass) {
            return true;
        }
        return false;
    }

    /**
     * parseJson
     *
     * @return void
     */
    private function parseJson(){
      $this->jsonRule = $this->jsonRule;

      // Get RuleName
      $ruleName = $this->jsonRule->rule;

      // Get all if & then conditions
      $ifConditions = get_object_vars($this->jsonRule->if);
      $thenConditions = get_object_vars($this->jsonRule->then);
      
      /* 
      Allowed if rules:
        - thing: {name: xy, channel: xy}
     */

     // Validate the rule types
      foreach($ifConditions as $type => $value) {
          switch($type){
              case 'time':
              // time handler
              break;
              case 'thing':
                // thing handler
                if( !empty( $this->jsonRule->if->thing->name ) || !empty( $this->jsonRule->if->thing->name ) ){
                    if( $this->listener == $this->jsonRule->if->thing->name && $this->event == $this->jsonRule->if->thing->channel ){
                        $this->parseThenCondition($thenConditions);
                        break; 
                    }
                    }
                break;
          }
      }
    }

    private function parseThenCondition($thenConditions){
        // Validate the rule types
      foreach($thenConditions as $type => $value) {
        switch($type){
            case 'thing':
              // thing handler
              if( !empty( $this->jsonRule->then->thing->name ) || !empty( $this->jsonRule->then->thing->name ) ){
                  $thing = $this->jsonRule->then->thing->name;
                  $channel = $this->jsonRule->then->thing->channel;
                  $controller = new ThingController();
                  $controller->touch($thing, $channel);
                  break;
                }
            }
            break;
        }
    }
}
