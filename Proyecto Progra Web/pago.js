const botonCalcular = document.getElementById("calcular-salario");
const salarioInput = document.getElementById("salario");
const diasTrabajadosInput = document.getElementById("dias-trabajados");
const deduccionesInput = document.getElementById("deducciones");
const idInput = document.getElementById("id");


// Obtén el elemento donde mostrarás el resultado
const resultado = document.getElementById("salario-neto");

// Agrega un evento de escucha al formulario para calcular el total
document.getElementById("calcular-salario").addEventListener("click", function () {
    // Obtén los valores ingresados por el usuario
    console.log("Botón Calcular Pago clickeado"); // Verifica si el evento se activa
    const salario = parseFloat(document.getElementById("salario").value);
    const diasTrabajados = parseFloat(document.getElementById("dias-trabajados").value);
    const deducciones = parseFloat(document.getElementById("deducciones").value);

    console.log("Salario:", salario); // Verifica si los valores se capturan correctamente
    console.log("Días Trabajados:", diasTrabajados);
    console.log("Deducciones:", deducciones);
    
    // Calcula el total a pagar
    const subtotalAPagar = ((salario * (diasTrabajados / 30))*0.0483);
    const totalAPagar = (salario * (diasTrabajados / 30)) - subtotalAPagar - deducciones;   
    // Muestra el resultado en el elemento HTML
    document.getElementById("salario-neto").textContent = totalAPagar.toFixed(2); // Ajusta el formato del número si es necesario
    console.log("salario-neto", totalAPagar);

    console.log("Valor de mes antes de obtenerlo:", document.getElementById("mes").value);
    const mes = document.getElementById("mes").value;
    console.log("Valor de mes después de obtenerlo:", mes);

    // Llama a la función para enviar los datos al archivo PHP
    enviarDatosAlPHP(idInput.value, mes, diasTrabajados, deducciones, totalAPagar);
});

function enviarDatosAlPHP(id, mes, diasTrabajados, deducciones, totalAPagar) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "guardar_planilla.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        console.log("Respuesta del servidor:", xhr.responseText);
        if (xhr.status == 200) {
            // Aquí puedes manejar la respuesta del servidor si es necesario
            console.log("Datos enviados al PHP correctamente.");
        } else {
            console.log("La solicitud se completó, pero el servidor devolvió un código de estado diferente a 200.");
        }
    };

    const datos = `id=${id}&mes=${mes}&dias_trabajados=${diasTrabajados}&deducciones=${deducciones}&salario-neto=${totalAPagar}`;
    console.log("Mes:", mes);
    console.log(datos)

    xhr.send(datos);
}