@extends('layouts.app')
@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>{{session('success')}} </h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="container">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">

                        <!-- form start -->
                        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h3 class="">O'zingiz haqizda malumotni toldiring</h3>
                            <div class="card-body  p d-flex justify-content-around ">
                                <div class="form-group  " style="width: 33%">
                                    <label for="exampleInputEmail1">Id raqami</label>
                                    <input type="text" name="area_code"  value="{{old('area_code')}}" class="form-control" id="exampleInputEmail1"  placeholder="Id raqamini kiriting">
                                    @error('area_code')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group  " style="width: 33%">
                                    <label>Haydovchilik toifasini tanlang</label>
                                        <select class="form-select select_year" id="viloyat " name="driver_category">
                                            <option   value="" >Haydovchilik toifasini tanlang</option>
                                            <option  value="D">D</option>
                                            <option  value="C">C</option>
                                        </select>

                                    @error('driver_category')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group  " style="width: 33%">
                                    <label for="exampleInputEmail1"> Ish joyi </label>
                                    <input type="text" name="workplace"  value="{{old('workplace')}}" class="form-control" id="exampleInputEmail1"  placeholder="ish joyini kiriting ">
                                    @error('workplace')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-body  p d-flex justify-content-around ">

                                <div class="form-group  " style="width: 33%">
                                    <label for="exampleInputEmail1"> ish staji </label>
                                    <input type="text" name="work_seniority"  value="{{old('work_seniority')}}" class="form-control" id="exampleInputEmail1"  placeholder="Ish stajini kiriting">
                                    @error('work_seniority')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group  " style="width: 33%">
                                    <label for="formFile" class="form-label">Upload image</label>
                                    <input class="form-control" type="file" name="file" id="formFile">
                                    @error('file')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group  " style="width: 33%">
                                    <label for="exampleInputEmail1">Uztrucking ga azo bolgan sana</label>
                                    <input type="date" name="	date_of_membership" class="form-control"  value="{{old('date_of_membership')}}" id="exampleInputEmail1"  placeholder="Sanani kiriting">
                                    @error('	date_of_membership')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-body  p d-flex justify-content-around ">

                                <div class="form-group  " style="width: 33%">
                                    <label for="exampleInputEmail1"> Masofa</label>
                                    <input type="text" name="distance"  value="{{old('distance')}}" class="form-control" id="exampleInputEmail1"  placeholder="Masofani kiriting">
                                    @error('distance')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group  " style="width: 33%">
                                    <label for="exampleInputEmail1">Mukofot</label>
                                    <input type="text" name="awards"  value="{{old('awards')}}" class="form-control" id="exampleInputEmail1"  placeholder="Enter Job Position">
                                    @error('awards')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group  " style="width: 33%">

                                </div>

                            </div>
                            <h4>Avtotransportiz haqida malumot kiriting</h4>
                            <div class="card-body  p d-flex justify-content-around ">

                                <div class="form-group  " style="width: 33%">
                                    <label for="exampleInputEmail1">Yuk moshinasi markasi</label>
                                    <input type="text" name="truck_brand	"  value="{{old('truck_brand')}}" class="form-control" id="exampleInputEmail1"  placeholder="Yuk moshinasi markasini kiriting">
                                    @error('truck_brand	')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group  " style="width: 33%">
                                    <label for="exampleInputEmail1"> Yuk mashinasi raqami </label>
                                    <input type="text" name="truck_number"  value="{{old('truck_number')}}" class="form-control" id="exampleInputEmail1"  placeholder="Yuk mashinasi raqamini kiriting">
                                    @error('truck_number')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group  " style="width: 33%">
                                    <label for="exampleInputEmail1">Tigach raqami</label>
                                    <input type="text" name="number"  value="{{old('number')}}" class="form-control" id="exampleInputEmail1"  placeholder="Tigach raqamini kiriting">
                                    @error('number')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="card-body  p d-flex justify-content-around ">

                                <div class="form-group  " style="width: 33%">
                                    <label for="exampleInputEmail1">Tigach sig'imi</label>
                                    <input type="text" name="capacity"  value="{{old('capacity')}}" class="form-control" id="exampleInputEmail1"  placeholder="Tigach sig'imini kiriting">
                                    @error('capacity')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group  " style="width: 33%">
                                    <label for="exampleInputEmail1"> Ishlab chiqarilgan yili </label>
                                    <input type="text" name="year"  value="{{old('year')}}" class="form-control" id="exampleInputEmail1"  placeholder="Ishlab chiqarilgan yilini kiriting">
                                    @error('year')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
{{--                                <div class="form-group  " style="width: 33%">--}}
{{--                                    <label for="exampleInputEmail1">Avtotransport holati</label>--}}
{{--                                    <input type="text" name="condition	"  value="{{old('condition	')}}" class="form-control" id="exampleInputEmail1"  placeholder="Avtotransport holatini kiriting">--}}
{{--                                    @error('condition')--}}
{{--                                    <div class="text-danger p-1">--}}
{{--                                        {{$message}}--}}
{{--                                    </div>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
                                <div class="form-group  " style="width: 33%">
                                    <label>Autotransport holatini  tanlang</label>
                                    <select class="form-select select_year" id="viloyat " name="condition">
                                        <option   value="" >Autotransport holatini  tanlang</option>
                                        <option  value="Yaxshi">Yaxshi</option>
                                        <option  value="Qoniqarsiz">Qoniqarsiz</option>
                                        <option  value="Qoniqarli">Qoniqarli</option>
                                        <option  value="Juda yaxshi">Juda yaxshi</option>
                                    </select>

                                    @error('condition')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>


                            </div>
                            <div class="card-body  p d-flex justify-content-around ">


                                <div class="form-group  " style="width: 33%">
                                    <label>Haydovchilik toifasini tanlang</label>
                                    <select class="form-select select_year" id="viloyat " name="fuel">
                                        <option   value="" >Yoqilg'ini  tanlang</option>
                                        <option  value="Metan">Metan</option>
                                        <option  value="Dizel">Dizel</option>
                                        <option  value="Elekt yoqilg'i">Elekt yoqilg'i</option>
                                    </select>

                                    @error('fuel')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group  " style="width: 33%">

                                </div>
                                <div class="form-group  " style="width: 33%">

                                </div>
                            </div>
                            <h4>Haydovchidan olinadigan malumot kiriting</h4>
                            <div class="card-body  p d-flex justify-content-around ">

                                <div class="form-group  " style="width: 33%">
                                    <label for="formFile" class="form-label">Pasport</label>
                                    <input class="form-control" type="file" name="passport" id="formFile">
                                    @error('passport')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group  " style="width: 33%">
                                    <label for="formFile" class="form-label">Haydovchilik guvohnomasi</label>
                                    <input class="form-control" type="file" name="certificate" id="formFile">
                                    @error('certificate')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group  " style="width: 33%">
                                    <label for="formFile" class="form-label">Mehnat daftarchasi</label>
                                    <input class="form-control" type="file" name="employment_book" id="formFile">
                                    @error('employment_book')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>


                            </div>
                            <div class="card-body  p d-flex justify-content-around ">

                                <div class="form-group  " style="width: 33%">
                                    <label for="formFile" class="form-label">Avtotrasport texposporti</label>
                                    <input class="form-control" type="file" name="tex_passport" id="formFile">
                                    @error('tex_passport')
                                    <div class="text-danger p-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group  " style="width: 33%">

                                </div>
                                <div class="form-group  " style="width: 33%">

                                </div>


                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- /.row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
