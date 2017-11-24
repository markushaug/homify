<?php

namespace App\Http\Controllers\Thing;

use App\Http\Controllers\Controller;
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

        // Get all the metadata of the thing to be controlled.
        $this->meta = Thing::where('thing', $thingName)->first();

        // If no thing was found, an error message is issued.
        if (empty($this->meta)) {
            return 'Thing "' . $thingName . '" not found';
        }

        // Concatenate the name

        // $classString = 'Modules\\' . $this->meta->binding . '\\Things\\' . $this->meta->thingType . '\\' . $this->meta->binding;
        $classString = 'Modules\\Things\\' . $this->meta->binding . '\\Thing\\' . $this->meta->binding;

        // Instantiate the class.
        $this->thing = new $classString($this->meta);

        // Send Input to Class
        $this->thing->setInput($this->input);

        // Call the Channel/Method of class if the channel is existing.
        if ($this->thing->hasChannel($this->thing, $channel) === true) {
            $this->thing->$channel();
        } else {
            return 'Channel <b>"' . $channel . '"</b> not defined';
        }


    }

}