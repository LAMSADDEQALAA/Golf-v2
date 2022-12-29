/**
 * Account Settings - Security
 */

"use strict";

document.addEventListener("DOMContentLoaded", function (e) {
    (function () {
        const formChangePass = document.querySelector("#formAccountSettings");

        // Form validation for Change password
        if (formChangePass) {
            const fv = FormValidation.formValidation(formChangePass, {
                fields: {
                    currentPassword: {
                        notEmpty: {
                            message: "Please enter current password",
                        },
                        validators: {
                            notEmpty: {
                                message: "Please current password",
                            },
                        },
                    },
                    newPassword: {
                        validators: {
                            notEmpty: {
                                message: "Please enter new password",
                            },
                            stringLength: {
                                min: 8,
                                message:
                                    "Password must be more than 8 characters",
                            },
                        },
                    },
                    confirmPassword: {
                        validators: {
                            notEmpty: {
                                message: "Please confirm new password",
                            },
                            identical: {
                                compare: function () {
                                    return formChangePass.querySelector(
                                        '[name="newPassword"]'
                                    ).value;
                                },
                                message:
                                    "The password and its confirm are not the same",
                            },
                            stringLength: {
                                min: 8,
                                message:
                                    "Password must be more than 8 characters",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap5: new FormValidation.plugins.Bootstrap5({
                        eleValidClass: "",
                        rowSelector: ".col-md-6",
                    }),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    // Submit the form when all fields are valid
                    // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                    autoFocus: new FormValidation.plugins.AutoFocus(),
                },
                init: (instance) => {
                    instance.on("plugins.message.placed", function (e) {
                        if (
                            e.element.parentElement.classList.contains(
                                "input-group"
                            )
                        ) {
                            e.element.parentElement.insertAdjacentElement(
                                "afterend",
                                e.messageElement
                            );
                        }
                    });
                },
            });
        }

        // Form validation for API key
    })();
});
