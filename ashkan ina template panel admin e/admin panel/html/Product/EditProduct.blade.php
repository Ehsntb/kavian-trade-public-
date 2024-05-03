@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ویرایش محصول</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('products.update' , ['product' => $product->id]) }}"enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="title" class="form-label">عنوان محصول *</label>
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $product->title }}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="serial" class="form-label">سریال</label>
                                    <input id="serial" type="text" class="form-control" name="serial" value="{{ $product->serial }}">
                                </div>

                                <div class="col-lg-12">
                                    <label for="my-description" class="form-label">توضیحات محصول *</label>
                                    <textarea id="my-description" class="form-control" name="description">{{ $product->description }}</textarea>
                                </div>

                                <div class="col-lg-12">
                                    <label for="image" class="form-label">آپلود تصویر شاخص *</label>
                                    <input type="text" class="form-control" value="{{ $product->image }}" disabled>
                                    <div class="p-2 bg-dark mt-1 mb-1 rounded-2">
                                        <img class="img-thumbnail" src="{{ $product->image }}" alt="" style="width: 250px;height: 250px;">
                                    </div>
                                    <input id="image" type="file" class="form-control" name="image">
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">آپلود تصاویر گالری (انتخاب چندتایی - کنترل + انتخاب تصاویر)</label>
                                    <div id="galleryContainer">
                                        @foreach($product->gallery as $galleryImage)
                                            <div class="row mb-2">
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="{{ $galleryImage->image }}" disabled>
                                                    <div class="p-2 bg-dark mt-1 mb-1 rounded-2">
                                                        <img class="img-thumbnail" src="{{ $galleryImage->image }}" alt="" style="width: 150px;height: 150px;">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-danger btn-sm removeGalleryImage" data-image-id="{{ $galleryImage->id }}">X</button>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="row mb-2">
                                            <div class="col-md-10">
                                                <input type="file" class="form-control" name="new_gallery_images[]" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="price" class="form-label">قیمت خرید *</label>
                                    <input id="price" type="number" class="form-control" name="price" value="{{ $product->price }}">
                                </div>

                                <div class="col-lg-4">
                                    <label for="bulk_price" class="form-label">قیمت فروش عمده</label>
                                    <input id="bulk_price" type="number" class="form-control" name="bulk_price" value="{{ $product->bulk_price }}">
                                </div>

                                <div class="col-lg-4">
                                    <label for="low_bulk_weight" class="form-label">کمترین مزن برای فروش عمده</label>
                                    <input id="low_bulk_weight" type="number" class="form-control" name="low_bulk_weight" value="{{ $product->low_bulk_weight }}">
                                </div>

                                <div class="col-lg-4">
                                    <label for="low_bulk_quantity" class="form-label">کمترین تعداد برای فروش عمده</label>
                                    <input id="low_bulk_quantity" type="number" class="form-control" name="low_bulk_quantity" value="{{ $product->low_bulk_quantity }}">
                                </div>

                                <div class="col-lg-4">
                                    <label for="discount" class="form-label">تخفیف (درصد)</label>
                                    <input id="discount" type="number" class="form-control" name="discount" value="{{ $product->discount }}">
                                </div>

                                <div class="col-lg-4">
                                    <label for="inventory" class="form-label">تعداد محصول *</label>
                                    <input id="inventory" type="number" class="form-control" name="inventory" value="{{ $product->inventory }}">
                                </div>

                                <div class="col-lg-4">
                                    <label for="sell_limit" class="form-label">محدودیت خرید</label>
                                    <input id="sell_limit" type="number" class="form-control" name="sell_limit" value="{{ $product->sell_limit }}">
                                </div>

                                <div class="col-lg-4">
                                    <label for="weight" class="form-label">وزن محصول (وزن محصول جهت محاسبه به هنگام ارسال پستی)</label>
                                    <input id="weight" type="text" class="form-control" name="weight" value="{{ $product->weight }}">
                                </div>

                                <div class="col-lg-4">
                                    <label for="Slug" class="form-label">اسلاگ جهت نمایش در URL (اجبارا با عنوان محصول برابر باشد!) *</label>
                                    <input id="Slug" type="text" class="form-control" name="slug" value="{{ $product->slug }}">
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">دسته ها *</label>
                                    <select id="categories" class="form-control" name="categories[]" multiple>
                                        @foreach(\App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}" {{ in_array($category->id , $product->category->pluck('id')->toArray()) ?  'selected' : ''}}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">برند ها *</label>
                                    <select id="brands" class="form-control" name="brands[]" multiple>
                                        @foreach(\App\Models\Brands::all() as $brand)
                                            <option value="{{ $brand->id }}" {{ in_array($brand->id , $product->brand->pluck('id')->toArray()) ?  'selected' : ''}}>{{ $brand->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">وزن ها</label>
                                    <select id="weights" class="form-control" name="weights[]" multiple>
                                        @foreach(\App\Models\Weight::all() as $weight)
                                            <option value="{{ $weight->id }}" {{ in_array($weight->id, $product->weights->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $weight->amount }} کیلو </option>
                                        @endforeach
                                    </select>
                                </div>

                                <hr>

                                <div class="col-lg-12">
                                    <label class="form-label">مشخصات محصول *</label>
                                    <div id="attributesContainer">
                                        @foreach($product->attribute as $attribute)
                                            <div class="row mb-2">
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="attribute_names[]" placeholder="نام مشخصات" value="{{ $attribute->title }}">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="attribute_values[]" placeholder="مقدار مشخصات" value="{{ $attribute->amount }}">
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-danger btn-sm deleteAttribute" data-attr-id="{{ $attribute->id }}">X</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-2" id="addAttribute">اضافه کردن مشخصات</button>
                                </div>

                                <hr>

                                <label class="col-lg-6 d-flex align-items-center mt-3">
                                    <input id="verify" type="checkbox" class="form-check-input" name="Verify"
                                           @if($product->is_active == '1')
                                               checked
                                        @endif
                                    >
                                    <span class="form-check-label"> فعال / غیر فعال </span>
                                </label>

                                <label class="col-lg-12 d-flex align-items-center">
                                    <input id="Is_Special" type="checkbox" class="form-check-input" name="Is_Special"
                                           @if($product->is_special == '1')
                                               checked
                                        @endif
                                    >
                                    <span class="form-check-label"> محصول ویژه </span>
                                </label>

                                <label class="col-lg-12 d-flex align-items-center">
                                    <input id="is_bulk" type="checkbox" class="form-check-input" name="is_bulk"
                                           @if($product->is_bulk == '1')
                                               checked
                                        @endif
                                    >
                                    <span class="form-check-label"> محصول عمده </span>
                                </label>

                                <hr>

                                <div class="col-lg-12 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        ویرایش محصول
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection

@section('script')

    <script>
        $('#categories').select2({
            'placeholder' : 'دسته مورد نظر را انتخاب کنید'
        })
    </script>

    <script>
        $('#brands').select2({
            'placeholder' : 'برند مورد نظر را انتخاب کنید'
        })
    </script>

    <script>
        $('#weights').select2({
            'placeholder' : 'وزن مورد نظر را انتخاب کنید'
        })
    </script>

    <script>
        $(document).ready(function() {
            $('.removeGalleryImage').click(function(e) {
                e.preventDefault();
                let imageId = $(this).data('image-id');
                // Remove the row from the view
                $(this).closest('.row').remove();
                // Optionally, send an AJAX request to delete the image from the server
                // and database, or just mark it for deletion and handle it in the controller
                // For demonstration purposes, I'll just add a hidden input
                $('<input>').attr({
                    type: 'hidden',
                    name: 'deleted_images[]',
                    value: imageId
                }).appendTo('form');
            });

            $('.deleteAttribute').click(function(e) {
                e.preventDefault();
                // Optionally, send a request to the server to remove this attribute.
                let attributeId = $(this).data('attr-id');
                // For now, just remove the row from the view
                $(this).closest('.row').remove();
            });
            $('#addAttribute').click(function() {
                let attributeDiv = $('<div>').addClass('row mb-2');

                let attributeNameDiv = $('<div>').addClass('col-md-5');
                let attributeNameInput = $('<input>').attr({
                    type: 'text',
                    name: 'attribute_names[]',
                    placeholder: 'نام مشخصات'
                }).addClass('form-control');
                attributeNameDiv.append(attributeNameInput);

                let attributeValueDiv = $('<div>').addClass('col-md-5');
                let attributeValueInput = $('<input>').attr({
                    type: 'text',
                    name: 'attribute_values[]',
                    placeholder: 'مقدار مشخصات'
                }).addClass('form-control');
                attributeValueDiv.append(attributeValueInput);

                let deleteButtonDiv = $('<div>').addClass('col-md-2');
                let deleteButton = $('<button>').addClass('btn btn-danger btn-sm').text('X');
                deleteButton.on('click', function(e) {
                    e.preventDefault();
                    attributeDiv.remove();
                });
                deleteButtonDiv.append(deleteButton);

                attributeDiv.append(attributeNameDiv, attributeValueDiv, deleteButtonDiv);

                $('#attributesContainer').append(attributeDiv);
            });
        });
    </script>

@endsection
