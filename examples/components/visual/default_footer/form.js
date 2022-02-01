  /**
   * This script need
   */

/*
 function required! this function run component form init
 */
function component_init_form(form_data,component_data,page_data) {
	console.log("default_footer component_init_form fired!");
	console.log("form_data:");
	console.log(form_data);
	console.log("component_data:");
	console.log(component_data);
	console.log("page_data:");
	console.log(page_data);

	//set font size indicator
	$(".font_range_value").html(form_data.font_size);
	$(".left_button_border_radius_value").html(form_data.left_button_border_radius);
	$(".right_button_border_radius_value").html(form_data.right_button_border_radius);

	//checkboxex
	if ($("input[name='use_left_button']").is(':checked')) $("input[name='use_left_button']").val(1); else $("input[name='use_left_button']").val(0);
	if ($("input[name='use_right_button']").is(':checked')) $("input[name='use_right_button']").val(1); else $("input[name='use_right_button']").val(0);
}


/*
 *** function required! this function run after every changes and run after first open component form
 */
function component_data_changed(form_data,component_data,page_data) {
	console.log("default_footer component_data_changed fired!");
	console.log("form_data:");
	console.log(form_data);
	console.log("component_data:");
	console.log(component_data);
	console.log("page_data:");
	console.log(page_data);

	//set font size indicator
	$(".font_range_value").html(form_data.font_size);
	$(".left_button_border_radius_value").html(form_data.left_button_border_radius);
	$(".right_button_border_radius_value").html(form_data.right_button_border_radius);

	//checkboxex
	if ($("input[name='use_left_button']").is(':checked')) $("input[name='use_left_button']").val(1); else $("input[name='use_left_button']").val(0);
	if ($("input[name='use_right_button']").is(':checked')) $("input[name='use_right_button']").val(1); else $("input[name='use_right_button']").val(0);
}



/*
 *** function required! this function run after selected color in color dialog
 */
function color_selected(button, color_result) {

	if (!jQuery.isEmptyObject(color_result)) {
		console.log("default_footer color_selected fired!");
		console.log("button");
		console.log(button);
		console.log("color_result");
		console.log(color_result);

		//if background-color-button clicked
		if (button.id=="background-color-button") {
			$("#background-color-block .color-block").css('background-color', color_result.color_value);
			$("#background-color-block input[name='background_color']").val(color_result.color_name);
		}


		//if text-color-button clicked
		if (button.id=="text-color-button") {
			$("#background-color-block .text-color-block").css('color', color_result.color_value);
			$("#background-color-block input[name='text_color']").val(color_result.color_name);
		}

		//if left-color-button clicked
		if (button.id=="lbtext-color-button") {
			$("#lb-color-block .text-color-block").css('color', color_result.color_value);
			$("#lb-color-block input[name='left_button_text_color']").val(color_result.color_name);
		}

		//if left button background-color-button clicked
		if (button.id=="lbbackground-color-button") {
			$("#lb-color-block .color-block").css('background-color', color_result.color_value);
			$("#lb-icon-block .color-block").css('background-color', color_result.color_value);
			$("#lb-color-block input[name='left_button_color']").val(color_result.color_name);
		}

		//if left button icon-color-button clicked
		if (button.id=="lbicon-color-button") {
			$("#left_button_icon_2").css('color', color_result.color_value);
			$("#lb-icon-block input[name='left_button_icon_color']").val(color_result.color_name);
		}

		//if right-color-button clicked
		if (button.id=="rbtext-color-button") {
			$("#rb-color-block .text-color-block").css('color', color_result.color_value);
			$("#rb-color-block input[name='right_button_text_color']").val(color_result.color_name);
		}

		//if right button background-color-button clicked
		if (button.id=="rbbackground-color-button") {
			$("#rb-color-block .color-block").css('background-color', color_result.color_value);
			$("#rb-icon-block .color-block").css('background-color', color_result.color_value);
			$("#rb-color-block input[name='right_button_color']").val(color_result.color_name);
		}

		//if right button icon-color-button clicked
		if (button.id=="rbicon-color-button") {
			$("#right_button_icon_2").css('color', color_result.color_value);
			$("#rb-icon-block input[name='right_button_icon_color']").val(color_result.color_name);
		}

	}
}

/*
 *** function required! this function run after selected icon in icon dialog
 */
function icon_selected(button, icon_result) {

		if (!jQuery.isEmptyObject(icon_result)) {
		console.log("default_footer icon_selected fired!");
		console.log("button");
		console.log(button);
		console.log("icon_result");
		console.log(icon_result);

		if (button.id=="lb-icon-button") {
			$("#left_button_icon").val(icon_result);
			$("#left_button_icon_2").attr("name",icon_result);
		}

		if (button.id=="rb-icon-button") {
			$("#right_button_icon").val(icon_result);
			$("#right_button_icon_2").attr("name",icon_result);
		}
	}
}

/*
 *** function required! this function run after entered text in text dialog
 */
function strings_inputted(button, result) {

	if (!jQuery.isEmptyObject(result)) {
		console.log("default_footer texts_inputted fired!");
		console.log("button");
		console.log(button);
		console.log("result");
		console.log(result);

		if (button.id=="title-button") {
			for (let lng in result) {
				$("input[name='TRANSLATIONS["+lng+"][FOOTER_TITLE]']").val(result[lng]);
				$("#TRANSLATIONS_"+lng+"_FOOTER_TITLE").html(result[lng]);
				$("#title-button").attr("string-values",JSON.stringify(result));	//redefine default values with new
			};
		}

		if (button.id=="rb-title-button") {
			for (let lng in result) {
				$("input[name='TRANSLATIONS["+lng+"][FOOTER_RB_TITLE]']").val(result[lng]);
				$("#TRANSLATIONS_"+lng+"_FOOTER_RB_TITLE").html(result[lng]);
				$("#rb-title-button").attr("string-values",JSON.stringify(result));	//redefine default values with new
			};
		}

		if (button.id=="lb-title-button") {
			for (let lng in result) {
				$("input[name='TRANSLATIONS["+lng+"][FOOTER_LB_TITLE]']").val(result[lng]);
				$("#TRANSLATIONS_"+lng+"_FOOTER_LB_TITLE").html(result[lng]);
				$("#lb-title-button").attr("string-values",JSON.stringify(result));	//redefine default values with new
			};
		}
	}
}

function visibility_inputted(button, result) {
    if (!jQuery.isEmptyObject(result)) {
        console.log('Visibility conditions dialog result');
        console.log(result);

        if (button.id == 'visibility-dialog') {

        }
    }
}


function clearLeftIcon() {
	$("#left_button_icon").val("");
	$("#left_button_icon_2").attr("name","-");
	event.preventDefault();
	return false;
}
