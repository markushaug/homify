@extends('layouts.app') @section('content-title', $currentRoom->room ) @section('content')

<div id="AppArea">
    <!-- Modal -->
    <div class="modal" id="editModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h4 class="modal-title"><b>Edit Thing</b></h4>
                </div>
                <div class="modal-body">
                    <form id="updateThing-form" action="{{ url('thing/update') }}" method="POST">
                        {{ csrf_field() }}
                        <label for="thingname">Thing name:</label>
                        <input name="thingname"></input><br><br>

                        <label for="room">Room:</label>
                        <select name="room">
                            @php
                            foreach($rooms as $room){
                                echo '<option value="'.$room->id.'">'.$room->room.'</option>';
                            }
                          @endphp
                        </select><br><br>

                        <label for="binding">Binding:</label>
                        <select name="binding">
                            @php
                            $modules = Module::all();
                            foreach($modules as $module){
                                echo '<option value="'.$module->name.'">'.$module->name.'</option>';
                            }
                          @endphp
                        </select><br><br>


                        <label for="json">Optional (JSON):</label>
                        <input name="json" placeholder="" value="{}"></input>

                        <input style="display: none;" name="currentRoom" value=""></input>
                        <input style="display: none;" name="thingID" value=""></input>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" onclick="event.preventDefault();document.getElementById('updateThing-form').submit();" class="btn btn-primary">Update Thing</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <ul id="ListArea">
        @foreach ($things as $thing)
        <li>
            <div class="Text">
                <h3>{{ $thing->thing }}</h3>
            </div>
            <div class="Image">
                <img @switch($thing->thingType) @case('Switcher') @php if($thing->state == 'ON') { echo 'src="/images/ThingTypes/'.$thing->thingType.'_ON.png"';
                } else { echo 'src="/images/ThingTypes/'.$thing->thingType.'_OFF.png"'; } @endphp @break @case('Speaker')
                @php if($thing->state == 'ON') { echo 'src="/images/ThingTypes/'.$thing->thingType.'_ON.png"'; } else { echo
                'src="/images/ThingTypes/'.$thing->thingType.'_OFF.png"'; } @endphp @break @case('Light') @php if($thing->state
                == 'ON') { echo 'src="/images/ThingTypes/'.$thing->thingType.'_ON.png"'; } else { echo 'src="/images/ThingTypes/'.$thing->thingType.'_OFF.png"';
                } @endphp @break @default Default case... @endswitch>
            </div>
            <div class="Bar">
                <a style="cursor: pointer;" title="{{ $thing->thing }}" href="#editModal" onclick="toggleEditModal({{$thing}})" title="Edit">Edit</a>
            </div>
        </li>

        @endforeach
    </ul>
</div>
@endsection