<?php $this->beginContent('@app/views/layouts/layout.php'); ?>

<div class="lg:text-2xl text-xl font-bold">Kelola Mahasiswa</div>
<div class="mx-auto mt-5 mb-10">
    <div class="my-3">
        <div class="grid grid-cols-12 gap-3 pb-2">
            <div class="lg:col-span-3"></div>
            <div class="lg:col-span-3"></div>
            <div class="lg:col-span-3 col-span-12"></div>
            <div class="lg:col-span-3 col-span-12">
                <button class="btn btn-primary btn-block btn-tambah">Tambah Mahasiswa</button>
            </div>
        </div>
        <table id="table" class="table w-full" style="width: 100%;">
            <thead>
                <tr class="text-center">
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody class="text-center">
            </tbody>
        </table>
    </div>
</div>

<script>
    const table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        responsive: false,
        scrollX: true,
        ajax: `${BASE_URL}/mahasiswa/datatable`,
        order: [
            [0, 'asc']
        ],
        columns: [{
                data: 'nim',
                render: function(data) {
                    return `<span class="truncate overflow-ellipsis w-3/5">${data}</span>`
                }
            },
            {
                data: 'nama',
                render: function(data, _, row) {
                    return `<span class="truncate overflow-ellipsis w-3/5">${data}</span>`
                }
            },
            {
                data: 'jurusan',
                render: function(data, _, row) {
                    return `<span class="truncate overflow-ellipsis w-3/5">${data}</span>`
                }
            },
            {
                data: 'id',
                searchable: false,
                orderable: false,
                width: '25%',
                render: function(data, _, row) {
                    return `
                       <div class="flex justify-center gap-2">
                            <button data-reference="${data}" class="btn btn-warning btn-sm btn-edit-modal text-white" data-tippy-content="Edit Pengguna">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>
                            </button>

                            <button data-reference="${data}" class="btn btn-error btn-sm btn-delete-modal text-white" data-tippy-content="Hapus Pengguna">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                    `
                }
            }
        ],
        drawCallback: function() {
            tippy('.dataTables_wrapper [data-tippy-content]', {
                arrow: false
            })
        }
    });

    $('.btn-tambah').on('click', function(e) {
        e.preventDefault()

        $.ajax({
            url: `${BASE_URL}/mahasiswa/modal-create/`,
            success: function(response) {
                $('#modal-global-container.modal .modal-box').html(response.html)
                $('#modal-global').prop('checked', true)
            }
        })
    })

    $(document).on('click', '.btn-edit-modal', function() {
        const ref = $(this).data('reference')
        $.ajax({
            url: `${BASE_URL}/mahasiswa/modal-edit/${ref}`,
            success: function(response) {
                $('#modal-global-container.modal .modal-box').html(response.html)
                $('#modal-global').prop('checked', true)
            }
        })
    })


    $(document).on('click', '.btn-delete-modal', function() {
        const ref = $(this).data('reference')
        $.ajax({
            url: `${BASE_URL}/mahasiswa/modal-delete/${ref}`,
            success: function(response) {
                $('#modal-global-container.modal .modal-box').html(response.html)
                $('#modal-global').prop('checked', true)
            }
        })
    })

    initFormAjax('#form-add', {
        success: function(response) {
            $('#modal-global').prop('checked', false)
            table.draw()
            Swal.fire({
                icon: 'success',
                title: "Success",
                text: response.message,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
        },
        error: function(xhr) {
            const response = xhr.responseJSON
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
        }
    })

    initFormAjax('#form-delete', {
        success: function(response) {
            $('#modal-global').prop('checked', false)
            table.draw()
            Swal.fire({
                icon: 'success',
                title: "Success",
                text: response.message,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
        },
        error: function(xhr) {
            const response = xhr.responseJSON
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
        }
    })

    initFormAjax('#form-update', {
        success: function(response) {
            $('#modal-global').prop('checked', false)
            table.draw()
            Swal.fire({
                icon: 'success',
                title: "Success",
                text: response.message,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
        },
        error: function(xhr) {
            const response = xhr.responseJSON
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
        }
    })
</script>

<?php $this->endContent(); ?>

