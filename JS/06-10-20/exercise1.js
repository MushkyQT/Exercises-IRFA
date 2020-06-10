$(document).ready(function () {
  // Selecteurs du premeir cours
  $('[title~="animal"]').css("border-radius", "20px");
  $('[src^="img/c"]').css("width", "15%").css("border-color", "orange");
  $('[border*="1"]').css("border-color", "blue");

  // Selecteurs hierarchiques
  $("li:nth-child(2)").css("color", "turquoise");
  $("li > ul").css("border", "2px solid red");
  $("li:first-child").css("color", "orange");

  // Pseduo-selecteurs d'elements selectionnes
  $("p:eq(3)").css("opacity", "50%");
  $("p:lt(2)").css("opacity", "30%");
  $("p:even").css("border", "2px solid blue");

  // Selecteurs d'elements particuliers
  $(":header:not(h2)").hide();
  $(":header:not(h1)").show();

  // Pseudo-selecteurs specifiques aux formulaires
  $(":input[type~='text']").css("background", "lightgreen");
  document.forms[0].nom.focus();
  $(":focus").css("border", "3px solid yellow");

  // Selecteurs tableaux
  $("td:contains('X')").css("background-color", "orange");
  $("td:empty").css("background-color", "teal");
});
