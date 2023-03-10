@extends('layouts.admin')

@section('content')

<!-- BEGIN: Content-->
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Yangi  xodim yaratish</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form  add_us" action="{{route('users.store')}}" method="POST"  enctype="multipart/form-data" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Rasmni yuklang</p>
                                                <label for="imgUpload" class="image-uploader">
                                                    <img  alt="" id="imagePreview">
                                                    <input type="file" name="image"   class="image-file" oninput="imagePreview.src=window.URL.createObjectURL(this.files[0])" id="imgUpload">
                                                </label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row mb-2 custom-options-checkable g-1">
                                                    <div class="col-md-12">
                                                        <p class="mb-0">Ilmiy darajasini belgilang</p>
                                                    </div>

                                                    @foreach($categories as $category)
                                                    <div class="col-md-3">
                                                        <input class="custom-option-item-check" type="radio" name="category_id" value="{{$category->id}}"
                                                            id="customOptionsCheckableRadiosWithIcon{{$category->id}}" checked />
                                                        <label class="custom-option-item text-center p-1" for="customOptionsCheckableRadiosWithIcon{{$category->id}}">
                                                            <span
                                                                class="checkbox-pop text-muted"
                                                                data-bs-toggle="popover"
                                                                data-bs-content="{{$category->sub_category}}"
                                                                data-bs-trigger="hover"
                                                                title=""
                                                                data-bs-original-title="Kategoriya {{$category->name}}" aria-describedby="whatis"
                                                            ><i data-feather='help-circle'></i></span>
                                                            <span class="custom-option-item-title h4 d-block">{{$category->name}}</span>
                                                            <small >{{$category->sub_category}} </small>
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                    <input type="hidden" name="is_region" value="@if(isset($is_region->id)) {{$is_region->id}} @endif">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="first-name-column">Ism</label>
                                                            <input type="text" id="first-name-column"  value="{{old('name')}}"  class="@error('name') border border-danger  @enderror form-control" placeholder="First Name"
                                                                name="name" />
                                                                @error('name')
                                                                <div class="text-danger p-1">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="last-name-column">Familiya</label>
                                                            <input type="text" id="last-name-column"  value="{{old('surname')}}"  class="@error('surname') border border-danger  @enderror form-control" placeholder="Last Name"
                                                                name="surname" />
                                                                @error('surname')
                                                                <div class="text-danger p-1">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="viloyat">Viloyat</label>
                                                            <select class="form-select" name='region_id'  id="viloyat">
                                                            @if(isset($is_region->id))
                                                            <option value="{{$is_region->id}}">{{$is_region->name}}</option>
                                                            @else
                                                              @if(auth()->user()->role==2)
                                                              <option value="{{auth()->user()->region_id}}">{{auth()->user()->regions->name}}</option>
                                                                @else
                                                                  @foreach($regions as $region)
                                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                                      @endforeach
                                                               @endif

                                                         @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="lavozim">Lavozim</label>
                                                            <input type="text" id="la"  value="{{old('position')}}"  class="@error('position') border border-danger  @enderror form-control" name="position" placeholder="Lavozim" />
                                                            @error('position')
                                                                <div class="text-danger p-1">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="tel">Tel.:</label>
                                                            <input type="tel" id="tel"  value="{{old('phone')}}" class="@error('phone') border border-danger  @enderror form-control telefon" name="phone" placeholder="Telefon" />
                                                            @error('phone')
                                                                <div class="text-danger p-1">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12 d-flex p-2 bd-highlight ">
                                                            <div style="display: inline-block;" class="me-3 ">
                                                                 <input class="@error('gender_type') border border-danger  @enderror form-check-input" type="radio"   name="gender_type" id="inlineRadio1" value="1">
                                                            <label class="form-check-label" for="inlineRadio1">Erkak</label>
                                                            </div>

                                                           <div style="display: inline-block;">
                                                                <input class="@error('gender_type') border border-danger  @enderror form-check-input"  type="radio" name="gender_type" id="inlineRadio2" value="2">
                                                            <label class="form-check-label" for="inlineRadio2">Ayol</label>

                                                           </div>

                                                             @error('gender_type')
                                                                <div class="text-danger p-1">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror

                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <!-- <div class="mb-1">
                                                            <label class="form-label" for="login">Login:</label>
                                                            <input type="text" id="login" required class="form-control" name="login" placeholder="loginLogin" />
                                                        </div> -->
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <!-- <div  class="mb-1">
                                                            <label class="form-label" for="parol">Parol:</label>
                                                            <input type="password" id="parol" required class="form-control" name="password" placeholder="****" />
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <button type="submit" data-id=".add_us" data-title="User was add successfuly" class="add_ btn btn-primary me-1">Add</button>
                                                        <button type="reset" class="btn btn-outline-secondary">O'chirish</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <script>
      $(document).on('input','.telefon',function(e){
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,2})(\d{0,2})/);
                    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '-') + (x[4] ? '-' + x[4] : '');
     })


 </script>


@endsection
