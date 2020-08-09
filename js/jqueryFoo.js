
//AÑADE NOMBRE ARCHIVO A INPUT FILE
$(document).ready(function () {
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    


    $('.openBtn').on('click',function(){
        $('.modal-body').load('getContent.php?id=2',function(){
            $('#myModal').modal({show:true});
        });
    });
    

});


