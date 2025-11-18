<x-layout title="Edit Penjual">
    <div class="header">
        <h2>Edit Data Penjual</h2>
        <a href="{{ route('sellers.index') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <form action="{{ route('sellers.update', $seller->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="form-group">
                <label>Nama Pemilik</label>
                <input type="text" name="name" value="{{ old('name', $seller->name) }}" required>
            </div>

            <div class="form-group">
                <label>Nama Toko</label>
                <input type="text" name="store_name" value="{{ old('store_name', $seller->store_name) }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $seller->email) }}" required>
            </div>

            <div class="form-group">
                <label>No. HP</label>
                <input type="text" name="phone" value="{{ old('phone', $seller->phone) }}" required>
            </div>

            <div class="form-group">
                <label>Latitude</label>
                <input type="text" name="latitude" value="{{ old('latitude', $seller->latitude) }}">
            </div>

            <div class="form-group">
                <label>Longitude</label>
                <input type="text" name="longitude" value="{{ old('longitude', $seller->longitude) }}">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</x-layout>
