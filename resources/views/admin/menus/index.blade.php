@extends('layouts.admin')

@section('title')
    <title>Menu</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Menu', 'key' => 'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('menus.create') }}" class="btn btn-success float-right m-2">Thêm Menu</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên Menu</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($menus as $menu)
                                    <tr>
                                        <th scope="row">{{ $menu->id }}</th>
                                        <td>{{ $menu->name }}</td>
                                        <td>
                                            <a href="{{ route('menus.edit', ['id' => $menu->id]) }}"
                                                class="btn btn-info btn-sm" href="#">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a href="" data-url="{{ route('menus.delete', ['id' => $menu->id]) }}"
                                                class="btn btn-danger btn-sm delete">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center">
                        {{ $menus->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admins/product/index/list.js') }}"></script>
@endsection
