@extends('layout.app')

@section('content')
<!-- Page Title -->
<div class="page-title light-background features-cards">
    <div class="container text-center">
        <img src="{{ asset('assets/img/logo-mwt.png') }}" alt="Logo" style="width: 250px;">
        <h2 class="mt-4">Paging System PT Mada Wikri Tunggal</h2>
        <p class="mt-5 mb-4">Silakan pilih jenis pemanggilan di bawah ini</p>

        <!-- Card Options -->
        <div class="container">
            <!-- Row 1 -->
            <div class="row justify-content-center g-4">
                <div class="col-md-3">
                    <button class="card-button card-button-warning" data-bs-toggle="modal"
                        data-bs-target="#setterModal">
                        Panggil Setter Produksi
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="card-button card-button-primary" data-bs-toggle="modal"
                        data-bs-target="#leaderModal">
                        Panggil Leader Produksi
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="card-button card-button-success" data-bs-toggle="modal"
                        data-bs-target="#qualitycontrolModal">
                        Panggil Quality Control
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="card-button card-button-dark" data-bs-toggle="modal" data-bs-target="#hrdModal">
                        Panggilan Menghadap HRD
                    </button>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="row justify-content-center g-4 mt-2">
                <div class="col-md-3">
                    <button class="card-button card-button-danger" data-bs-toggle="modal" data-bs-target="#repairModal">
                        Panggil Repair & Maintenance
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="card-button card-button-secondary" data-bs-toggle="modal"
                        data-bs-target="#moldshopModal">
                        Panggil Moldshop
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="card-button card-button-info" data-bs-toggle="modal" data-bs-target="#polyboxModal">
                        Panggil Polybox
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="card-button card-button-light" data-bs-toggle="modal"
                        data-bs-target="#engineeringModal">
                        Panggil Engineering
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Setter Modal -->
<div class="modal fade" id="setterModal" tabindex="-1" aria-labelledby="setterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('start-bel') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="setterModalLabel">Panggilan Setter Produksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-mesin-setter" class="form-label">Nama Mesin</label>
                        <select class="form-control" id="nama-mesin-setter" name="nama_mesin" required>
                            <option value="">-- Pilih Nama Mesin --</option>
                            <option value="Mesin 1">Mesin 1</option>
                            <option value="Mesin 2">Mesin 2</option>
                            <option value="Mesin 3">Mesin 3</option>
                            <option value="Mesin 4">Mesin 4</option>
                            <option value="Mesin 5">Mesin 5</option>
                            <option value="Mesin 6">Mesin 6</option>
                            <option value="Mesin 7">Mesin 7</option>
                            <option value="Mesin 8">Mesin 8</option>
                            <option value="Mesin 9">Mesin 9</option>
                            <option value="Mesin 10">Mesin 10</option>
                            <option value="Mesin 11">Mesin 11</option>
                            <option value="Mesin 12">Mesin 12</option>
                            <option value="Mesin 13">Mesin 13</option>
                            <option value="Mesin 14">Mesin 14</option>
                            <option value="Mesin 15">Mesin 15</option>
                            <option value="Mesin 16">Mesin 16</option>
                            <option value="Mesin 17">Mesin 17</option>
                            <option value="Mesin 18">Mesin 18</option>
                            <option value="Mesin 19">Mesin 19</option>
                            <option value="Mesin 20">Mesin 20</option>
                            <option value="Mesin 21">Mesin 21</option>
                            <option value="Mesin 22">Mesin 22</option>
                            <option value="Mesin 23">Mesin 23</option>
                            <option value="Mesin 24">Mesin 24</option>
                            <option value="Mesin 25">Mesin 25</option>
                            <option value="Mesin 26">Mesin 26</option>
                            <option value="Mesin 27">Mesin 27</option>
                            <option value="Mesin 28">Mesin 28</option>
                            <option value="Mesin 29">Mesin 29</option>
                            <option value="Mesin 30">Mesin 30</option>
                            <option value="Mesin 31">Mesin 31</option>
                            <option value="Mesin 32">Mesin 32</option>
                            <option value="Mesin 33">Mesin 33</option>
                            <option value="Mesin 34">Mesin 34</option>
                        </select>
                    </div>
                    <input type="hidden" name="jenis_pemanggilan" value="Setter Produksi">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Panggil</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Leader Modal -->
