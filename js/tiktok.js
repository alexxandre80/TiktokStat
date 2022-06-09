$(document).ready(function(){
    //$('button[class="btn btn-primary"]').click(function(){
    //    alert("Hello World!");

    //    //ajax call php file
    //    $.ajax({
    //        url: "tiktok.php",
    //        type: "POST",
    //        data: {
    //            "hashtagtiktok": $('input[name="hashtagtiktok"]').val()
    //        },
    //        success: function(data, status, xhr){
    //            alert("Data: " + data + "\nStatus: " + status);
    //        },
    //        error: function(xhr, status, error){
    //            alert("Error: " + error);
    //        }
    //    });
    //});

    let num = $('label[for="hashtagtiktok"]').attr('data-source','787');
    console.log(num);

    //num.attr('data-source','1');

    console.log('ddd');

});