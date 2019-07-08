var salones = document.querySelectorAll(".salon");
var modal = document.querySelector(".modal");
var close = document.querySelector(".close");
var idSalon = document.querySelector(".idSalon");
var modal_body = document.querySelector(".modal-body");

Eventlistener();

function Eventlistener() {
    salones.forEach(s => {
        s.addEventListener("click", function() {
            var ref = s;
            AbrirHorario(ref);
        });
    });

    close.addEventListener("click", cerrar);
}

function AbrirHorario(s) {
    console.log(s);
    console.log(s.value);

    //if (s.value == "403") {
    modal_body.innerHTML = `
    <table>
    <tr>
        <th>Hora</th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miercoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
    </tr>
    <tr>
        <td>7:00 a 9:00</td>
        <td>ocupado</td>
        <td>libre</td>
        <td>libre</td>
        <td>libre</td>
        <td>libre</td>
        
    </tr>
    <tr>
        <td>9:00 a 11:00</td>
        <td>ocupado</td>
        <td>libre</td>
        <td>libre</td>
        <td>libre</td>
        <td>libre</td>
    </tr>
    <tr>
        <td>11:00 a 1:00</td>
        <td>olibre</td>
        <td>libre</td>
        <td>libre</td>
        <td>ocupado</td>
        <td>libre</td>
    </tr>
    <tr>
        <td>2:00 a 4:00</td>
        <td>ocupado</td>
        <td>ocupado</td>
        <td>libre</td>
        <td>libre</td>
        <td>libre</td>
    </tr>
    <tr>
        <td>4:00 a 6:00</td>
        <td>libre</td>
        <td>libre</td>
        <td>libre</td>
        <td>libre</td>
        <td>libre</td>
    </tr>
    <tr>
        <td>6:00 a 8:00</td>
        <td>ocupado</td>
        <td>libre</td>
        <td>libre</td>
        <td>ocupado</td>
        <td>libre</td>
    </tr>
    <tr>
        <td>8:00 a 10:00</td>
        <td>ocupado</td>
        <td>libre</td>
        <td>ocupado</td>
        <td>libre</td>
        <td>libre</td>
    </tr>

</table>`;
    //}

    modal.style.display = "block";
}

function cerrar() {
    modal.style.display = "none";
}

function Datos() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'funciones/funciones.php', true);
    xhr.onload = function() {
        if (this.status === 200) {
            console.log(JSON.parse(xhr.responseText));

            const respuesta = JSON.parse(xhr.responseText);

        }
    }
    xhr.send();



}