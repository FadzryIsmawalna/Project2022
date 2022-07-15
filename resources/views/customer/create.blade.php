@extends('layout.main')

@section('content')
<section>
    <div class="mb-4">
        <h3 class="fs-3 border-1 border-bottom pb-2 pe-3" align="center">Create Customer</h3>
    </div>

    <a href="/customer" class="btn btn-secondary btn-lg mb-3" title="back">Go Back</a>
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card card-body">
                    <form action="{{ route('customer.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name :</label>
                            <input type="text" name="nameCustomer" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email :</label>
                            <input type="text" name="emailCustomer" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone :</label>
                            <input type="text" name="phoneCustomer" class="form-control">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" id="formCheck-1" class="form-check-input" name="member" class="form-check-input">
                                <label class="form-check-label" for="formCheck-1">Member</label>
                           </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection