/**
 * Selects & Tags
 */

"use strict";

$(function () {
    let select2 = $(".select2");

    // Bootstrap Select
    // --------------------------------------------------------------------

    // Select2
    // --------------------------------------------------------------------

    // Default
    if (select2.length) {
        select2.each(function () {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>').select2({
                placeholder: "Select value",
                dropdownParent: $this.parent(),
            });
        });
    }
});