<div class="modal fade" id="leaderModal" tabindex="-1" aria-labelledby="leaderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('start-bel') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="leaderModalLabel">Panggilan Leader Produksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-mesin-leader" class="form-label">Nama Mesin</label>
                        <select class="form-control" id="nama-mesin-leader" name="nama_mesin" required>
                            <option value="">-- Pilih Nama Mesin --</option>
                            <option value="Mesin 1">Mesin 1</option>
                            <option value="Mesin 2">Mesin 2</option>
                            <option value="Mesin 3">Mesin 3</option>
                            <option value="Mesin 4">Mesin 4</option>
                            <option value="Mesin 5">Mesin 5</option>
                            <option value="Mesin 6">Mesin 6</option>
                            <option value="Mesin 7">Mesin 7</option>
                            <option value="Mesin 8">Mesin 8</option>
                            <option value="Mesin 9">Mesin 9</option>
                            <option value="Mesin 10">Mesin 10</option>
                            <option value="Mesin 11">Mesin 11</option>
                            <option value="Mesin 12">Mesin 12</option>
                            <option value="Mesin 13">Mesin 13</option>
                            <option value="Mesin 14">Mesin 14</option>
                            <option value="Mesin 15">Mesin 15</option>
                            <option value="Mesin 16">Mesin 16</option>
                            <option value="Mesin 17">Mesin 17</option>
                            <option value="Mesin 18">Mesin 18</option>
                            <option value="Mesin 19">Mesin 19</option>
                            <option value="Mesin 20">Mesin 20</option>
                            <option value="Mesin 21">Mesin 21</option>
                            <option value="Mesin 22">Mesin 22</option>
                            <option value="Mesin 23">Mesin 23</option>
                            <option value="Mesin 24">Mesin 24</option>
                            <option value="Mesin 25">Mesin 25</option>
                            <option value="Mesin 26">Mesin 26</option>
                            <option value="Mesin 27">Mesin 27</option>
                            <option value="Mesin 28">Mesin 28</option>
                            <option value="Mesin 29">Mesin 29</option>
                            <option value="Mesin 30">Mesin 30</option>
                            <option value="Mesin 31">Mesin 31</option>
                            <option value="Mesin 32">Mesin 32</option>
                            <option value="Mesin 33">Mesin 33</option>
                            <option value="Mesin 34">Mesin 34</option>
                        </select>
                    </div>
                    <input type="hidden" name="jenis_pemanggilan" value="Leader Produksi">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Panggil</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Quality Control Modal -->
<div class="modal fade" id="qualitycontrolModal" tabindex="-1" aria-labelledby="qualitycontrolModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('start-bel') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="qualitycontrolModalLabel">Panggilan Quality Control</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-mesin-qualitycontrol" class="form-label">Nama Mesin</label>
                        <select class="form-control" id="nama-mesin-qualitycontrol" name="nama_mesin" required>
                            <option value="">-- Pilih Nama Mesin --</option>
                            <option value="Mesin 1">Mesin 1</option>
                            <option value="Mesin 2">Mesin 2</option>
                            <option value="Mesin 3">Mesin 3</option>
                            <option value="Mesin 4">Mesin 4</option>
                            <option value="Mesin 5">Mesin 5</option>
                            <option value="Mesin 6">Mesin 6</option>
                            <option value="Mesin 7">Mesin 7</option>
                            <option value="Mesin 8">Mesin 8</option>
                            <option value="Mesin 9">Mesin 9</option>
                            <option value="Mesin 10">Mesin 10</option>
                            <option value="Mesin 11">Mesin 11</option>
                            <option value="Mesin 12">Mesin 12</option>
                            <option value="Mesin 13">Mesin 13</option>
                            <option value="Mesin 14">Mesin 14</option>
                            <option value="Mesin 15">Mesin 15</option>
                            <option value="Mesin 16">Mesin 16</option>
                            <option value="Mesin 17">Mesin 17</option>
                            <option value="Mesin 18">Mesin 18</option>
                            <option value="Mesin 19">Mesin 19</option>
                            <option value="Mesin 20">Mesin 20</option>
                            <option value="Mesin 21">Mesin 21</option>
                            <option value="Mesin 22">Mesin 22</option>
                            <option value="Mesin 23">Mesin 23</option>
                            <option value="Mesin 24">Mesin 24</option>
                            <option value="Mesin 25">Mesin 25</option>
                            <option value="Mesin 26">Mesin 26</option>
                            <option value="Mesin 27">Mesin 27</option>
                            <option value="Mesin 28">Mesin 28</option>
                            <option value="Mesin 29">Mesin 29</option>
                            <option value="Mesin 30">Mesin 30</option>
                            <option value="Mesin 31">Mesin 31</option>
                            <option value="Mesin 32">Mesin 32</option>
                            <option value="Mesin 33">Mesin 33</option>
                            <option value="Mesin 34">Mesin 34</option>
                        </select>
                    </div>
                    <input type="hidden" name="jenis_pemanggilan" value="Quality Control">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Panggil</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- HRD Modal -->
