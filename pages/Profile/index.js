$(document).ready(function () {
  $('.picker').click(function () {
    $('#delete-modal').css('visibility', 'visible');
  })

  $('#no').click(function () {
    $('#delete-modal').css('visibility', 'hidden');
  })

  $('#yes').click(function () {
    var url = document.getElementById('url').value;

    console.log(url);
  })
})