<form class="form form-vertical" action="/admin/order/{{ $order->id }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <input type="hidden" value="{{ $order->id }}" name="id">
    <div class="form-body">
        <div class="row">
            <input type="hidden" value="{{ $order->name }}" name="name">
            <div class="col-6">
                <div class="form-group">
                    <label for="first-name-vertical">المدفوع</label>
                    <input type= "number"step="0.01" min="0" max="1000000000" class="form-control @error('total') is-invalid @enderror"
                        name="total_paid" placeholder="المدفوع" value="{{ old('total_paid' ,$order->total_paid) }}" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="first-name-vertical">المجموع</label>
                    <input type= "number"step="0.01" min="0" max="1000000000" class="form-control @error('total') is-invalid @enderror"
                        name="total" placeholder="المجموع" value="{{ old('total' ,$order->total) }}" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="first-name-vertical">اسم العميل </label>
                    <input type="text" class="form-control @error('costumer_name') is-invalid @enderror"
                        name="costumer_name" placeholder="اسم العميل " value="{{ old('costumer_name' ,$order->costumer_name) }}" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="email-id-vertical">حالة الطلب</label>
                    <select name="order_type" class="form-control" required>
                        <option value="0" @selected(old('order_type' ,$order->order_type) == 0)>مبيعات</option>
                        <option value="1" @selected(old('order_type' ,$order->order_type) == 1)> مشاريع</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="email-id-vertical">حالة سداد الطلب</label>
                    <select name="order_payment_status" class="form-control" required>
                        <option value="0" @selected(old('order_payment_status' ,$order->order_payment_status) == 0)>متبقي</option>
                        <option value="1" @selected(old('order_payment_status' ,$order->order_payment_status) == 1)> تم التسديد</option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mr-1 mb-1">إضافة</button>
            </div>
        </div>
    </div>
</form>