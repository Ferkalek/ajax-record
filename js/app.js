$(document).ready(function() {
    // Добавляем новую запись, когда произошел клик по кнопке
    $("#add-item").click(function () {
        if($("#message").val()==="") {
            alert("Введите текст!");
            return false;
        }

        var myData = "content_txt="+ $("#message").val(); //post variables

        $.ajax({
            type: "POST", // HTTP метод  POST или GET
            url: "response.php", //url-адрес, по которому будет отправлен запрос
            dataType: "text", // Тип данных,  которые пришлет сервер в ответ на запрос ,например, HTML, json
            data: myData, //данные, которые будут отправлены на сервер (post переменные)
            success: function(response){
                $("#responds").append(response);
                $("#message").val(''); //очищаем текстовое поле после успешной вставки
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //выводим ошибку
            }
        });
    });

    //Удаляем запись при клике по крестику
    $("#responds .del_button").on("click", function() {
        var clickedID = this.id.split("-"); //Разбиваем строку (Split работает аналогично PHP explode)
        var DbNumberID = clickedID[1]; //и получаем номер из массива
        var myData = 'recordToDelete='+ DbNumberID; //выстраиваем  данные для POST

        $.ajax({
            type: "POST", // HTTP метод  POST или GET
            url: "response.php", //url-адрес, по которому будет отправлен запрос
            dataType: "text", // Тип данных
            data: myData, //post переменные
            success: function(){
                $('#item_'+DbNumberID).fadeOut();
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    });
});