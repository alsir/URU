<form class="form form-vertical" action="/admin/category/{{ $category->id }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <input type="hidden" value="{{ $category->id }}" name="id">
    <div class="form-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="first-name-vertical">الاسم </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" placeholder="الاسم " value="{{ old('name', $category->name) }}" required>
                </div>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success mr-1 mb-1">تعديل</button>
            </div>
        </div>
    </div>
</form>
