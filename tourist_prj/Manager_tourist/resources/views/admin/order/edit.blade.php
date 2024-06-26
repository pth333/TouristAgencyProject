<!-- Edit Modal -->
<div class="modal fade" id="edit-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="BlogModal"></h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('order.tour.update')}}" id="add-blog-form" name="add-blog-form" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="orderId" id="orderId">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Tiền thanh toán</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('total_price') is-invalid @enderror" id="total_price" name="total_price" placeholder="Tiền thanh toán">
                            @error('total_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Tiền đặt cọc</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('total_deposit') is-invalid @enderror" id="total_deposit" name="total_deposit" placeholder="Tiền đặt cọc">
                            @error('total_deposit')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Số lượng</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('total_person') is-invalid @enderror" id="total_person" name="total_person" placeholder="Số người">
                            @error('total_person')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save">Submit
                        </button>
                    </div>
                </form>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Modal -->
