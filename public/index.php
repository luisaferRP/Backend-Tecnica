<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Reddit</title>
</head>

<body>
    <div class="container">
        <h3>Datos reddit</h3>

        <div class="d-flex flex-wrap" id="redit_list">
            <div class="d-flex justify-content-center flex-column " id="id_loading">
                <p>Almacenando los datos de la URL en la base de datos y obteniendo los datos almacenados...</p>
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/HttpRequest.js"></script>
<script src="js/main.js"></script>

</html>