@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ایجاد وزن جدید</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('weights.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="amount" class="form-label">مقدار وزن (کیلو)</label>
                                    <input id="amount" type="text" class="form-control" name="amount">
                                </div>

                                <div class="col-lg-6 d-flex">
                                    <button type="submit" class="btn btn-primary mt-auto">
                                        ثبت وزن
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
