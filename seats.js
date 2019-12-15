
var selected = []; 
$('.cinema-seats .seat').on('click', function() {
    $(this).toggleClass('active');
    selected.push($(this).attr('id'));
    alert(selected);
  });