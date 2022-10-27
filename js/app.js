const ajax = (options) => {

  let { url, method, success, error, data } = options;
  const xhr = new XMLHttpRequest();

  xhr.addEventListener("readystatechange", e => {

    if (xhr.readyState === 4) {
      let json = JSON.parse(xhr.responseText);
      success(json);
    }

  })

  xhr.open(method, url);
  xhr.setRequestHeader("Content-type", "application/json; charset=utf-8");
  xhr.send(data);

}

const $datatable = document.querySelector(".datatable tbody");

const getAllData = () => {

  ajax({
    url: "controllers/getAllData.php",
    method: "GET",
    success: (res) => {
      let contenido = "";
      res.forEach(el => {
        contenido += `<tr>`;
        contenido += `<td>${el.id}</td>`;
        contenido += `<td>${el.nombres}</td>`;
        contenido += `<td>${el.apellidos}</td>`;
        contenido += `<td>${el.edad}</td>`;
        contenido += `<td>${el.genero}</td>`;
        contenido += `<td>`;
        contenido += `<button class="btnEdit" data-id="${el.id}" data-names="${el.nombres}" data-surnames="${el.apellidos}" data-age="${el.edad}" data-genre="${el.genero}">Editar</button>`;
        contenido += `<button class="btnDelete" data-id="${el.id}">Eliminar</button>`;
        contenido += `</td>`;
        contenido += `</tr>`;
      });
      $datatable.innerHTML = contenido;
    }
  })
}

getAllData();

const $formCreate = document.querySelector(".form-create");
const $formTitle = document.querySelector(".form-title");

document.addEventListener("submit", e => {

  if (e.target === $formCreate) {
    e.preventDefault();

    if (!e.target.id.value) {
      let nombres = e.target.nombres.value;
      let apellidos = e.target.apellidos.value;
      let edad = e.target.edad.value;
      let genero = e.target.genero.value;

      const cargaUtil = {
        nombres,
        apellidos,
        edad,
        genero
      }

      const json = JSON.stringify(cargaUtil);

      ajax({
        url: "controllers/createData.php",
        method: "POST",
        success: (res) => {
          alert("Se guardo el registro");
          getAllData();
          $formCreate.reset();
        },
        data: json
      })
    } else {
      // update
      let id = e.target.id.value;
      let nombres = e.target.nombres.value;
      let apellidos = e.target.apellidos.value;
      let edad = e.target.edad.value;
      let genero = e.target.genero.value;

      const cargaUtil = {
        id,
        nombres,
        apellidos,
        edad,
        genero
      }

      const json = JSON.stringify(cargaUtil);
      
      ajax({
        url: "controllers/updateData.php",
        method: "PUT",
        success: (res) => {
          alert("Se actualizo el registro");
          getAllData();
          $formTitle.textContent = "Nuevo Registro";
          $formCreate.reset();          
        },
        data: json
      })
    }


  }

})

document.addEventListener("click", (e) => {
  if (e.target.matches(".btnDelete")) {
    const yesOrNot = confirm("Esta seguro de eliminar el registro?");
    if (yesOrNot) {
      ajax({
        url: `controllers/deleteData.php?id=${e.target.dataset.id}`,
        method: "DELETE",
        success: (res) => {
          console.log(res);
          getAllData();
        }
      })
    }
  }

  if(e.target.matches(".btnEdit")){
    $formTitle.textContent = "Editar Registro";
    $formCreate.id.value = e.target.dataset.id;
    $formCreate.nombres.value = e.target.dataset.names;
    $formCreate.apellidos.value = e.target.dataset.surnames;
    $formCreate.edad.value = e.target.dataset.age;
    $formCreate.genero.value = e.target.dataset.genre;
  }
})