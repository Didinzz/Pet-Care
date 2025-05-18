<div class="category-container">
    <h3 class="text-xl font-bold mb-6 category-heading text-blue-600">Identitas Pemilik & Hewan</h3>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Nama Pemilik -->
        <div class="form-group">
            <label for="owner-name" class="form-label required-field">Nama Pemilik</label>
            <input type="text" id="owner-name" name="owner-name" class="form-input" required
                placeholder="Masukkan nama lengkap Anda">
        </div>

        <!-- Kontak (Telepon/Email) -->
        <div class="form-group">
            <label for="contact" class="form-label">Email</label>
            <input type="text" id="contact" name="contact" class="form-input"
                placeholder="Masukkan nomor telepon atau email Anda" required>
        </div>

        <!-- Tanggal Kunjungan -->
        <div class="form-group">
            <label for="visit-date" class="form-label required-field">Tanggal Kunjungan</label>
            <input type="date" id="visit-date" name="visit-date" class="form-input" required>
        </div>
    </div>

</div>
