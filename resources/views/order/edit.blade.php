@extends('layout.main')

@section('content')
<section>
<div class="mb-4">
    <span class="fs-3 border-1 border-bottom pb-2 pe-3">Edit order</span>
</div>

<a href="/order" class="btn btn-secondary btn-lg mb-3" title="back">go back</a>
<div class="container-fluid">
<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('order.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Customer :</label>
                        <select name="customerId" class="form-select">
                            @foreach ($customer as $c)
                                @if ($order->customerId == $c->id)
                                <option value="{{ $c->id }}" selected>{{ $c->nameCustomer }}</option>
                                @else
                                <option value="{{ $c->id }}">{{ $c->nameCustomer }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 menu-container">
							<label class="form-label">Menu</label>
							<button class="btn btn-info btn-lg btn-add-menu" type="button"></button>
							@foreach ($order->orderItem as $key => $orderItem)
								<div class="input-group mb-1 menu">
									<select name="menuId[]" class="form-select">
										<option></option>
										@foreach ($menu as $m)
											@if ($orderItem->menuId == $m->id)
												<option value="{{ $m->id }}" selected>{{ $m->nameMenu }}</option>
											@else
												<option value="{{ $m->id }}">{{ $m->nameMenu }}</option>
											@endif
										@endforeach
									</select>
									<input type="number" name="quantity[]" class="form-control" placeholder="Quantity" value="{{ $orderItem->quantity }}">
										@if ($key==0)
											<a class="btn_secondary"></a>
										@else
											<a class="btn btn-danger btn-delete-menu"></a>
										@endif
								</div>			
							@endforeach
						</div>

                    <div class="d-grid">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</section>

<script>
    $('.btn-add-menu').click(function(){
        $('.menu-container').append(menu())
    })

    $(document).on('click','.btn-delete-menu', function(){
        $(this).closest('.menu').remove()
    })

    function menu () {
        return `<div class="input-group mb-1 menu">
            <select name="menuId[]" class="form-select">
            <option></option>
            @foreach ($menu as $m)
                <option value="{{ $m->id }}">{{ $m->nameMenu }}</option>
            @endforeach
            </select>
            <input type="number" name="quantity[]" class="form-control" placeholder="Quantity" value="1">
            <a class="btn btn-danger btn-delete-menu"></a>
            </div>`
    }
</script>
@endsection