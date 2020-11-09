$(document).ready(function () {
    var form = document.querySelector("form");
    var result_title = document.querySelector("#result_title");
    var result_description = document.querySelector("#result_description");

    form.addEventListener("submit", function (event) {
        event.preventDefault();
        var data = new FormData(form);
        var json_data = '{';
        for (const entry of data)
            json_data += '"' + entry[0] + '":"' + entry[1] + '",'
        json_data = json_data.substring(0, json_data.length - 1);
        json_data += '}';

        $.ajax({
            url: '/test-handler',
            type: 'POST',
            data: {data: json_data},
            success: function (res) {
                var result = JSON.parse(res);
                console.log(result);
                result_title.innerHTML = result.result.title;
                result_description.innerHTML = result.result.description;
            },
            error: function (res) {
                console.log(res);
            }
        });
    }, false);
});