<div class="modal fade" id="hrdModal" tabindex="-1" aria-labelledby="hrdModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('start-bel') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="hrdModalLabel">Panggilan Menghadap HRD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-mesin-hrd" class="form-label">Nama Karyawan dan Divisi (Cth. Agung IT)</label>
                        <input type="text" class="form-control" id="nama-mesin-hrd" name="nama_mesin"
                            placeholder="Masukkan nama karyawan dan divisi" required>
                    </div>
                    <input type="hidden" name="jenis_pemanggilan" value="HRD">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Panggil</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Repair & Maintenance Modal -->
<div class="modal fade" id="repairModal" tabindex="-1" aria-labelledby="repairModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('start-bel') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="repairModalLabel">Panggilan Repai & Maintenance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-mesin-repair" class="form-label">Nama Mesin</label>
                        <select class="form-control" id="nama-mesin-repair" name="nama_mesin" required>
                            <option value="">-- Pilih Nama Mesin --</option>
                            <option value="Mesin 1">Mesin 1</option>
                            <option value="Mesin 2">Mesin 2</option>
                            <option value="Mesin 3">Mesin 3</option>
                            <option value="Mesin 4">Mesin 4</option>
                            <option value="Mesin 5">Mesin 5</option>
                            <option value="Mesin 6">Mesin 6</option>
                            <option value="Mesin 7">Mesin 7</option>
                            <option value="Mesin 8">Mesin 8</option>
                            <option value="Mesin 9">Mesin 9</option>
                            <option value="Mesin 10">Mesin 10</option>
                            <option value="Mesin 11">Mesin 11</option>
                            <option value="Mesin 12">Mesin 12</option>
                            <option value="Mesin 13">Mesin 13</option>
                            <option value="Mesin 14">Mesin 14</option>
                            <option value="Mesin 15">Mesin 15</option>
                            <option value="Mesin 16">Mesin 16</option>
                            <option value="Mesin 17">Mesin 17</option>
                            <option value="Mesin 18">Mesin 18</option>
                            <option value="Mesin 19">Mesin 19</option>
                            <option value="Mesin 20">Mesin 20</option>
                            <option value="Mesin 21">Mesin 21</option>
                            <option value="Mesin 22">Mesin 22</option>
                            <option value="Mesin 23">Mesin 23</option>
                            <option value="Mesin 24">Mesin 24</option>
                            <option value="Mesin 25">Mesin 25</option>
                            <option value="Mesin 26">Mesin 26</option>
                            <option value="Mesin 27">Mesin 27</option>
                            <option value="Mesin 28">Mesin 28</option>
                            <option value="Mesin 29">Mesin 29</option>
                            <option value="Mesin 30">Mesin 30</option>
                            <option value="Mesin 31">Mesin 31</option>
                            <option value="Mesin 32">Mesin 32</option>
                            <option value="Mesin 33">Mesin 33</option>
                            <option value="Mesin 34">Mesin 34</option>
                        </select>
                    </div>
                    <input type="hidden" name="jenis_pemanggilan" value="Repair Maintenance">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Panggil</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Moldshop Modal -->
