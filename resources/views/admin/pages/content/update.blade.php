@extends('admin.layouts.admin_master')

@section('content')
    <h1>Edit Konten</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form id="edit-form" action="{{ route('content.update', ['content' => $content['id']]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Konten</label>
                    <input class="form-control" type="text" value="{{ old('judul', $content['judul']) }}" name="judul"
                        id="judul" required>
                </div>
                <div class="mb-3">
                    <label for="editor" class="form-label">Isi Konten</label>
                    <textarea id="editor" placeholder="Buat Deskripsi Yang Menarik" name="isi_content" rows="20" required>{{ old('isi_content', $content['isi_content']) }}</textarea>
                </div>
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ $content['image_content'] }}" alt="user-avatar" class="d-block rounded" height="250"
                        width="250" id="img">
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Masukkan Foto Baru</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" name="image_content" class="account-file-input" hidden
                                accept="image/png, image/jpeg">
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" id="reset">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="button" class="btn btn-primary me-2" id="save-changes-btn">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize CKEditor
            CKEDITOR.replace('editor');

            let img = document.getElementById('img');
            let input = document.getElementById('upload');
            let resetBtn = document.getElementById('reset');
            let saveChangesBtn = document.getElementById('save-changes-btn');
            let form = document.getElementById('edit-form');

            // Event listener for file input
            input.addEventListener('change', function(e) {
                if (input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        img.src = event.target.result;
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });

            // Event listener for reset button
            resetBtn.addEventListener('click', function(e) {
                img.src = '{{ $content['image_content'] }}';
                input.value = '';
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

