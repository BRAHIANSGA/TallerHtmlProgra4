function mostrarCalendario() {
    let calendario = document.getElementById('calendario');
    calendario.style.display = 'block';
    calendario.innerHTML = '<input type="date" id="calendarioInput" onchange="seleccionarFecha()">';

    // Posicionar el calendario cerca del input
    let fechaInput = document.getElementById('fechaInput');
    calendario.style.top = (fechaInput.offsetTop + fechaInput.offsetHeight) + 'px';
    calendario.style.left = fechaInput.offsetLeft + 'px';
  }

  function seleccionarFecha() {
    let calendarioInput = document.getElementById('calendarioInput');
    let fechaSeleccionada = calendarioInput.value;

    let fechaP = document.getElementById('fechaSeleccionada');
    fechaP.innerText = 'Fecha seleccionada: ' + fechaSeleccionada;

    let calendario = document.getElementById('calendario');
    calendario.style.display = 'none';
  }