@extends('layouts.app') @section('content-title', 'Automation' ) 
@section('content')
<div id="AppArea">

 <!-- Modal -->
 <div class="modal fade modal-mini modal-primary" id="myModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h4 class="modal-title"><b>New Rule</b></h4>
                </div>
                <div class="modal-body">
                    <form id="addRule-form" action="{{ url('automation/create') }}" method="POST">
                        {{ csrf_field() }}
                        
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label col-form-label-sm" for="thingname">For Thing:</label>
                        <select class="from-control custom-select mb-2 mr-sm-2 mb-sm-0" name="thingname">
                                @php
                                $things = \App\Models\Thing::all();
                                foreach($things as $thing){
                                    echo '<option value="'.$thing->thing.'">'.$thing->thing.'</option>';
                                }
                              @endphp
                        </select><br><br>
                        </div>

                        <div class="form-group row">
                                <label class="col-sm-3 col-form-label col-form-label-sm" for="json">Rule (JSON)</label>
                                <textarea class="form-control mb-2 mr-sm-2 mb-sm-0 " name="json" value="{}" rows="10"></textarea>
                        </div>                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-simple btn-default" data-dismiss="modal">Close</button>
                    <button type="button" onclick="event.preventDefault();document.getElementById('addRule-form').submit();" class="btn btn-simple btn-primary">Create Rule</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="table-responsive ">
            <table class="table table-hover table-striped">
                <thead>
                    <th>Rule Name</th>
                    <th>Thing Listeneer</th>
                    <th>Rule</th>
                </thead>
                <tbody>
                    @foreach($rules as $rule)
                    <tr>
                        <td>{{ $rule->ruleName }}</td>
                        <td>{{ $rule->thingListener }}</td>
                        <td>{{ substr($rule->jsonRule, 0, 20).'...' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
        </div>

    </div> <!-- end app area -->
@endsection