<div class="modal fade" id="moldshopModal" tabindex="-1" aria-labelledby="moldshopModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('start-bel') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="moldshopModalLabel">Panggilan Moldshop</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-mesin-moldshop" class="form-label">Nama Mesin</label>
                        <select class="form-control" id="nama-mesin-moldshop" name="nama_mesin" required>
                            <option value="">-- Pilih Nama Mesin --</option>
                            <option value="Mesin 1">Mesin 1</option>
                            <option value="Mesin 2">Mesin 2</option>
                            <option value="Mesin 3">Mesin 3</option>
                            <option value="Mesin 4">Mesin 4</option>
                            <option value="Mesin 5">Mesin 5</option>
                            <option value="Mesin 6">Mesin 6</option>
                            <option value="Mesin 7">Mesin 7</option>
                            <option value="Mesin 8">Mesin 8</option>
                            <option value="Mesin 9">Mesin 9</option>
                            <option value="Mesin 10">Mesin 10</option>
                            <option value="Mesin 11">Mesin 11</option>
                            <option value="Mesin 12">Mesin 12</option>
                            <option value="Mesin 13">Mesin 13</option>
                            <option value="Mesin 14">Mesin 14</option>
                            <option value="Mesin 15">Mesin 15</option>
                            <option value="Mesin 16">Mesin 16</option>
                            <option value="Mesin 17">Mesin 17</option>
                            <option value="Mesin 18">Mesin 18</option>
                            <option value="Mesin 19">Mesin 19</option>
                            <option value="Mesin 20">Mesin 20</option>
                            <option value="Mesin 21">Mesin 21</option>
                            <option value="Mesin 22">Mesin 22</option>
                            <option value="Mesin 23">Mesin 23</option>
                            <option value="Mesin 24">Mesin 24</option>
                            <option value="Mesin 25">Mesin 25</option>
                            <option value="Mesin 26">Mesin 26</option>
                            <option value="Mesin 27">Mesin 27</option>
                            <option value="Mesin 28">Mesin 28</option>
                            <option value="Mesin 29">Mesin 29</option>
                            <option value="Mesin 30">Mesin 30</option>
                            <option value="Mesin 31">Mesin 31</option>
                            <option value="Mesin 32">Mesin 32</option>
                            <option value="Mesin 33">Mesin 33</option>
                            <option value="Mesin 34">Mesin 34</option>
                        </select>
                    </div>
                    <input type="hidden" name="jenis_pemanggilan" value="Moldshop">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Panggil</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Polybox Modal -->
<div class="modal fade" id="polyboxModal" tabindex="-1" aria-labelledby="polyboxModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('start-bel') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="polyboxModalLabel">Panggilan Polybox</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-mesin-polybox" class="form-label">Nama Mesin</label>
                        <select class="form-control" id="nama-mesin-polybox" name="nama_mesin" required>
                            <option value="">-- Pilih Nama Mesin --</option>
                            <option value="Mesin 1">Mesin 1</option>
                            <option value="Mesin 2">Mesin 2</option>
                            <option value="Mesin 3">Mesin 3</option>
                            <option value="Mesin 4">Mesin 4</option>
                            <option value="Mesin 5">Mesin 5</option>
                            <option value="Mesin 6">Mesin 6</option>
                            <option value="Mesin 7">Mesin 7</option>
                            <option value="Mesin 8">Mesin 8</option>
                            <option value="Mesin 9">Mesin 9</option>
                            <option value="Mesin 10">Mesin 10</option>
                            <option value="Mesin 11">Mesin 11</option>
                            <option value="Mesin 12">Mesin 12</option>
                            <option value="Mesin 13">Mesin 13</option>
                            <option value="Mesin 14">Mesin 14</option>
                            <option value="Mesin 15">Mesin 15</option>
                            <option value="Mesin 16">Mesin 16</option>
                            <option value="Mesin 17">Mesin 17</option>
                            <option value="Mesin 18">Mesin 18</option>
                            <option value="Mesin 19">Mesin 19</option>
                            <option value="Mesin 20">Mesin 20</option>
                            <option value="Mesin 21">Mesin 21</option>
                            <option value="Mesin 22">Mesin 22</option>
                            <option value="Mesin 23">Mesin 23</option>
                            <option value="Mesin 24">Mesin 24</option>
                            <option value="Mesin 25">Mesin 25</option>
                            <option value="Mesin 26">Mesin 26</option>
                            <option value="Mesin 27">Mesin 27</option>
                            <option value="Mesin 28">Mesin 28</option>
                            <option value="Mesin 29">Mesin 29</option>
                            <option value="Mesin 30">Mesin 30</option>
                            <option value="Mesin 31">Mesin 31</option>
                            <option value="Mesin 32">Mesin 32</option>
                            <option value="Mesin 33">Mesin 33</option>
                            <option value="Mesin 34">Mesin 34</option>
                        </select>
                    </div>
                    <input type="hidden" name="jenis_pemanggilan" value="Polybox">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Panggil</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Engineering Modal -->
