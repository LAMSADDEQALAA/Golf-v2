/**
 *  Form Wizard
 */

"use strict";

$(function () {
    const select2 = $(".select2"),
        selectPicker = $(".selectpicker");

    // Bootstrap select
    if (selectPicker.length) {
        selectPicker.selectpicker();
    }

    // select2
    if (select2.length) {
        select2.each(function () {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>');
            $this.select2({
                placeholder: "Select value",
                dropdownParent: $this.parent(),
            });
        });
    }
});

(function () {
    // Icons Modern Wizard
    // --------------------------------------------------------------------
    const wizardIconsModernVertical = document.querySelector(
        ".wizard-modern-vertical-icons-example"
    );

    if (
        typeof wizardIconsModernVertical !== undefined &&
        wizardIconsModernVertical !== null
    ) {
        const wizardIconsModernVerticalBtnNextList = [].slice.call(
                wizardIconsModernVertical.querySelectorAll(".btn-next")
            ),
            wizardIconsModernVerticalBtnPrevList = [].slice.call(
                wizardIconsModernVertical.querySelectorAll(".btn-prev")
            ),
            wizardIconsModernVerticalBtnSubmit =
                wizardIconsModernVertical.querySelector(".btn-submit");

        const verticalModernIconsStepper = new Stepper(
            wizardIconsModernVertical,
            {
                linear: false,
            }
        );

        if (wizardIconsModernVerticalBtnNextList) {
            wizardIconsModernVerticalBtnNextList.forEach(
                (wizardIconsModernVerticalBtnNext) => {
                    wizardIconsModernVerticalBtnNext.addEventListener(
                        "click",
                        (event) => {
                            verticalModernIconsStepper.next();
                        }
                    );
                }
            );
        }
        if (wizardIconsModernVerticalBtnPrevList) {
            wizardIconsModernVerticalBtnPrevList.forEach(
                (wizardIconsModernVerticalBtnPrev) => {
                    wizardIconsModernVerticalBtnPrev.addEventListener(
                        "click",
                        (event) => {
                            verticalModernIconsStepper.previous();
                        }
                    );
                }
            );
        }
    }
})();
