$(document).ready(function () {
    $("#search").keyup(function(){
        var searchText = $(this).val();
        if(searchText!=''){
            $.ajax({
                url: 'module/shop/controller/controller_shop.php',
                type: 'POST',
                data: {query: searchText},
                success: function(response) {
                    $("#show-list").html(response);
                },
                error: function(e) {
                    console.log(e);
                }
            })
        } else {
            $("#show-list").html('');
        }
    })
});