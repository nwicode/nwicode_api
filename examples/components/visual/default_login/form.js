/**
 * This script need
 */

/*
 function required! this function run component form init
 */
function component_init_form(form_data,component_data,page_data) {
    console.log("default_login component_init_form fired!");
    console.log("form_data:");
    console.log(form_data);
    console.log("component_data:");
    console.log(component_data);
    console.log("page_data:");
    console.log(page_data);

    //set font size indicator
    $(".font_range_value").html(form_data.font_size);
}


/*
 *** function required! this function run after every changes and run after first open component form
 */
function component_data_changed(form_data,component_data,page_data) {
    console.log("default_login component_data_changed fired!");
    console.log("form_data:");
    console.log(form_data);
    console.log("component_data:");
    console.log(component_data);
    console.log("page_data:");
    console.log(page_data);
}



/*
 *** function required! this function run after selected color in color dialog
 */
function color_selected(button, color_result) {

    if (!jQuery.isEmptyObject(color_result)) {
        console.log("default_login color_selected fired!");
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
            $("#text-color-block .color-block").css('background-color', color_result.color_value);
            $("#text-color-block input[name='text_color']").val(color_result.color_name);
        }

        //if button-color-button clicked
        if (button.id=="button-color-button") {
            $("#button-color-block .color-block").css('background-color', color_result.color_value);
            $("#button-color-block input[name='button_color']").val(color_result.color_name);
        }
    }
}

/*
 *** function required! this function run after entered text in text dialog
 */
function strings_inputted(button, result) {

    if (!jQuery.isEmptyObject(result)) {
        console.log("default_login texts_inputted fired!");
        console.log("button");
        console.log(button);
        console.log("result");
        console.log(result);

        if (button.id=="login-button") {
            for (let lng in result) {
                $("input[name='TRANSLATIONS["+lng+"][LOGIN_BUTTON]']").val(result[lng]);
                $("#TRANSLATIONS_"+lng+"_LOGIN_BUTTON").html(result[lng]);
                $("#login-button").attr("string-values",JSON.stringify(result));	//redefine default values with new
            };
        }
    }
}
