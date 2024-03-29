let num_productos, cantidad_producto_carr, img, id_imagen, direccion_producto,
    dedicatoria, cuadros_dedicatoria, opciones, id_producto, precio_producto,
    descripción_adicional, porciones, masa, cobertura, sabor, relleno, reqAdicional,
    fecha_valida, dia_mañana, hora_valida;
let html_aux1 = "";
let html_aux2 = "";
let productos = [];
let lupa = document.getElementById("lupa");
let cuadro_búsqueda = document.getElementById("búsqueda");
let contenido_categorías = document.getElementById("Menu_Catalogo");
let catalogo = document.getElementById("Catalogo");
let contenido_principal = document.getElementById("contenido_principal");
let seccion_productos = document.getElementById("seccion_productos");
let estilo = document.getElementById("estilo");
let estilo_Ingreso_Registro = document.createElement("style");
let estilo_aux_CategoríaSel = document.createElement("style");
let estilo_búsqueda = document.createElement("style");
let estilo_aux_EnvíoACarrito = document.createElement("style");
let estilo_carritoSinProductos = document.createElement("style");
let estilo_ver_categorías = document.createElement("style");
let divVentana = document.createElement("div");
let salto = document.getElementById("Salto");
let ubicación_página = window.location.href;
divVentana.id = "VentanaForm";
estilo_búsqueda.id = "estilo_búsqueda";
estilo_aux_EnvíoACarrito.id = "est_EnvíoACarrito";
estilo_ver_categorías.id = "est_ver_categorías";
estilo_aux_CategoríaSel.id = "est_CategoríaSel";
estilo_ver_categorías.innerHTML = "#Catalogo:hover #Menu_Catalogo {visibility: visible;}";
estilo_aux_EnvíoACarrito.innerHTML = `
#seccion_envio p{
    opacity: 1;
}
`;
estilo_búsqueda.innerHTML = `
#búsqueda{
    width: 0px;
    border-color: black;
}
#seccion_busqueda{
    position: initial;
    z-index: 0;
}
`;
estilo_aux_CategoríaSel.innerHTML = `
#seccion_productos{
    padding-bottom: calc(70px - 2.5%);
}
`;
estilo_Ingreso_Registro.innerHTML = `
  #Contenido_Cabecera, #contenido_principal, footer{
    opacity: 0.5;
  }
  #Salto{
    background: #0000007a;
    font-family:Sanseriffic;
    letter-spacing: 1.4px;
    transition: initial;
  }
#VentanaForm{
    width: 98.3vw;
    display: flex;
    justify-content: center;
    height: 75vh;
    align-items: center;
}
#VentanaForm *{
    color: black;
}
#Ventana{
    background-color: aliceblue !important;  
    width: 550px;
    height: 75vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    border-radius: 40px;
    z-index: 1;
}
.Mensaje{
    height: auto !important;
}
.Recuperación{
    height: 58vh !important;
}
#Ventana>*{
    background-color: transparent !important; 
}
label{
    padding: 0px 10px;
}
#SinCuenta{
    display: flex;
    align-items: center;
}
#ingresar, #sin_cuenta{
    padding: 10px;
}
.btnHaciaDerecha{
    display: flex;
    width: 100%;
    justify-content: flex-end;
}
#Ventana>input, #SinCuenta>input, .btnHaciaDerecha>input, #Ventana>button {
    border: 1px solid;
    border-color: black;   
    width: auto;
}
#contraseña_olvidada{
    border-color: transparent;
    text-decoration: underline;
}
.entrada_texto{
    width: 20vw !important;
    cursor: auto !important;
}
#btn_salir{
    border-color: transparent;
    font-size: 30px;
    padding: 0px;
}
h3{
    visibility: hidden;
}
.Mensaje p{
    margin: 0px;
    padding: 22px 0px;
}
.Mensaje h2{
    margin: 0px;
    padding: 10px 0px;
}
.Recuperación h2{
    margin: 0px;
}
`;
estilo_carritoSinProductos.innerHTML = `
#contenido_principal {
    height: 69.9%;
    padding-bottom: 0px;
    align-items: center;
    justify-content: center;
}
`;
catalogo.addEventListener("mouseover", function () {
    if (document.getElementById("est_ver_categorías") == null) {
        document.head.appendChild(estilo_ver_categorías);
    }
});
if (seccion_productos != null) {
    window.onload = AgregarContenido("");
}
if (ubicación_página.substring(ubicación_página.lastIndexOf("/")) == "/CarritoDeCompras.php") {
    window.onload = AgregarContenidoCarrito();
    var btnFinPedido = document.getElementById("fin_pedido");
    var fecha_entrega = document.getElementById("fecha_entrega");
    var error_message = document.getElementById("error-message");
    var error_message2 = document.getElementById("error-message2");
    var error_message3 = document.getElementById("error-message3");
    var hora_entrega = document.getElementById("hora_entrega");
    var inputTime, currentDate;
    fecha_entrega.addEventListener('change', function (event) {
        var dateComponents = event.target.value.split('-');
        var year = parseInt(dateComponents[0], 10);
        var month = parseInt(dateComponents[1], 10) - 1; // Los meses en JavaScript empiezan en 0
        var day = parseInt(dateComponents[2], 10) + 1;
        var inputDate = new Date(Date.UTC(year, month, day));
        if (year < 100) {
            inputDate.setFullYear(inputDate.getFullYear() - 1900);
        }
        currentDate = new Date();
        currentDate.setHours(0, 0, 0, 0);
        inputDate.setHours(0, 0, 0, 0);


        // create a new timeout and store its id
        if (inputDate <= currentDate) {
            error_message3.style.display = "none"; // hide the error message
            error_message.style.display = "block"; // show the error message
            fecha_valida = false;
            btnFinPedido.className = "fin_pedido";
            dia_mañana = false;
        } else {

            fecha_valida = true;
            error_message2.style.display = "none"; // hide the error message
            error_message3.style.display = "none"; // hide the error message
            error_message.style.display = "none"; // hide the error message
            let aux_currentDate = new Date();
            aux_currentDate.setHours(0, 0, 0, 0);
            aux_currentDate.setDate(aux_currentDate.getDate() + 1);
            
            if (inputDate.getTime() == aux_currentDate.getTime()) {
                dia_mañana = true;
            } else {
                dia_mañana = false;
            }
            comprobacionHora();
        }
    });
    hora_entrega.addEventListener('input', function (event) {
        comprobacionHora();
        setTimeout(function () {
            hora_entrega.blur();
        }, 1010);

    });

}
function comprobacionHora() {
    currentDate = new Date();
    inputTime = hora_entrega.value + "";
    let [hours, mins] = inputTime.split(":");
    var inputDate = new Date();
    inputDate.setHours(hours);
    inputDate.setMinutes(mins);
    hora_entrega.value = hours + ":" + mins;
    if (inputDate == "Invalid Date") {
        hora_valida = false;
    } else {
        if (dia_mañana == true) {
            if (inputDate.getTime() < currentDate.getTime()) {
                error_message2.style.display = "block"; // show the error message
                btnFinPedido.className = "fin_pedido";
                hora_valida = false;
            } else {
                error_message2.style.display = "none"; // hide the error message
                btnFinPedido.removeAttribute("class");
                hora_valida = true;
            }
        } else {
            hora_valida = true;
            if (fecha_valida == true) {
                btnFinPedido.removeAttribute("class");
                error_message2.style.display = "none"; // hide the error message
            } else {
                error_message3.style.display = "block"; // show the error message  
            }
        }
    }
}
if (contenido_categorías != null) {
    let tamaño = contenido_categorías.children.length;
    for (let i = 0; i < tamaño; i++) {
        contenido_categorías.children[i].addEventListener("click", funcCategoríaSeleccionada);
    }
}
function AgregarContenido(CategoríaSeleccionada) {
    seccion_productos = document.getElementById("seccion_productos");
    if (CategoríaSeleccionada == "") {
        let myData = myAsyncFunction("");
        myData.then(
            result => {
                // Verificar si el resultado tiene la propiedad error
                if (result.error) {
                    // Mostrar el error por consola
                    console.log(result.error);
                } else {
                    // Procesar el resultado como un arreglo de objetos
                    let div_aux = document.createElement("div");
                    for (let i = 0; i < result.length; i++) {
                        let div = document.createElement("div");
                        let imagen = document.createElement("img");
                        let h3 = document.createElement("h3");
                        imagen.src = result[i].img;
                        h3.innerHTML = "Mostrar más información";
                        div.appendChild(h3);
                        h3.addEventListener("click", ProductoSeleccionado);
                        div.appendChild(imagen);
                        div_aux.appendChild(div);
                    }
                    seccion_productos.appendChild(div_aux);
                }
            }
        );

    } else {
        if (CategoríaSeleccionada == " Navidad") {
            CategoríaSeleccionada = CategoríaSeleccionada.substring(1);
        }
        let myData = myAsyncFunction(CategoríaSeleccionada);
        myData.then(result => {
            let div_aux = document.createElement("div");
            for (let i = 0; i < result.length; i++) {
                let div = document.createElement("div");
                let imagen = document.createElement("img");
                let h3 = document.createElement("h3");
                imagen.src = result[i].img;
                h3.innerHTML = "Mostrar más información";
                div.appendChild(h3);
                h3.addEventListener("click", ProductoSeleccionado);
                div.appendChild(imagen);
                div_aux.appendChild(div);
            }
            seccion_productos.appendChild(div_aux);
        }
        );
    }
}
function myAsyncFunction(imagen) {
    let encodedImagen;
    encodedImagen = imagen;
    if (imagen != undefined) {
        if (imagen.includes("http")) {
            encodedImagen = encodeURIComponent(imagen);
        }
    }
    return new Promise((resolve, reject) => {

        fetch("../php/ConsultaProductoSeleccionado.php?imagen=" + encodedImagen)
            .then(response => response.json())
            .then(data => {
                resolve(data);
            })
            .catch(error => {
                // mostrar el mensaje y la pila del error
                console.error("MENSAJE DE ERROR: " + error.message + " | stack: " + error.stack);
                // o mostrar el error completo
                console.error(error);
            });
    });
}

