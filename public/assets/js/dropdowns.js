$(".status-id a").on("click", function (e) {
    var tg = e.target;
    var date_string = "";
    var targetElementDataValue = $(tg).attr("data-value");
    $(tg)
        .parent("div")
        .siblings("button")
        .find("span")
        .attr("data-value", targetElementDataValue);

    var queryString = "?";
    $(".dropdown-selection").each(function (e) {
        if (
            !(
                $(this).attr("data-value").trim() == "select" ||
                $(this).attr("data-value").trim() == "all"
            )
        ) {
            var data_main = $(this).attr("data-main");
            var data_text = $.trim($(this).attr("data-value"));
            queryString += `${data_main}=${data_text}&`;
        }
    });

    $(".take-date").each(function (e) {
        if ($(this).val() != "" || $(this).val() != null) {
            date_string =
                date_string + $(this).attr("name") + "=" + $(this).val() + "&";
        }
    });
    window.location.href = queryString + date_string;
});
