@extends('layouts.app') @section('content-title', $currentRoom->room ) 
@section('content')

<div id="AppArea">
  

    <ul id="ListArea">
        @foreach ($things as $thing)
        <li style="cursor: pointer;" onclick="toggle({{ $thing }})" id="{{ $thing->id }}" data-status="@php if($thing->state == '1') { echo 0; } else { echo 1; } @endphp">
            <div class="Text">
                <h3>{{ $thing->thing }}</h3>
            </div>
            <div class="Image">
                <img @switch($thing->thingType) @case('Switcher') @php if($thing->state == '1') { echo 'src="/images/ThingTypes/'.$thing->thingType.'_ON.png"';
                } else { echo 'src="/images/ThingTypes/'.$thing->thingType.'_OFF.png"'; } @endphp @break @case('Speaker')
                @php if($thing->state == '1') { echo 'src="/images/ThingTypes/'.$thing->thingType.'_ON.png"'; } else { echo
                'src="/images/ThingTypes/'.$thing->thingType.'_OFF.png"'; } @endphp @break @case('Light') @php if($thing->state
                == '1') { echo 'src="/images/ThingTypes/'.$thing->thingType.'_ON.png"'; } else { echo 'src="/images/ThingTypes/'.$thing->thingType.'_OFF.png"';
                } @endphp @break @default Default case... @endswitch>
            </div>
            <div class="Bar">
                <a title="{{ $thing->status }}" class="Status" title="Status"></a>
               @php
               try {
                    // Instantiate the class.
                    $classString = '\\Modules\\' . $thing->binding . '\\Thing\\' . $thing->binding;
                    $lo_thing = new $classString($thing);
                    if($lo_thing instanceof \App\Things\ifSlidable) {
                        echo '<input id="slide" type="range" min="1" max="100" step="1" value="10" onchange="updateSlider({{ $thing }},this.value)">';
                    }
                    unset($lo_thing);
                } catch (\Exception $ex) {

                }
                @endphp
            </div>
        </li>

        @endforeach
    </ul>
</div>
@endsection

