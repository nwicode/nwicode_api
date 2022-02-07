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

    }
}


function gallery_inputted(button, result) {
    if (!jQuery.isEmptyObject(result)) {
        console.log('gallery_inputted dialog result');
        console.log(result);
        console.log(button);
		$("#local_url").val(result.fileName);
		$("#local_url_full").val(result.imageUrl);
		$("#use_url").attr("src",result.imageUrl);
		$("#use_url").attr("src",result.imageUrl);
		$("#remote_url").val("");
    }
}
