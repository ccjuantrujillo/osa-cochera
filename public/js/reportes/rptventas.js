/* *********************************************************************************
Autor: Martin Trujillo
/* ******************************************************************************** */
$(document).ready(function () {
  $("#txtModulo").change(function () {
    let arrctrl = $(this).val().split("/");
    let ctrl = arrctrl[2];
    alert(ctrl);
  });
});