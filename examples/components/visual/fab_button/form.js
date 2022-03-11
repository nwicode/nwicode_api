  /**
   * This script need 
   */

/*
 function required! this function run component form init
 */
 function component_init_form(form_data,component_data,page_data) {

}


/*
 *** function required! this function run after every changes and run after first open component form
 */
function component_data_changed(form_data,component_data,page_data) {


}



/*
 *** function required! this function run after selected color in color dialog
 */
function color_selected(button, color_result) {

	if (!jQuery.isEmptyObject(color_result)) {
		/*console.log("default_button color_selected fired!");
		console.log(button);
		console.log("color_result");
		console.log(color_result);*/
		
		//if left button background-color-button clicked
		if (button.id=="lbbackground-color-button") {
			$("#lb-color-block .color-block").css('background-color', color_result.color_value);
			$("#lb-color-block input[name='left_button_color']").val(color_result.color_name);
			$("#lb-color-block input[name='left_button_color_value']").val(color_result.color_value);
		}

		//if left button icon-color-button clicked
		if (button.id=="lbicon-color-button") {
			$("#left_button_icon_2").css('color', color_result.color_value);
			$("#lb-color-block input[name='left_button_icon_color']").val(color_result.color_name);
			$("#lb-color-block input[name='left_button_icon_color_value']").val(color_result.color_value);
		}

		//icon colors
		for (let i = 0; i < 5; i++) {
			if (button.id=="buttons_top_buttons_"+i+"_icon_color_button") {
				$("#buttons_top_buttons_"+i+"_icon_2").css('color', color_result.color_value);
				$("#buttons_top_buttons_"+i+"_icon_color").val(color_result.color_name);
				$("#buttons_top_buttons_"+i+"_icon_color_value").val(color_result.color_value);
			}
			if (button.id=="buttons_bottom_buttons_"+i+"_icon_color_button") {
				$("#buttons_bottom_buttons_"+i+"_icon_2").css('color', color_result.color_value);
				$("#buttons_bottom_buttons_"+i+"_icon_color").val(color_result.color_name);
				$("#buttons_bottom_buttons_"+i+"_icon_color_value").val(color_result.color_value);
			}
			if (button.id=="buttons_start_buttons_"+i+"_icon_color_button") {
				$("#buttons_start_buttons_"+i+"_icon_2").css('color', color_result.color_value);
				$("#buttons_start_buttons_"+i+"_icon_color").val(color_result.color_name);
				$("#buttons_start_buttons_"+i+"_icon_color_value").val(color_result.color_value);
			}
			if (button.id=="buttons_end_buttons_"+i+"_icon_color_button") {
				$("#buttons_end_buttons_"+i+"_icon_2").css('color', color_result.color_value);
				$("#buttons_end_buttons_"+i+"_icon_color").val(color_result.color_name);
				$("#buttons_end_buttons_"+i+"_icon_color_value").val(color_result.color_value);
			}

		}

		//gb colors
		for (let i = 0; i < 5; i++) {
			if (button.id=="buttons_top_buttons_"+i+"_button_color_button") {
				$("#buttons_top_buttons_"+i+" .color-block").css('background-color', color_result.color_value);
				$("#buttons_top_buttons_"+i+"_color").val(color_result.color_name);
				$("#buttons_top_buttons_"+i+"_color_value").val(color_result.color_value);
			}
			if (button.id=="buttons_bottom_buttons_"+i+"_button_color_button") {
				$("#buttons_bottom_buttons_"+i+" .color-block").css('background-color', color_result.color_value);
				$("#buttons_bottom_buttons_"+i+"_color").val(color_result.color_name);
				$("#buttons_bottom_buttons_"+i+"_color_value").val(color_result.color_value);
			}
			if (button.id=="buttons_start_buttons_"+i+"_button_color_button") {
				$("#buttons_start_buttons_"+i+" .color-block").css('background-color', color_result.color_value);
				$("#buttons_start_buttons_"+i+"_color").val(color_result.color_name);
				$("#buttons_start_buttons_"+i+"_color_value").val(color_result.color_value);
			}
			if (button.id=="buttons_end_buttons_"+i+"_button_color_button") {
				$("#buttons_end_buttons_"+i+" .color-block").css('background-color', color_result.color_value);
				$("#buttons_end_buttons_"+i+"_color").val(color_result.color_name);
				$("#buttons_end_buttons_"+i+"_color_value").val(color_result.color_value);
			}

		}		


	}
}

/*
 *** function required! this function run after selected icon in icon dialog
 */
function icon_selected(button, icon_result) {
	
		if (!jQuery.isEmptyObject(icon_result)) {
		console.log("default_button icon_selected fired!");
		console.log("button");
		console.log(button);
		console.log("icon_result");
		console.log(icon_result);

		if (button.id=="lb-icon-button") {
			$("#left_button_icon").val(icon_result);
			$("#left_button_icon_2").attr("name",icon_result);
		}

		for (let i = 0; i < 5; i++) {
			if (button.id=="buttons_top_buttons_"+i+"_icon_button") {
				$("#buttons_top_buttons_"+i+"_icon").val(icon_result);
				$("#buttons_top_buttons_"+i+"_icon_2").attr("name",icon_result);
			}
			if (button.id=="buttons_bottom_buttons_"+i+"_icon_button") {
				$("#buttons_bottom_buttons_"+i+"_icon").val(icon_result);
				$("#buttons_bottom_buttons_"+i+"_icon_2").attr("name",icon_result);
			}
			if (button.id=="buttons_start_buttons_"+i+"_icon_button") {
				$("#buttons_start_buttons_"+i+"_icon").val(icon_result);
				$("#buttons_start_buttons_"+i+"_icon_2").attr("name",icon_result);
			}
			if (button.id=="buttons_end_buttons_"+i+"_icon_button") {
				$("#buttons_end_buttons_"+i+"_icon").val(icon_result);
				$("#buttons_end_buttons_"+i+"_icon_2").attr("name",icon_result);
			}			
		}
		
		
		

	}
}

/*
 *** function required! this function run after entered text in text dialog
 */
function strings_inputted(button, result) {

	if (!jQuery.isEmptyObject(result)) {
		console.log("default_button texts_inputted fired!");
		console.log("button");
		console.log(button);
		console.log("result");
		console.log(result);

	}
}


function visibility_inputted(button, result) {
    if (!jQuery.isEmptyObject(result)) {
        console.log('Visibility conditions dialog result');
        console.log(result);

        if (button.id == 'visibility-dialog-dialoag') {
			$("#lb-title-button").attr("string-values",JSON.stringify(result));	//redefine default values with new
        }
    }
}



function clearLeftIcon() {
	$("#left_button_icon").val("");
	$("#left_button_icon_2").attr("name","-");
	event.preventDefault();
	return false;
}



/**
 * update inner ionic component on layouts
 * @param {*} form_data 
 * @param {*} component_data 
 * @param {*} page_data 
 */
function updateIonicInner(form_data,component_data,page_data) {
	var component = $("#page_button_"+component_data.id+" ion-button");
	var title = $("#page_button_"+component_data.id+" ion-button ion-text");
	var icon = $("#page_button_"+component_data.id+" ion-button ion-icon");
	console.log(component);
	console.log(form_data);
	component.css( {
		"--background":form_data.left_button_color_value,
		"--border-radius": form_data.left_button_border_radius+'px'
	});
	component.attr("type",form_data.left_button_type);
	title.css( {
		"color":form_data.left_button_text_color_value,
		"font-size": form_data.font_size+'px'
	});
	icon.css( {
		"color":form_data.left_button_text_color_value,
	});
} 

