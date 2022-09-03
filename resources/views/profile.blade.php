@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4 border-0 bgdark">
        <div class="card-body">
            {{-- Page Content --}}
            <div class="row">
                <div class="col-md-3">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px"
                            src="{{ asset('assets/img/avatar/avatar-1.png') }}">
                    </div>
                </div>
                <div class="col-md-9">
                    {{-- Profile --}}
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">Nama</label><br>
                                <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Email</label><br>
                                <span class="font-weight-bold text-dark">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
