<!-- Modal -->
<div class="modal fade" id="addModalKategori" tabindex='-1' aria-labelledby="addModalKategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('category.store')}}" id="addFormKategori" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalKategoriLabel">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 col-sm-12">
                        <label for="">Nama</label>
                        <input placeholder="Dessert" type="text" name="name" class="form-control">
                        <span class="text-danger error-text name_error"></span>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="">Gambar</label>
                        <input type="file" name="photo" class="form-control"
                        accept="image/png, image/jpg, image/jpeg">
                        <span class="text-danger error-text photo_error"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
        </form>
    </div>
</div>
