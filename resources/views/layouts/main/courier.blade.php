<script>
   $.Thailand.setup({
        autocomplete_size: 10,
    });

    $.Thailand({
        // database: './jquery.Thailand.js/database/db.zip', // ฐานข้อมูลเป็นไฟล์ zip
        $district: $('#notify_warehouse_district'), // input ของตำบล
        $amphoe: $('#notify_warehouse_city'), // input ของอำเภอ
        $province: $('#notify_warehouse_province'), // input ของจังหวัด
        $zipcode: $('#notify_warehouse_postal_code'), // input ของรหัสไปรษณีย์
    });

    $.Thailand({
        // database: './jquery.Thailand.js/database/db.zip', // ฐานข้อมูลเป็นไฟล์ zip
        $district: $('#assign_warehouse_district'), // input ของตำบล
        $amphoe: $('#assign_warehouse_city'), // input ของอำเภอ
        $province: $('#assign_warehouse_province'), // input ของจังหวัด
        $zipcode: $('#assign_warehouse_postal_code'), // input ของรหัสไปรษณีย์
    });

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
        var value = $(this).attr('value');
        $('#notify_note_detail').val($('#notify_note_detail').val() + value);
    });

    $('.hotkey-note-assign').on('click', function () {
        var value = $(this).attr('value');
        $('#assign_note_detail').val($('#assign_note_detail').val() + value);
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

</script>

<script>
    $('#search-ware').on("keyup", function () {
        $('table.paginated-ware').trigger('repaginate');
    })

    $('table.paginated-ware').each(function () {
        var currentPage = 0;
        var numPerPage = 7;
        var $table = $(this);
        var $pager = $('<div class="pager-ware"></div>');
        var $previous = $('<span class="previous-ware"><<</span>');
        var $next = $('<span class="next-ware">>></span>');

        $pager.insertAfter($table).find('span.page-number-ware:first').addClass('active');

        $table.bind('repaginate', function () {
            $table.find('tbody tr').hide();

            $filteredRows = $table.find('tbody tr').filter(function (i, tr) {
                return $('#search-ware').val() != "" ? $(tr).find("td").get().map(function (td) {
                    return $(td).text();
                }).filter(function (td) {
                    return td.indexOf($('#search-ware').val()) != -1;
                }).length > 0 : true;
            });

            $filteredRows.slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();

            var numRows = $filteredRows.length;
            var numPages = Math.ceil(numRows / numPerPage);

            $pager.find('.page-number-ware, .previous-ware, .next-ware').remove();
            for (var page = 0; page < numPages; page++) {
                var $newPage = $('<span class="page-number-ware"></span>').text(page + 1).bind('click', {
                    newPage: page
                }, function (event) {
                    currentPage = event.data['newPage'];
                    $table.trigger('repaginate');
                })
                if (page == currentPage) {
                    $newPage.addClass('clickable active');
                } else {
                    $newPage.addClass('clickable');
                }
                $newPage.appendTo($pager)
            }

            $previous.insertBefore('span.page-number-ware:first');
            $next.insertAfter('span.page-number-ware:last');

            $next.click(function (e) {
                $previous.addClass('clickable');
                $pager.find('.active').next('.page-number-ware.clickable').click();
            });
            $previous.click(function (e) {
                $next.addClass('clickable');
                $pager.find('.active').prev('.page-number-ware.clickable').click();
            });

            $next.addClass('clickable');
            $previous.addClass('clickable');

            setTimeout(function () {
                var $active = $pager.find('.page-number-ware.active');
                if ($active.next('.page-number-ware.clickable').length === 0) {
                    $next.removeClass('clickable');
                } else if ($active.prev('.page-number-ware.clickable').length === 0) {
                    $previous.removeClass('clickable');
                }
            });
        });
        $table.trigger('repaginate');
    });

    $('#search-ware2').on("keyup", function () {
        $('table.paginated-ware2').trigger('repaginate');
    })

    $('table.paginated-ware2').each(function () {
        var currentPage = 0;
        var numPerPage = 7;
        var $table = $(this);
        var $pager = $('<div class="pager-ware2"></div>');
        var $previous = $('<span class="previous-ware2"><<</span>');
        var $next = $('<span class="next-ware2">>></span>');

        $pager.insertAfter($table).find('span.page-number-ware2:first').addClass('active');

        $table.bind('repaginate', function () {
            $table.find('tbody tr').hide();

            $filteredRows = $table.find('tbody tr').filter(function (i, tr) {
                return $('#search-ware2').val() != "" ? $(tr).find("td").get().map(function (td) {
                    return $(td).text();
                }).filter(function (td) {
                    return td.indexOf($('#search-ware2').val()) != -1;
                }).length > 0 : true;
            });

            $filteredRows.slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();

            var numRows = $filteredRows.length;
            var numPages = Math.ceil(numRows / numPerPage);

            $pager.find('.page-number-ware2, .previous-ware2, .next-ware2').remove();
            for (var page = 0; page < numPages; page++) {
                var $newPage = $('<span class="page-number-ware2"></span>').text(page + 1).bind('click', {
                    newPage: page
                }, function (event) {
                    currentPage = event.data['newPage'];
                    $table.trigger('repaginate');
                })
                if (page == currentPage) {
                    $newPage.addClass('clickable active');
                } else {
                    $newPage.addClass('clickable');
                }
                $newPage.appendTo($pager)
            }

            $previous.insertBefore('span.page-number-ware2:first');
            $next.insertAfter('span.page-number-ware2:last');

            $next.click(function (e) {
                $previous.addClass('clickable');
                $pager.find('.active').next('.page-number-ware2.clickable').click();
            });
            $previous.click(function (e) {
                $next.addClass('clickable');
                $pager.find('.active').prev('.page-number-ware2.clickable').click();
            });

            $next.addClass('clickable');
            $previous.addClass('clickable');

            setTimeout(function () {
                var $active = $pager.find('.page-number-ware2.active');
                if ($active.next('.page-number-ware2.clickable').length === 0) {
                    $next.removeClass('clickable');
                } else if ($active.prev('.page-number-ware2.clickable').length === 0) {
                    $previous.removeClass('clickable');
                }
            });
        });
        $table.trigger('repaginate');
    });
</script>




