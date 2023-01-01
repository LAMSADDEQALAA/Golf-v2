/**
 * Tagify
 */

"use strict";

(function () {
    // Basic
    //------------------------------------------------------
    const Phones = document.querySelector("#Phones");
    const Links = document.querySelector("#Links");
    const AddLinks = document.querySelector("#AddLinks");
    const TagifyPhones = new Tagify(Phones);
    const TagifyLinks = new Tagify(Links);
    const TagifyAddLinks = new Tagify(AddLinks);
})();
