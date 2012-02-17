jQuery(document).ready(function($){
  $('#refresh-links-id').click(function(e){
    e.preventDefault();
    $.post(ajaxurl,{action:'jpb_random_loop'}, function(data){
      $('#refresh').fadeOut(250).empty().append( data ).fadeIn(250);
    });
  });
});