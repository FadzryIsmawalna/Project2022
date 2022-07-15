@extends('layout.main')

@section('content')
<section><br>
<div class="mb-4">
        <h3 class="fs-3 border-1 border-bottom pb-2 pe-3" align="center">Create Customer</h3>
    </div>

    <a href="/customer" class="btn btn-secondary btn-lg mb-3" title="back">Kembali</a>
<div class="container-fluid">
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('customer.update',$customer->id) }}" method="POST">
						@csrf
						@method('PUT')
						<div class="mb-3">
							<label class="">Name :</label>
							<input type="text" name="nameCustomer" value="{{ $customer->nameCustomer }}" class="form-control">
						</div>
						<div class="mb-3">
							<label class="">Email :</label>
							<input type="email" name="emailCustomer" value="{{ $customer->emailCustomer }}" class="form-control">
						</div>
						<div class="mb-3">
							<label class="">Phone :</label>
							<input type="text" name="phoneCustomer" value="{{ $customer->phoneCustomer }}" class="form-control">
						</div>
						<div class="mb-3">
							<div class="">
								<input type="checkbox" name="member" value="{{ $customer->member ? 'checked' : '' }}" class="form-check-input">
								<label class="form-lab">Member</label>
							</div>
						</div>

						<div class="d-grid">
							<button type="submit" class="btn btn-success">Update</button>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection