@extends('admin.layout.index')

@section('profilecontent')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center border-bottom">
                        <h2 class="content-title card-title">ویرایش وزن</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.layout.errors')
                        <form method="POST" action="{{ route('weights.update' , ['weight' => $weight->id]) }}"enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="amount" class="form-label">مقدار وزن (کیلو)</label>
                                    <input id="amount" type="text" class="form-control" name="amount" value="{{ $weight->amount }}">
                                </div>

                                <div class="col-lg-6 d-flex">
                                    <button type="submit" class="btn btn-primary mt-auto">
                                        ویرایش وزن
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
