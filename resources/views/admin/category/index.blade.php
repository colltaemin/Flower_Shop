@extends('layouts.admin')

@section('title')
    <title>Sản phảm</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Category', 'key' => 'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Thêm Sản Phẩm</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>

                                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                                                class="btn btn-info btn-sm" href="#">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a href=""
                                                data-url="{{ route('categories.delete', ['id' => $category->id]) }}"
                                                class="btn btn-danger btn-sm" href="#">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center">
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $('.btn-danger').click(function(e) {
                e.preventDefault();
                let urlRequest = $(this).data('url');
                let that = $(this);
                Swal.fire({
                    title: 'Bạn có chắc chắn muốn xóa không?',
                    text: "Bạn sẽ không thể khôi phục lại dữ liệu này!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có, xóa nó!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "GET",
                            url: urlRequest,
                            success: function(data) {
                                if (data.code == 200) {
                                    that.parent().parent().remove();
                                    Swal.fire(
                                        'Đã xóa!',
                                        'Dữ liệu của bạn đã bị xóa.',
                                        'success'
                                    ).then(() => {
                                        location.reload();
                                    })

                                } else {
                                    Swal.fire(
                                        'Đã hủy!',
                                        'Không thể xóa vì danh mục có chứa sản phẩm, vui lòng xóa hết sản phẩm trong danh mục và thử lại.',
                                        'error'
                                    )
                                }
                            },
                            error: function() {

                            }
                        });
                    }
                })
            })
        })
    </script>
@endsection
