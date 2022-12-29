/**
 * Selects & Tags
 */

"use strict";

$(function () {
    const selectPicker = $(".selectpicker"),
        select2 = $(".select2"),
        select2Icons = $(".select2-icons");

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
