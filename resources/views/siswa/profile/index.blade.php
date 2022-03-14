@extends('layouts.app', ['title' => 'Profile Siswa'])

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ auth()->user()->img_avatar }}" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{ auth()->user()->name }}</h4>
                                    @if (auth()->user()->kelas_id == 0)
                                        <p class="text-secondary mb-1">None</p>
                                    @else
                                        <p class="text-secondary mb-1">{{ auth()->user()->kelas->name }}</p>
                                    @endif
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ auth()->user()->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ auth()->user()->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ auth()->user()->phone }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Created At</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ auth()->user()->created_at }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Updated At</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ auth()->user()->updated_at }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-warning " href="{{ route('siswa.profile.edit') }}">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
                <div class="card-header">
                    <h4>Two Factor Authentication</h4>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        @if (session('status'))
                            @if (session('status') == 'two-factor-authentication-enabled')
                                <div class="m-3 badge badge-success">Two Factor Authentication Enable</div>
                            @endif
                            @if (session('status') == 'two-factor-authentication-disabled')
                                <div class="m-3 badge badge-danger">Two Factor Authentication Disable</div>
                            @endif
                            @if (session('status') == 'recovery-codes-generated')
                                <div class="m-3 badge badge-warning">Recovery Codes Generated</div>
                            @endif
                        @endif

                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
                            @if (!auth()->user()->two_factor_secret)
                                {{-- Enable 2FA --}}
                                <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                                    @csrf
                                    <div class="text-center"><button type="submit" class="btn btn-primary">
                                            Enable Two-Factor
                                        </button></div>
                                </form>
                            @else
                                {{-- Disable 2FA --}}
                                <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="text-center"><button type="submit" class="btn btn-danger">
                                            Disable Two-Factor
                                        </button></div>
                                </form>

                                @if (session('status') == 'two-factor-authentication-enabled')
                                    <div class="mt-4">
                                        Otentikasi dua faktor sekarang diaktifkan. Pindai kode QR berikut menggunakan
                                        aplikasi
                                        pengautentikasi ponsel Anda.
                                    </div>

                                    <div class="mb-3 mt-4">
                                        {!! auth()->user()->twoFactorQrCodeSvg() !!}
                                    </div>
                                @endif

                                {{-- Show 2FA Recovery Codes --}}
                                <div class="mt-4">
                                    Simpan recovery code ini dengan aman. Ini dapat digunakan untuk memulihkan akses ke akun
                                    Anda jika perangkat otentikasi dua faktor Anda hilang.
                                </div>

                                <div style="background: rgb(44, 44, 44);color:white" class="rounded p-3 mb-2 mt-4">
                                    @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as
                                    $code)
                                    <div>{{ $code }}</div>
                            @endforeach
                    </div>
                    {{-- Regenerate 2FA Recovery Codes --}}
                    <form method="POST" action="{{ url('user/two-factor-recovery-codes') }}">
                        @csrf

                        <div class="text-center"><button type="submit" class="btn btn-warning">
                                Regenerate Recovery Codes
                            </button></div>
                    </form>
                    @endif
                    @endif
                </div>
            </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script>
        $("#table-siswa").dataTable({

        });
    </script>
@endsection
