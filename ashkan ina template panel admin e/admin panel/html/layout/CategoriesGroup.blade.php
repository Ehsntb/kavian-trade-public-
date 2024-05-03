<ul class="bg-white p-2">
    @foreach($categories as $cate)

        <li class="list-group-item border rounded-4 p-2 m-2">
            <div class="d-flex align-items-center">
                <span class="me-2">
                    {{ $cate->name }}
                </span>
                <div class="d-flex me-auto align-items-center">
                    <div>
                        <form class="p-0 m-0" method="POST" action="{{ route('categories.destroy', $cate->id) }}" class="align-items-center">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger me-2">حذف دسته</button>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('categories.edit' , ['category'=> $cate->id]) }}" class="btn btn-sm btn-primary me-2">ویرایش</a>
                    </div>
                    <div>
                        <a href="{{ route('categories.addsub' , ['category'=> $cate->id]) }}" class="btn btn-sm btn-warning me-2">ثبت زیردسته</a>
                    </div>
                </div>
            </div>
            @if($cate->child->count())

                @include('admin.layout.CategoriesGroup' , ['categories' => $cate->child])

            @endif
        </li>

    @endforeach
</ul>