<div class="modal fade" id="engineeringModal" tabindex="-1" aria-labelledby="engineeringModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('start-bel') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="engineeringModalLabel">Panggilan Engineering</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-mesin-engineering" class="form-label">Nama Mesin</label>
                        <select class="form-control" id="nama-mesin-engineering" name="nama_mesin" required>
                            <option value="">-- Pilih Nama Mesin --</option>
                            <option value="Mesin 1">Mesin 1</option>
                            <option value="Mesin 2">Mesin 2</option>
                            <option value="Mesin 3">Mesin 3</option>
                            <option value="Mesin 4">Mesin 4</option>
                            <option value="Mesin 5">Mesin 5</option>
                            <option value="Mesin 6">Mesin 6</option>
                            <option value="Mesin 7">Mesin 7</option>
                            <option value="Mesin 8">Mesin 8</option>
                            <option value="Mesin 9">Mesin 9</option>
                            <option value="Mesin 10">Mesin 10</option>
                            <option value="Mesin 11">Mesin 11</option>
                            <option value="Mesin 12">Mesin 12</option>
                            <option value="Mesin 13">Mesin 13</option>
                            <option value="Mesin 14">Mesin 14</option>
                            <option value="Mesin 15">Mesin 15</option>
                            <option value="Mesin 16">Mesin 16</option>
                            <option value="Mesin 17">Mesin 17</option>
                            <option value="Mesin 18">Mesin 18</option>
                            <option value="Mesin 19">Mesin 19</option>
                            <option value="Mesin 20">Mesin 20</option>
                            <option value="Mesin 21">Mesin 21</option>
                            <option value="Mesin 22">Mesin 22</option>
                            <option value="Mesin 23">Mesin 23</option>
                            <option value="Mesin 24">Mesin 24</option>
                            <option value="Mesin 25">Mesin 25</option>
                            <option value="Mesin 26">Mesin 26</option>
                            <option value="Mesin 27">Mesin 27</option>
                            <option value="Mesin 28">Mesin 28</option>
                            <option value="Mesin 29">Mesin 29</option>
                            <option value="Mesin 30">Mesin 30</option>
                            <option value="Mesin 31">Mesin 31</option>
                            <option value="Mesin 32">Mesin 32</option>
                            <option value="Mesin 33">Mesin 33</option>
                            <option value="Mesin 34">Mesin 34</option>
                        </select>
                    </div>
                    <input type="hidden" name="jenis_pemanggilan" value="Engineering">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Panggil</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fungsi untuk menonaktifkan input modal
        function disableModalInputs() {
            document.querySelectorAll('.modal form input, .modal form button').forEach(input => {
                input.disabled = true;
            });
        }

        // Fungsi untuk mengaktifkan input modal
        function enableModalInputs() {
            document.querySelectorAll('.modal form input, .modal form button').forEach(input => {
                input.disabled = false;
            });
        }

        // Periksa status isSpeaking dari server
        function checkTTSSpeakingStatus() {
            fetch('{{ route('get-speaking-status') }}')
                .then(response => response.json())
                .then(data => {
                    const isSpeaking = data.isSpeaking;
                    if (isSpeaking) {
                        disableModalInputs();
                    } else {
                        enableModalInputs();
                    }
                })
                .catch(error => console.error('Error checking status:', error));
        }

        // Pantau status setiap detik
        setInterval(checkTTSSpeakingStatus, 1000);

        document.querySelectorAll('.modal form').forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                // Cek status TTS
                fetch('{{ route('get-speaking-status') }}')
                    .then(response => response.json())
                    .then(data => {
                        if (data.isSpeaking) {
                            alert('Tunggu hingga suara selesai sebelum menginput data.');
                            return;
                        }

                        const formData = new FormData(this);

                        fetch(this.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            }
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.message) {
                                    Swal.fire({
                                        title: 'Berhasil!',
                                        text: data.message,
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000,
                                    });
                                }

                                const modal = bootstrap.Modal.getInstance(this.closest('.modal'));
                                modal.hide();

                                // Reset form setelah pengiriman
                                this.reset();
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Terjadi kesalahan, silakan coba lagi.',
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                });
                            });
                    });
            });
        });
    });
</script>

@endsection