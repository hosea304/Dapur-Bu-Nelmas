<!-- Modal Edit -->
<div class="modal fade" id="editModalKategori" tabindex='-1' aria-labelledby="editModalKategoriLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('category.update')}}" id="editFormKategori" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalKategoriLabel">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 col-sm-12">
                        <label for="">Nama</label>
                        <input placeholder="Dessert" type="text" name="name" id="name" class="form-control">
                        <span class="text-danger error-text name_error"></span>
                        <input type="hidden" name="idKategori" id="idKategori">
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="">Gambar</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                        <span class="text-danger error-text photo_error"></span>
                        <input type="hidden" name="old_photo" id="old_photo">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>