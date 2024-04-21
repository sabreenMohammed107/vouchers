<!DOCTYPE html>
<html lang="en">

<head>
    <title>Table V04</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('public/adminasset/images/icons/favicon.ico')}}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/adminasset/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/adminasset/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/adminasset/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/adminasset/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/adminasset/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
    <!--===============================================================================================-->
    <!-- Page Specific CSS (Slick Slider.css) -->
    <link href="{{ asset('public/adminasset/css/datatables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/adminasset/css/slick.css')}}" rel="stylesheet">
    <link href="{{ asset('public/adminasset/css/select2.min.css')}}" rel="stylesheet">
    <!-- ====================================================================================== -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/adminasset/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/adminasset/css/main.css')}}">


    <!-- Scripts -->

    <!--===============================================================================================-->
    <style>
        th,
        td {
            text-indent: 10px;
        }
thead{
    background: #000;
    color: #fff;
    font-size: larger;
    font-weight: bold;
}

        .column1 {
            width: 20%;
            padding-left: 40px;
        }

        .column2 {
            width: 10%;
        }
    </style>
</head>

<body>

    <div class="limiter">
        <ul class="navbar-nav ml-auto" style="margin-bottom: 50px;">
            <!-- Authentication Links -->



            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>


                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>



            </li>

        </ul>


        <div class="container-table100">


            <div class="table-responsive">
                <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                    <thead >
                        <tr class="row100 head">
                            <th >pay</th>
                            <th >Name</th>
                            <th>Mobile</th>
                            <th >Courses</th>
                            <th >Duration</th>
                            <th >Assign Date</th>
                            <th >Code-%</th>
                            <th >Expired </th>
                            <th >City</th>
                            <th >Notes</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $index=>$row)
                        <tr class="row100 body">
                            <td class="cell100 column2">@if($row->coupon_status==4)<i class="fa fa-check"></i> @else <i class="fa fa-times"></i> @endif</td>
                            <td class="cell100 column2">
                                <a href="#" data-toggle="modal" data-target="#addSubCat{{$row->id}}">{{$row->student->name ?? ''}}</a>
                            </td>
                            <td class="cell100 column2">{{$row->student->mobile ?? ''}}</td>

                            <?php
                            $courses = $row->student->course()->get();

                            ?>
                            <td class="cell100 column1">@foreach($courses as $course){{$course->course_name}},@endforeach</td>

                            <?php
                            $durations = $row->student->duration()->get();

                            ?>
                            <td class="cell100 column2">@foreach($durations as $dur){{$dur->duration_text}},@endforeach</td>
<td><?php
                                $date = null;
                                if ($row->expired_date) {
                                    $date2 = date_create($row->assign_date);
                                }
                                ?>
                                @if($date2){{ date_format($date2,"d-m-Y")  }}@endif</td> 
                            <td class="cell100 column2">{{$row->coupon_code}} -{{$row->discount_per}}</td>
                            <td class="cell100 column2">
                                <?php
                                $date = null;
                                if ($row->expired_date) {
                                    $date = date_create($row->expired_date);
                                }
                                ?>
                                @if($date){{ date_format($date,"d-m-Y")  }}@endif </td>
                            <td class="cell100 column2">{{$row->student->city ?? ''}}</td>

                            <td class="cell100 column1">{{$row->adminNotes}}</td>


                        </tr>


                        <!-- Add new Modal -->
                        <div class="modal fade" id="addSubCat{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="addSubCat">
                            <div class="modal-dialog modal-lg " role="document">
                                <div class="modal-content">
                                    <!-- <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X -->

                                    </button>
                                    <h3>Edit Student</h3>
                                    <div class="modal-body">
                                        <div class="ms-auth-container row no-gutters">
                                            <div class="col-12 p-3">
                                                <form action="{{route('admin.update',$row->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="student_id" value="{{$row->student->id ?? ''}}">
                                                    <div class="ms-auth-container row">

                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-group">
                                                                <label class="exampleInputPassword1" for="exampleCheck1">Name</label>
                                                                <input type="text" name="name" value="{{$row->student->name ?? ''}}" readonly class="form-control" placeholder="Name">
                                                            </div>
                                                        </div>




                                                        <div class="col-md-12 mb-3">
                                                            <div class="form-group">
                                                                <label class="exampleInputPassword1" for="exampleCheck1">Notes</label>
                                                                <textarea name="adminNotes" id="newClint" class="form-control" placeholder="Notes" rows="3">{{$row->adminNotes}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <div class="form-group">
                                                                <label>
                                                                    @if($row->coupon_status==4)
                                                                    <input type="checkbox" name="coupon_status" value="4" class="i-checks" checked> Pay
                                                                    @else
                                                                    <input type="checkbox" name="coupon_status" value="4" class="i-checks"> Pay

                                                                    @endif
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="input-group d-flex justify-content-end text-center">
                                                            <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                                                            <input type="submit" value="Add" class="btn btn-success ">
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /Add new Modal -->

                        @endforeach











                    </tbody>
                </table>
            </div>
        </div>






    </div>
   


    <!--===============================================================================================-->
    <script src="{{ asset('public/adminasset/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('public/adminasset/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{ asset('public/adminasset/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('public/adminasset/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('public/adminasset/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <!-- Page Specific Scripts Start -->
    <script src="{{ asset('public/adminasset/js/datatables.min.js')}}"> </script>
    <script src="{{ asset('public/adminasset/js/data-tables.js')}}"> </script>
    <!-- Page Specific Scripts End -->
    <script>
        $('.js-pscroll').each(function() {
            var ps = new PerfectScrollbar(this);

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('public/adminasset/js/main.js')}}"></script>


</body>

</html>