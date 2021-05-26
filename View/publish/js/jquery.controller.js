function getData(url, callback) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: url,
        success: function(data) {

            callback(data);


        },
        error: function(data) {
            response_error(data);

        }

    });
}

function response_error(data) {

    var response = '';

    if (data.responseJSON.message) {
        Swal.fire(
            'Error',
            data.responseJSON.message,
            'error'
        );
    }
    Object.values(data.responseJSON.error).forEach(element => {
        response += element + "<br>";
    });

    Swal.fire(
        'Error',
        response,
        'error'
    )
}

function init() {
    location.reload();
}

function save(url, form_data, callback = init()) {
    try {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: url,
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {

                Swal.fire(
                    'Successfull',
                    data.message,
                    'success'
                )

                callback();
                $('.modal').modal('hide');




            },
            error: function(data) {

                response_error(data);

            }

        });
    } catch (err) {
        alert(err);
    }


}
//note: api method is DELETE
function deleteModel(url, id, category = 'category') {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {

        if (result.value) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'DELETE',
                url: url,
                success: function(data) {
                    console.log(data);
                    Swal.fire(
                        'Successfull',
                        data.message,
                        'success'
                    );
                    $('#' + category + '-' + id).remove();


                },
                error: function(data) {
                    response_error(data);

                }

            });

        }
    })

}

function clickEditForm(form_edit_id, button, form_type = 'category') {
    category_id = $(button).attr('id');
    category = $('#' + form_type + '-' + category_id + ' :input');

    var values = {};
    category.each(function() {
        values[this.name] = $(this).val();

    })

    var $inputs = $('#' + form_edit_id + ' :input');
    var $selects = $('#' + form_edit_id + ' select');

    $inputs.each(function() {

        if ($(this).attr('name') !== 'html_class') {
            if ($(this).attr('name') != '_token')
                $(this).val(values[this.name]);

            if ($(this).attr('name') == 'id') {
                $(this).val(category_id);
            }
        }



    });

    $selects.each(function() {
        $(this).val(values[this.name]);

    });
    $("th > select").select2();


}