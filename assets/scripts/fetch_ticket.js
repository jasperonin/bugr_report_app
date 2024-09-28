$(document).ready(function () {
    autoload();
    function autoload(query){
        $.$.ajax({
            type: "POST",
            url: "../../backend/controller/database/query.php",
            data: {query:query},
            success: function (response) {
                $('#result').html(data)
            }
        });
    }
    $('search').keyup(function(){
        const search = $(this).val();
        if(search != ''){
            autoload(search);
        } else {
            autoload();
        }
    });
});