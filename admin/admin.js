/**
 * Created by gregory on 9/11/16.
 */
$('#close_error').click(function(){
   $('#error_message').hide();
});

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
$('#gallery_tab').click(function(){
   hide_all();
    $('#gallery_page').show();
    $('#gallery_tab').addClass('selected_tab');
});

function validate_input(event, type, table, id){
    switch (table){
        case 'event':
            if($('#title_'+ type + '_event'+ id).val() == ""){
                event.preventDefault();
                $('#error_h2').html("The Title cannot be left blank");
                $('#error_message').show();
                break;
            }

            if($('#image_'+ type + '_event'+ id).val() != ""){
                if($('#image_'+ type + '_event'+id)[0].files[0].size > 2000000){
                    event.preventDefault();
                    $('#error_h2').html("The File is too big to upload");
                    $('#error_message').show();
                }
            }
            break;
        case 'project':
            if($('#title_'+ type + '_project'+ id).val() == ""){
                event.preventDefault();
                $('#error_h2').html("The Title cannot be left blank");
                $('#error_message').show();
                break;
            }

            if($('#image_'+ type + '_project'+ id).val() != ""){
                if($('#image_'+ type +'_project'+id)[0].files[0].size > 2000000){
                    event.preventDefault();
                    $('#error_h2').html("The File is too big to upload");
                    $('#error_message').show();
                }
            }
            break;
        case 'meeting':
            //TODO check -- nothing yet
            if($('#days').val() == ""){
                event.preventDefault();
                $('#error_h2').html("The Day cannot be left blank");
                $('#error_message').show();
                break;
            }
            if($('#building').val() == ""){
                event.preventDefault();
                $('#error_h2').html("The Building cannot be left blank");
                $('#error_message').show();
                break;
            }
            if($('#room').val() == ""){
                event.preventDefault();
                $('#error_h2').html("The Room cannot be left blank");
                $('#error_message').show();
                break;
            }
            if($('#year').val() == ""){
                event.preventDefault();
                $('#error_h2').html("The Year cannot be left blank");
                $('#error_message').show();
                break;
            }
            break;
        case 'member':
            //TODO check f_name, l_name, image size, potentially url, position?
            if($('#f_name_'+ type + '_member'+ id).val() == ""){
                event.preventDefault();
                $('#error_h2').html("The First Name cannot be left blank");
                $('#error_message').show();
                break;
            }
            if($('#l_name_'+ type + '_member'+ id).val() == ""){
                event.preventDefault();
                $('#error_h2').html("The Last Name cannot be left blank");
                $('#error_message').show();
                break;
            }

            if($('#image_'+ type + '_member'+ id).val() != ""){
                if($('#image_'+ type +'_member'+id)[0].files[0].size > 2000000){
                    event.preventDefault();
                    $('#error_h2').html("The File is too big to upload");
                    $('#error_message').show();
                }
            }
            break;
        case 'photo':
            //TODO check image size, title,
            if($('#title_'+ type + '_photo'+ id).val() == ""){
                event.preventDefault();
                $('#error_h2').html("The Title cannot be left blank");
                $('#error_message').show();
                break;
            }

            if($('#image_'+ type + '_photo'+ id).val() != ""){
                if($('#image_'+ type +'_photo'+id)[0].files[0].size > 2000000){
                    event.preventDefault();
                    $('#error_h2').html("The File is too big to upload");
                    $('#error_message').show();
                }
            }
            break;
        case 'resource':
            //TODO check title and potentially url
            if($('#title_'+ type + '_resource'+ id).val() == ""){
                event.preventDefault();
                $('#error_h2').html("The Title cannot be left blank");
                $('#error_message').show();
                break;
            }
            break;
    }



}

function hide_all(){
    $('#home_tab').removeClass('selected_tab');
    $('#about_tab').removeClass('selected_tab');
    $('#portfolio_tab').removeClass('selected_tab');
    $('#members_tab').removeClass('selected_tab');
    $('#resources_tab').removeClass('selected_tab');
    $('#contact_tab').removeClass('selected_tab');
    $('#gallery_tab').removeClass('selected_tab');
    $('.tab_item_div').each(function(){
        $(this).hide();
    });
}

function edit_form(tab,id){
    // $('#div_'+tab+'_'+id).hide();
    $('#page_overlay').show();
    $('#form_'+tab+'_'+id).show();
}

function add_div(tab){
    // $('#add_'+tab).hide();
    $('#page_overlay').show();
    $('#add_'+tab+'_form').show();
}

function cancel_edit(event,tab, id){
    event.preventDefault();
    $('#page_overlay').hide();
    // $('#div_'+tab+'_'+id).show();
    $('#form_'+tab+'_'+id).hide();
}
function cancel_add(event,tab){
    event.preventDefault();
    $('#page_overlay').hide();
    $('#add_'+tab+'_form').hide();
    // $('#add_'+tab).show();
}