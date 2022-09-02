@extends('layouts.admin')

@section('title')
    <title>Trang Chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Category', 'key' => 'Edit'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <form action="{{ route('menus.update', ['id' => $menuFollowEdit->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên Danh Mục</label>
                                <input type="text" class="form-control" name="name" value="{{ $menuFollowEdit->name }}"
                                    placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label>Chọn danh mục</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Danh mục cha</option>
                                    {!! $optionSelect !!}
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
