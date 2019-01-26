@extends('layouts.app') @section('content-title', $currentRoom->room ) @section('content')



<div id="AppArea">
    <ul id="ListArea">
        @foreach ($things as $thing)
        <li>
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
                <a style="cursor: pointer;" title="{{ $thing->thing }}" href="#editModal" onclick="toggleEditModal({{$thing}})" title="Edit">Edit</a>
                <form id="generateEventListener-form" action="{{ url('/automation/generate') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                  <a href="#" onclick="event.preventDefault();document.getElementById('generateEventListener-form').submit();">
                    <p>Generate Jobs</p>
                  </a>
            </div>
        </li>

        @endforeach
    </ul>
</div>
@endsection