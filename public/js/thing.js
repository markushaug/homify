/** BEGIN: Config **/
function getCsrf(){
    return $('meta[name="csrfToken"]').attr('content');
}
/* END: Config **/

function toggle(thing){
    var newState;
    newState = thing.state;

        if(newState == 'OFF'){
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