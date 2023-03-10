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

                        {{-- <div class="container text-center">
                            <a class="btn btn-warning" role="button" href="{{ url('/') }}">แก้ไข</a>
                            <a class="btn btn-danger" role="button" href="{{ url('/') }}">ลบ</a>
                        </div> --}}



                    </div>
                </div>
            </div>

            <div class="container text-center">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                                <i class="bi bi-person-fill" style="font-size: 40px;"></i>
                                <h5 class="card-title">ทดสอบร่างกาย</h5>

                                <br>
                                <a href="{{ route('body', ['id' => $name->id]) }}" class="btn btn-primary">ทดสอบ</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                                <i class="bi bi-card-checklist" style="font-size: 40px;"></i>
                                <h5 class="card-title">ทดสอบทฤษฎี</h5>
                                <br>
                                <a href="{{ route('theory', ['id' => $name->id]) }}" class="btn btn-primary">ทดสอบ</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                                <i class="bi bi-car-front-fill" style="font-size: 40px;"></i>
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


                                    <th scope="col">
                                        <a href="{{ route('body', ['id' => $name->id]) }}"
                                            class="btn btn-warning">แก้ไข</a>
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


                                    <th scope="col"> <a href="{{ route('body', ['id' => $name->id]) }}"
                                            class="btn btn-warning">แก้ไข</a>
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


                                    <th scope="col"> <a href="{{ route('body', ['id' => $name->id]) }}"
                                            class="btn btn-warning">แก้ไข</a>
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


                                    <th scope="col"> <a href="{{ route('body', ['id' => $name->id]) }}"
                                            class="btn btn-warning">แก้ไข</a>
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


                                    <th scope="col"> <a href="{{ route('theory', ['id' => $name->id]) }}"
                                            class="btn btn-warning">แก้ไข</a>
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


                                    <th scope="col"> <a href="{{ route('theory', ['id' => $name->id]) }}"
                                            class="btn btn-warning">แก้ไข</a>
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


                                    <th scope="col"> <a href="{{ route('theory', ['id' => $name->id]) }}"
                                            class="btn btn-warning">แก้ไข</a>
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


                                <th scope="col"> <a href="{{ route('operate', ['id' => $name->id]) }}"
                                        class="btn btn-warning">แก้ไข</a>
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
