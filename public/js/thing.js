/** BEGIN: Config **/
function getCsrf(){
    return $('meta[name="csrfToken"]').attr('content');
}
/* END: Config **/

function toggle(thing){
    var newState;
    newState = thing.state;

        if(newState == '0'){
            newState = 'ON';
        } else {
            newState = 'OFF';
        }
        console.log(newState);
    // post
    $.ajax({
        method: "GET",
        url: "/thing/" + thing.thing + "/" + newState,
        data: {
           "_token": getCsrf(),
        },
        success: function(data){
           window.location.reload();
           console.log(data);
        },
        error: function(data){
           console.log(data);
        }
    });

}

function toggleEditModal(thing){
    console.log(thing);
    $('#editModal').modal('show');
    $('input[name="thingID"]').val(thing.id);
    $('input[name="json"]').val(thing.json);
    $('input[name="thingname"]').val(thing.thing);
    $('input[name="room"]').val(thing.roomid);
    $('input[name="binding"]').val(thing.binding);
}

function updateSlider(thing, slideAmount) {
    var sliderDiv = document.getElementById("sliderAmount");
   // sliderDiv.innerHTML = slideAmount;


    // post
    $.ajax({
        method: "GET",
        url: "/thing/" + thing + "/input/" + slideAmount,
        data: {
           "_token": getCsrf(),
        },
        success: function(data){
           //window.location.reload();
           console.log(data);
        },
        error: function(data){
           console.log(data);
        }
    });
}