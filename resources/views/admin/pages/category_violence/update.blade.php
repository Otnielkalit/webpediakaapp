@extends('admin.layouts.admin_master')
@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Edit Category Kekerasan</h5>
        <form id="edit-form"
            action="{{ route('category-violence.update', ['category_violence' => $category_violence['id']]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ $category_violence['image'] }}" alt="user-avatar" class="d-block rounded" height="250"
                        width="250" id="img">
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Masukkan Foto Baru</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" name="image" class="account-file-input" hidden
                                accept="image/png, image/jpeg">
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" id="reset">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                    </div>
                </div>
                <hr class="my-0">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="category_name" class="form-label">Nama Kategori</label>
                            <input class="form-control" type="text" id="category_name" name="category_name"
                                value="{{ old('category_name', $category_violence['category_name']) }}" autofocus>
                            @error('category_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="button" class="btn btn-primary me-2" id="save-changes-btn">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let img = document.getElementById('img');
        let input = document.getElementById('upload');
        let resetBtn = document.getElementById('reset');
        let saveChangesBtn = document.getElementById('save-changes-btn');
        let form = document.getElementById('edit-form');

        // Event listener untuk input file
        input.addEventListener('change', function(e) {
            if (input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    img.src = event.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        // Event listener untuk tombol reset
        resetBtn.addEventListener('click', function(e) {
            // Reset ke gambar asli atau gambar default
            img.src = '{{ $category_violence['image'] }}';
            input.value = '';
        });

        // Event listener untuk tombol save changes
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
                    form.submit();
                }
            });
        });
    });
</script>
