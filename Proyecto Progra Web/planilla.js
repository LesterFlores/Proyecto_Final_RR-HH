document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("planilla-form");
    const idInput = document.getElementById("id");
    const nombreInput = document.getElementById("nombre");
    const puestoInput = document.getElementById("puesto");
    const salarioInput = document.getElementById("salario");
    const cargarButton = document.getElementById("cargar-datos"); // Obtén el botón "Cargar"

    cargarButton.addEventListener("click", function (e)  {
        e.preventDefault(); // Evita la recarga de la página
        console.log("Formulario Enviado")

        // Realiza la solicitud AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "buscar_Empleado.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            
            console.log("Solicitud AJAX enviada con ID: " + idInput.value);
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);

                // Llena los campos con los datos obtenidos
                nombreInput.value = response.Nombres_Empleado || "";
                puestoInput.value = response.Nombre_Area || "";
                salarioInput.value = response.Sueldo || "";

                console.log("Nombre del Area: " + response.Nombre_Area);
            } else {
                console.error("Error al buscar el empleado.");
            }
        };
        

        // Envía el ID como parámetro POST
        xhr.send("id=" + idInput.value);
        
    });
});
