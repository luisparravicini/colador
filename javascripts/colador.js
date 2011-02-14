var Colador = new Object();

Colador.blankInput = function(elem) {
  return !$.trim(elem.val()).length;
}

Colador.emptyInput = function(elem) {
  return !elem.val().length;
}

