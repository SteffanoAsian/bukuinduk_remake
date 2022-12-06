<style>
    .form-control {
        font-size: 0.8rem;
        border-radius: 10rem;
        padding: 1.5rem 1rem;
    }
</style>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow py-2">
                <div class="card-header">
                    <h5 class="text-primary">Data Ijazah</h5>
                </div>
                <div class="card-body">
                    <form action="javascript:save()" method="post" autocomplete="off" id="formIjazah" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="siswa_nisn" class="col-sm-12 col-form-label">NISN</label>
                            <div class="col-sm-12">
                                <input type="hidden" class="form-control" id="siswa_id" name="siswa_id" >
                                <input type="number" class="form-control form-control-user" id="siswa_nisn" name="siswa_nisn" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="siswa_no_un" class="col-sm-12 col-form-label">No. Ujian Nasional SMP</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="siswa_no_un" name="siswa_no_un" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="siswa_nama" class="col-sm-12 col-form-label">Nama Siswa (Sesuai Ijazah)</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="siswa_nama" style="text-transform: uppercase" name="siswa_nama" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="siswa_tempat_lahir" class="col-sm-12 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="siswa_tempat_lahir" name="siswa_tempat_lahir" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="siswa_tgl_lahir" class="col-sm-12 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control datepicker" id="siswa_tgl_lahir" name="siswa_tgl_lahir" placeholder="dd-mm-yyyy">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ayah_nama" class="col-sm-12 col-form-label">Nama Ayah (Sesuai Ijazah)</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="ayah_nama" name="ayah_nama">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('Ijazah/javascript');
?>