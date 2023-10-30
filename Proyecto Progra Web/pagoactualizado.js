const botonCalcular = document.getElementById("actualizar-salario");
const salarioInput = document.getElementById("salario");
const diasTrabajadosInput = document.getElementById("dias-trabajados");
const deduccionesInput = document.getElementById("deducciones");
const idempleadoInput = document.getElementById("id_empleado");
const idInput = document.getElementById("id");

// Obtén el elemento donde mostrarás el resultado
const resultado = document.getElementById("salario-neto");

// Agrega un evento de escucha al formulario para calcular el total
document.getElementById("actualizar-salario").addEventListener("click", function () {
    // Obtén los valores ingresados por el usuario
    console.log("Botón actualizar Pago clickeado"); // Verifica si el evento se activa
    const salario = parseFloat(document.getElementById("salario").value);
    const diasTrabajados = parseFloat(document.getElementById("dias-trabajados").value);
    const deducciones = parseFloat(document.getElementById("deducciones").value);
    const idEmpleado = parseInt(document.getElementById("id_empleado").value);
    
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
    enviarDatosAlPHP(idInput.value, idEmpleado, mes, diasTrabajados, deducciones, totalAPagar);
    
});

function enviarDatosAlPHP(id, idEmpleado, mes, diasTrabajados, deducciones, totalAPagar) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "ac_actualizar_planilla.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (xhr.status == 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    alert("Datos actualizados correctamente: " + response.message);
                    // Redirige al usuario aquí
                    window.location.href = "Lista_Planilla.php";
                } else {
                    alert("Error al actualizar los datos: " + response.message);
                }
            } catch (error) {
                console.error("Error al analizar la respuesta JSON: " + error);
            }
        } else {
            console.log("La solicitud se completó, pero el servidor devolvió un código de estado diferente a 200.");
        }
    };
    // Formatea los datos como una cadena de consulta
    const data = new URLSearchParams();
    data.append('id', id);
    data.append('id_empleado', idEmpleado);
    data.append('dias_trabajados', diasTrabajados);
    data.append('deducciones', deducciones);
    data.append('salario-neto', totalAPagar);
    data.append('mes', mes);

    console.log("id: ", idEmpleado);
    xhr.send(data);
}