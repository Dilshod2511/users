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
                                  <h4 class="card-title ">{{$users->name}} {{$users->surname}}.   Xodim  ma'lumotlarini o'zgartirish</h4>
                              </div>
                              <div class="card-body">
                                  <form class="form edit_us" action="{{route('users.update',$users->id)}}" method="POST" enctype="multipart/form-data" >
                                      @csrf
                                      @method('PUT')
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p>Rasmni yuklang</p>
                                            <label for="imgUpload" class="image-uploader">
                                                @if($users->avatar!=null)
                                                    <img src="{{asset('upload/'.$users->avatar)}}" alt="" id="imagePreview">
                                                    <input type="file" name="image" class="image-file" oninput="imagePreview.src=window.URL.createObjectURL(this.files[0])" id="imgUpload">
                                                @else
                                                    <img src="{{asset('upload/'."default_avatar.png")}}" alt="" id="imagePreview">
                                                    <input type="file" name="image" class="image-file" oninput="imagePreview.src=window.URL.createObjectURL(this.files[0])" id="imgUpload">
                                                @endif

                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row mb-2 custom-options-checkable g-1">
                                                <div class="col-md-12">
                                                    <p class="mb-0">Ilmiy darajasini belgilang</p>
                                                </div>

                                                @foreach($categories as $category)
                                                <div class="col-md-3">
                                                    <input class="custom-option-item-check" type="radio" name="category_id" value="{{$category->id}}" id="customOptionsCheckableRadiosWithIcon{{$category->id}}"  @if($users->category_id==$category->id) checked @endif/>
                                                    <label class="custom-option-item text-center p-1" for="customOptionsCheckableRadiosWithIcon{{$category->id}}">
                                                        <span
                                                            class="checkbox-pop text-muted"
                                                            data-bs-toggle="popover"
                                                            data-bs-content="{{$users->categories->sub_category}}"
                                                            data-bs-trigger="hover"
                                                            title=""
                                                            data-bs-original-title="Kategoriya {{$category->name}}" aria-describedby="whatis"
                                                        ><i data-feather='help-circle'></i></span>
                                                        <span class="custom-option-item-title h4 d-block">{{$category->name}}</span>
                                                        <small>{{$category->sub_category}} </small>
                                                    </label>
                                                </div>
                                                @endforeach
                                                <input type="hidden" name="is_region" value="@if(isset($is_region->id)) {{$is_region->id}} @endif">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="first-name-column">Ism</label>
                                                        <input type="text" id="first-name-column" class=" @error('name') border border-danger  @enderror  form-control"  value="{{$users->name}}" name="name" />
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
                                                        <input type="text" id="last-name-column" class=" @error('surname') border border-danger  @enderror  form-control"  value="{{$users->surname}}" name="surname" />
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
                                                        <select class="form-select"  name="region_id" id="viloyat">
                                                            @if(isset($is_region->id))
                                                            <option value="{{$is_region->id}}">{{$is_region->name}}</option>
                                                            @else
                                                            @if(auth()->user()->role==2)
                                                              <option value="{{auth()->user()->region_id}}">{{auth()->user()->regions->name}}</option>
                                                                @else
                                                        @foreach($regions as $region)
                                                              <option value="{{$region->id}}" @if($region->id==$users->region_id) selected @endif>{{$region->name}}</option>
                                                      @endforeach
                                                      @endif
                                                         @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="lavozim">Lavozim</label>
                                                        <input type="text" id="la" required class="  @error('position') border border-danger  @enderror  form-control"  value="{{$users->position}}" name="position" placeholder="Lavozim" />
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
                                                        <input type="tel" id="tel" class=" @error('phone') border border-danger  @enderror  form-control telefon" name="phone"  value="{{substr($users->phone,3)}}" />

                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 d-flex p-2 bd-highlight ">
                                                            <div style="display: inline-block;" class="me-3 ">
                                                                 <input class=" @error('gender_type') border border-danger  @enderror  form-check-input" type="radio" name="gender_type" id="inlineRadio1" @if($users->gender_type==1) checked @endif value="1">
                                                            <label class="form-check-label" for="inlineRadio1">Erkak</label>
                                                            </div>

                                                           <div style="display: inline-block;">
                                                                <input class="@error('gender_type') border border-danger  @enderror form-check-input" type="radio" name="gender_type" id="inlineRadio2" @if($users->gender_type==2) checked @endif value="2">
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

                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12 d-flex justify-content-between">
                                                    <div></div>
                                                    <div>
                                                        <button type="submit" data-id=".edit_us" data-title="User was updata successfuly" class="add_ btn btn-primary me-1" id="sweet">tahrirlash</button>
                                                        <button type="reset" class="btn btn-outline-secondary">O'chirish</button>
                                                    </div>

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

 <script>

  if($('.telefon').val()!=null)
  {
    var x = $('.telefon').val().replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,2})(\d{0,2})/);
    console.log(x)
    $('.telefon').val(!x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '') + (x[4] ? '-' + x[4] : ''))  ;
  }

$(document).on('input','.telefon',function(e){
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,2})(\d{0,2})/);
                    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '') + (x[4] ? '-' + x[4] : '');
     })

//
 </script>


@endsection
