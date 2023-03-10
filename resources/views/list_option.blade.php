<!DOCTYPE html>
<html>

<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    < link href = "css/styles.css"
    rel = "stylesheet" / >
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100&display=swap" rel="stylesheet">

<style>
    * {
        font-family: 'Kanit', sans-serif;
        font-weight: 700;
    }

    h5.card-title {
        font-weight: 700;
    }

    a.btn.btn-warning {
        font-weight: 700;
    }

    a.btn.btn-danger {
        font-weight: 700;

    }

    a.btn.btn-primary {
        font-weight: 700;
    }
</style>


<body>

    <form method="POST" class="form-horizontal" action="{{ route('savename') }}">
        @csrf



        <section class="vh-100">
            <div class="container py-5 ">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="row align-items-center ">
                            <div class="col ">
                                <p>ชื่อ : {{ $name->fname }}</p>
                            </div>
                            <div class="col">
                                <p>นามสกุล : {{ $name->lname }}</p>
                            </div>
                        </div>
                        <div class="row align-items-center ">
                            <div class="col ">
                                <p>วัน/เวลา : {{ $name->created_at }}</p>
                            </div>
                            <div class="col">

                            </div>
                        </div>

                        <div class="container text-center">
                            <a class="btn btn-warning" role="button" href="{{ url('/') }}">แก้ไข</a>
                            <a class="btn btn-danger" role="button" href="{{ url('/') }}">ลบ</a>
                        </div>



                    </div>
                </div>
            </div>

            <div class="container text-center">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                    fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                </svg>
                                <h5 class="card-title">ทดสอบร่างกาย</h5>

                                <br>
                                <a href="{{ route('body', ['id' => $name->id]) }}" class="btn btn-primary">ทดสอบ</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                    fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                    <path
                                        d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                    <path
                                        d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                </svg>
                                <h5 class="card-title">ทดสอบทฤษฎี</h5>
                                <br>
                                <a href="{{ route('theory', ['id' => $name->id]) }}" class="btn btn-primary">ทดสอบ</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                    fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                                </svg>
                                <h5 class="card-title">ทดสอบปฏิบัติ</h5>
                                <br>
                                <a href="{{ route('operate', ['id' => $name->id]) }}" class="btn btn-primary">ทดสอบ</a>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="container py-5">
                        <table class="table  table-light table-striped-columns">
                            <thead>
                                <tr>

                                    <th scope="col" colspan="4" style="background-color: #508bfc;">ทดสอบร่างกาย
                                    </th>

                                </tr>


                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>ทดสอบตาบอดสี</td>
                                    <td>
                                        @if ($test_body->eyecolor == 1)
                                            <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                        @elseif ($test_body->eyecolor == 0)
                                            <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                        @endif

                                    </td>


                                    <th scope="col"> <a class="btn btn-warning" role="button"
                                            href="{{ url('/') }}">แก้ไข</a>
                                        <a class="btn btn-danger" role="button" href="{{ url('/') }}">ลบ</a>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>ทดสอบตาสายตายาว</td>
                                    <td>

                                        @if ($test_body->longsighted == 1)
                                            <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                        @elseif ($test_body->longsighted == 0)
                                            <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                        @endif
                                    </td>


                                    <th scope="col"> <a class="btn btn-warning" role="button"
                                            href="{{ url('/') }}">แก้ไข</a>
                                        <a class="btn btn-danger" role="button" href="{{ url('/') }}">ลบ</a>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>ทดสอบสายตาเอียง</td>
                                    <td>

                                        @if ($test_body->astigmatism == 1)
                                            <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                        @elseif ($test_body->astigmatism == 0)
                                            <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                        @endif
                                    </td>


                                    <th scope="col"> <a class="btn btn-warning" role="button"
                                            href="{{ url('/') }}">แก้ไข</a>
                                        <a class="btn btn-danger" role="button" href="{{ url('/') }}">ลบ</a>
                                    </th>

                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>ทดสอบการตอบสนองของร่างกาย</td>
                                    <td>

                                        @if ($test_body->response == 1)
                                            <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                        @elseif ($test_body->response == 0)
                                            <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                        @endif
                                    </td>


                                    <th scope="col"> <a class="btn btn-warning" role="button"
                                            href="{{ url('/') }}">แก้ไข</a>
                                        <a class="btn btn-danger" role="button" href="{{ url('/') }}">ลบ</a>
                                    </th>

                                </tr>
                                <thead>
                                    <tr>
                                        @if ($test_body->response == 1)
                                            <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                        @elseif ($test_body->response == 0)
                                            <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                        @endif
                                        <th scope="col" colspan="4">ผ่านการทดสอบ</th>

                                    </tr>
                                </thead>
                                <thead>
                                    <tr>

                                        <th scope="col" colspan="4" style="background-color: #508bfc;">
                                            ทดสอบทฤษฎี</th>

                                    </tr>
                                </thead>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>ป้ายจราจร</td>
                                    <td>
                                        @if ($test_theory->traffic_sign >= 45)
                                            <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                        @elseif ($test_theory->traffic_sign < 45)
                                            <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                        @endif

                                    </td>


                                    <th scope="col"> <a class="btn btn-warning" role="button"
                                            href="{{ url('/') }}">แก้ไข</a>
                                        <a class="btn btn-danger" role="button" href="{{ url('/') }}">ลบ</a>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>เส้นจราจร</td>
                                    <td>
                                        @if ($test_theory->traffic_lines >= 45)
                                            <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                        @elseif ($test_theory->traffic_lines < 45)
                                            <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                        @endif
                                    </td>


                                    <th scope="col"> <a class="btn btn-warning" role="button"
                                            href="{{ url('/') }}">แก้ไข</a>
                                        <a class="btn btn-danger" role="button" href="{{ url('/') }}">ลบ</a>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>การให้ทาง</td>
                                    <td>
                                        @if ($test_theory->giving_way >= 45)
                                            <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                        @elseif ($test_theory->giving_way < 45)
                                            <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                        @endif
                                    </td>


                                    <th scope="col"> <a class="btn btn-warning" role="button"
                                            href="{{ url('/') }}">แก้ไข</a>
                                        <a class="btn btn-danger" role="button" href="{{ url('/') }}">ลบ</a>
                                    </th>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>

                                    <th scope="col" colspan="4">รอพิจารณา</th>

                                </tr>
                            </thead>
                            <thead>
                                <tr>

                                    <th scope="col" colspan="4" style="background-color: #508bfc;">ทดสอบปฏิบัติ
                                    </th>

                                </tr>
                            </thead>
                            <tr>
                                <th scope="row">1</th>
                                <td>ภาคปฏิบัติ</td>
                                <td>
                                    @if ($test_operate->check == 1)
                                        <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                    @elseif ($test_operate->check == 0)
                                        <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                    @endif
                                    </i>
                                </td>


                                <th scope="col"> <a class="btn btn-warning" role="button"
                                        href="{{ url('/') }}">แก้ไข</a>
                                    <a class="btn btn-danger" role="button" href="{{ url('/') }}">ลบ</a>
                                </th>
                            </tr>

                            </tbody>
                            <thead>
                                <tr>

                                    <th scope="col" colspan="4">
                                        @if ($test_operate->check == 1)
                                            <p style="color: #4bae4f">ผ่านการทดสอบ</p></i>
                                        @elseif ($test_operate->check == 0)
                                            <p style="color:#f74354">ไม่ผ่านการทดสอบ</p></i>
                                        @endif
                                    </th>

                                </tr>
                            </thead>
                        </table>
                    </div>




                </div>



            </div>
        </section>

    </form>







</body>

</html>
