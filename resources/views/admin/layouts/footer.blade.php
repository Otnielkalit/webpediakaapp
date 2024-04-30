<footer class="footer bg-light">
    <div
        class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3">
        <div>
            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/landing/" target="_blank"
                class="footer-text fw-bolder">Dinas Pemberdayaan Masyarakat Desa, Perempuan, dan Anak
            </a>
            ©
        </div>
        <div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    <i class="bx bx-log-out-circle"></i> Logout
                </button>
            </form>
        </div>
    </div>
</footer>
