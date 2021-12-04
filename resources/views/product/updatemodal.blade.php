<div class="modal fade" id="updateproductsModal" tabindex="-1" aria-labelledby="updateproductsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateproductsModalLabel">Add Products</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal-edit">
            <form action="{{url('/updateproducts')}}" id="formupdateproduct" method="post" enctype="multipart/form-data">
                @csrf
                @method("patch")
                <div class="form-group">
                    <label for="nama_barang">Name</label>
                    <input type="hidden" id="idproduct" name="idproduct">
                    <input type="text" id="nama_barang_edit" name="nama_barang_edit" class="form-control @error('nama_barang_edit') is-invalid @enderror" placeholder="Insert Name Product" >
                    @error('nama_barang_edit')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div id="showresult" style="padding-top:6px; padding-bottom:0;"></div>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" id="stock" name="stock" class="form-control" placeholder="Insert Stock" >

                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" class="form-control" placeholder="Insert price" >

                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea name="desc" id="desc" class="form-control" placeholder="Description"></textarea>

                </div>
                <div class="form-group">
                    <label for="picture">Picture</label>
                    <input type="file" name="pict" id="pict" class="form-control">
                    {{-- <input type="text" name="gbr_awal" id="gbr_awal" class="form-control"> --}}
                    <img src="" id="img" width="100%">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Update changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
