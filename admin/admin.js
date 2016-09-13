/**
 * Created by gregory on 9/11/16.
 */


$('#home_tab').click(function(){
  hide_all();
  $('#home_page').show();
  $('#home_tab').addClass('selected_tab');
});
$('#about_tab').click(function(){
  hide_all();
  $('#about_page').show();
  $('#about_tab').addClass('selected_tab');

});
$('#portfolio_tab').click(function(){
  hide_all();
  $('#portfolio_page').show();
  $('#portfolio_tab').addClass('selected_tab');
});
$('#members_tab').click(function(){
  hide_all();
  $('#members_page').show();
  $('#members_tab').addClass('selected_tab');
});
$('#resources_tab').click(function(){
  hide_all();
  $('#resources_page').show();
  $('#resources_tab').addClass('selected_tab');
});
$('#contact_tab').click(function(){
  hide_all();
  $('#contact_page').show();
  $('#contact_tab').addClass('selected_tab');
});

function hide_all(){
  $('#home_tab').removeClass('selected_tab');
  $('#about_tab').removeClass('selected_tab');
  $('#portfolio_tab').removeClass('selected_tab');
  $('#members_tab').removeClass('selected_tab');
  $('#resources_tab').removeClass('selected_tab');
  $('#contact_tab').removeClass('selected_tab');
  $('.tab_item_div').each(function(){
    $(this).hide();
  });
}


