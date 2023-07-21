<label for="modal-global" class="btn btn-sm btn-circle text-white absolute right-2 top-2">✕</label>
<h2 class="font-bold text-xl lg:text-2xl my-4">Tambah Mahasiswa</h2>
<form action="/mahasiswa/store" id="form-add" method="POST" show-validation>
    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
    <div class="form-control my-4">
        <label for="nim" class="relative block rounded-md border shadow-sm focus-within:border-primary focus-within:ring-1 focus-within:ring-primary">
            <input type="text" name="nim" id="nim" class="input input-bordered peer border-none bg-transparent placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0" placeholder="NIM"/>
            <span class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-base-100 p-0.5 text-xs transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                NIM
            </span>
        </label>
    </div>
    <div class="form-control my-4">
        <label for="nama" class="relative block rounded-md border shadow-sm focus-within:border-primary focus-within:ring-1 focus-within:ring-primary">
            <input type="text" name="nama" id="nama" class="input input-bordered peer border-none bg-transparent placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0" placeholder="Nama"/>
            <span class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-base-100 p-0.5 text-xs transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                Nama
            </span>
        </label>
    </div>
    <div class="form-control my-4">
        <label for="jurusan" class="relative block rounded-md border shadow-sm focus-within:border-primary focus-within:ring-1 focus-within:ring-primary">
            <select type="text" name="jurusan" id="jurusan" class="select select-bordered peer border-none bg-transparent placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0" data-placeholder="Pilih Jurusan" style="width: 100%;">
                <option></option>
                <option value="Informatika">Informatika</option>
                <option value="Biologi">Biologi</option>
                <option value="Kimia">Kimia</option>
                <option value="Statistika">Statistika</option>
                <option value="Fisika">Fisika</option>
                <option value="Matematika">Matematika</option>
                <option value="Farmasi">Farmasi</option>
            </select>
            <span class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-base-100 p-0.5 text-xs transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                Jurusan
            </span>
        </label>
    </div>


    <div class="modal-action">
        <button type="submit" form="form-add" class="btn btn-primary btn-block">Tambah</button>
    </div>
</form>

<script>
    $('#jurusan').select2()
</script>
