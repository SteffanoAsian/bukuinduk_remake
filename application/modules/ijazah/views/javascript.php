<script type="text/javascript">
    var BASE_URL = "<?= base_url() ?>";

    function populateForm(frm, data) {
        $.each(data, function(key, value) {
            var $ctrl = $('[name="' + key + '"]', frm);
            if ($ctrl.is('select')) {
                if ($ctrl.data().hasOwnProperty('select2')) {
                    $ctrl.val(value).trigger('change');
                } else {
                    $("option", $ctrl).each(function() {
                        if (this.value == value) {
                            this.selected = true;
                        }
                    });
                }
            } else {
                switch ($ctrl.attr("type")) {
                    case "text":
                    case "email":
                    case "number":
                    case "hidden":
                    case "textarea":
                        $ctrl.val(value);
                        break;
                    case "radio":
                    case "checkbox":
                        $ctrl.each(function() {
                            if ($(this).attr('value') == value) {
                                $(this).prop('checked', true)
                            }
                        });
                        break;
                }
            }
        });
    }

    $(() => {
        $('.datepicker').datepicker({
            orientation: 'bottom center',
            clearBtn: true,
            format: 'dd/mm/yyyy',
            todayHighlight: true,
        });
        index()
    })

    save = () => {
        var data = new FormData($("#formIjazah")[0]);
        var id = $('#siswa_id').val();

        Swal.fire({
            title: "Information",
            text: "Apakah anda yakin ingin menyimpan data tersebut",
            icon: "info",
            showCancelButton: true,
            confirmButtonText: '<i class="fa fa-check"></i> Yes',
            confirmButtonClass: 'btn btn-focus btn-success m-btn m-btn--pill m-btn--air',
            cancelButtonText: '<i class="fa fa-times"></i> No',
            cancelButtonClass: 'btn btn-focus btn-danger m-btn m-btn--pill m-btn--air',
            reverseButtons: true
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: BASE_URL + 'Ijazah/update',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        var res = JSON.parse(res);
                        Swal.fire(
                            res.success ? 'Success' : 'Failed',
                            res.message,
                            res.success ? 'success' : 'error',
                        )
                    }
                })
            } else {
                window.location.reload();
            }
        })
    }

    index = () => {
        $.ajax({
            url: BASE_URL + 'Ijazah/getData',
            type: "POST",
            processData: false,
            contentType: false,
            success: function(res) {
                var res = JSON.parse(res);
                var frm = $(`[id="formIjazah"]`)
                populateForm(frm, res)
                $(`#siswa_tgl_lahir`).val(moment(res.siswa_tgl_lahir).format('DD/MM/yyyy'));
            }
        })
    }
</script>