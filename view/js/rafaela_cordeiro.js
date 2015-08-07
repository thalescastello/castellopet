$(document).ready(function(){
    imagem();
});

function imagem() {
    $("#imagem").change(function(e) {
        for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
           var file = e.originalEvent.srcElement.files[i];

           var reader = new FileReader();
           reader.onloadend = function() {
               $("#mostrar").attr("src", reader.result);
           }
           reader.readAsDataURL(file);
       }
   });
}
