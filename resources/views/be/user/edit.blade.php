@extends('be.layout')
@section('main-content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Edit User</h3>
            </div>
            <!-- form start -->
            <form method="post" action="{{route('admin.user.doEdit',['id'=>$obj->id])}}" enctype="multipart/form-data">
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

                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="" placeholder="Name" name="name"
                               value="{{$obj->name}}">
                        <span style="color: red"> @error('name') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="" placeholder="Password"
                               name="password">
                        <span style="color: red"> @error('password') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" id="" placeholder="Phone"
                               name="phone" value="{{$obj->phone}}">
                        <span style="color: red"> @error('phone') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="" placeholder="email" name="email"
                               value="{{$obj->email}}">
                        <span style="color: red"> @error('email') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group">
                        <label>user seller</label>
                        <select name="user_seller" class="form-control">
                            <option value="0" <?php if ($obj->user_seller == 0) {
                                echo 'selected="selected"';
                            }?>>Admin
                            </option>
                            <option value="1" <?php if ($obj->user_seller == 1) {
                                echo 'selected="selected"';
                            }?>>User
                            </option>
                            <option value="2" <?php if ($obj->user_seller == 2) {
                                echo 'selected="selected"';
                            }?>>Seller
                            </option>
                        </select>
                        <span style="color: red"> @error('user_seller') {{$message}} @enderror </span>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
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
        <!-- /.card -->
@endsection
