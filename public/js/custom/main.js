$('#csvfile').on('change', function (e) {
    let file_parts = $('#csvfile').val().split(".");
    if (file_parts[1] == 'csv') {
        $('#csvfile_error').html('');
    }
    else {
        $('#csvfile').val('');
        $('#csvfile_error').html('Please Select CSV file.');
    }
});