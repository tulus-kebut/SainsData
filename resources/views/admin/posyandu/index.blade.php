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
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('posyandu.create') }}" class="btn btn-fill btn-primary">Add data +</a>
                            <a href="{{ route('posyandu.export') }}" class="btn btn-fill btn-primary">export excel</a>
                        </div>
                        <div class="col-md-6">
                            <form class="d-flex" action="{{ route('posyandu') }}" method="GET">
                                @csrf
                                <input class="form-control me-2 mx-2 mt-1" type="search" placeholder="Search: Nama/Dusun/Nama Ibu ..." id="search" name="search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit"><i
                                    class="tim-icons icon-zoom-split"></i>
                            </button>
                            </form>
                        </div>
                        <div class="col-md-12">
                            @if (session('success'))
                                <div class="alert alert-success alert-with-icon" data-notify="container">
                                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                        <i class="tim-icons icon-simple-remove"></i>
                                    </button>
                                    <span data-notify="icon" class="tim-icons icon-check-2"></span>
                                    <span data-notify="message">{{ session('success') }}</span>
                                </div>
                            @endif
                            <div class="card ">
                                <div class="card-header">
                                    <h4 class="card-title"> Tabel Stunting</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="">
                                            <thead class=" text-primary">
                                                <tr>
                                                    <th>
                                                        No
                                                    </th>
                                                    <th>
                                                        Nama
                                                    </th>
                                                    <th>
                                                        Jenis Kelamin
                                                    </th>
                                                    <th>
                                                        Tanggal Lahir
                                                    </th>
                                                    <th>
                                                        Posyandu
                                                    </th>
                                                    <th class="text-center">
                                                        action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datas as $i => $data)
                                                    <tr>
                                                        <td>
                                                            {{ $i + $datas->firstItem() }}
                                                        </td>
                                                        <td>
                                                            {{ $data->nama }}
                                                        </td>
                                                        <td>
                                                            {{ $data->kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                                        </td>
                                                        <td>
                                                            {{ $data->tanggal_lahir }}
                                                        </td>
                                                        <td>
                                                            {{ $data->posyandu->nama_posyandu }}
                                                        </td>
                                                        <td class="text-center py-2">
                                                            <button data-target="#exampleModal" type="submit"
                                                                data-toggle="modal"
                                                                class="btn btn-icon btn-round btnStunting"
                                                                data-nama="{{ $data->nama }}"
                                                                data-nama_ortu="{{ $data->nama_ortu }}"
                                                                data-kelamin="{{ $data->kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}"
                                                                data-tanggal_lahir="{{ $data->tanggal_lahir }}"
                                                                data-dusun="{{ $data->dusun->nama_dusun }}"
                                                                data-posyandu="{{ $data->posyandu->nama_posyandu }}"
                                                                data-usia_ukur="{{ $data->usia_ukur }}">
                                                                <i class="tim-icons icon-alert-circle-exc"></i>
                                                            </button>
                                                            <button
                                                                onclick="window.location.href='{{ route('posyandu.edit', $data->id) }}'"
                                                                class="btn btn-icon btn-round">
                                                                <i class="tim-icons icon-pencil"></i>
                                                            </button>
                                                            <form class="d-inline"
                                                                action="{{ route('posyandu.delete', $data->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-icon btn-round delete" data-nama="{{ $data->nama }}">
                                                                    <i class="tim-icons icon-trash-simple"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel">Detail balita
                                                            stunting Desa Pelat</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row mb-2">
                                                            <div class="col-6">
                                                                <b>Nama Balita</b>
                                                            </div>
                                                            <div class="col-6" id="namaBalita"></div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-6">
                                                                <b>Tanggal Lahir</b>
                                                            </div>
                                                            <div class="col-6" id="tanggalLahir"></div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-6">
                                                                <b>Jenis Kelamin</b>
                                                            </div>
                                                            <div class="col-6" id="jenisKelamin"></div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-6">
                                                                <b>Usia Saat Ukur</b>
                                                            </div>
                                                            <div class="col-6" id="usiaUkur"></div>
                                                        </div>
                                                        <div class="dropdown-divider"></div>
                                                        <div class="row mb-2">
                                                            <div class="col-6">
                                                                <b>Nama Ibu</b>
                                                            </div>
                                                            <div class="col-6" id="namaOrtu"></div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-6">
                                                                <b>Dusun</b>
                                                            </div>
                                                            <div class="col-6" id="dusun"></div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-6">
                                                                <b>Kelompok Posyandu</b>
                                                            </div>
                                                            <div class="col-6" id="posyandu"></div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-primary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer clearfix d-flex justify-content-end">
                                    {{ $datas->links() }}
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

    <script>
        $(".delete").on("click", function(e) {
            e.preventDefault()
            
            const nama = $(this).data('nama')
            let button = $(this)
            let form = button.parent('form')
            let ok = false
            Swal.fire({
                title: 'Apakah anda yakin ingin menghapus?',
                text: `${nama} akan dihapus permanent`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    ok = true; // Setel ok ke true jika pengguna mengklik "Yes"
                    form.submit(); // Kirim formulir

                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            });
        })
    </script>

    <script>
        $(".btnStunting").on("click", function(e) {
            e.preventDefault()

            $('#namaBalita').text($(this).data('nama'))

            $('#namaOrtu').text($(this).data('nama_ortu'))

            $('#posyandu').text($(this).data('posyandu'))

            $('#dusun').text($(this).data('dusun'))

            $('#tanggalLahir').text($(this).data('tanggal_lahir'))

            $('#jenisKelamin').text($(this).data('kelamin'))

            $('#usiaUkur').text($(this).data('usia_ukur'))
        })
    </script>
</body>

</html>