function myAsyncFunction2(id, cantidad, dedicatoria, carritoInfo, reqAdicional) {
    return new Promise((resolve, reject) => {
        fetch("../php/ConsultaIngresoACarrito.php?&id=" + id + "&cantidad=" + cantidad + "&dedicatoria=" + dedicatoria + "&carritoInfo=" + carritoInfo + "&espAdicional=" + reqAdicional)
            .then(response => response.json())
            .then(data => {
                resolve(data);
            })
            .catch(error => reject(error));
    });
}

function myAsyncFunction3() {
    return new Promise((resolve, reject) => {
        fetch("../php/SacarDatosDeCarrito.php")
            .then(response => response.json())
            .then(data => {
                resolve(data);
            })
            .catch(error => reject(error));
    });
}

function quitarPlaceHolder(event) {
    let entrada_texto = event.target;
    entrada_texto.placeholder = "";
}
function disminuirCantidadProducto() {
    colSelect = document.getElementById("num_dedicatorias").parentElement;
    cantidadInput = document.getElementById("cantidad");
    if (cantidadInput.value >= 2) {
        cantidadInput.value = parseInt(cantidadInput.value) - 1;
    }
    Dedicatorias(cantidadInput);
    document.getElementById("cuadros_dedicatoria").innerHTML = `
    <input type="text" placeholder="Feliz Cumpleaños..." name="dedicatoria" onclick="quitarPlaceHolder(event)">
    `;
    if (cantidadInput.value == 1) {
        texto_dedicatoria = document.getElementById("texto_dedicatoria");
        texto_dedicatoria.innerHTML = "<b>Dedicatoria para el pedido:</b>";
        colSelect.style = "display:none";
    }
}
function aumentarCantidadProducto() {
    cantidadInput = document.getElementById("cantidad");
    cantidadInput.value = parseInt(cantidadInput.value) + 1;
    Dedicatorias(cantidadInput);
    document.getElementById("cuadros_dedicatoria").innerHTML = `
    <input type="text" placeholder="Feliz Cumpleaños..." name="dedicatoria" onclick="quitarPlaceHolder(event)">
    `;
    texto_dedicatoria = document.getElementById("texto_dedicatoria");
    texto_dedicatoria.innerHTML = "Cantidad de dedicatorias";
    colSelect = document.getElementById("num_dedicatorias").parentElement;
    colSelect.removeAttribute("style");
}
function Dedicatorias(cantidadInput) {
    texto_dedicatoria = document.getElementById("texto_dedicatoria");
    opciones = document.getElementById("num_dedicatorias");
    html_aux1 = "";
    if (opciones != null && opciones != undefined) {
        opciones.remove();
    }
    for (let i = 0; i < cantidadInput.value; i++) {
        html_aux1 += '<option value="' + (i + 1) + '">' + (i + 1) + '</option>';
    }
    texto_dedicatoria.nextSibling.nextSibling.innerHTML = `
    <select id="num_dedicatorias" onchange="AgregarHermanosSelect()">
        `+ html_aux1 + `
    </select>`;
}
function AgregarHermanosSelect(arreglo_dedicatorias) {
    let límite;
    let dedicatoria = "";
    html_aux2 = "";
    dedicatorias = document.getElementsByName("dedicatoria");
    let select_dedicatorias = document.getElementById("num_dedicatorias");
    límite = select_dedicatorias.value - dedicatorias.length;
    if (select_dedicatorias.value - dedicatorias.length >= 1) {
        for (let i = 1; i <= límite; i++) {
            if (arreglo_dedicatorias == undefined) {
                html_aux2 += '<input type="text" placeholder="Feliz Cumpleaños..." name="dedicatoria">';
            } else {
                if (arreglo_dedicatorias[i] != "Sin dedicatoria") {
                    dedicatoria = arreglo_dedicatorias[i];
                } else {
                    dedicatoria = "";
                }
                html_aux2 += '<input type="text" placeholder="Feliz Cumpleaños..." name="dedicatoria" value="' + dedicatoria + '">';
            }
        }
        dedicatorias[dedicatorias.length - 1].insertAdjacentHTML("afterend", html_aux2);
    } else {
        límite = límite * (-1);
        cuadros_dedicatoria = document.getElementById("cuadros_dedicatoria");
        for (let i = 1; i <= límite; i++) {
            cuadros_dedicatoria.children[cuadros_dedicatoria.children.length - 1].remove();
        }
    }
    for (let i = 0; i < dedicatorias.length; i++) {
        dedicatorias[i].addEventListener("click", quitarPlaceHolder);
    }
}
function mostrarBúsqueda() {
    let est_búsqueda = document.getElementById("estilo_búsqueda");
    let check1 = document.getElementById("check");
    let check = document.getElementById("check2");
    if (est_búsqueda != null) {
        check.checked = false;
        est_búsqueda.remove();
        cuadro_búsqueda.removeAttribute("style");
    } else {
        if (window.innerWidth <= 1013) {
            check1.checked = true;
        }
        check.checked = true;
        document.head.appendChild(estilo_búsqueda);
        let width = 0;
        const intervalId = setInterval(function () {
            if (width == 0) {
                cuadro_búsqueda.style.width = "0px";
            }
            width += 1;
            cuadro_búsqueda.style.width = width + "px";
            if (width >= 110) {
                clearInterval(intervalId);
            }
        }, 0.01);
    }

}
function ProductoSeleccionado(event, imagen, carritoInfo, cantidad_productos, arreglo_dedicatorias, req_Adicional) {
    let primer_dedicatoria = "";
    let myData;
    if (cantidad_productos == undefined) {
        cantidad_productos = "1";
    }
    if (arreglo_dedicatorias != undefined) {
        if (arreglo_dedicatorias[0] != "Sin dedicatoria") {
            primer_dedicatoria = arreglo_dedicatorias[0];
        }
    }
    if (carritoInfo == "si") {
        carritoInfo = "Actualizar información";
        myData = myAsyncFunction(imagen);
        img = imagen;
    } else {
        const srcString = event.target.nextSibling.src;
        carritoInfo = "Añadir al carrito";
        req_Adicional = "";
        if (srcString.includes("imagenes")) {
            let dirImg;
            let num = srcString.indexOf("/imagenes");
            dirImg = ".." + srcString.substring(num);
            myData = myAsyncFunction(dirImg);
        } else {
            myData = myAsyncFunction(event.target.nextSibling.src);
        }
        img = event.target.nextSibling.src;
    }
    VerificaciónCuadroDeBúsqueda();
    estilo = document.getElementById("estilo");
    estilo.href = "../styles/estilo_Modificación_ProductoSeleccionado.css";
    myData.then(result => {
        id_producto = result[0].codigo_producto;
        precio_producto = result[0].precio;
        descripción_adicional = result[0].descripcion;
        porciones = result[0].porciones;
        masa = result[0].masa;
        cobertura = result[0].cobertura;
        sabor = result[0].sabor;
        relleno = result[0].relleno;
        contenido_principal.innerHTML = `
            <div id="DestacadoPrincipal">
                <img src="`+ img + `" alt="imagenes">
                <p>$`+ precio_producto + `</p>
                <div id="seccion_cantidad">
                    <label for="cantidad" id="label_cantidad">Cantidad:&nbsp;&nbsp;&nbsp;</label>
                    <input type="button" id="disminuir_cantidad" value="-" onclick="disminuirCantidadProducto()">
                    <input type="number" id="cantidad" name="cantidad" value="`+ cantidad_productos + `" readonly>
                    <input type="button" id="aumentar_cantidad" value="+" onclick="aumentarCantidadProducto()">
                </div>
                <div id="seccion_envio">
                    <input type="button" value="`+ carritoInfo + `" onclick="enviarInfoACarrito('` + carritoInfo + `')">
                    <div>
                        <p>Producto/s ingresado/s</p>
                    </div>
                </div>
            </div>
            <div id="infoDetallada">
                <div>
                <p id="infoAdicional">`+ descripción_adicional + `</p>
                <div class="tabla_info">
                    <div class="fila">
                        <p class="col" id="texto_dedicatoria">Dedicatoria para el pedido:</p>
                        <div class="col">
                        </div>
                        <div class="col" id="cuadros_dedicatoria">
                            <input type="text" placeholder="Feliz Cumpleaños..." name="dedicatoria" value="`+ primer_dedicatoria + `">
                        </div>              
                    </div>
                </div>
                <div class="tabla_info">
                    
                    <div class="fila">
                        <p class="col">Porciones:</p>
                        <p class="col">`+ porciones + `</p>
                    </div>
                    <div class="fila">
                        <p class="col">Tipo de pastel:</p>
                        <p class="col">`+ masa + `</p>
                        <p class="col">Cobertura:</p>
                        <p class="col">`+ cobertura + `</p>
                    </div>
                    <div class="fila">
                        <p class="col">Sabor:</p>
                        <p class="col">`+ sabor + `</p>
                        <p class="col">Relleno:</p>
                        <p class="col">`+ relleno + `</p>
                    </div>
                    <div class="fila">
                        <p class="col" id="txtadicional">Especificación adicional:</p>
                        <div class="col" id="adicional">
                            <textarea name="espAdicional" id="espAdicional" placeholder="(Opcional)">`+ req_Adicional + `</textarea>
                        </div>
                        
                    </div>
                </div>
                </div>
            </div>
            `;
        if (descripción_adicional == "") {
            document.getElementById("infoAdicional").remove();
        }
        let dedicatorias = document.getElementsByName("dedicatoria");
        for (let i = 0; i < dedicatorias.length; i++) {
            dedicatorias[i].addEventListener("click", quitarPlaceHolder);
        }
        document.getElementById("espAdicional").addEventListener("click", quitarPlaceHolder);
        if (carritoInfo == "Actualizar información") {
            cantidadInput = document.getElementById("cantidad");
            Dedicatorias(cantidadInput);
            opciones = document.getElementById("num_dedicatorias");
            opciones.value = arreglo_dedicatorias.length;
            AgregarHermanosSelect(arreglo_dedicatorias)
        }
    });
}
function funcCategoríaSeleccionada(event) {
    document.getElementById("est_ver_categorías").remove();
    VerificaciónCuadroDeBúsqueda();
    let título = event.target.value;
    let h1 = document.getElementsByTagName("h1")[0];
    let destacado_principal = document.getElementById("DestacadoPrincipal");
    seccion_productos = document.getElementById("seccion_productos");
    if (document.getElementById("est_CategoríaSel") == null) {
        document.head.appendChild(estilo_aux_CategoríaSel);
    }
    if (destacado_principal != null) {
        destacado_principal.remove();
    }
    if (seccion_productos != null) {
        document.querySelector("#seccion_productos>div").remove();
    } else {
        contenido_principal.innerHTML = `
        <h1 align="center">`+ título + `</h1>
        <section id="seccion_productos"></section>
        `;
        document.getElementById("estilo").href = "../styles/estilo_Modificación_Index.css";;
    }
    if (h1 == undefined) {
        h1 = document.getElementsByTagName("h1")[0];
    }
    h1.innerHTML = título;
    h1.align = "center";
    AgregarContenido(título);
}
function VerificaciónCuadroDeBúsqueda() {
    let est_búsqueda = document.getElementById("estilo_búsqueda");
    if (est_búsqueda != null) {
        est_búsqueda.remove();
        cuadro_búsqueda.removeAttribute("style");
    }
}
function ProductosNoIngresados() {
    document.head.appendChild(estilo_carritoSinProductos);
    contenido_principal.innerHTML = `
    <h1>No se ha ingresado productos</h1>
    `;
}
function finalizarPedido() {
    // MostrarMensaje("Por favor déjese de mamadas");
    if (fecha_valida == true && hora_valida == true) {
        fecha_entrega.disabled=true;
        hora_entrega.disabled=true;
        let tabla_info = document.getElementsByClassName("tabla_info")[1];
        let scripts = document.getElementsByTagName("script");
        let script = document.createElement("script");
        let contenedorBtnPaypal = document.createElement("div");
        contenedorBtnPaypal.id = "paypal-button-container";
        contenedorBtnPaypal.style.width = "25vw";
        script.src = "../script/script_FinalizaciónDePedido.js";
        btnFinPedido.insertAdjacentElement("afterend", contenedorBtnPaypal);
        contenedorBtnPaypal.insertAdjacentElement("afterend", script);
        btnFinPedido.remove();
        scripts[scripts.length - 1].remove();
        tabla_info.insertAdjacentHTML("afterend", `
    <h2>Datos para generación de comprobante:</h2>
    <label for="cedula">Cédula:</label>
    <input type="text" name="cedula" id="cedula" class="entrada_texto">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" class="entrada_texto">
    <label for="direccion">Dirección domiciliaria:</label>
    <input type="text" name="direccion" id="direccion" class="entrada_texto">
    <label for="telefono">Teléfono móvil:</label>
    <input type="tel" name="telefono" id="telefono" class="entrada_texto">
    <h2>Información de pago:</h2>
    `);
    } else {
        alert("Datos inválidos");
    }
}
function enviarInfoACarrito(carritoInfo) {
    dedicatoria = "";
    reqAdicional = document.getElementById("espAdicional").value;
    dedicatorias = document.getElementsByName("dedicatoria");
    let i = 0
    for (; i < dedicatorias.length - 1; i++) {
        if (dedicatorias[i].value == "") {
            dedicatoria += "(Sin dedicatoria),";
        } else {
            dedicatoria += '(' + dedicatorias[i].value + '),';
        }
    }
    if (dedicatorias[i].value == "") {
        dedicatoria += "(Sin dedicatoria)";
    } else {
        dedicatoria += '(' + dedicatorias[i].value + ')';
    }
    cantidad_producto_carr = document.getElementById("cantidad").value;
    let myData = myAsyncFunction2(id_producto, cantidad_producto_carr, dedicatoria, carritoInfo, reqAdicional);
    myData.then(result => {
        if (result.usuario == "noIngresado") {
            MostrarMensaje("Por favor inicia sesión para poder ingresar productos al carrito");
        } else {
            if (carritoInfo == "Actualizar información") {
                window.location.href = "../vistas/CarritoDeCompras.php";
            } else {
                document.head.appendChild(estilo_aux_EnvíoACarrito);
                setTimeout(function () {
                    document.getElementById("est_EnvíoACarrito").remove();
                }, 2500);
            }
        }
    });
}
function MostrarVentanaDeIngreso() {
    if (event.target.id != "RegresarAIngreso") {
        document.head.appendChild(estilo_Ingreso_Registro);
    }
    divVentana.innerHTML = `
            <form action="../php/enviar_correo_login.php" method="POST" class="Formulario_Ingreso" id="Ventana">
                <div class="btnHaciaDerecha">
                    <input type="button" value="✕" id="btn_salir" onclick="CerrarVentana()">
                </div>
                <form action="" id="Ventana">
                    <h2>Ingresar</h2>
                    <label for="correo">Correo electrónico:</label>
                    <input type="email" id="correo" name="Correo" class="entrada_texto">
                    <label for="contraseña">Contraseña:</label>
                    <input type="password" id="contraseña" name="Contraseña" class="entrada_texto">
                    <div class="btnHaciaDerecha">
                        <input type="button" id="contraseña_olvidada" value="¿Olvidaste tu contraseña?" onclick="MostrarVentanaRecuperación_Correo()">
                    </div>
                    <button>Ingresar</button>
                    <div id="SinCuenta">
                        <label for="contraseña">¿No tienes una cuenta?</label>
                        <input type="button" id="sin_cuenta" value="Registrarse" onclick="MostrarVentanaDeRegistro()">
                    </div>
                </form>
            </div>
    `;
    salto.appendChild(divVentana);
}
//AQUI EMPIEZA LA VENTANA DE REGISTRO
function MostrarVentanaDeRegistro() {
    salto.innerHTML = "";
    divVentana.innerHTML = `
    <div id="Ventana">
    <div class="btnHaciaDerecha">
        <input type="button" value="✕" id="btn_salir" onclick="CerrarVentana()">
    </div>
    <!-- Esta parte está modificada por que debía estar metido esto dentro de un form para usar un POST -->
    <form action="../php/enviar_correo_registro.php" method="POST" class="Formulario_Registro" id="Ventana">
        <h2>Registrarse</h2>
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="Correo" class="entrada_texto">
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="Contraseña" class="entrada_texto">
        <label for="rep_contraseña">Repita la contraseña:</label>
        <input type="password" id="rep_contraseña" name="Rep_contraseña" class="entrada_texto">
        <!------LA FUNCIÓN runQuery está en el archivo script_Registro.js------>
        <button id="registro">Registrarse</button>
        <label for="RegresarAIngreso">¿Ya tienes una cuenta?</label>
        <input type="button" value="Ingresar" id="RegresarAIngreso" onclick="MostrarVentanaDeIngreso()">
        <p><b>Importante: </b>La contraseña debe tener al menos una letra mayúscula, una letra minúscula, un número y un signo especial</p>
        <script src="../script/script_Registro.js"></script>
    </form>
</div>
    `;
    salto.appendChild(divVentana);
}

