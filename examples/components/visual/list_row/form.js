  /**
   * This script need 
   */

/*
 function required! this function run component form init
 */
 function component_init_form(form_data,component_data,page_data) {
	 console.log(form_data);
    $(".title_font_size_value").html(form_data.title_font_size);
    $(".subtitle_font_size_value").html(form_data.subtitle_font_size);
    $(".preview_font_size_value").html(form_data.preview_font_size);
    $(".note_font_size_value").html(form_data.note_font_size);
}


/*
 *** function required! this function run after every changes and run after first open component form
 */
function component_data_changed(form_data,component_data,page_data) {
    $(".title_font_size_value").html(form_data.title_font_size);
    $(".subtitle_font_size_value").html(form_data.subtitle_font_size);
    $(".preview_font_size_value").html(form_data.preview_font_size);
    $(".note_font_size_value").html(form_data.note_font_size);

}



/*
 *** function required! this function run after selected color in color dialog
 */
function color_selected(button, color_result) {

	if (!jQuery.isEmptyObject(color_result)) {

	    //if divider-color-button clicked
        if (button.id=="divider-color-button") {
            $("#divider-color-block .color-block").css('background-color', color_result.color_value);
            $("#divider-color-block input[name='dividere_color']").val(color_result.color_name);
            $("#divider-color-block input[name='divider_color_value']").val(color_result.color_value);
        }
		
        if (button.id=="title-color-button") {
            $("#title-color-block .color-block").css('background-color', color_result.color_value);
            $("#title-color-block input[name='title_color']").val(color_result.color_name);
            $("#title-color-block input[name='title_color_value']").val(color_result.color_value);
        }
		
        if (button.id=="subtitle-color-button") {
            $("#subtitle-color-block .color-block").css('background-color', color_result.color_value);
            $("#subtitle-color-block input[name='subtitle_color']").val(color_result.color_name);
            $("#subtitle-color-block input[name='subtitle_color_value']").val(color_result.color_value);
        }
		
        if (button.id=="note-color-button") {
            $("#note-color-block .color-block").css('background-color', color_result.color_value);
            $("#note-color-block input[name='note_color']").val(color_result.color_name);
            $("#note-color-block input[name='note_color_value']").val(color_result.color_value);
        }
		
        if (button.id=="preview-color-button") {
            $("#preview-color-block .color-block").css('background-color', color_result.color_value);
            $("#preview-color-block input[name='preview_color']").val(color_result.color_name);
            $("#preview-color-block input[name='preview_color_value']").val(color_result.color_value);
        }		
	}
}

/*
 *** function required! this function run after selected icon in icon dialog
 */
function icon_selected(button, icon_result) {
	
		if (!jQuery.isEmptyObject(icon_result)) {

	}
}

/*
 *** function required! this function run after entered text in text dialog
 */
function strings_inputted(button, result) {

	if (!jQuery.isEmptyObject(result)) {

	}
}


function visibility_inputted(button, result) {
    if (!jQuery.isEmptyObject(result)) {
        console.log('Visibility conditions dialog result');
        console.log(result);

    }
}

function texts_inputted(button, result) {
    if (!jQuery.isEmptyObject(result)) {
        console.log('Visibility conditions dialog result');
        console.log(result);

    }
}


function content_inputted (button, result) {
    if (!jQuery.isEmptyObject(result)) {
        console.log('content_inputted dialog result');
        console.log(result);
    }
}


function selectContent(value,content) {
	$.each(content, function(key, contentType) {   
		 
		 if (contentType.id == value) {

			//fill title
			 $('#title_column_name').html();
			 $('#title_column_name').append($("<option></option>").attr("value", "-").text("-").attr('selected','selected'));
			 $.each(contentType.fields, function(field_key, field_value) {
				 console.log(field_value);
				 $('#title_column_name').append($("<option></option>").attr("value", field_value.db_field).text(field_value.name)); 
			 });

			//fill subtitle
			 $('#subtitle_column_name').html();
			 $('#subtitle_column_name').append($("<option></option>").attr("value", "-").text("-").attr('selected','selected'));
			 $.each(contentType.fields, function(field_key, field_value) {
				 $('#subtitle_column_name').append($("<option></option>").attr("value", field_value.db_field).text(field_value.name)); 
			 })

			  //fill image
			 $('#image_column_name').html();
			 $('#image_column_name').append($("<option></option>").attr("value", "-").text("-").attr('selected','selected'));
			 $.each(contentType.fields, function(field_key, field_value) {
				 $('#image_column_name').append($("<option></option>").attr("value", field_value.db_field).text(field_value.name)); 
			 });

			  //visibility_column_name
			 $('#visibility_column_name').html();
			 $('#visibility_column_name').append($("<option></option>").attr("value", "-").text("-").attr('selected','selected'));
			 $.each(contentType.fields, function(field_key, field_value) {
				 $('#visibility_column_name').append($("<option></option>").attr("value", field_value.db_field).text(field_value.name)); 
			 });

			  //visibility_column_name
			 $('#note_column_name').html();
			 $('#note_column_name').append($("<option></option>").attr("value", "-").text("-").attr('selected','selected'));
			 $.each(contentType.fields, function(field_key, field_value) {
				 $('#note_column_name').append($("<option></option>").attr("value", field_value.db_field).text(field_value.name)); 
			 });
			 

			  //preview_column_name
			 $('#preview_column_name').html();
			 $('#preview_column_name').append($("<option></option>").attr("value", "-").text("-").attr('selected','selected'));
			 $.each(contentType.fields, function(field_key, field_value) {
				 $('#preview_column_name').append($("<option></option>").attr("value", field_value.db_field).text(field_value.name)); 
			 })
			 
			 $('#preview_column_name').html();
			 $('#preview_column_name').append($("<option></option>").attr("value", "-").text("-").attr('selected','selected'));
			 $.each(contentType.fields, function(field_key, field_value) {
				 $('#preview_column_name').append($("<option></option>").attr("value", field_value.db_field).text(field_value.name)); 
			 });
			 
			 
		 }
		 //$('#mySelect').append($("<option></option>").attr("value", key).text(value)); 
	});	
}