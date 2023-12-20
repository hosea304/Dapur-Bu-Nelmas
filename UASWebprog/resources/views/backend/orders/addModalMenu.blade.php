<!-- Modal -->
<div
    class="modal fade"
    id="addModalMenu"
    tabindex="-1"
    aria-labelledby="addModalMenuLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <form
            action="{{ route('perdaymenu.store') }}"
            id="addFormMenu"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalUserLabel">
                        Tambah Menu
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
                        <label for="">Tanggal</label>
                        <input
                            placeholder=""
                            type="date"
                            name="tanggal"
                            class="form-control"
                        />
                        <span
                            class="text-danger error-text tanggal_error"
                        ></span>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="">Makanan</label><br />
                        <select id="makanan" name="makanan">
                            @php $foods = DB::table('foods')->get(); foreach
                            ($foods as $food) { echo "
                            <option value='" . $food->id . "'>
                                " . $food->name . "
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
