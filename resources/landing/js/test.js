$(document).ready(function () {
    let form = document.querySelector("form");
    let result_score = document.querySelector("#result_score");
    let result_title = document.querySelector("#result_title");
    let result_description = document.querySelector("#result_description");
    let result_button = document.querySelector("#result_button");
    let result_container = document.querySelector("#result_container_test");

    form.addEventListener("submit", function (event) {
        event.preventDefault();
        result_container.style.display = "block";
        let data = new FormData(form);
        let json_data = '{';
        for (const entry of data)
            json_data += '"' + entry[0] + '":"' + entry[1] + '",';
        json_data = json_data.substring(0, json_data.length - 1);
        json_data += '}';

        $.ajax({
            url: '/test-handler',
            type: 'POST',
            data: {data: json_data},
            success: function (res) {
                let result = JSON.parse(res);
                result_score.innerHTML = "Кол-во правильных ответов: " + result.score;
                result_title.innerHTML = "Ваш уровень: " + result.result.title;
                result_description.innerHTML = result.result.description;
                result_button.classList.remove("hidden");

                result.answers.forEach(element => {
                    $("#" + element.question_id + "-" + element.right_answer_id).css("background-color", '#B1E07E');
                    if (element.right_answer_id !== element.chosen_answer_id) {
                        $("#" + element.question_id + "-" + element.chosen_answer_id).css("background-color", '#FA9A95');
                    }
                });
            },
            error: function (res) {
                console.log(res);
            }
        });
    }, false);
});