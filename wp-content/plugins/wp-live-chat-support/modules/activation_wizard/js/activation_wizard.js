jQuery(document).ready(function () {

    wplc_setup_progressbar();

    if(jQuery("form#wplc_wizard").length>0) {
        wplc_setup_channel_selection();
        setup_agents_carousel();
        setup_styling_manage();
        setup_form_submission();
        setup_pbx_settings();
    }else {
        setup_completion();
    }


    var current_step, next_step, previous_step,is_next_final;
    var opacity;

    jQuery(".next").click(function () {
        current_step = jQuery(this).parent();
        next_step =jQuery(jQuery(this).parent().nextAll("[data-include=true]")[0]);
        is_next_final = next_step.nextAll("[data-include=true]").length<=1;
        //Add Class Active
        jQuery("#wplc_wizard_progressbar li[data-include=true]").eq(jQuery("fieldset[data-include=true]").index(next_step)).addClass("active");

        if(is_next_final){
            jQuery(next_step).find("input.next").val("Finish");
            jQuery(next_step).find("input.next").attr("id","button_finish");
        }



        //show the next fieldset
        next_step.show();
        jQuery(".next").prop('disabled', jQuery(next_step).data("step-id")=='step-pbx' && jQuery("#clickToTalkUrl").val().length<=0);


        //hide the current fieldset with style
        current_step.animate({opacity: 0}, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_step.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_step.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    jQuery(".previous").click(function () {

        current_step = jQuery(this).parent();
        previous_step = jQuery(jQuery(this).parent().prevAll("[data-include=true]")[0]); // jQuery(this).parent().prev();

        //Remove class active
        jQuery("#wplc_wizard_progressbar li[data-include=true]").eq(jQuery("fieldset[data-include=true]").index(current_step)).removeClass("active");

        //show the previous fieldset
        previous_step.show();
        jQuery(".next").prop('disabled', jQuery(previous_step).data("step-id")=='step-pbx' && jQuery("#clickToTalkUrl").val().length<=0);




        //hide the current fieldset with style
        current_step.animate({opacity: 0}, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_step.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_step.css({'opacity': opacity});
            },
            duration: 600
        });
    });

});

function wplc_setup_progressbar() {
    jQuery("#wplc_wizard_progressbar li").hide();
    var li_width = 100 / jQuery("#wplc_wizard_progressbar li[data-include=true]").length;
    jQuery("#wplc_wizard_progressbar li[data-include=true]").width(li_width + '%');
    jQuery("#wplc_wizard_progressbar li[data-include=true]").show();


}

function wplc_setup_channel_selection() {
    jQuery(".next").prop('disabled', true);
    jQuery(".box-part").on("click", function () {
        var previousSelection = getSessionStorageValue("channel");
        var selection = jQuery(this).data("channel");
        jQuery(".box-part").removeClass("selected-channel");
        if(previousSelection === selection)
        {
            jQuery(".next").prop('disabled', true);
            setSessionStorageValue("channel", null);
        }
        else {
            jQuery(".next").prop('disabled', false);
            jQuery("#wplc_input_channel").val(selection);
            jQuery(this).addClass("selected-channel");
            setSessionStorageValue("channel", selection);

            jQuery("fieldset").each(function (index, step) {
                var stepChannels = jQuery(step).data("channels").split(',');
                var removeStep = true;
                stepChannels.forEach(channel => {
                    if (channel == "*" || channel == selection) {
                        removeStep = false;
                    }
                });

                if (removeStep) {
                    jQuery("li[id='" + jQuery(step).data("step-id") + "']").attr("data-include", false);

                    jQuery(this).attr("data-include", false)
                    jQuery(this).find("input,select").each(function(index,input){
                        jQuery(input).attr("disabled",true);
                    })

                } else {
                    jQuery("li[id='" + jQuery(step).data("step-id") + "']").attr("data-include", true);

                    jQuery(this).attr("data-include", true)
                    jQuery(this).find("input,select").each(function(index,input){
                        jQuery(input).attr("disabled",false);
                    })
                }
            });
        }
        wplc_setup_progressbar();
    });
}

function setup_agents_carousel() {
    jQuery("#myCarousel").on("slide.bs.carousel", function (e) {
        var $e = jQuery(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 3;
        var totalItems = jQuery(".carousel-item").length;

        if (idx >= totalItems - (itemsPerSlide - 1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                    jQuery(".carousel-item")
                        .eq(i)
                        .appendTo(".carousel-inner");
                } else {
                    jQuery(".carousel-item")
                        .eq(0)
                        .appendTo(jQuery(this).find(".carousel-inner"));
                }
            }
        }
    });

    jQuery(".add-agent").on("click", function () {
        var itemsCount = jQuery(".carousel-item").length;
        var newNode = jQuery(".carousel-item-template").clone();
        newNode.insertBefore(jQuery(this).closest(".carousel-item"));
        newNode.removeClass("carousel-item-template");
        newNode.addClass("carousel-item");

        newNode.find('[data-array-id]').each((key, element) => {
            var arrayName = jQuery(element).data("array-id");
            var maintainName = jQuery(element).data("maintain-name");
            var fieldName = maintainName ? jQuery(element).attr("name") : arrayName;
            jQuery(element).attr("id", "agentEntry_" + itemsCount + "_" + arrayName);
            jQuery(element).attr("name", "agentEntry[" + itemsCount + "][" + fieldName + "]");
            jQuery(element).prop("disabled", false);
        })
        newNode.show();
        toggle_carousel_arrows();
    });

    var agentsTab = jQuery("#myCarousel").closest("fieldset");
    var agentsTabID = jQuery(agentsTab).data("step-id");
    jQuery(agentsTab).find("#button_next_" + agentsTabID).on("click", function () {
        var values = {};
        jQuery.each(jQuery(agentsTab).serializeArray(), function (i, field) {
            values[field.name] = field.value;
        });
        setSessionStorageValue("agents", values);
    });

    toggle_carousel_arrows();
}

function setup_styling_manage(){

    var wplc = jQuery("call-us")[0];

    jQuery("#base_color").val(wplc.style.getPropertyValue("--call-us-form-header-background"));
    jQuery("#agent_color").val(wplc.style.getPropertyValue("--call-us-agent-text-color"));
    jQuery("#client_color").val(wplc.style.getPropertyValue("--call-us-client-text-color"));


    jQuery("#base_color").on("change",function(){
        wplc.style.setProperty("--call-us-form-header-background",jQuery(this).val());
        wplc.style.setProperty("--call-us-form-secondary-header-background",wplc_lightenDarkenColor(jQuery(this).val(),-40));
    });
    jQuery("#agent_color").on("change",function(){
        wplc.style.setProperty("--call-us-agent-text-color",jQuery(this).val());
    });
    jQuery("#client_color").on("change",function(){
        wplc.style.setProperty("--call-us-client-text-color",jQuery(this).val());
    });

}

function toggle_carousel_arrows() {
    if (jQuery(".carousel-item").length > 3) {
        jQuery("#carousel-arrows").show();
    } else {
        jQuery("#carousel-arrows").hide();
    }

}

function setup_form_submission() {
    jQuery("body").on("click","#button_finish", function () {
        jQuery("#wplc_wizard").submit();
    });
}

function setSessionStorageValue(key, value) {
    var activation_data = sessionStorage.getItem("wplc_activation");
    if (typeof activation_data == "undefined" || activation_data == null) {
        activation_data = {};
    } else {
        activation_data = JSON.parse(activation_data);
    }

    activation_data[key] = value;
    sessionStorage.setItem("wplc_activation", JSON.stringify(activation_data));
}

function getSessionStorageValue(key) {
    var activation_data = sessionStorage.getItem("wplc_activation");
    let result = null;
    if (typeof activation_data != "undefined" && activation_data != null) {
        activation_data = JSON.parse(activation_data);
        if(activation_data.hasOwnProperty(key)) {
            result = activation_data[key];
        }
    }
    return result;
}

function setup_completion(){
    jQuery("#button_start_now").on("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign(localization_data.chat_list_url);
    });
}

function setup_pbx_settings(){

    jQuery("#clickToTalkUrl").on("keyup",function(event){
        jQuery(".next").prop('disabled',jQuery(this).val().length<=0);
    });

    jQuery("input[name=wplc_pbx_exist]").on("change",  function (event) {
        if(jQuery(this).val()==='new'){
            jQuery("#existing_pbx_settings").fadeOut();
            jQuery("#new_pbx_instructions").fadeIn();
        }else if(jQuery(this).val()==='exist')
        {
            jQuery("#new_pbx_instructions").fadeOut();
            jQuery("#existing_pbx_settings").fadeIn();
        }
        /*
        */
    });
}