<?php
    header("HTTP/1.1 403 NOT ALLOWED")
?>
<html>
    <head>
        <title>Zephyapi</title>
    </head>
    <script type="text/javascript">
        var count = 1;
        function agregar_foto(){
            var photo_div = document.getElementById("photo_div");
            const new_photo_label = document.createElement("label");
            new_photo_label.setAttribute("for","foto"+count+": ");
            new_photo_label.innerHTML = "foto"+count;
            const new_photo = document.createElement("input");
            new_photo.type = "file";
            new_photo.name = "foto"+count;
            photo_div.appendChild(new_photo_label);
            photo_div.appendChild(new_photo);
            photo_div.appendChild(document.createElement("br"));
            count++;
        }
    </script>
    <body>
        <form action="productos.php" method="post" style="display: table;">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre">
            <br>
            <label for="tipo">Tipo: </label>
            <input type="text" name="tipo">
            <br>
            <label for="precio">Precio: </label>
            <input type="text" name="precio">
            <br>
            <label for="material">Material: </label>
            <input type="text" name="material">
            <br>
            <div id="tallas">
                <label for="tallas">Tallas: </label>
                <input type="text" name="tallas">
            </div>
            <br>
            <div>
                <label for="foto0">foto0: </label>
                <input type="file" name="foto0">
                <div id="photo_div">

                </div>
                <input type="button" value="Agregar foto" onclick="agregar_foto()">
            </div>
            <input type="submit" value="subir">
        </form>
    </body>
</html>