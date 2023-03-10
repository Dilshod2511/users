@extends('layouts.admin')

@section('content')

     <!-- BEGIN: Content-->
     <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">{{$users->name}} {{$users->surname}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('regions.index')}}">Viloyatlar</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('show-region-users',$users->region_id)}}">{{$users->regions->name}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{$users->name}} {{$users->surname}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="app-user-view-account">
                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <!-- User Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="user-avatar-section mb-2">
                                                        <div class="d-flex align-items-start">
                                                            @if($users->avatar!=null)
                                                            <img class="img-fluid rounded me-1" src="{{asset('upload/'.$users->avatar)}}" height="110" width="110" alt="User avatar" />
                                                            @else
                                                                <img class="img-fluid rounded me-1" src="{{asset('upload/'."default_avatar.png")}}" height="110" width="110" alt="User avatar" />
                                                                @endif
                                                            <div class="user-info">
                                                                <div class="h4">{{$users->name}} {{$users->surname}}</div>
                                                                <span class="badge bg-light-secondary">Yozuvchi</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex align-items-center me-2">
                                                            <span class="badge bg-light-primary p-75 rounded">
                                                                <i data-feather="check" class="font-medium-2"></i>
                                                            </span>
                                                            <div class="ms-75">
                                                                <h4 class="mb-0">1.23k</h4>
                                                                <small>Maqolalar</small>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge bg-light-primary p-75 rounded">
                                                                <i data-feather="briefcase" class="font-medium-2"></i>
                                                            </span>
                                                            <div class="ms-75">
                                                                <h4 class="mb-0">{{$events->count()}}</h4>
                                                                <small>Tadbirlar</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <h4 class="fw-bolder border-bottom pb-50 mb-1">To'liq ma'lumot</h4>
                                                    <div class="info-container">
                                                        <ul class="list-unstyled row">
                                                            <div class="col-md-6">
{{--                                                                <li class="mb-75">--}}
{{--                                                                    <span class="fw-bolder me-25">Username:</span>--}}
{{--                                                                    <span>gertrude.dev</span>--}}
{{--                                                                </li>--}}
{{--                                                                <li class="mb-75">--}}
{{--                                                                    <span class="fw-bolder me-25">Status:</span>--}}
{{--                                                                    <span class="badge bg-light-success">Active</span>--}}
{{--                                                                </li>--}}
                                                                <li class="mb-75">
                                                                    <span class="fw-bolder me-25">Lavozim:</span>
                                                                    <span>{{$users->position}}</span>
                                                                </li>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <li class="mb-75">
                                                                    <span class="fw-bolder me-25">Kontakt:</span>
                                                                    <span>{{$users->phone}}</span>
                                                                </li>

                                                                <li class="mb-75">
                                                                    <span class="fw-bolder me-25">Viloyat:</span>
                                                                    <span>{{$users->regions->name}}</span>
                                                                </li>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /User Card -->
                                </div>
                                <div class="col-md-4">
                                    <!-- Plan Card -->
                                    <div class="card border-primary">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <span class="badge bg-light-primary mb-2">{{Carbon\Carbon::now()->monthName}}</span>
                                            </div>
                                            @php
                                            $starts=App\Models\Event::where('user_id',$users->id)->whereMonth('start_time',date('m'))->count();
                                            $name=App\Models\Event::where('user_id',$users->id)->whereMonth('start_time',date('m'))->where('status',2);
                                            $month=App\Models\Event::where('user_id',$users->id)->whereMonth('start_time',date('m'))->where('status',1)->count();
                                            $sum=App\Models\Report::where('user_id',$users->id)->sum('total_price');

                                            @endphp
                                            <ul class="ps-1 mb-2">
                                                <li class="mb-50">{{$starts}} Tadbir (oyiga)</li>
                                                <li class="mb-50"> {{$name->count()}} O'tilgan tadbirlar soni (oyiga)</li>
                                                <li class="mb-50">{{$month}} Qolgan tadbirlar soni (oyiga)</li>
                                                <li>{{$sum}}  Jami summa (oyiga)</li>
                                            </ul>
                                            <div class="d-flex justify-content-between align-items-center fw-bolder mb-50">
                                                <span>Kunlar</span>
                                                @php
                                                  $end_day=Carbon\Carbon::now()->month(date('m'))->daysInMonth;
                                                  $now_day=(date('d'));
                                                  $qoldiq=$end_day-$now_day;
                                                  $foiz=floor((100/$end_day)*$now_day);
                                                @endphp

                                                <span>{{$end_day}} dan <span>{{$qoldiq}} kun qoldi</span></span><span>{{$foiz}}%</span>
                                            </div>
                                            <div class="progress mb-50" style="height: 8px">
