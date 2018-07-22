function vistaEspacio(){
		$("#tabconten1").load("?c=class04deg&m=listar");
	}
	
function vistaAspecto(){
		$("#tabconten2").load("?c=class04listaspecto&m=listar");
	}

function vistaAreaApro(){
		$("#tabconten3").load("?c=class04editaarep&m=listar");
	}

function vistaEditactdes(){
		$("#tabconten4").load("?c=class04editactdes&m=editarActividades");
    }









// coloca el  contenido especifico en un div especifico de mi pagina principal
function vistaRetrasados(){
		$("#tabcontenido1").load("?c=classlistretrasados&m=listarRetrasado");	
	}
function vistaNuevos(){
		$("#tabcontenido2").load("?c=classlistnuevos&m=listarNuevo");
    	}
function vistaInspeccion(){
		$("#tabcontenido3").load("?c=classlistinspeccion&m=listarInspeccion");	
	}
function vistaOficina(){
		$("#tabcontenido4").load("?c=classlistoficina&m=listarOficina");
    }
function vistaAceptados(){
		$("#tabcontenido5").load("?c=classlistaceptados&m=listarAceptados");	
	}
function vistaDenegados(){
		$("#tabcontenido6").load("?c=classlistdenegados&m=listarDenegados");
    }



function cerrarSesion(){
    $.confirm({
    title: 'Cerrando Sesion',
    content: 'Desea continuar?',
    buttons: {
        confirm: function () {
            content: 'Confirmar';
            window.location = "?c=classlogin&m=index";
        },
        cancel: function () {
            
        }
    }
});
}
