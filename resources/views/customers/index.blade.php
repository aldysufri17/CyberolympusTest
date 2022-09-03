@extends('layouts.app')
@section('title','Customers List')
@section('content')
<x-alert />
<section class="section">
    <div class="section-header">
        <h1>Customers</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Daftar Customer</div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Customers</h4>
                <div class="card-header-action">
                    <div>
                        <button class="btn btn-primary create-button" style="border-radius: 0px !important">
                            Tambah Customer
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($customers->IsNotEmpty())
                <h6 class="mb-0 my-3 text-warning">Cari Berdasarkan Nama</h6>
                <form action="/search" method="GET">
                    @csrf
                <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari"
                            aria-label="Cari" name="nama" aria-describedby="basic-addon2">
                        <div class="input-group-append" value="{{ Request::get('search') }}">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                        @if (Request::get('nama') != "")
                        <a class="btn btn-warning" href="{{route('customers')}}">Clear</a>
                        @endif
                    </div>
                </form>
                <div class="my-2">
                    <form action="/filter" method="GET">
                        @csrf
                        <h6 class="mb-0 my-3 text-warning">Filter Berdasarkan Tanggal</h6>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" value="{{ Request::get('start_date') }}" name="start_date">
                            <input type="date" class="form-control" value="{{ Request::get('end_date') }}" name="end_date">
                            <button class="btn btn-primary" type="submit">Filter</button>
                            @if (Request::get('start_date') != "" || Request::get('end_date') != "")
                            <a class="btn btn-warning" href="{{route('customers')}}">Clear</a>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telephone</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <th>{{$customer->nama}}</th>
                                <td>{{$customer->alamat}}</td>
                                <td>{{$customer->telp}}</td>
                                <td>
                                    <button class="btn btn-success edit-btn" title="Delete" value="{{$customer->id}}">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <button class="btn btn-danger delete-btn" title="Delete" value="{{$customer->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button class="btn btn-danger delete-btn" title="Delete" value="{{$customer->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$customers->links()}}
                @else
                    @if (Request::get('end_date') || Request::get('start_date') || Request::get('nama') )
                    <a class="btn btn-sm btn-danger" href="{{route('customers')}}"><i class="fas fa-angle-double-left"></i>
                        Tampilkan Semua Data</a>
                    @endif
                <div class="card shadow-lg">
                    <div class="card-body text-danger ">Oops data customer tidak ditemukan.!</div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@include('customers.customer_modal')
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Create
        $(document).on('click', '.create-button', function () {
            $('#createModal').modal('show')
        });

        $('#add_customer').submit(function (e) {
            e.preventDefault();

            var nama = $('#nama').val();
            var alamat = $('#alamat').val();
            var telp = $('#telp').val();

            $("#add_customer_btn").text('Adding...');

            $.ajax({
                url: "/customer/store",
                type: "POST",
                data: {
                    nama: nama,
                    alamat: alamat,
                    telp: telp
                },
                success: function (data) {
                    if (data.status == 200) {
                        $('#editModal').modal('hide')
                        window.location.reload();
                    }
                },
            });
        });

        // Update
        $(document).on('click', '.edit-btn', function () {
            $('#editModal').modal('show')
            id = $(this).val();
            $.ajax({
                url: 'customer/edit',
                method: 'get',
                data: {
                    id: id,
                },
                success: function (data) {
                    $("#eid").val(data.id);
                    $("#enama").val(data.nama);
                    $("#ealamat").val(data.alamat);
                    $("#etelp").val(data.telp);
                }
            });
        });

        $('#edit_customer').submit(function (e) {
            e.preventDefault();

            var id = $('#eid').val();
            var nama = $('#enama').val();
            var alamat = $('#ealamat').val();
            var telp = $('#etelp').val();
            $("#edit_customer_btn").text('Editing...');

            $.ajax({
                url: "/customer/update",
                type: "POST",
                data: {
                    id: id,
                    nama: nama,
                    alamat: alamat,
                    telp: telp
                },
                success: function (data) {
                    console.log(data);
                    if (data.status == 200) {
                        $('#editModal').modal('hide')
                        window.location.reload();
                    }
                },
            });
        });

        // Delete
        $(document).on('click', '.delete-btn', function () {
            id = $(this).val()
            $.ajax({
                url: "/customer/delete",
                type: "GET",
                data: {
                    id: id,
                },
                success: function (data) {
                    if (data.status == 200) {
                        window.location.reload();
                    }
                },
            });
        });
    });

</script>
@endpush