<div class="progress-bar" role="progressbar" style="width: {{$foiz}}%" aria-valuenow="65" aria-valuemax="100" aria-valuemin="80"></div>
                                            </div>
                                            <span>{{$qoldiq}} kun qoldi</span>
                                        </div>
                                    </div>
                                    <!-- /Plan Card -->
                                </div>
                            </div>
                        </div>
                        <!--/ User Sidebar -->

                        <!-- User Content -->
                        <div class="col-xl-12">

                            <!-- Project table -->
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Xodim topshiriqlari</h4>
                                    @if(auth()->user()->role==2)

                                    <a href="javascript:;" class="btn btn-primary me-1" data-bs-target="#newTadbir" data-bs-toggle="modal">Yangi topshiriq qo'shish</a>
                                    @endif
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tadbir</th>
                                                <th>Sana</th>
                                                <th>Status</th>
                                                <th>narxi(so'm)</th>
                                                <th>Status</th>
                                                <th>Reyting</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($events as $event)
                                            <tr>
                                                <td>
                                                    <p class="fw-bold mb-0">{{$event->name}}</p>
                                                    <!-- <span >Angular Project</span> -->
                                                </td>
                                                <td>{{$event->start_time}}</td>
                                                <td>
                                                @if($event->status==2)
                                                <span class="badge bg-info round px-1">Active</span>
                                                    @else
                                                          <span class="badge bg-primary round px-1">InActive</span>
                                                    @endif
                                                    <!-- <button class="btn btn-primary round btn-sm">Active</button> -->
                                                </td>
                                                <?php
                                                   $report= App\Models\Report::where('event_id',$event->id)->first();


                                                ?>
                                                @if($event->status==2)

                                                <td id="price">{{number_format($report->total_price)}}</td>
                                                @else
                                                <td>0</td>
                                                @endif

                                                <td>
                                                 @if(auth()->user()->role==2)
                                                    @if($event->time_until_data_entry>=date('Y-m-d'))
                                                        @if($event->status==2)
                                                        <a href="{{Route('reports.edit',$event->id)}}" class="btn btn-icon btn-light waves-effect text-success"><i data-feather="check-circle"></i></a>
                                                        <a href="{{Route('reports.edit',$event->id)}}" id="events"  class="btn btn-icon btn-light waves-effect" aria-disabled="true" ><i data-feather="edit-2"></i></a>
                                                        @else
                                                        <a href="{{Route('events.show',$event->id)}}" class="btn btn-icon btn-light waves-effect"><i data-feather="upload"></i></a>
                                                        <a href="{{Route('reports.edit',$event->id)}}" id="events" onclick="return false;" class="btn btn-icon btn-light waves-effect" ><i data-feather="edit-2"></i></a>
                                                        @endif
                                                     @else
                                                     <button class="btn btn-icon btn-outline-light waves-effect text-danger" disabled><i data-feather="alert-circle"></i></button>
                                                     <a href="{{Route('reports.edit',$event->id)}}" id="events" onclick="return false;" class="btn btn-icon btn-light waves-effect" ><i data-feather="edit-2"></i></a>
                                                     @endif
                                                   @endif
                                                </td>

                                                @if($event->status==2)
                                                <td> <i data-feather='star' fill="currentColor" class="me-25 text-warning"></i>{{$report->rates}} </td>
                                                @else
                                                <td> <i data-feather='star' fill="currentColor" class="me-25 text-warning"></i>0 </td>
                                                @endif
                                                <td>
                                                    <div>

                                                    @if(auth()->user()->role==2)
                                                        <a href="javascript:;" id="events" class="btn eve btn-icon btn-flat-secondary waves-effect" data-id="{{$event->id}}" data-bs-target="#editTadbir" data-bs-toggle="modal"><i data-feather="edit-2"></i></a>
                                                        <a href="javascript:;" id="event" class="btn btn-icon btn-flat-danger waves-effect" data-id="{{$event->id}}" data-bs-target="#deleteTadbir" data-bs-toggle="modal"><i data-feather="trash-2"></i></a>
                                                     @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /Project table -->

                            <!-- Activity Timeline -->
                            <div class="card">
                                <h4 class="card-header">Kelayotgan tadbirlar</h4>
                                <div class="card-body pt-1">
                                    <ul class="timeline ms-50">
                                        @foreach($eventts as $item)
                                        <li class="timeline-item">
                                            <span class="timeline-point timeline-point-indicator"></span>
                                            <div class="timeline-event">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                    <h6>{{$item->name}}</h6>

                                                </div>
                                                <p>{{$item->regions->name}} {{substr($item->start_time,0,10)}}</p>
                                            </div>
                                        </li>

                                        @endforeach


                                    </ul>
                                </div>
                            </div>
                            <!-- /Activity Timeline -->
                        </div>
                        <!--/ User Content -->
                    </div>
                </section>

                <!-- Edit User Modal -->
                <div class="modal fade" id="newTadbir" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body pb-5 px-sm-5 pt-50">
                                <div class="text-center mb-2">
                                    <h1 class="mb-1">Yangi tadbir qo'shish</h1>
                                </div>
                                <form action="{{Route('events.store')}}" method="POST" id="newTadbirForm" class="row gy-1 pt-75  add_ev" >

                                      @csrf
                                      <div class="col-12 col-md-12">
                                        <label class="form-label" for="tadbir">Tadbir nomi</label>
                                        <input type="text" id="tadbir" required name="name" class="form-control" placeholder="Tadbir nomi" value="" data-msg="Tadbir nomini kiriting" />
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label class="form-label" for="fp-default">Tadbir sanasi</label>
                                        <input type="text" id="fp-default" required name="start_time" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
                                    </div>
                                    <input type="hidden" name="user_id" value="{{$users->id}}">
                                    <input type="hidden" name="region_id" value="{{$users->region_id}}">
                                    <div class="col-12 text-center mt-2 pt-50">
                                        <button type="submit" data-id=".add_ev" data-title="Tadbir was add successfully" class="btn add_ btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                            Discard
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Edit User Modal -->

                <!-- Edit User Modal -->
                <div class="modal fade" id="editTadbir" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body pb-5  events px-sm-5 pt-50">

                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Edit User Modal -->

                <div class="modal fade" id="deleteTadbir" tabindex="-1" aria-labelledby="deleteTadbirTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-sm-5 mx-50 pb-5 text-center">
                                <div class="avatar bg-light-danger p-2 mb-1">
                                    <div class="avatar-content">
                                        <i data-feather="trash-2" class="font-large-5"></i>
                                    </div>
                                </div>
                                <h1 class="text-center mb-1" id="deleteTadbirTitle">Tadbirni o'chirish</h1>
                                <p class="text-center">Rostanxam tadbirni o'chirmoqchimisiz?</p>

                                <!-- form -->
                                <div class="row event">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <script>
        $(document).ready(function (){


            $(document).on('click','#event',function(){
          let id =$(this).data('id');



        var url = '{{ route("show-delete-event",":id") }}';
     url = url.replace(':id', id);


 $.ajax({
   type:"GET",
   url:url,
   success : function(response){
      console.log(response)
      var urll = '{{ route("events.destroy", ":id") }}';
     urll = urll.replace(':id',response['user'].id);
     // $('.userdelete').html('')
      $('.event').append(`

      <form action=${urll} method="POST" class="delete_ev">
        @csrf
           @method('DELETE')
                         <div class="col-12 text-center">
                          <button type="submit" data-id=".delete_ev" data-title="Tadbir was delete successfully" class="btn add_ btn-danger me-1 mt-1 waves-effect waves-float waves-light">Xa, ochirish</button>
                          <button type="reset" class="btn btn-outline-secondary mt-1 waves-effect" data-bs-dismiss="modal"
                          aria-label="Close">
                              Bekor qilish
                          </button>
                      </div>
                        </form>

      `)

  }
 })


})





$(document).on('click','.eve',function (){
         let id =$(this).data('id')
         var url = '{{ route("events.edit", ":id") }}';
             url = url.replace(':id', id);
         console.log(id)
         $.ajax({
           type:"GET",
           url:url,
           success : function(response){
               console.log(response)
            $('.events').html('')
             $('.events').append(`

             <div class="text-center mb-2">
                                    <h1 class="mb-1">Chust, Namangan tadbiri</h1>
                                </div>
                                <form action="{{route('events.update','id')}}" id="editTadbirForm" method="POST" class="row gy-1 pt-75 edit_ev">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="tadbir">Tadbir nomi</label>
                                        <input type="text" id="tadbir" name="name" class="form-control" value="${response['event'].name}" data-msg="Tadbir nomini kiriting" />
                                    </div>
                                    <input type="hidden" id="modalEditCatName" name='id' class="form-control" value="`+response["event"].id+`" />
                                    <div class="col-md-6 mb-1">
                                        <label class="form-label" for="fp-default"></label>
                                        <input type="text" id="fp-default" name="start_time" class="form-control flatpickr-basic flatpickr-input "  value="${response['event'].start_time.substr(0,10)}" />
                                    </div>
                                    <!-- <div class="col-md-6 mb-1">
                                        <label class="form-label" for="fp-time">Tadbir vaqti</label>
                                        <input type="text" id="fp-time" class="form-control flatpickr-time text-start" value="12:30" />
                                    </div> -->

                                    <div class="col-12 text-center mt-2 pt-50">
                                        <button type="submit" data-id=".edit_ev" data-title="Tadbir was update successfully" class="btn btn-primary me-1 add_">Edit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                            Bekor qilish
                                        </button>
                                    </div>
                                </form>

             `)

           }
         })



      })












        })
    </script>

@endsection
