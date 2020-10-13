jQuery(document).ready(function ($) {
    $(document).on('click change', '.__cjax', function (e) {
        e.preventDefault();
        let data = JSON.stringify($(this).data());
        let changed = $(this).val();

        let action = $(this).data('action');
        let target = $(this).data('target');
        let type = $(this).data('type');
        if (!type) type = 'POST';

        $.ajax({
            url: action,
            type: type,
            data: {data: data, changed: changed},
            success: function (res) {
                if(action === "module-upload" || action === "module-update")
                    alert('Дейтвие выполнено успешно');
                $('#' + target).html(res);
            },
            error: function (res) {
                console.log(res);
            }
        });
    });
});