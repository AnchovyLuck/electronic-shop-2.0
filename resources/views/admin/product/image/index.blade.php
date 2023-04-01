@extends('admin.layout.master')

@section('title', 'Product Images')

@section('body')
 <!-- Main -->
 <div class="app-main__inner">

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Ảnh sản phẩm
                    <div class="page-title-subheading">
                        Các tính năng CRUD
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">

                    <div class="position-relative row form-group">
                        <label for="name" class="col-md-3 text-md-right col-form-label">Tên sản phẩm</label>
                        <div class="col-md-9 col-xl-8">
                            <textarea disabled placeholder="{{$product->name}}" class="form-control" cols="30" rows="3" value="{{$product->name}}"></textarea>
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label for="" class="col-md-3 text-md-right col-form-label">Ảnh</label>
                        <div class="col-md-9 col-xl-8">
                            <div class="text-nowrap" id="images">
                                <div class="owl-carousel owl-theme">
                                    @foreach ($productImages as $productImage)
                                    <li class="float-left d-inline-block mr-2 mb-2" style="position: relative; width: 32%;">
                                        <form action="admin/product/{{$product->id}}/image/{{$productImage->id}}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" onclick="return confirm('Bạn muốn xóa ảnh này sao?')"
                                            class="btn btn-sm btn-outline-danger border-0 position-absolute">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                        <div style="width: 100%; height: 220px; overflow: hidden;">
                                            <img  src="front/img/upload/{{$productImage->path}}"
                                            alt="Image">
                                        </div>
                                    </li>
                                @endforeach
                                </div>
                                </div>
                            <div class="float-left d-inline-block mr-2 mb-2" style="width: 32%;">
                                <form method="post" action="admin/product/{{$product->id}}/image" enctype="multipart/form-data">
                                    @csrf
                                    <div style="width: 100%; max-height: 220px; overflow: hidden;">
                                        <img style="width: 100%; cursor: pointer;" 
                                            class="thumbnail"
                                            data-toggle="tooltip" title="Click to add image" data-placement="bottom"
                                            src="dashboard/assets/images/add-image-icon.jpg" alt="Add Image">

                                        <input name="image" type="file" onchange="changeImg(this);"
                                            accept="image/x-png,image/gif,image/jpeg,image/webp"
                                            class="image form-control-file" style="display: none;" multiple>

                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                    </div>
                                    <div class="position-relative row form-group mb-1">
                                        <div class="col-md-9 col-xl-8 offset-md-3 mt-5">
                                            <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                                <span class="btn-icon-wrapper pr-2 opacity-8">
                                                    <i class="fa fa-check fa-w-20"></i>
                                                </span>
                                                <span>Lưu thay đổi</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection