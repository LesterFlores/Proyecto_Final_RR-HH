document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("planilla-form");
    const idInput = document.getElementById("id");
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
                var fechaCadena = response.Fecha_Ingreso || "";
                // Crear un objeto Date a partir de la cadena
                var fecha = new Date(fechaCadena);
                // Obtener el año, mes y día
                var anio = fecha.getFullYear();
                var mes = fecha.getMonth() + 1; // Los meses se cuentan desde 0 (enero) hasta 11 (diciembre)
                var dia = fecha.getDate() + 1;
                var fechactual = new Date();
                var fechaencadena = fechactual.toDateString();

                var fechaahora = new Date(fechaencadena);
                var diaahora = fechaahora.getDate();
                var anioahora = fechaahora.getFullYear();
                var mesahora = fechaahora.getMonth();


                function mesEnLetras(mesNumero) {
                    const meses = [
                        "enero", "febrero", "marzo", "abril", "mayo", "junio",
                        "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"
                    ];
                
                    if (mesNumero >= 1 && mesNumero <= 12) {
                        return meses[mesNumero - 1];
                    } else {
                        return "Mes inválido";
                    }
                }

                document.getElementById("nombre").textContent = response.Nombres_Empleado || "";
                document.getElementById("apellido").textContent = response.Apellidos_Empleado || "";
                document.getElementById("puesto").textContent = response.Nombre_Area || "";
                document.getElementById("edad").textContent = response.Edad || "";
                document.getElementById("sexo").textContent = response.Nombre_Genero || "";
                document.getElementById("municipio").textContent = response.Nombre_Municipio || "";
                document.getElementById("departamento").textContent = response.Nombre_Departamento || "";
                document.getElementById("direccion").textContent = response.DIreccion || "";
                document.getElementById("dpi").textContent = response.DPI_Empleado || "";
                document.getElementById("dia").textContent = dia;
                document.getElementById("mes").textContent = mesEnLetras(mes);
                document.getElementById("anio").textContent = anio;
                document.getElementById("diactual").textContent = diaahora || "";
                document.getElementById("mesactual").textContent = mesEnLetras(mesahora+1) || "";
                document.getElementById("anioactual").textContent = anioahora || "";
                document.getElementById("salario").textContent = response.Sueldo || "";
                
                

                console.log("Nombre del Empleado: " + response.Nombres_Empleado);
            } else {
                console.error("Error al buscar el empleado.");
            }
        };
        

        // Envía el ID como parámetro POST
        xhr.send("id=" + idInput.value);
        
    });
});