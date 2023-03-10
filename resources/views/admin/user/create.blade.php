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
                                    <h4 class="card-title">yangi foydalanuvchi  yaratish</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form  add_us" action="{{route('users.store')}}" method="POST"  enctype="multipart/form-data" >
                                        @csrf
                                        <div class="row">
                                           
                                            <div class="col-md-9">
                                                <div class="row mb-2 custom-options-checkable g-1">
                                                    <div class="col-md-12">
                                                        <p class="mb-0">Ilmiy darajasini belgilang</p>
                                                    </div>

                                            
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="first-name-column">Full Name</label>
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
                                                            <label class="form-label" for="last-name-column">email</label>
                                                            <input type="text" id="last-name-column"  value="{{old('email')}}"  class="@error('email') border border-danger  @enderror form-control" placeholder="Enter Email"
                                                                name="email" />
                                                                @error('email')
                                                                <div class="text-danger p-1">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="tel">parol</label>
                                                            <input type="tel" id="tel"  value="{{old('password')}}" class="@error('password') border border-danger  @enderror form-control telefon" name="password" placeholder="Parolni kiriting" />
                                                            @error('password')
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
