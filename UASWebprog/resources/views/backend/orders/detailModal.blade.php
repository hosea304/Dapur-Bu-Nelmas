<!-- Modal -->
<div
    class="modal fade"
    id="detailModal"
    tabindex="-1"
    aria-labelledby=""
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <input type="hidden" id="id_order" />
                    <label for="">Status</label><br />
                    <select id="status" name="status" id="status">
                        <option value="0">Pesanan diproses</option>
                        <option value="1">Pesanan diantar</option>
                        <option value="2">Pesanan selesai</option>
                    </select>

                    <button
                        type="button"
                        id="changestatus"
                        class="btn btn-primary"
                    >
                        Ubah Status
                    </button>
                </div>
                <table
                    id="tableDetail"
                    class="table table-bordered table-striped"
                >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal"
                >
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
