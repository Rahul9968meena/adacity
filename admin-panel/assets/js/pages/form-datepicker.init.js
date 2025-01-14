"use strict";
$(function () {
    var t = "rtl" === $("html").attr("dir") ? "right" : "left";
    $("#datepicker-1").datepicker({
        orientation: t,
        autoclose: !0
    }),
        $("#datepicker-2").datepicker({
            orientation: t,
            todayHighlight: !0
        }),
        $("#datepicker-3").datepicker({
            orientation: t,
            todayBtn: "linked",
            clearBtn: !0,
            todayHighlight: !0
        }),
        $("#datepicker-4").datepicker({
            orientation: t,
            multidate: !0,
            multidateSeparator: ", ",
            todayHighlight: !0
        }),
        $("#datepicker-5").datepicker({
            orientation: t,
            daysOfWeekDisabled: "0",
            daysOfWeekHighlighted: "3,4",
            todayHighlight: !0
        }),
        $("#datepicker-6").datepicker({
            orientation: t,
            calendarWeeks: !0
        }),
        $(".input-daterange").datepicker({
            orientation: t,
            todayHighlight: !0
        }),
        $("#datepicker-7").datepicker({
            orientation: t,
            language: "ru"
        }),
        $("#datepicker-8").datepicker({
            orientation: t,
            todayHighlight: !0
        })
});