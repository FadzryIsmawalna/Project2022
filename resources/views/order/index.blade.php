@extends('layout.main')

@section('content')
<section>
<div class="mb-5">
    <h1 class="fs-3 border-1 border-bottom pb-2 pe-3">Order Page</h1>
</div>

<a href="/order/create" class="btn btn-primary px-3 mb-2">Create</a>

@if (session('success'))
<div class="my-1">
    <span class="text-white bg-success">{{ session('success') }}</span>
</div>
@endif
<div class="card">
<div class="row">
    <div class="col-10">
        <table class="table table-triped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $o)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $o->customer->nameCustomer }}</td>
                    <td>{{ $o->code }}</td>
                    <td>
                        <a href="{{ route('order.show', $o->id) }}" class="btn btn-info btn-lg">Info</a>
                        <a href="{{ route('order.edit', $o->id) }}" class="btn btn-warning btn-lg">update</a>
                        <form action="{{ route('order.destroy', $o->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                            <button class="btn btn-danger btn-lg" onclick="return confirm('Are you sure?')">delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</section>
@endsection