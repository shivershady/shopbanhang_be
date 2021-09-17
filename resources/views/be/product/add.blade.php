@extends('be.layout')
@section('main-content')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Add Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" action="{{route('admin.product.doAdd')}}">
                    @csrf
                    <div class="card-body">

                        <div class="preview" style="display:flex;">

                        </div>

                        <div>
                            <input type="file" name="img[]" class="img-select" multiple
                                   accept="image/png, image/gif, image/jpeg" onchange="previewImages()">
                        </div>

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name"
                                   value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Slug"
                                   value="{{old('slug')}}">
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" value="{{old('quantity')}}" placeholder="quantity"
                                   class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" placeholder="price" class="form-control"
                                   value="{{old('price')}}"/>
                        </div>

                        <div>
                            <label for="i_hot">IHot</label>
                            <input name="i_hot" value="{{old('i_hot')}}" placeholder="iHot" class="form-control"
                                   type="text"/>
                        </div>

                        <div>
                            <label for="i_pay">Ipay</label>
                            <input name="i_pay" value="{{old('i_pay')}}" placeholder="IPay" class="form-control"
                                   type="number"/>
                        </div>

                        <div>
                            <label for="number">Number</label>
                            <input type="number" value="{{old('number')}}" placeholder="number" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label for="">Warranty</label>
                            <input type="text" name="warranty" class="form-control" placeholder="Warranty"
                                   value="{{old('warranty')}}">
                        </div>

                        <div class="form-group">
                            <label for="">View</label>
                            <input type="text" name="view" class="form-control" placeholder="View"
                                   value="{{old('view')}}">
                        </div>

                        <div class="form-group">
                            <label for="">Description_seo</label>
                            <input type="text" name="description_seo" class="form-control" placeholder="description_seo"
                                   value="{{old('description_seo')}}">
                        </div>

                        <div class="form-group">
                            <label for="">keyword_seo</label>
                            <input type="text" name="keyword_seo" class="form-control" placeholder="keyword_seo"
                                   value="{{old('keyword_seo')}}">
                        </div>

                        <div class="form-group">
                            <label for="">title_seo</label>
                            <input type="text" name="title_seo" class="form-control" placeholder="title_seo"
                                   value="{{old('title_seo')}}">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Description"
                                   value="{{old('description')}}"/>
                        </div>

                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category_id" class="form-control">
                                {{--                                @foreach($categories as $category)--}}
                                {{--                                    <option value="{{$category->id}}">{{$category->name}}</option>--}}
                                {{--                                @endforeach--}}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Discount</label>
                            <select name="discount_id" class="form-control">
                                {{--                                @foreach($discounts as $discount)--}}
                                {{--                                    <option value="{{$discount->id}}">{{$discount->amount}}</option>--}}
                                {{--                                @endforeach--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="content" class="form-control" placeholder="Content"
                            >{{old('content')}}</textarea>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        async function previewImages() {
            for (let i = 0; i < document.querySelector('.img-select').files.length; i++) {
                const reader = new FileReader();
                await reader.readAsDataURL(document.querySelector('.img-select').files[i]);
                reader.onload = function (file) {
                    const preview = document.querySelector('.preview');
                    const img = document.createElement('img');
                    img.setAttribute('src', file.target.result);
                    img.classList.add('thumb');
                    preview.appendChild(img);
                }
            }
        }

        CKEDITOR.replace('content');
    </script>

    <style>
        .thumb {
            width: 100px;
            height: 100px;
            object-font: cover;
        }
    </style>
@endsection()
