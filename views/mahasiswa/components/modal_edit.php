<label for="modal-global" class="btn btn-sm btn-circle text-white absolute right-2 top-2">✕</label>
<h2 class="font-bold text-xl lg:text-2xl my-4">Edit Mahasiswa</h2>
<form action="/mahasiswa/update" id="form-update" method="POST" show-validation>
    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
    <input type="hidden" name="id" value="<?= $id ?>">
    <div class="form-control my-4">
        <label for="nim" class="relative block rounded-md border shadow-sm focus-within:border-primary focus-within:ring-1 focus-within:ring-primary">
            <input type="text" name="nim" id="nim" class="input input-bordered peer border-none bg-transparent placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0" placeholder="NIM" value="<?= $mahasiswa['nim'] ?>"/>
            <span class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-base-100 p-0.5 text-xs transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                NIM
            </span>
        </label>
    </div>
    <div class="form-control my-4">
        <label for="nama" class="relative block rounded-md border shadow-sm focus-within:border-primary focus-within:ring-1 focus-within:ring-primary">
            <input type="text" name="nama" id="nama" class="input input-bordered peer border-none bg-transparent placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0" placeholder="Nama" value="<?= $mahasiswa['nama'] ?>"/>
            <span class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-base-100 p-0.5 text-xs transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                Nama
            </span>
        </label>
    </div>
    <div class="form-control my-4">
        <label for="jurusan" class="relative block rounded-md border shadow-sm focus-within:border-primary focus-within:ring-1 focus-within:ring-primary">
            <select type="text" name="jurusan" id="jurusan" class="select select-bordered peer border-none bg-transparent placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0" data-placeholder="Pilih Jurusan" style="width: 100%;">
                <option></option>
                <option value="Informatika" <?= $mahasiswa['jurusan'] == 'Informatika' ? 'selected' : '' ?>>Informatika</option>
                <option value="Biologi" <?= $mahasiswa['jurusan'] == 'Biologi' ? 'selected' : '' ?>>Biologi</option>
                <option value="Kimia" <?= $mahasiswa['jurusan'] == 'Kimia' ? 'selected' : '' ?>>Kimia</option>
                <option value="Statistika" <?= $mahasiswa['jurusan'] == 'Statistika' ? 'selected' : '' ?>>Statistika</option>
                <option value="Fisika" <?= $mahasiswa['jurusan'] == 'Fisika' ? 'selected' : '' ?>>Fisika</option>
                <option value="Matematika" <?= $mahasiswa['jurusan'] == 'Matematika' ? 'selected' : '' ?>>Matematika</option>
                <option value="Farmasi" <?= $mahasiswa['jurusan'] == 'Farmasi' ? 'selected' : '' ?>>Farmasi</option>
            </select>
            <span class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-base-100 p-0.5 text-xs transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                Jurusan
            </span>
        </label>
    </div>

    <div class="modal-action">
        <button type="submit" form="form-update" class="btn btn-primary btn-block">Edit</button>
    </div>
</form>

<script>
    $('#jurusan').select2()
</script>