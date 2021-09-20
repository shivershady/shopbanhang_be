@extends('be.layout')
@section('main-content')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Add Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" action="{{route('admin.product.doEdit',['id'=>$obj->id])}}">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="removeImages" class="removeImages"/>
                        <div class="preview" style="display:flex;">
                            @foreach($obj->images as $image)
                                <div class="thumb-wrapper">
                                    <img class="thumb" src="{{asset($image->url)}}" alt="{{$obj->name}}"/>
                                    <a class="remove-image" onclick="removeImage({{$image->id}},event)">Remove</a>
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <input type="file" name="img[]" class="img-select" multiple
                               accept="image/png, image/gif, image/jpeg" onchange="previewImages()">

                        <br>
                        <br>

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name"
                                   value="{{$obj->name}}">
                            <span style="color: red">@error('name') {{$message}} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Slug"
                                   value="{{$obj->slug}}">
                            <span style="color: red">@error('slug') {{$message}} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" value="{{$obj->quantity}}" placeholder="quantity"
                                   class="form-control"/>
                            <span style="color: red">@error('quantity') {{$message}} @enderror</span>

                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" placeholder="price" class="form-control"
                                   value="{{$obj->price}}"/>
                            <span style="color: red">@error('price') {{$message}} @enderror</span>

                        </div>

                        <div>
                            <label for="">IHot</label>
                            <input name="iHot" value="{{$obj->iHot}}" placeholder="iHot" class="form-control"
                                   type="text"/>
                            <span style="color: red">@error('iHot') {{$message}} @enderror</span>

                        </div>

                        <div>
                            <label for="iPay">Ipay</label>
                            <input name="iPay" value="{{$obj->iPay}}" placeholder="IPay" class="form-control"
                                   type="text"/>
                            <span style="color: red">@error('iPay') {{$message}} @enderror</span>

                        </div>

                        <div class="form-group">
                            <label for="">Warranty</label>
                            <input type="text" name="warranty" class="form-control" placeholder="Warranty"
                                   value="{{$obj->warranty}}">
                            <span style="color: red">@error('warranty') {{$message}} @enderror</span>

                        </div>


                        <div class="form-group">
                            <label for="">View</label>
                            <input type="text" name="view" class="form-control" placeholder="View"
                                   value="{{$obj->view}}">
                            <span style="color: red">@error('view') {{$message}} @enderror</span>

                        </div>

                        <div class="form-group">
                            <label for="">Description_seo</label>
                            <input type="text" name="description_seo" class="form-control" placeholder="description_seo"
                                   value="{{$obj->description_seo}}">
                            <span style="color: red">@error('description_seo') {{$message}} @enderror</span>

                        </div>

                        <div class="form-group">
                            <label for="">keyword_seo</label>
                            <input type="text" name="keyword_seo" class="form-control" placeholder="keyword_seo"
                                   value="{{$obj->keyword_seo}}">
                            <span style="color: red">@error('keyword_seo') {{$message}} @enderror</span>

                        </div>

                        <div class="form-group">
                            <label for="">title_seo</label>
                            <input type="text" name="title_seo" class="form-control" placeholder="title_seo"
                                   value="{{$obj->title_seo}}">
                            <span style="color: red">@error('title_seo') {{$message}} @enderror</span>

                        </div>

                        <div class="form-group">
                            <label>Active</label>
                            <select name="active" placeholder="active" class="form-control" >
                                <option value="0" @if($obj->active==0){{'selected="selected"'}} @endif>On</option>
                                <option value="1" @if($obj->active==1){{'selected="selected"'}} @endif>Off</option>
                            </select>
                            <span style="color: red">@error('active') {{$message}} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Description"
                                   value="{{$obj->description}}"/>
                            <span style="color: red">@error('description') {{$message}} @enderror</span>

                        </div>

                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option <?php if ($category->id == $obj->category_id) {
                                        echo "selected=selected";
                                    } ?> value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <span style="color: red">@error('category_id') {{$message}} @enderror</span>

                        </div>

                        <div class="form-group">
                            <label for="">Discount</label>
                            <select name="discount_id" class="form-control">
                                @foreach($discounts as $discount)
                                    <option value="{{$discount->id}}" <?php if($discount->id==$obj->discount_id){
                                        echo 'selected="selected"';
                                    } ?>>{{$discount->discount_percent}}</option>
                                @endforeach
                            </select>
                            <span style="color: red">@error('discount_id') {{$message}} @enderror</span>

                        </div>
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="content" class="form-control" placeholder="Content" >{{$obj->content}}</textarea>

                            <span style="color: red">@error('content') {{$message}} @enderror</span>

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

        function removeImage(id,event) {
            let removeImagesInput = document.querySelector('.removeImages');
            let removeImages = removeImagesInput.value; //1|2|3|4|5|6
            removeImages = removeImages.split('|');//chuyển đổi thành mảng [1,2,3,4,5,6];[]
            removeImages.push(id);//[1,2,3,4,5,6,7]
            removeImages = removeImages.join('|');//1|2|3|4|5|6|7
            removeImagesInput.value = removeImages;

            //ẩn ảnh đi
            event.target.parentElement.style.display = 'none';
        };
        CKEDITOR.replace('content');

    </script>

    <style>
        .thumb {
            width: 100px;
            height: 80px;
            object-font: cover;
        }

        .thumb-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center
        }
        .remove-image:hover{
            cursor: pointer;
        }
    </style>
@endsection()
