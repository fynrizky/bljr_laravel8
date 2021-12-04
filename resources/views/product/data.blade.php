

@extends('/main')

@section('judul', $titleproducts)
@section('tema')
<h1 class="mt-4">{{$titleproducts}} </h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">{{$titleproducts}}</a></li>
    {{-- <li class="breadcrumb-item active">Edulevels</li> --}}
</ol>
<div class="card mb-4">
    <div class="card-body">
        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
    </div>
</div>
@endsection

@section('cardheader')
<div class="card mb-4">
    <div class="card-header">
        <div class="float-start">
            <i class="fas fa-table me-2"></i>
            CARD HEADER
        </div>
        <div class="float-end">
            <button type="button" data-bs-toggle="modal" data-bs-target="#addproductsModal" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Data</button>
        </div>
    </div>
</div>

@endsection


@section('konten')
<div class="card" style="margin-top:-1.6rem;">
    {{-- <svg style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
    </svg>
    @if (session('alert'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            {{session('alert')}}
        </div>
    </div>
    @endif --}}
    <div class="flash-data" @if(session('alert')) data-flashdata="@php echo session('alert') @endphp" @endif ></div>
    <div class="card-body" id="form-hapusproduct">
        <table id="datatablesSimple" class="table">
            <thead>
        <tr>
            <th>No.</th>
            <th>Name Product</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Desc</th>
            <th>Picture</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach($product as $index => $dat)

        <tr>
            {{-- <td>{{$index+1}}</td> --}}
            <td>{{$loop->iteration}}</td>
            <td>{{ucwords($dat->name_product)}}</td>
            <td>{{$dat->stock}}</td>
            <td>{{'Rp.'.number_format($dat->price).',-'}}</td>
            <td>{{$dat->desc}}</td>
            <td><img src="{{ asset('img/imgproduct/'.$dat->pict) }}" width="100"></td>
            <td>
                <button type="button" id="editdataproduct" data-bs-toggle="modal" data-bs-target="#updateproductsModal"
                data-id="{{$dat->id}}" data-nameproduct="{{$dat->name_product}}"
                data-stock="{{$dat->stock}}" data-price="{{$dat->price}}"
                data-desc="{{$dat->desc}}" data-pict="{{url('img/imgproduct/'.$dat->pict)}}"
                data-gbr_awal="{{$dat->pict}}" class="btn btn-warning btn-sm">
                    <i class="fas fa-pencil-alt"></i>
                </button>
                <form action="{{ url('/deleteproducts/'.$dat->id) }}" data-id="{{ $dat->id }}" data-nm_product="{{$dat->name_product}}" class="d-inline" id="deleteproduct" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-sm btn-danger swal-confirm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>{{-- tutup card-body --}}
{{-- </div> tutup div card header --}}
</div>

@endsection



{{-- add data  --}}
@section('adddata')
@include('/product.addmodal')
@endsection
{{-- update data  --}}
@section('updatedata')
@include('/product.updatemodal')
@endsection
