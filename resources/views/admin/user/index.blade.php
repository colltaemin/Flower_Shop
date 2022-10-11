@extends('layouts.admin')

@section('title')
    <title>Danh sách User</title>
@endsection

@section('css')
    <link href="{{ asset('admins/product/index/list.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'User', 'key' => 'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('users.create') }}" class="btn btn-success float-right m-2">Thêm User</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên user</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }} </td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', ['id' => $user->id]) }}"
                                                class="btn btn-info btn-sm" href="#">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm delete"
                                                data-url="{{ route('users.delete', ['id' => $user->id]) }}" href="">
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
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('admins/product/index/list.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
