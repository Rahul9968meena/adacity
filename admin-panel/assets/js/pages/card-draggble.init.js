

"use strict";
$(function () {
    new Sortable(document.getElementById("sortable-1")),
        new Sortable(document.getElementById("sortable-2"), {
            handle: ".sortable-handle"
        }),
        new Sortable(document.getElementById("draggable-3-start"), {
            handle: ".sortable-handle",
            group: "shared"
        }),
        new Sortable(document.getElementById("draggable-3-end"), {
            handle: ".sortable-handle",
            group: "shared"
        })
});