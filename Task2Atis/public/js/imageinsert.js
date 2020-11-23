
$('.hoho').on('click', function (e) {
  e.preventDefault();
  album = $(this).attr('id');
  thumb = $(this).attr('name')
  console.log(thumb);

  window.location = 'edit?thumb=' + thumb + '&album=' + album;
});
