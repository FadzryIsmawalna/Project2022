@extends('layout.main')

@section('content')
<section><br>
    <div class="mb-5">
        <h3 class="fs-3 border-1 border-bottom pb-2 pe-3">Customer Page</h3>
    </div>
    <div>
        <a href="{{ route('customer.create') }}">
          <button class="btn btn-secondary" type="button" style="border-radius: 7px;">Tambah data</button>
        </a>
    </div><br>
    @if (session('success'))
        <p class="text-success">{{ session('success') }}</p>
    @endif
    <div class="card">
    <div class="row">
        <div class="col-10">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($customers as $customer)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $customer->nameCustomer }}</td>
                        <td>
                        <form action="{{ route('customer.destroy',$customer->id) }}" method="POST">
                                                <a href="{{ route('customer.edit',$customer->id) }}" class="fas text-white me-1 fa-edit btn btn-info btn-sm fs-6 fw-bold">
                                                    Edit
                                                </a>

                                                @csrf
                                                @method('DELETE')
      
                                                <button type="submit" class="fas ms-1 fa-trash btn btn-danger btn-sm fs-6 fw-bold">Hapus</button>
                                                </a>
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