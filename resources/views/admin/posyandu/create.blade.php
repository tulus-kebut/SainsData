@include('layouts.header')
<title>{{ $title }}</title>

<body class="">
    <div class="wrapper">

        @include('layouts.sidebar')

        <div class="main-panel">
            <!-- Navbar -->
            @include('layouts.navbar', ['navbarBrand' => 'Posyandu'])

            <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Navbar -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="alert alert-danger " data-notify="container">
                                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                        <i class="tim-icons icon-simple-remove"></i>
                                    </button>
                                    <span data-notify="icon" class="tim-icons icon-alert-circle-exc"></span>
                                    <span data-notify="message">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li style="list-style: none"><i
                                                        class="tim-icons icon-simple-remove"></i> {{ $error }}
                                                    (wajib isi)</li>
                                            @endforeach
                                        </ul>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-2">
                            <a href="{{ route('posyandu') }}" type="submit" class="btn btn-info text-white "><i
                                    class="tim-icons icon-minimal-left"></i> Kembali</a>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Tambah Data</h2>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('posyandu.create') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-5 pr-md-1">
                                                <div class="form-group">
                                                    <label for="desa">Desa (automatic)</label>
                                                    <input type="text" name="desa" id="desa"
                                                        class="form-control" disabled="" value="Desa Pelat">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-md-1">
                                                <div class="form-group">
                                                    <label for="kode_posyandu">Kelompok Posyandu</label>
                                                    <select name="kode_posyandu" class="form-control">
                                                        <option selected disabled>Pilih Kelompok Posyandu</option>
                                                        @if (isset($posyandu))
                                                            @foreach ($posyandu as $data)
                                                                <option class="text-dark"
                                                                    value="{{ $data->kode_posyandu }}">
                                                                    {{ $data->nama_posyandu }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-md-1">
                                                <div class="form-group">
                                                    <label for="kode_dusun">Dusun</label>
                                                    <select name="kode_dusun" class="form-control">
                                                        <option selected disabled>Pilih Dusun</option>
                                                        @if (isset($dusun))
                                                            @foreach ($dusun as $data)
                                                                <option class="text-dark"
                                                                    value="{{ $data->kode_dusun }}">
                                                                    {{ $data->nama_dusun }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-md-1">
                                                <div class="form-group">
                                                    <label for="nama">Nama Balita</label>
                                                    <input type="text" name="nama" class="form-control"
                                                        placeholder="Nama Lengkap..." autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-md-1">
                                                <div class="form-group">
                                                    <label for="nama_ortu">Nama Ortu (Ibu)</label>
                                                    <input name="nama_ortu" type="text" class="form-control"
                                                        placeholder="Nama Ibu...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="alamat">Alamat Lengkap (opsional)</label>
                                                    <input name="alamat" type="text" class="form-control"
                                                        placeholder="alamat lengkap..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-md-1">
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <div class="form-check ml-3">
                                                        <input class="form-check-input" type="radio" name="kelamin"
                                                            id="L" value="L">
                                                        <label class="form-check-label" for="L">
                                                            Laki-laki
                                                        </label>
                                                    </div>
                                                    <div class="form-check ml-3">
                                                        <input class="form-check-input" type="radio" name="kelamin"
                                                            id="P" value="P">
                                                        <label class="form-check-label" for="P">
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-md-1">
                                                <div class="form-group">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    <input name="tanggal_lahir" type="date" class="form-control"
                                                        name="dob">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-md-1">
                                                <div class="form-group">
                                                    <label for="usia_ukur">Usia Saat Ukur</label>
                                                    <input name="usia_ukur" id="usia_ukur" type="number"
                                                        class="form-control" placeholder="Usia Saat Ukur" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-fill btn-primary"><i
                                                    class="tim-icons icon-notes"></i> Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Background</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="badge-colors text-center">
                            <span class="badge filter badge-primary active" data-color="primary"></span>
                            <span class="badge filter badge-info" data-color="blue"></span>
                            <span class="badge filter badge-success" data-color="green"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="adjustments-line text-center color-change">
                    <span class="color-label">LIGHT MODE</span>
                    <span class="badge light-badge mr-2"></span>
                    <span class="badge dark-badge ml-2"></span>
                    <span class="color-label">DARK MODE</span>
                </li>
                <li class="button-container">
                    <a href="https://www.creative-tim.com/product/black-dashboard" target="_blank"
                        class="btn btn-primary btn-block btn-round">Download Now</a>
                    <a href="https://demos.creative-tim.com/black-dashboard/docs/1.0/getting-started/introduction.html"
                        target="_blank" class="btn btn-default btn-block btn-round">
                        Documentation
                    </a>
                </li>
                <li class="header-title">Thank you for 95 shares!</li>
                <li class="button-container text-center">
                    <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot;
                        45</button>
                    <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot;
                        50</button>
                    <br>
                    <br>
                    <a class="github-button" href="https://github.com/creativetimofficial/black-dashboard"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                </li>
            </ul>
        </div>
    </div>
    <!--   Core JS Files   -->
    @include('layouts.script')
</body>

</html>
