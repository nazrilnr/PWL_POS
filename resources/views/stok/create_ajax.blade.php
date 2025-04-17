{{-- resources/views/stok/create_ajax.blade.php --}}
<form action="{{ url('/stok/ajax') }}" method="POST" id="form-tambah">
    @csrf

    {{-- Hanya modal-dialog, muat di dalam #myModal --}}
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Stok</h5>
                <button type="button" class="close" data-dismiss="modal">
                  <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- Barang --}}
                <div class="form-group">
                    <label>Barang</label>
                    <select name="barang_id" id="barang_id" class="form-control" required>
                        <option value="">- Pilih Barang -</option>
                        @foreach($barang as $b)
                            <option value="{{ $b->barang_id }}">{{ $b->barang_nama }}</option>
                        @endforeach
                    </select>
                    <small id="error-barang_id" class="error-text form-text text-danger"></small>
                </div>

                {{-- User --}}
                <div class="form-group">
                    <label>User</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        <option value="">- Pilih User -</option>
                        @foreach($user as $u)
                            <option value="{{ $u->user_id }}">{{ $u->nama }}</option>
                        @endforeach
                    </select>
                    <small id="error-user_id" class="error-text form-text text-danger"></small>
                </div>

                {{-- Tanggal --}}
                <div class="form-group">
                    <label>Tanggal Stok</label>
                    <input type="datetime-local" name="stok_tanggal" id="stok_tanggal" class="form-control" required>
                    <small id="error-stok_tanggal" class="error-text form-text text-danger"></small>
                </div>

                {{-- Jumlah --}}
                <div class="form-group">
                    <label>Jumlah Stok</label>
                    <input type="number" name="stok_jumlah" id="stok_jumlah" class="form-control" required min="1">
                    <small id="error-stok_jumlah" class="error-text form-text text-danger"></small>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
$(function () {
    // Setup CSRF header (jika belum di-setup global)
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $('#form-tambah').validate({
        rules: {
            barang_id:     { required: true },
            user_id:       { required: true },
            stok_tanggal:  { required: true },
            stok_jumlah:   { required: true, min: 1 }
        },
        submitHandler: function (form) {
            $.ajax({
                url:   form.action,
                type:  form.method,
                data:  $(form).serialize(),
                success: function (response) {
                    if (response.status) {
                        // Sembunyikan modal wrapper, bukan dialog-nya
                        $('#myModal').modal('hide');
                        Swal.fire({
                            icon:  'success',
                            title: 'Berhasil',
                            text:  response.message
                        });
                        dataStok.ajax.reload();
                    } else {
                        // Tampilkan validasi field
                        $('.error-text').text('');
                        $.each(response.msgField, function (field, msgs) {
                            $('#error-' + field).text(msgs[0]);
                        });
                        Swal.fire({
                            icon:  'error',
                            title: 'Gagal',
                            text:  response.message
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon:  'error',
                        title: 'Error',
                        text:  error
                    });
                }
            });
            return false; // cegah form submit normal
        },
        errorElement:    'span',
        errorPlacement:  function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight:       function (element) { $(element).addClass('is-invalid'); },
        unhighlight:     function (element) { $(element).removeClass('is-invalid'); }
    });
});
</script>
