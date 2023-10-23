$("#n_boleta, #importe ,#id_categoria").on("change", function () {
  // Obtener el valor del número de boleta
  var nBoleta = $("#n_boleta").val();

  // Obtener el valor de importe
  var importe = $("#importe").val();

  // Obtener el valor de importe
  var categoria = $("#id_categoria").val();

  var datos = new FormData();
  datos.append("validarBoleta", nBoleta);
  datos.append("validarImporte", importe);
  datos.append("validarCategoria", categoria);

  $.ajax({
    url: "ajax/formularios.ajax.php",
    method: "post",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      console.log("Respuesta del servidor:", respuesta);

      if (respuesta) {
        $("#n_boleta").val("");
        $("#importe").val("");
		$("#id_categoria").val("");

        $("#id_categoria").parent().after(`
                        <div class="alert alert-warning">
                            <b>ERROR:</b>
                            La boleta ya existen en la base de datos, por favor verifique nuevamente los datos ingresados.
                        </div>
                    `);
      }
    },
  });
});

