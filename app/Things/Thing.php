<?php
/**
 * Created by PhpStorm.
 * User: markus
 * Date: 06.11.17
 * Time: 20:20
 */

namespace App\Things;

/**
 * Class Thing
 * @package App\Things
 */
abstract class Thing
{
    /**
     * @var $thing
     */
    protected $thing;

    /**
     * @var $meta
     */
    protected $meta;

    /**
     * @var $channels
     */
    public $channels;

    /**
     * @var $status
     */
    private $status;

    /**
     * @var $input
     */
    private $input;



    /**
     * getChannels
     * Get all channels of an Thing and return as array
     * 
     * @param mixed $classObject
     * @return void
     */
    public function getChannels($classObject)
    {
        $class = new \ReflectionClass(get_class($classObject)); // Create Reflection Object
        $methods = $class->getMethods(\ReflectionMethod::IS_PUBLIC); // Retrieve all public methods
        $channels = array(); // Define array

        if(sizeof($methods) > 0){ // If > 0 channels have been found
            for($i = 0; $i < sizeof($methods); ++$i){
                if ($methods[$i]->name != 'getChannels' && $methods[$i]->name != '__construct') {
                    // so we actually removed the helper functions
                    $channels[$i]['name'] = $methods[$i]->name;
                }
            }
        }
        unset($class);
        return $channels;
    }


    /**
     * hasChannel
     * Check if an Thing has the requested channel
     * 
     * @param mixed $classObject
     * @param mixed $channel
     * @return void
     */
    public function hasChannel($classObject, $channel)
    {
        $channels = $this->getChannels($classObject);

        foreach($channels as $c){
            if (strtolower($c['name']) == $channel) {
                return true;
            }
        }

        return false;
    }

    
    /**
     * getStatus
     *
     * @return void
     */
    public function getStatus()
    {
        if($this->status == 'ON'){
            return 1;
        } elseif ($this->status == 'OFF'){
            return 0;
        }
        return $this->status;

    }

    /**
     * setStatus
     *
     * @param mixed $lv_status
     * @return void
     */
    public function setStatus($lv_status)
    {
        $this->status = $lv_status;
    }

    /**
     * @param $lv_input
     */
    public function setInput($lv_input)
    {
        $this->input = $lv_input;
    }

    /**
     * @return $input
     */
    public function getInput(){
        return $this->input;
    }

}