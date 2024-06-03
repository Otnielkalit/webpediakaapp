@extends('admin.layouts.admin_master')

@section('content')
    <h1>Edit Event</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form id="edit-form" action="{{ route('event.update', ['event' => $event['id']]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_event" class="form-label">Nama Event</label>
                    <input class="form-control" type="text" value="{{ old('nama_event', $event['nama_event']) }}"
                        name="nama_event" id="nama_event" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="tanggal_pelaksanaan" class="form-label">Waktu Pelaksanaan Kegiatan
                        ({{ \Carbon\Carbon::parse($event['tanggal_pelaksanaan'])->format('d M Y, H:i') }})</label>
                    <input class="form-control" type="datetime-local" name="tanggal_pelaksanaan" id="tanggal_pelaksanaan"
                        value="{{ \Carbon\Carbon::parse($event['tanggal_pelaksanaan'])->format('Y-m-d\TH:i') }}" required>
                </div>
                <div class="mb-3">
                    <label for="editor" class="form-label">Isi Konten</label>
                    <textarea id="editor" placeholder="Buat Deskripsi Yang Menarik" name="deskripsi_event" rows="20" required>{{ old('deskripsi_event', $event['deskripsi_event']) }}</textarea>
                </div>
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ $event['thumbnail_event'] }}" alt="user-avatar" class="d-block rounded" height="250"
                        width="250" id="img-preview">
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Masukkan Foto Baru</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" name="thumbnail_event" class="account-file-input" hidden
                                accept="image/png, image/jpeg">
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" id="reset">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2" id="save-changes-btn">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize CKEditor
        CKEDITOR.replace('editor');

        let imgPreview = document.getElementById('img-preview');
        let inputFile = document.getElementById('upload');
        let resetBtn = document.getElementById('reset');
        let saveChangesBtn = document.getElementById('save-changes-btn');
        let form = document.getElementById('edit-form');

        // Event listener for file input
        inputFile.addEventListener('change', function(e) {
            if (inputFile.files && inputFile.files[0]) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    imgPreview.src = event.target.result;
                };
                reader.readAsDataURL(inputFile.files[0]);
            }
        });

        // Event listener for reset button
        resetBtn.addEventListener('click', function(e) {
            imgPreview.src = '{{ $event['thumbnail_event'] }}';
            inputFile.value = '';
        });

        // Event listener for save changes button
        saveChangesBtn.addEventListener('click', function() {
            Swal.fire({
                title: 'Yakin ingin menyimpan perubahan?',
                text: "Pastikan data yang diubah sudah benar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Update CKEditor textarea
                    for (let instance in CKEDITOR.instances) {
                        CKEDITOR.instances[instance].updateElement();
                    }

                    // Check if the editor content is empty
                    const editorContent = CKEDITOR.instances.editor.getData().trim();
                    if (editorContent === '') {
                        Swal.fire('Error', 'Isi Konten tidak boleh kosong', 'error');
                    } else {
                        form.submit();
                    }
                }
            });
        });
    });
</script>
