    $("#search-event").on('change' ,function(event){
    event.preventDefault();

    let name = $("#search-event").val();

    $.ajax({
    url: /search/ + name,
    type:"get",
    success:function(response){
        console.log(response);
        if(response) {
        $('.success').text(response.success);
        $("#ajaxform")[0].reset();
    }
    },
    });
});
