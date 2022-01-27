  /**
   * This script need
   */

/*
 function required! this function run component form init
 */
function component_init_form(form_data,component_data,page_data) {
	console.log("default_menu component_init_form fired!");
	console.log("form_data:");
	console.log(form_data);
	console.log("component_data:");
	console.log(component_data);
	console.log("page_data:");
	console.log(page_data);
	$(".title_font_range_value").html(form_data.title_font_size);
	$(".item_font_size_value").html(form_data.item_font_size);
	$(".item_icon_size_value").html(form_data.item_icon_size);
}


/*
 *** function required! this function run after every changes and run after first open component form
 */
function component_data_changed(form_data,component_data,page_data) {
	console.log("default_menu component_data_changed fired!");
	console.log("form_data:");
	console.log(form_data);
	console.log("component_data:");
	console.log(component_data);
	console.log("page_data:");
	console.log(page_data);
	$(".title_font_range_value").html(form_data.title_font_size);
	$(".item_font_size_value").html(form_data.item_font_size);
	$(".item_icon_size_value").html(form_data.item_icon_size);

}



/*
 *** function required! this function run after selected color in color dialog
 */
function color_selected(button, color_result) {

	if (!jQuery.isEmptyObject(color_result)) {
		console.log("default_menu color_selected fired!");
		console.log("button");
		console.log(button);
		console.log("color_result");
		console.log(color_result);

		if (button.id=="item-color-button") {
			$("#item-color-block .text-color-block").css('color', color_result.color_value);
			$("#item-color-block input[name='item_text_color']").val(color_result.color_name);
		}

	}
}

/*
 *** function required! this function run after selected icon in icon dialog
 */
function icon_selected(button, icon_result) {

		if (!jQuery.isEmptyObject(icon_result)) {
		console.log("default_menu icon_selected fired!");
		console.log("button");
		console.log(button);
		console.log("icon_result");
		console.log(icon_result);

	}
}


/*
 *** function required! this function run after entered text in text dialog
 */
 function strings_inputted(button, result) {

	if (!jQuery.isEmptyObject(result)) {
		console.log("default_menu texts_inputted fired!");
		console.log("button");
		console.log(button);
		console.log("result");
		console.log(result);

		if (button.id=="title-button") {
			for (let lng in result) { 
				$("input[name='TRANSLATIONS["+lng+"][MENU_TITLE]']").val(result[lng]);
				$("#TRANSLATIONS_"+lng+"_MENU_TITLE").html(result[lng]);
				$("#title-button").attr("string-values",JSON.stringify(result));	//redefine default values with new
			};
		}
	}
}