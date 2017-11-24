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
     * @var $online
     */
    private $online;

    /**
     * @var $offline
     */
    private $offline;

    /**
     * @var $status
     */
    private $status;

    /**
     * @var input
     */
    private $input;


    /**
     * Get all channels of an Thing
     *
     * @param $lo_class
     * @return array
     */
    public function getChannels($lo_class)
    {
        $class = new \ReflectionClass(get_class($lo_class));
        $methods = $class->getMethods(\ReflectionMethod::IS_PUBLIC);
        $la_channels = [];

        foreach ($methods as $method) {
            if ($method->name != 'getChannels' && $method->name != '__construct') {
                $la_channels[]['name'] = $method->name;
            }
        }
        return $la_channels;
    }

    /**
     * Check if an Thing has the requested channel
     *
     * @param $lo_class
     * @param $lv_channel
     * @return bool
     */
    public function hasChannel($lo_class, $lv_channel)
    {

        $channels = $this->getChannels($lo_class);

        foreach ($channels as $channel) {
            if ($channel['name'] == $lv_channel) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $lv_status
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
     * @return input
     */
    public function getInput(){
        return $this->input;
    }

}