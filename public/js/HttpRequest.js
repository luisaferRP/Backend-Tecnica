class RequestHandler {
  constructor() {
    this.url = "http://localhost/Backend-Tecnica/api/redit.php";
  }

  getHeaders() {
    return {
      "Content-type": "application/json",
      "Access-Control-Allow-Origin": "*"
    };
  }

  http(request, params, method) {
    return new Promise((resolve, reject) => {
      fetch(this.url + (request || ""), {
        headers: this.getHeaders(),
        method,
        body: method !== "GET" ? JSON.stringify(params) : null,
      })
        .then((response) => {
          if (!response.ok) {
            throw Error(response.statusText);
          }
          return response;
        })
        .then((response) => {
          return response.json();
        })
        .then((data) => {
          console.log("Datos recibidos => ", data);
          resolve(data);
        })
        .catch((error) => {
          console.log("Request falló => ", error, reject(new Error(error)));
        });
    });
  }
}
