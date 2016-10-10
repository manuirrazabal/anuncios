

//CONFIRM ANTES DE ELIMINAR LA EMPRESA
function link_registro(url){
		window.location = url;
}


//CARGA LAS SUBCATEGORIAS DE UNA CATEGORIA.
function cargasubcategoria(ruta){
	var category = document.getElementById("categories").value;
	
	$.post(ruta,{category:category},function(resp){
        $("#loadsubcategories").html(resp);
    });
}

function cargasubcategoria2(){
	var category = document.getElementById("categories").value;
	var path = window.location.hostname;
	var ruta = '../misanuncios/getsubcategories';
	
	$.post(ruta,{category:category},function(resp){
        $("#loadsubcategories").html(resp);
    });
}


function eliminar_anuncio(url){
	if(confirm("\xBFEstas seguro que deseas eliminar este anuncio?")){
		window.location = url;
	}
}


