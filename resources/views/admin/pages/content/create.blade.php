@extends('admin.layouts.admin_master')

@section('content')
    <h1>Buat Konten</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form id="content-form" action="{{ route('content.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Konten</label>
                    <input class="form-control" type="text" name="judul" id="judul" value="{{ old('judul') }}" required>
                </div>
                <div class="mb-3">
                    <label for="violence_category_id" class="form-label">Kategori Kekerasan</label>
                    <select name="violence_category_id" id="violence_category_id" class="form-control" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($category_violences as $category)
                            <option value="{{ $category['id'] }}" {{ old('violence_category_id') == $category['id'] ? 'selected' : '' }}>
                                {{ $category['category_name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="editor" class="form-label">Isi Konten</label>
                    <textarea id="editor" name="isi_content" rows="20" placeholder="Buat Deskripsi Yang Menarik">{{ old('isi_content') }}</textarea>
                </div>
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ asset('asset-admin/assets/img/avatars/upload.png') }}" alt="user-avatar"
                        class="d-block rounded" height="250" width="250" id="img-preview">
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Masukkan gambar</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" name="image_content" class="account-file-input"
                                hidden accept="image/png, image/jpeg" required>
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4"
                            id="reset">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Tambah Sekarang</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi CKEditor
            CKEDITOR.replace('editor');

            let imgPreview = document.getElementById('img-preview');
            let inputFile = document.getElementById('upload');
            let resetBtn = document.getElementById('reset');

            inputFile.addEventListener('change', function(e) {
                if (inputFile.files && inputFile.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        imgPreview.src = event.target.result;
                    };
                    reader.readAsDataURL(inputFile.files[0]);
                }
            });

            resetBtn.addEventListener('click', function() {
                imgPreview.src = '{{ asset('asset-admin/assets/img/avatars/upload.png') }}';
                inputFile.value = '';
            });

            // Validasi form saat submit
            const form = document.getElementById('content-form');
            form.addEventListener('submit', function(event) {
                // Update textarea dengan nilai dari CKEditor
                for (let instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }

                // Validasi manual untuk CKEditor
                const editorContent = CKEDITOR.instances.editor.getData().trim();
                if (editorContent === '') {
                    alert('Isi Konten tidak boleh kosong');
                    event.preventDefault(); // Mencegah form submit jika validasi gagal
                }
            });
        });
    </script>
@endsection
