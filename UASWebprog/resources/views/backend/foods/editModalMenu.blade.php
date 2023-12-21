<!-- Modal -->
<div
    class="modal fade"
    id="editModalMenu"
    tabindex="-1"
    aria-labelledby="editModalMenuLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <form
            action="{{ route('foods.update') }}"
            id="editFormMenu"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalMenuLabel">
                        Edit Menu
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 col-sm-12">
                        <label for="">Nama</label>
                        <input
                            placeholder="Kue"
                            type="text"
                            name="name"
                            id="name"
                            class="form-control"
                        />
                        <span class="text-danger error-text name_error"></span>
                        <input type="hidden" name="idMenu" id="idMenu" />
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="">Deskripsi</label>
                        <textarea
                            placeholder="Deskripsi"
                            name="description"
                            id="description"
                            class="form-control"
                        ></textarea>
                        <span class="text-danger error-text name_error"></span>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="">Photo Menu</label>
                        <input
                            type="file"
                            name="photo"
                            id="photo"
                            class="form-control"
                            accept="image/png, image/jpg, image/jpeg"
                        />
                        <span class="text-danger error-text name_error"></span>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="">Harga</label>
                        <input
                            type="number"
                            name="harga"
                            class="form-control"
                            id="harga"
                        />
                        <span class="text-danger error-text name_error"></span>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="">Stock</label>
                        <input
                            type="number"
                            name="stock"
                            class="form-control"
                            id="stock"
                        />
                        <span class="text-danger error-text name_error"></span>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="">Status</label><br />
                        <select id="status" name="status" id="status">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">
                                Tidak Tersedia
                            </option>
                        </select>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="">Kategori</label><br />
                        <select id="kategori" name="kategori">
                            @php $categories = DB::table('categories')->get();
                            foreach ($categories as $category) { echo "
                            <option value='" . $category->id . "'>
                                " . $category->name . "
                            </option>
                            "; } @endphp
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
