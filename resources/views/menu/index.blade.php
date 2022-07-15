@extends('layout.main')

@section('content')

<section><br>
    <!-- alert menu -->
    @if ( session()-> has('success') )
    <div class="alert mt-4 alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
    <div class="mb-2">
        <h3 class="fs-3 border-1 border-bottom pb-2 pe-3">Menu Page</h3>
    </div>

    <a href="/menu/create" class="btn my-3 btn-secondary btn-sm">
    <button class="btn btn-secondary" type="button" style="border-radius: 7px;">Tambah data</button>
    </a>
<div class="card">
    <div class="row">
        <div class="col-10">
            <table class="table table-responsive table-hover table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Description</th>
                        <th>Foto</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $menu->nameMenu }}</td>
                        <td>{{ $menu->descMenu }}</td>
                        {{-- <td><img style="height: 157px;width: 262px;margin: 0px;margin-top: 0px;margin-left: 45px;" src="{{ ( $menu->photoMenu ) ? asset( "storage/" . $menu->photoMenu ) : ""  }}" alt="photo menu"></td> --}} 
                        <td>
                            @if(!$menu->photoMenu)
                            <img style="height: 157px;width: 262px;margin: 0px;margin-top: 0px;margin-left: 45px;" alt="photo menu" src="{{ asset( "storage/images/defaultmenu.png" ) }}">
                            @else 
                            <img style="height: 157px;width: 262px;margin: 0px;margin-top: 0px;margin-left: 45px;" alt="photo menu" src="{{ asset( "storage/". $menu->photoMenu ) }}">
                            @endif 
                        </td>
                        <td>{{ $menu-> price }}</td>
                        <td>
                            <a href="/menu/{{ $menu->id }}/edit" class="btn me-1 text-white btn-sm btn-info">
                                <span data-feather="edit">Edit</span>
                            </a>
                            <form action="/menu/{{ $menu->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                
                                <button onclick="return confirm('are you sure?')" class="btn btn-danger btn-sm">
                                    <span data-feather="trash-2">Delete</span>
                                </button>
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