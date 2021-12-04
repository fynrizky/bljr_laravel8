<div class="modal fade" id="addproductsModal" tabindex="-1" aria-labelledby="addproductsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addproductsModalLabel">Add Products</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/addproducts') }}" id="form-tambahproduct" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="nama_barang">Name</label>
                    <input type="text" id="nama_barang" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Insert Name Product" >
                    @error('nama_barang')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div id="showresult" style="padding-top:6px; padding-bottom:0;"></div>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" id="stock" name="stock" class="form-control" placeholder="Insert Stock" >
                    @error('stock')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" class="form-control" placeholder="Insert price" >
                    @error('price')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea name="desc" id="desc" class="form-control" placeholder="Description"></textarea>
                    @error('desc')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">    
                    <label for="pict">Picture</label>
                    <input type="file" class="form-control" name="pict" id="pict">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
