function getNewsAll() {
    var codHTML = "";

    var vTitulo = $("#tituloFiltro").val();
    $("#contenedorNoticias").html("");
    $.ajax({
        data: { titulo: vTitulo },

        type: "POST",
        url: "PHP/noticiaCLIENTE.php",
        dataType: "json",
        success: function(response) {

            for (i = 0; i < response.length; i++) {

                codeHTML = "<div class='card'><img class='card-img-top' src='img/tecnico.jpg' alt=''>";
                codeHTML = codeHTML + "<div class='card-body'>";
                codeHTML = codeHTML + "<h4 class='card-title'>" + response[i].Titulo + "</h4>";
                codeHTML = codeHTML + '<p class="card-text">' + response[i].Copete + '</p>';
                codeHTML = codeHTML + '<p class="card-text">' + response[i].Cuerpo + '</p>';
                

                codeHTML = codeHTML + '</div></div>';
                $("#contenedorNoticias").append(codeHTML);

            

            }


        }
    });
}