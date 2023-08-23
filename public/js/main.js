/**
 * Funcion que llama la Clase HttpRequest
 * @returns Promesa con los datos de la peticion
 */
const obtener_datos = async () => {
  try {
    const requestHandler = new RequestHandler();
    return await new Promise((resolve, reject) => {
      requestHandler
        .http(null, {}, "GET")
        .then((response) => resolve(response));
    });
  } catch (error) { }
};

const validar_imagen = (imagen) => {
  return imagen == "" ? "https://img.freepik.com/free-vector/page-found-concept-illustration_114360-1869.jpg?w=2000" : imagen;
}


//  * Metodo main

const main = async () => {
  //Identificador del elemento
  const redit_list = document.getElementById("redit_list");

  // Funcion que espera los datos
  const { data } = await obtener_datos();

  let estructura = "";

  data.forEach(item => {
    estructura += `
      <div class="card m-2" style="width: 18rem;">
        <img src="${validar_imagen(item.icon_img)}" class="card-img-top" width="50">
          <div class="card-body">
            <h5 class="card-title">${item.id} - ${item.display_name}</h5>
            <p class="card-text">${item.public_description}</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
      </div>
      `;
  });

  redit_list.innerHTML = estructura;
};

main();
