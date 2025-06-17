function mostrarSeccion(seccionId) {
    const secciones = document.querySelectorAll('.seccion');
    secciones.forEach(seccion => {
        seccion.style.display = 'none';
    });
    const seccionMostrar = document.getElementById(seccionId);
    if (seccionMostrar) {
        seccionMostrar.style.display = 'block';
        
        // Si la sección es "mi perfil", hacemos una solicitud AJAX
        if (seccionId === 'miPerfil') {
            obtenerDatosUsuario();
        }
    }
}

function obtenerDatosUsuario() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'obtener_perfil.php', true); // Archivo PHP que hará la consulta
    xhr.onload = function () {
        if (this.status === 200) {
            // Coloca la respuesta en el div de perfil
            document.getElementById('perfilDatos').innerHTML = this.responseText;
        }
    };
    xhr.send();
}

// AGREGAR REGISTRO PARA LA EXPERIENCIA 
cont = 8;
function AgregarExpe() {
    // Se obtiene la tabla por el id
    var tabla = document.getElementById("tabla_expe");
    // Se inserta una fila al final de la tabla
    var newf = tabla.insertRow(-1); // Se inserta en la ultima fila
    // Se insertan nuevas celdas 
    var cel1 = newf.insertCell(0); // Nombre de la empresa
    var cel2 = newf.insertCell(1); // Cargo
    var cel3 = newf.insertCell(2); // Fecha Incio
    var cel4 = newf.insertCell(3); // Fecha FIn
    var cel5 = newf.insertCell(4); // Observaciones
    var cel6 = newf.insertCell(5); // Telefono
    var cel7 = newf.insertCell(6); // Nombre de contacto
    // Agregar el nombre de la empresa
    var inputNombre = document.createElement("input");
    inputNombre.type = "text";
    inputNombre.name = "n"+cont;
    cont++;
    inputNombre.required = "required";
    inputNombre.className = "form_multi-i";
    cel1.appendChild(inputNombre);

    // Agregar input del cargo
    var inputCargo = document.createElement("input");
    inputCargo.type = "text";
    inputCargo.name = "n"+cont;
    cont++;
    inputCargo.required = "required";
    inputCargo.className = "form_multi-i";
    cel2.appendChild(inputCargo);

    // Agregar input Fecha Incio
    var inputFec_ini = document.createElement("input");
    inputFec_ini.type = "date";
    inputFec_ini.name = "n"+cont;
    cont++;
    inputFec_ini.min = "1950-01-01";
    inputFec_ini.max = "2024-12-31";
    inputFec_ini.required = "required";
    inputFec_ini.className = "form_multi-i";
    cel3.appendChild(inputFec_ini);
    
    // Agregar input Fecha Fin
    var inputFec_fin = document.createElement("input");
    inputFec_fin.type = "date";
    inputFec_fin.name = "n"+cont;
    cont++;
    inputFec_ini.min = "1950-01-01";
    inputFec_ini.max = "2024-12-31";
    inputFec_fin.required = "required";
    inputFec_fin.className = "form_multi-i";
    cel4.appendChild(inputFec_fin); 
    
    // Agregar input Obervaciones
    var inputObser = document.createElement("textarea");
    inputObser.name = "n"+cont;
    cont++;
    inputObser.cols = "10";
    inputObser.rows = "1";
    inputObser.required = "required";
    inputObser.className = "form_multi-i";
    cel5.appendChild(inputObser); 

    // Agregar input del telefono
    var inputTel = document.createElement("input");
    inputTel.type = "number";
    inputTel.name = "n"+cont;
    cont++;
    inputTel.min = "3000000000";
    inputTel.max = "6999999999";
    inputTel.required = "required";
    inputTel.className ="form_multi-i";
    cel6.appendChild(inputTel);
    
    // Agregar input del Nombre contacto
    var inputNombreC = document.createElement("input");
    inputNombreC.type = "text";
    inputNombreC.name = "n"+cont;
    cont++;
    inputNombreC.required = "required";
    inputNombreC.className = "form_multi-i";
    cel7.appendChild(inputNombreC);
}
// AGREGAR REGISTRO EN EL CERTIFICADO
cont2 = 5;
function AgregarCerti(){
    // Se obtiene la tabla por el id
    var tabla = document.getElementById("tabla_certi");
    // Se inserta una fila al final de la tabla
    var newf = tabla.insertRow(-1); // Se inserta en la ultima 
    // Se insertan nuevas celdas 
    var celc1 = newf.insertCell(0); // Certificacion
    var celc2 = newf.insertCell(1); // Nombre Certificado
    var celc3 = newf.insertCell(2); // Organizacion Emisora
    var celc4 = newf.insertCell(3); // Fecha Expedicion
    // Agregar input Certificado
    var inputCerti = document.createElement("input");
    inputCerti.type = "file";
    inputCerti.name = "d"+cont2;
    cont2++;
    inputCerti.required = "required";
    inputCerti.className = "form_multi-i";
    celc1.appendChild(inputCerti);

    // Agregar input Nombre
    var inputNomC = document.createElement("input");
    inputNomC.type = "text";
    inputNomC.name = "d"+cont2;
    cont2++;
    inputNomC.minLength = "3";
    inputNomC.required = "required";
    inputNomC.className = "form_multi-i";
    celc2.appendChild(inputNomC);

    // Agregar input Organizacion
    var inputOrgan = document.createElement("input");
    inputOrgan.type = "text";
    inputOrgan.name = "d"+cont2;
    cont2++;
    inputOrgan.minLength = "3";
    inputOrgan.required = "required";
    inputOrgan.className = "form_multi-i";
    celc3.appendChild(inputOrgan);
    
    // Agregar input Fecha Expedicion
    var inputFec_exp = document.createElement("input");
    inputFec_exp.type = "date";
    inputFec_exp.name = "d"+cont2;
    cont2++;
    inputFec_exp.min = "1950-01-01";
    inputFec_exp.max = "2024-12-31";
    inputFec_exp.required = "required";
    inputFec_exp.className = "form_multi-i";
    celc4.appendChild(inputFec_exp); 
    
}
function eliminar_cert(){
    var tabla = document.getElementById("tabla_certi");
    var filas = tabla.rows.length;
    if (filas > 1) {
        tabla.deleteRow(filas - 1);
    }
    cont -= 6;
}
function eliminar_expe(){
    var tabla = document.getElementById("tabla_expe");
    var filas = tabla.rows.length;
    if (filas > 1) {
        tabla.deleteRow(filas - 1);
    }
    cont -= 4;
}