function MostrarVentanaRecuperación_Correo() {
    salto.innerHTML = "";
    divVentana.innerHTML = `
    <form id="Ventana" action="../php/confirmacion.php" method="POST" class="Recuperación">
        <div class="btnHaciaDerecha">
            <input type="button" value="✕" id="btn_salir"  onclick="CerrarVentana(event)">
        </div>
        <h2>RECUPERACIÓN DE CUENTA</h2>
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="Correo" class="entrada_texto">
        <button id="finalización_registro">Enviar código al correo</button>
        <div></div>
    </form>
    `;
    salto.appendChild(divVentana);
}
function MostrarMensaje(mensaje) {
    document.head.appendChild(estilo_Ingreso_Registro);
    salto.innerHTML = "";
    divVentana.innerHTML = `
    <form class="Mensaje" id="Ventana">
        <div class="btnHaciaDerecha">
            <input type="button" value="✕" id="btn_salir" onclick="CerrarVentana()">
        </div>  
        <h2>Estimado usuario</h2>
        <p>`+ mensaje + `</p>
    </form>
    `;
    salto.appendChild(divVentana);
}
function CerrarVentana() {
    let estilo_aux = document.getElementsByTagName("style")[1];
    salto.innerHTML = "";
    if (estilo_aux != null || estilo_aux != undefined) {
        estilo_aux.remove();
    } else {
        document.getElementsByTagName("style")[0].remove();
    }
    let opera_bug = document.getElementById("operaUserStyle");
    if (opera_bug != null && opera_bug != undefined) {
        opera_bug.remove();
    }
}
function AgregarContenidoCarrito() {
    let primera_fila = document.getElementById("primera_fila");
    let myData = myAsyncFunction3();
    myData.then(result => {
        var datos_carrito_string = JSON.stringify(result);
        localStorage.setItem('datos_carrito',datos_carrito_string)
        if (result.usuario == "noIngresado" || result.length == 0) {
            ProductosNoIngresados();
        }
        for (let i = 0; i < result.length; i++) {
            primera_fila.insertAdjacentHTML("afterend", `
        <form class="fila" action="../php/EliminarItemCarrito.php" method= "POST">
                        <div class="col" id="seccion_imagen">
                            <img src="`+ result[i].IMG + `" alt="Producto">
                        </div>   
                            <p class="col" name="dedicatoria">`+ result[i].DEDICATORIA + `</p>
                            <p class="col" name="masa">`+ result[i].masa + `</p>
                            <p class="col" name="sabor">`+ result[i].sabor + `</p>
                            <p class="col" name="relleno">`+ result[i].relleno + `</p>
                            <p class="col" name="cobertura">`+ result[i].cobertura + `</p>
                            <p class="col" name="precio">$`+ result[i].precio + `</p>
                            <p class="col" name="cantidad">`+ result[i].CANTIDAD_CLIENTE + `</p>                   
                            <div class="col" id="seccion_eliminar">
                                <div>
                                    <input type="hidden" name="id_canasta" value="`+ result[i].ID_CANASTA + `">
                                    
                                    <input type="button" id="editarCarrito" class="btn_eliminar" value="✏️">
                                    <input type="hidden" value="`+ result[i].IMG + `" id="test">
                                    <input type="hidden" name="adicional" id="req_Adicional" value="`+ result[i].ESPECIFICACION_ADICIONAL + `">
                                    <button class="btn_eliminar"><img src="../imagenes/Borrador.png" id="borrador"></button>
                                </div>
                            </div>      
                    </form>
        `);
            document.getElementById("editarCarrito").addEventListener("click", editarInfoProductoCarrito);
        }
    });
}
function irAIndex() {
    window.location.href = "../vistas/Index.php";
}
function editarInfoProductoCarrito(event) {
    let enlaceImg = event.target.nextSibling.nextSibling.value;
    let string_dedicatorias = document.querySelector("p[name='dedicatoria']").innerHTML;
    const sin_parentesis_extremos = string_dedicatorias.replace(/^\(|\)$/g, "");
    const arreglo_dedicatorias = sin_parentesis_extremos.split("),(");
    reqAdicional = event.target.nextSibling.nextSibling.nextSibling.nextSibling.value;
    cantidadInput = document.querySelector("p[name='cantidad']").innerHTML;
    ProductoSeleccionado(event, enlaceImg, "si", cantidadInput, arreglo_dedicatorias, reqAdicional);
}
