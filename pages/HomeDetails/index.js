$(document).ready(function () {
  $('#delete-btn').click(function () {
    $('#delete-modal').css('visibility', 'visible');
  })

  $('#no').click(function () {
    $('#delete-modal').css('visibility', 'hidden');
  })
})