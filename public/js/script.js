$(document).ready(function(){
       $("#alert").hide();

	   console.log("hola desde script js");


	   $(".btn-delete").click(function(e){

	   	  //alert("voy a eliminar..");

	   	  e.preventDefault();

	   	  if(!confirm('Está seguro que desea eliminar?')){
             return false;
          }

          var row   = $(this).parents('tr');
          var form  = $(this).parents('form');
          var url   = form.attr('action');

          $("#alert").show();

          $.post(url, form.serialize(), function(result){

          	 row.fadeOut();
          	 $("#products-total").html(result.total);
          	 $("#alert").html(result.message);

          }).fail(function(){

          	  $("#alert").html("Algo salió mal.");
          });

	   });
});

function mostrar(id){

	alert("en mostrar..." + id);

}
