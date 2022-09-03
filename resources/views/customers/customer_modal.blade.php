{{-- Modal Create--}}
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalExample"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bgdark shadow-2-strong ">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="formModalExample"><strong>Form Tambah Customer</strong>
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body border-0 text-dark">
                <form action="#" method="POST" id="add_customer">
                    @csrf
                    <div class="form-row">
                        <div class="row">
                            <div class="col">
                                <span>Nama</span>
                                <input type="text" name="nama" required id="nama" class="form-control mt-2"
                                    placeholder="Name">
                            </div>
                            <div class="col">
                                <span>Alamat</span>
                                <input type="text" name="alamat" required id="alamat" class="form-control mt-2"
                                    placeholder="Alamat">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <span>Nomor Telepon</span>
                                <input type="number" name="telp" required id="telp" class="form-control mt-2"
                                    placeholder="Nomor Telepon">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" id="add_customer_btn" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit--}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalExample"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bgdark shadow-2-strong ">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-light" id="formModalExample"><strong>Form Edit Customer</strong>
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body border-0 text-dark">
                <form action="#" method="POST" id="edit_customer">
                    @csrf
                    <div class="form-row">
                        <input type="text" hidden name="id" id="eid">
                        <div class="row">
                            <div class="col">
                                <span>Nama</span>
                                <input type="text" name="nama" required id="enama" class="form-control mt-2"
                                    placeholder="Name">
                            </div>
                            <div class="col">
                                <span>Alamat</span>
                                <input type="text" name="alamat" required id="ealamat" class="form-control mt-2"
                                    placeholder="Alamat">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <span>Nomor Telepon</span>
                                <input type="number" name="telp" required id="etelp" class="form-control mt-2"
                                    placeholder="Nomor Telepon">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" id="edit_customer_btn" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
