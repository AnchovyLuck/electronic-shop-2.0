@extends('admin.layout.master')

@section('title', 'Product Details')

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
                    Chỉnh sửa chi tiết sản phẩm
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
                    <form method="post" action="admin/product/{{$product->id}}/detail/{{$productDetail->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="position-relative row form-group">
                            <label class="col-md-3 text-md-right col-form-label">Tên sản phẩm</label>
                            <div class="col-md-9 col-xl-8">
                                <textarea disabled placeholder="{{$product->name}}" class="form-control text-bg-light" cols="30" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="color" class="col-md-3 text-md-right col-form-label">Màu sắc</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="color" id="color" placeholder="Color" type="text"
                                    class="form-control" value="{{$productDetail->color}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="size" class="col-md-3 text-md-right col-form-label">RAM</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="RAM" id="RAM" placeholder="RAM" type="text"
                                    class="form-control" value="{{$productDetail->RAM}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="qty" class="col-md-3 text-md-right col-form-label">Số lượng</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="qty" id="qty" placeholder="Qty" type="text"
                                    class="form-control" value="{{$productDetail->qty}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <a href="admin/product/{{$product->id}}/detail" class="border-0 btn btn-outline-danger mr-1">
                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                        <i class="fa fa-times fa-w-20"></i>
                                    </span>
                                    <span>Hủy</span>
                                </a>

                                <button type="submit"
                                    class="btn-shadow btn-hover-shine btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-download fa-w-20"></i>
                                    </span>
                                    <span>Lưu</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection