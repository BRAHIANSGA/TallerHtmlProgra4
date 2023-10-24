function añadeItems() {
    let lista = document.getElementById('lista');

    // Crear dos nuevos elementos li
    let nuevoElemento1 = document.createElement('li');
    nuevoElemento1.appendChild(document.createTextNode('Nuevo elemento 1'));

    let nuevoElemento2 = document.createElement('li');
    nuevoElemento2.appendChild(document.createTextNode('Nuevo elemento 2'));

    // Añadir los nuevos elementos a la lista como hijos de la listas 
    lista.appendChild(nuevoElemento1);
    lista.appendChild(nuevoElemento2);
  }