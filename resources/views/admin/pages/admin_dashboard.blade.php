@extends('admin.layouts.admin_master')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="kabupatenSelect" class="form-label">Pilih Kabupaten/Kota</label>
                                {{-- <select class="form-select" id="kabupatenSelect" aria-label="Pilih Kabupaten/Kota">
                                    <option selected disabled>Pilih Kabupaten/Kota</option>
                                    <?php foreach ($wilayahIndonesia as $wilayah): ?>
                                    <?php if (!empty($wilayah[0])): ?>
                                    <option value="<?= $wilayah[0] ?>"><?= $wilayah[0] ?></option>
                                    <?php endif; ?>
                                    <?php if (!empty($wilayah[1])): ?>
                                    <option value="<?= $wilayah[1] ?>">- <?= $wilayah[1] ?></option>
                                    <?php endif; ?>
                                    <?php if (!empty($wilayah[2])): ?>
                                    <option value="<?= $wilayah[2] ?>">-- <?= $wilayah[2] ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select> --}}
                            </div>
                            <h5 class="card-title text-primary">Selamat Datang Admin DPMDPPA 🎉</h5>
                            <p class="mb-4">
                                You have done
                                <span class="fw-bold">72%</span>
                                more sales today. Check your new badge in
                                your profile.
                            </p>
                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View
                                Badges</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="asset-admin/assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Ketika nilai di select provinsi berubah
        document.getElementById('provinsiSelect').addEventListener('change', function() {
            // Ambil nilai yang dipilih dari select provinsi
            var selectedProvinsi = this.value;
            // Buat permintaan AJAX untuk mendapatkan data kabupaten/kota berdasarkan provinsi yang dipilih
            // Anda bisa menambahkan endpoint yang sesuai dengan URL Anda
            var url = `http://localhost:8080/wilayah-indonesia?provinsi=${selectedProvinsi}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Dapatkan elemen select kabupaten/kota
                    var kabupatenSelect = document.getElementById('kabupatenSelect');
                    // Kosongkan opsi yang ada sebelumnya
                    kabupatenSelect.innerHTML = '<option selected disabled>Pilih Kabupaten/Kota</option>';
                    // Tambahkan opsi kabupaten/kota berdasarkan data yang diterima
                    data.forEach(kabupaten => {
                        var option = document.createElement('option');
                        option.textContent = kabupaten;
                        option.value = kabupaten;
                        kabupatenSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
