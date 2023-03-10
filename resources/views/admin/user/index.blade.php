 @extends('layouts.admin')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content ">

        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header">
                <div class="d-flex justify-content-between align-items-center mb-2 mt-5">
                    <h2 class="mb-0">Users</h2>
                    <a href="{{route('dashboard.users.create')}}" class="btn btn-primary">New add User</a>
                </div>

            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">

                    <!-- List DataTable -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="cell-fit">№</th>
                                                <th>Targ‘ibotchi F.I.SH</th>
                                                <th>Lavozim</th>
                                                <th>Kategoriya</th>
                                                <th>Hudud</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      

                                        </tbody>
                                    </table>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <div>

                                            </div>
                                            <nav aria-label="Page navigation">
                                             

                                            </nav>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ List DataTable -->
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="modal fade" id="deleteXodim" tabindex="-1" aria-labelledby="deleteXodimTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5 text-center ">
                     <div class="avatar bg-light-danger p-2 mb-1">
                        <div class="avatar-content">
                            <i data-feather="trash-2" class="font-large-5"></i>
                        </div>
                     </div>

                      <h1 class="text-center mb-1" id="deleteXodimTitle">Xodimni o'chirish</h1>
                      <p class="text-center">Rostanxam xodimni o'chirmoqchimisiz?</p>

                     <!-- form -->
                      <div class="row user-delete">


                       </div>
                </div>
            </div>
        </div>
    </div>
    <!-- add new card modal  -->
    <div class="modal fade" id="editCat" tabindex="-1" aria-labelledby="editCatTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body edit px-sm-5 mx-50 pb-5">

                </div>
            </div>
        </div>
    </div>
    <!--/ add new card modal  -->


@endsection
