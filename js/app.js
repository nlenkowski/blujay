/**
 * Main scripts
 */

(function($) {

    /**
     * Utilities
     */

    // Load devtools | https://github.com/nlenkowski/lbl-devtools
    $.getScript('http://littlebiglab.com/devtools/devtools.js', function() {
        loadDevTools();
    });

    // Enable safe logging
    function log(msg) {
        if (this.console) {
            console.log(msg);
        }
    }

})(jQuery);