$( document ).ready(function() {
    $('#create-button').click(function (e) {
        let data = { name: $('#name-project').val() };

        $.post('/project', $.param(data)).then(data => {
            console.log(data);
        })
    });

    $('#create-task').click(function (e) {
        let data = { name: $('#task-input').val(), project: $('#task-input').data('project') };

        console.log(data);
        $.post('/task', $.param(data)).then(data => {
            console.log(data);
        })
    });

    $('.play-task').click(function (e) {
        let id = $(this).data('id');
        $.get(`/start/${id}`).then(data => {
            console.log(data);
        })
    });

    $('.stop-task').click(function (e) {
        let data = { text: $(this).prev().val() };

        $.post(`/stop/${id}`).then(data => {
            console.log(data);
        })
    });
});
