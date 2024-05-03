@extends('admin.layout.index')

@section('profilecontent')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ایجاد محصول جدید</h2>
                        <a href="{{ route('products.create') }}" class="btn btn-success me-auto"><i class="fa fa-plus me-2"></i>محصول جدید</a>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="title" class="form-label">عنوان محصول *</label>
                                    <input id="title" type="text" class="form-control" name="title">
                                </div>

                                <div class="col-lg-4">
                                    <label for="serial" class="form-label">سریال</label>
                                    <input id="serial" type="text" class="form-control" name="serial">
                                </div>

                                <div class="col-lg-4">
                                    <label for="image" class="form-label">آپلود تصویر شاخص *</label>
                                    <input id="image" type="file" class="form-control" name="image">
                                </div>

                                <div class="col-lg-12">
                                    <label for="my-description" class="form-label">توضیحات محصول *</label>
                                    <textarea id="my-description" class="form-control" name="description"></textarea>
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">آپلود تصاویر گالری</label>
                                    <div id="galleryContainer">
                                        <div class="row mb-2">
                                            <div class="col-md-10">
                                                <input type="file" class="form-control" name="gallery_images[]">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger btn-sm removeImage">X</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-2" id="addImage">اضافه کردن تصویر</button>
                                </div>

                                <div class="col-lg-4">
                                    <label for="price" class="form-label">قیمت خرید *</label>
                                    <input id="price" type="number" class="form-control" name="price">
                                </div>

                                <div class="col-lg-4">
                                    <label for="bulk_price" class="form-label">قیمت فروش عمده</label>
                                    <input id="bulk_price" type="number" class="form-control" name="bulk_price">
                                </div>

                                <div class="col-lg-4">
                                    <label for="low_bulk_weight" class="form-label">کمترین مزن برای فروش عمده</label>
                                    <input id="low_bulk_weight" type="number" class="form-control" name="low_bulk_weight">
                                </div>

                                <div class="col-lg-4">
                                    <label for="low_bulk_quantity" class="form-label">کمترین تعداد برای فروش عمده</label>
                                    <input id="low_bulk_quantity" type="number" class="form-control" name="low_bulk_quantity">
                                </div>

                                <div class="col-lg-4">
                                    <label for="discount" class="form-label">درصد تخفیف</label>
                                    <input id="discount" type="number" class="form-control" name="discount">
                                </div>

                                <div class="col-lg-4">
                                    <label for="inventory" class="form-label">تعداد محصول *</label>
                                    <input id="inventory" type="number" class="form-control" name="inventory">
                                </div>

                                <div class="col-lg-4">
                                    <label for="sell_limit" class="form-label">محدودیت خرید</label>
                                    <input id="sell_limit" type="number" class="form-control" name="sell_limit">
                                </div>

                                <div class="col-lg-4">
                                    <label for="weight" class="form-label">وزن محصول (وزن محصول جهت محاسبه به هنگام ارسال پستی)</label>
                                    <input id="weight" type="text" class="form-control" name="weight">
                                </div>

                                <div class="col-lg-4">
                                    <label for="slug" class="form-label">اسلاگ جهت نمایش در URL (اجبارا با عنوان محصول برابر باشد!) *</label>
                                    <input id="slug" type="text" class="form-control" name="slug">
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">دسته ها *</label>
                                    <select id="categories" class="form-control" name="categories[]" multiple>
                                        @foreach(\App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">برند ها *</label>
                                    <select id="brands" class="form-control" name="brands[]" multiple>
                                        @foreach(\App\Models\Brands::all() as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">وزن ها</label>
                                    <select id="weights" class="form-control" name="weights[]" multiple>
                                        @foreach(\App\Models\Weight::all() as $weight)
                                            <option value="{{ $weight->id }}">{{ $weight->amount }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <hr>

                                <div class="col-lg-12">
                                    <label class="form-label">مشخصات محصول *</label>
                                    <div id="attributesContainer"></div>
                                    <button type="button" class="btn btn-secondary mt-2" id="addAttribute">اضافه کردن مشخصات</button>
                                </div>

                                <hr>

                                <label class="col-lg-12 d-flex align-items-center mt-3">
                                    <input class="form-check-input" type="checkbox" name="Verify"/>
                                    <span class="form-check-label ms-2"> فعال / غیر فعال </span>
                                </label>

                                <label class="col-lg-12 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" name="Is_Special"/>
                                    <span class="form-check-label ms-2"> محصول ویژه </span>
                                </label>

                                <label class="col-lg-12 d-flex align-items-center">
                                    <input id="is_bulk" type="checkbox" class="form-check-input" name="is_bulk">
                                    <span class="form-check-label"> محصول عمده </span>
                                </label>

                                <hr>

                                <div class="col-lg-12 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت محصول
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
            $('#addImage').click(function() {
                let imageDiv = $('<div>').addClass('row mb-2');

                let imageInputDiv = $('<div>').addClass('col-md-10');
                let imageInput = $('<input>').attr({
                    type: 'file',
                    name: 'gallery_images[]'
                }).addClass('form-control');
                imageInputDiv.append(imageInput);

                let deleteButtonDiv = $('<div>').addClass('col-md-2');
                let deleteButton = $('<button>').addClass('btn btn-danger btn-sm removeImage').text('X');
                deleteButton.on('click', function(e) {
                    e.preventDefault();
                    imageDiv.remove();
                });
                deleteButtonDiv.append(deleteButton);

                imageDiv.append(imageInputDiv, deleteButtonDiv);

                $('#galleryContainer').append(imageDiv);
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
