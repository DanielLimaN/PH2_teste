$(function() {
  $('#cor').colorpicker({
    color: "#88cc33",
    horizontal: true
  });
});
function exclusao(id) {
  action = 'index.php?acao=delete&id='+id
  $("#exclui").attr("href", action);
}
