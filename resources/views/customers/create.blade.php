@extends('home')
@section('title', 'Thêm mới khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới khách hàng</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('customers.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input type="text" class="form-control" name="name" placeholder="Tên khách hàng">
                        @if($errors->has('name'))
                            <p class="text-danger"> {{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="date" class="form-control" name="age" placeholder="Tuổi">
                        @if($errors->has('age'))
                            <p class="text-danger">{{$errors->first('age')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        @if($errors->has('email'))
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tỉnh thành</label>
                        <select class="form-control" name="city_id">
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection