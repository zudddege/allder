(function ($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.notify-wh-button').on('click', function () {
        var id = $(this).attr('id');
        $.ajax({
            url: '/api/books/warehouse/' + id,
            success: function (res) {
                $('#notify_warehouse_no').val(res.warehouse_no);
                $('#notify_warehouse_name').val(res.warehouse_name);
                $('#notify_contact_name').val(res.contact_name);
                $('#notify_warehouse_tel').val(res.warehouse_tel);
                $('#notify_warehouse_detail').val(res.warehouse_detail);
                $('#notify_warehouse_district').val(res.warehouse_district);
                $('#notify_warehouse_city').val(res.warehouse_city);
                $('#notify_warehouse_province').val(res.warehouse_province);
                $('#notify_warehouse_postal_code').val(res.warehouse_postal_code);
                $('#notify-courier-modal').modal('show');
            }
        })
    });

    $('.assign-wh-button').on('click', function () {
        var id = $(this).attr('id');
        $.ajax({
            url: '/api/books/warehouse/' + id,
            success: function (res) {
                $('#assign_warehouse_detail').val(res.warehouse_detail);
                $('#assign_warehouse_district').val(res.warehouse_district);
                $('#assign_warehouse_city').val(res.warehouse_city);
                $('#assign_warehouse_province').val(res.warehouse_province);
                $('#assign_warehouse_postal_code').val(res.warehouse_postal_code);
                $('#assign-courier-modal').modal('show');
            }
        });
    });

    $('.hotkey-note-notify').on('click', function () {
        var text = $(this).val();
        $('#notify_note_detail').append(text + " ");
    });

    $('.hotkey-note-assign').on('click', function () {
        var text = $(this).html();
        $('#assign_note_detail').append(text + " ");
    });

    $.Thailand.setup({
        autocomplete_size: 5,
    });

    $.Thailand({
        // database: './jquery.Thailand.js/database/db.zip', // ฐานข้อมูลเป็นไฟล์ zip
        $district: $('#notify_warehouse_district'), // input ของตำบล
        $amphoe: $('#notify_warehouse_city'), // input ของอำเภอ
        $province: $('#notify_warehouse_province'), // input ของจังหวัด
        $zipcode: $('#notify_warehouse_postal_code'), // input ของรหัสไปรษณีย์
    });

    $('.warehouse-table').DataTable({
        autoWidth: false,
        searching: false,
        filter: false,
        ordering: false,
        paging: false,
        info: false,
        language: {
            emptyTable: "ไม่พบข้อมูล"
        },
        columns: [{
            "width": "15%"
        }, {
            "width": "15%"
        }, {
            "width": "23%",
        }, {
            "width": "20%"
        }, {
            "width": "15%"
        }, {
            "width": "12%"
        }],
        "ordering": false
    });
    $(".dataTables_length").css("display", "none");
    $(".dataTables_filter").css("display", "none");
})
