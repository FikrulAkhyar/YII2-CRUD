<label for="modal-global" class="btn btn-sm btn-circle text-white absolute right-2 top-2">✕</label>
<h2 class="font-bold text-xl lg:text-2xl my-4">Hapus mahasiswa</h2>
<p>
    apakah anda yakin menghapus mahasiswa ini?
</p>
<form action="/mahasiswa/delete" id="form-delete" method="POST" show-validation>
    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
    <input type="hidden" name="id" value="<?= $id ?>">
    <div class="modal-action">
        <button type="submit" form="form-delete" class="btn btn-error">Hapus</button>
    </div>
</form>