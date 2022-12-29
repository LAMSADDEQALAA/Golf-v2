/**
 * DataTables Basic
 */

"use strict";

let fv, offCanvasEl;
document.addEventListener("DOMContentLoaded", function (e) {
    (function () {
        const formAddNewRecord = document.getElementById("form-add-new-record");

        setTimeout(() => {
            const EditTerrain = document.querySelector(".Edit-Terrain"),
                offCanvasElement = document.querySelector("#add-new-record");
            const Newterrain = document.querySelector(".create-Terrain");

            if (Newterrain) {
                Newterrain.addEventListener(
                    "click",
                    () => (window.location.href = "/terrain/create")
                );
            }

            // To open offCanvas, to add new record
            if (EditTerrain) {
                EditTerrain.addEventListener("click", function () {
                    offCanvasEl = new bootstrap.Offcanvas(offCanvasElement);
                    offCanvasEl.show();
                });
            }
        }, 200);

        // Form validation for Add new record
        // fv = FormValidation.formValidation(formAddNewRecord, {
        //     fields: {
        //         basicFullname: {
        //             validators: {
        //                 notEmpty: {
        //                     message: "The name is required",
        //                 },
        //             },
        //         },
        //         basicPost: {
        //             validators: {
        //                 notEmpty: {
        //                     message: "Post field is required",
        //                 },
        //             },
        //         },
        //         basicEmail: {
        //             validators: {
        //                 notEmpty: {
        //                     message: "The Email is required",
        //                 },
        //                 emailAddress: {
        //                     message: "The value is not a valid email address",
        //                 },
        //             },
        //         },
        //         basicDate: {
        //             validators: {
        //                 notEmpty: {
        //                     message: "Joining Date is required",
        //                 },
        //                 date: {
        //                     format: "MM/DD/YYYY",
        //                     message: "The value is not a valid date",
        //                 },
        //             },
        //         },
        //         basicSalary: {
        //             validators: {
        //                 notEmpty: {
        //                     message: "Basic Salary is required",
        //                 },
        //             },
        //         },
        //     },
        //     plugins: {
        //         trigger: new FormValidation.plugins.Trigger(),
        //         bootstrap5: new FormValidation.plugins.Bootstrap5({
        //             // Use this for enabling/changing valid/invalid class
        //             // eleInvalidClass: '',
        //             eleValidClass: "",
        //             rowSelector: ".col-sm-12",
        //         }),
        //         submitButton: new FormValidation.plugins.SubmitButton(),
        //         // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
        //         autoFocus: new FormValidation.plugins.AutoFocus(),
        //     },
        //     init: (instance) => {
        //         instance.on("plugins.message.placed", function (e) {
        //             if (
        //                 e.element.parentElement.classList.contains(
        //                     "input-group"
        //                 )
        //             ) {
        //                 e.element.parentElement.insertAdjacentElement(
        //                     "afterend",
        //                     e.messageElement
        //                 );
        //             }
        //         });
        //     },
        // });
    })();
});

// datatable (jquery)
$(function () {
    var dt_basic_table = $(".datatables-basic"),
        dt_basic;

    dt_basic_table.attr("data-id"),
        (dt_basic = dt_basic_table.DataTable({
            order: [[2, "desc"]],
            dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 7,
            lengthMenu: [7, 10, 25, 50, 75, 100],
            buttons: [
                {
                    extend: "collection",
                    className: "btn btn-label-primary dropdown-toggle me-2",
                    text: '<i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
                    buttons: [
                        {
                            extend: "print",
                            text: '<i class="ti ti-printer me-1" ></i>Print',
                            className: "dropdown-item",
                            customize: function (win) {
                                //customize print view for dark
                                $(win.document.body)
                                    .css("color", config.colors.headingColor)
                                    .css(
                                        "border-color",
                                        config.colors.borderColor
                                    )
                                    .css(
                                        "background-color",
                                        config.colors.bodyBg
                                    );
                                $(win.document.body)
                                    .find("table")
                                    .addClass("compact")
                                    .css("color", "inherit")
                                    .css("border-color", "inherit")
                                    .css("background-color", "inherit");
                            },
                        },
                        {
                            extend: "csv",
                            text: '<i class="ti ti-file-text me-1" ></i>Csv',
                            className: "dropdown-item",
                        },
                        {
                            extend: "excel",
                            text: "Excel",
                            className: "dropdown-item",
                        },
                        {
                            extend: "pdf",
                            text: '<i class="ti ti-file-description me-1"></i>Pdf',
                            className: "dropdown-item",
                        },
                        {
                            extend: "copy",
                            text: '<i class="ti ti-copy me-1" ></i>Copy',
                            className: "dropdown-item",
                        },
                    ],
                },
                {
                    text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block z-n1">Add New Record</span>',
                    className: !dt_basic_table.attr("data-Show")
                        ? "btn btn-primary"
                        : "create-Terrain btn btn-primary",
                    attr: !dt_basic_table.attr("data-Show")
                        ? {
                              "data-bs-toggle": "modal",
                              "data-bs-target": "#add-modal",
                          }
                        : null,
                },
            ],
        }));

    setTimeout(() => {
        $(".dataTables_filter .form-control").removeClass("form-control-sm");
        $(".dataTables_length .form-select").removeClass("form-select-sm");
    }, 300);
});
