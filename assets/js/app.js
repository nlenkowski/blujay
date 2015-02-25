/**
 * Application scripts
 */

(function($) {

    /**
     * Make videos responsive
     */

    $(".videos").fitVids();

    /**
     * Utilities
     */

    // Enable safe logging
    function log(msg) {
        if (this.console) {
            console.log(msg);
        }
    }

})(jQuery);