@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4">Buat Janji Temu</h3>

    <form action="{{ route('pasien.pendaftaran.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Dokter</label>
            <select name="dokter_id" id="dokterSelect" class="form-select" required>
                <option value="">-- Pilih Dokter --</option>
                @foreach ($dokters as $dok)
                    <option value="{{ $dok->id }}"
                        data-jadwal="{{ $dok->jadwal_praktek }}">
                        {{ $dok->nama }} – {{ $dok->spesialis }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jadwal Praktek</label>
            <input type="text" id="jadwalPraktek" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jam Kunjungan</label>
            <select name="jam" id="jamSelect" class="form-select" required>
                <option value="">-- Pilih Jam --</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Keluhan</label>
            <textarea name="keluhan" class="form-control" rows="3" required></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>

    </form>
</div>

<script>
    const dokterSelect = document.getElementById("dokterSelect");
    const jadwalPraktek = document.getElementById("jadwalPraktek");
    const jamSelect = document.getElementById("jamSelect");

    dokterSelect.addEventListener("change", function () {

        const jadwal = dokterSelect.options[dokterSelect.selectedIndex].dataset.jadwal;

        jadwalPraktek.value = jadwal ?? "";

        jamSelect.innerHTML = `<option value="">-- Pilih Jam --</option>`;

        if (!jadwal) return;
        let matches = jadwal.match(/(\d{2}:\d{2})\s*-\s*(\d{2}:\d{2})/);

        if (!matches) return;

        let start = matches[1];
        let end = matches[2];

        let [startHour] = start.split(":").map(Number);
        let [endHour] = end.split(":").map(Number);

        for (let h = startHour; h <= endHour; h++) {
            let jam = (h < 10 ? "0" : "") + h + ":00";

            jamSelect.innerHTML += `
                <option value="${jam}">${jam}</option>
            `;
        }
    });
</script>

@endsection
