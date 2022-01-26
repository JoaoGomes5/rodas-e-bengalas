$("button").click(
  function(event) {
     event.preventDefault();
     alert('Picked: '+ $(this).attr('id').slice(4));
  }
);