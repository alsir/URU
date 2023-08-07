<form class="form form-vertical" action="/admin/product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <input type="hidden" value="{{ $product->id }}" name="id">
    <div class="form-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="first-name-vertical">الاسم </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" placeholder="الاسم " value="{{ old('name' ,$product->name) }}" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="email-id-vertical">فئة المنتج</label>
                    <select name="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="email-id-vertical">فئة المنتج</label>
                    <select name="manfacturer_id" class="form-control" required>
                        @foreach ($manfacturers as $manfacturer)
                            <option value="{{ $manfacturer->id }}" @selected(old('manfacturer_id', $product->manfacturer_id) == $manfacturer->id)>
                                {{ $manfacturer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="first-name-vertical">الكمية</label>
                    <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                        name="quantity" placeholder="الكمية" value="{{ old('quantity', $product->quantity) }}" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="first-name-vertical">السعر</label>
                    <input type= "number"step="0.01" min="0" max="10" class="form-control @error('price') is-invalid @enderror"
                        name="price" placeholder="السعر" value="{{ old('price', $product->price) }}" required>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success mr-1 mb-1">تعديل</button>
            </div>
        </div>
    </div>
</form>
