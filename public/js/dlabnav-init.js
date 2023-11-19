const { loadConfigFromFile } = require("vite");

(function ($) {

    var direction = getUrlParams('dir');
    if (direction != 'rtl') { direction = 'ltr'; }

    var dlabSettingsOptions = {
        typography: "roboto",
        version: "light",
        layout: "Vertical",
        headerBg: "color_4",
        navheaderBg: "color_1",
        sidebarBg: "color_4",
        sidebarStyle: "full",
        sidebarPosition: "fixed",
        headerPosition: "fixed",
        containerLayout: "full",
        direction: direction
    };

    jQuery(document).ready(function () {
        new dlabSettings(dlabSettingsOptions);
    });

    jQuery(window).on('resize', function () {
        new dlabSettings(dlabSettingsOptions);
    });

})(jQuery);
