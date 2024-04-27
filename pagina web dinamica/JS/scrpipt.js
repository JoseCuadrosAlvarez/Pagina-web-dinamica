document.addEventListener('DOMContentLoaded', () => {
    const formulario = document.getElementById('formulario');

    const contenedorEntradasIdioma = document.getElementById('entradasIdioma');
    const agregarIdiomaBtn = document.getElementById('agregarIdiomaBtn');



    let contadorIdiomas = 1;

    function crearEntradaIdioma() {
        contadorIdiomas++;

        const nuevaEntradaIdioma = document.createElement('div');
        nuevaEntradaIdioma.classList.add('entrada-idioma');
        nuevaEntradaIdioma.innerHTML = `
            <label for="idioma${contadorIdiomas}">Idioma:</label>
            <input type="text" name="idiomas[]" id="idioma${contadorIdiomas}" required>
            <label for="nivel${contadorIdiomas}">Nivel:</label>
            <select name="niveles[]" id="nivel${contadorIdiomas}" required>
                <option value="">Seleccionar nivel</option>
                <option value="nativo">Nativo</option>
                <option value="basico">Básico</option>
                <option value="intermedio">Intermedio</option>
                <option value="avanzado">Avanzado</option>
            </select>
            <button type="button" class="eliminarIdiomaBtn btn">Eliminar</button>
        `;

        contenedorEntradasIdioma.appendChild(nuevaEntradaIdioma);

        // Agregar listener al botón "Eliminar" de la nueva entrada
        const btnEliminar = nuevaEntradaIdioma.querySelector('.eliminarIdiomaBtn');
        btnEliminar.addEventListener('click', () => {
            contenedorEntradasIdioma.removeChild(nuevaEntradaIdioma);
            contadorIdiomas--; // Decrementar el contador al eliminar un idioma
        });
    }
    agregarIdiomaBtn.addEventListener('click', crearEntradaIdioma);



   
    formulario.addEventListener('submit', (e) => {
        e.preventDefault();

        const datosFormulario = new FormData(formulario);

        console.log('Datos del formulario:', datosFormulario);

        // Aquí puedes enviar los datos del formulario mediante fetch o realizar otras acciones necesarias
        fetch('formulario.php', {
            method: 'POST',
            body: datosFormulario
        })
        .then(response => response.json())
        .then(data => {
            console.log('Respuesta del servidor:', data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
