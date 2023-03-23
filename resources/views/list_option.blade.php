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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

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

    th.editdelete {
        border-style: solid;
        background: #e8e8e8;
    }

    span.border-2.p-2.mb-2.warning {
        background-color: #ffc107;
        // border-radius: 5px;
    }

    span.border-2.p-2.mb-2.success {
        background-color: #4bae4f;
        color: white;
    }

    span.border-2.p-2.mb-2.fail {
        background: #dc3545;
        color: white;
    }

    p.bor {
        margin-top: 15px;

    }

    .card-body {
        box-shadow: 3px 3px 20px 7px #e8e8e8;
    }

    .col-12.col-md-8.col-lg-6.border.border-light {
        padding: 20px;
        box-shadow: 3px 3px 20px 7px #e8e8e8;
        border-radius: 10px;
    }
</style>


<body>

    <form method="POST" class="form-horizontal" action="{{ route('savename') }}">
        @csrf
        <section class="vh-100">
            <div class="container py-5 ">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    {{-- show fname lname id -> database --}}
                    <div class="col-12 col-md-8 col-lg-6 border border-light">
                        <div class="row align-items-center ">
                            <div class="col ">
                                <p>ชื่อ : {{ $name->fname }}</p> {{-- เรียกใช้ จาก database -> $ --}}
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
                    </div>
                </div>
            </div>

            <div class="container text-center">
                <div class="row align-items-start">
                    {{-- button test body link --}}
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <i class="bi bi-person-fill" style="font-size: 40px;"></i>
                                <h5 class="card-title">ทดสอบร่างกาย</h5>
                                <br>
                                <a href="{{ route('body', ['id' => $name->id]) }}" class="btn btn-dark"
                                    style="font-weight: 700;">ทดสอบ</a>
                            </div>
                        </div>
                    </div>

                    {{-- button test theory link --}}
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <i class="bi bi-card-checklist" style="font-size: 40px;"></i>
                                <h5 class="card-title">ทดสอบทฤษฎี</h5>
                                <br>
                                <a href="{{ route('theory', ['id' => $name->id]) }}" class="btn btn-dark"
                                    style="font-weight: 700;">ทดสอบ</a>
                            </div>
                        </div>
                    </div>

                    {{-- button test operate link --}}
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <i class="bi bi-car-front-fill" style="font-size: 40px;"></i>
                                <h5 class="card-title">ทดสอบปฏิบัติ</h5>
                                <br>
                                <a href="{{ route('operate', ['id' => $name->id]) }}" class="btn btn-dark"
                                    style="font-weight: 700;">ทดสอบ</a>
                            </div>
                        </div>
                    </div>

                    {{-- Table pass fail test --}}
                    <div class="container py-5 table-user">
                        <table class="table table-bordered">

                            {{-- show status test body pass fail --}}
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2" style="background-color:#e8e8e8;">ทดสอบร่างกาย
                                    </th>
                                    <th scope="col" class="colorstatus" style="background-color:#e8e8e8;">สถานะ
                                    </th>
                                </tr>
                            </thead>

                            <?php
                            $sumcheck = 0;
                            $waitcheck = 0;
                            $checkyellow = 0;
                            ?>

                            <tbody>
                                {{-- show status test1 --}}
                                {{-- status test1 --}}
                                <tr>
                                    <th scope="row">1</th>
                                    <td>ทดสอบตาบอดสี</td>
                                    {{-- if else check --}}
                                    <td>
                                        @if (@$test_body->eyecolor === null)
                                            <?php
                                            $waitcheck = 1;
                                            ?>
                                            <i class="bi bi-dash-circle" style="color: #ffc107;"></i>
                                        @elseif (@$test_body->eyecolor == 1)
                                            <?php
                                            $sumcheck = $sumcheck + 1;
                                            ?>
                                            <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                        @elseif (@$test_body->eyecolor == 0)
                                            <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                        @endif
                                    </td>
                                </tr>

                                {{-- status test2 --}}
                                <tr>
                                    <th scope="row">2</th>
                                    <td>ทดสอบตาสายตายาว</td>
                                    {{-- if else check --}}
                                    <td>
                                        @if (@$test_body->longsighted === null)
                                            <?php
                                            $waitcheck = 1;
                                            ?>
                                            <i class="bi bi-dash-circle" style="color: #ffc107;"></i>
                                        @elseif (@$test_body->longsighted == 1)
                                            <?php
                                            $sumcheck = $sumcheck + 1;
                                            ?>
                                            <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                        @elseif (@$test_body->longsighted == 0)
                                            <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                        @endif
                                    </td>
                                </tr>

                                {{-- status test3 --}}
                                <tr>
                                    <th scope="row">3</th>
                                    <td>ทดสอบสายตาเอียง</td>
                                    {{-- if else check --}}
                                    <td>
                                        @if (@$test_body->astigmatism === null)
                                            <?php
                                            $waitcheck = 1;
                                            ?>
                                            <i class="bi bi-dash-circle" style="color: #ffc107;"></i>
                                        @elseif (@$test_body->astigmatism == 1)
                                            <?php
                                            $sumcheck = $sumcheck + 1;
                                            ?>
                                            <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                        @elseif (@$test_body->astigmatism == 0)
                                            <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                        @endif
                                    </td>
                                </tr>

                                {{-- status test4 --}}
                                <tr>
                                    <th scope="row">4</th>
                                    <td>ทดสอบการตอบสนองของร่างกาย</td>
                                    {{-- if else check --}}
                                    <td>
                                        @if (@$test_body->response === null)
                                            <?php
                                            $waitcheck = 1;
                                            ?>
                                            <i class="bi bi-dash-circle" style="color: #ffc107;"></i>
                                        @elseif (@$test_body->response == 1)
                                            <?php
                                            $sumcheck = $sumcheck + 1;
                                            ?>
                                            <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                        @elseif (@$test_body->response == 0)
                                            <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                        @endif
                                    </td>
                                </tr>
                                <thead>

                                    {{-- button save datatable & delete data from database --}}
                                    <th scope="col" colspan="3" class="editdelete"> <a
                                            href="{{ route('body', ['id' => $name->id]) }}"
                                            class="btn btn-primary">แก้ไข</a>
                                        <a class="btn btn-danger d-none" role="button"
                                            href="{{ route('deletebody', ['id' => $name->id]) }}"
                                            id="btn-deletebody">ลบ</a>
                                        <a class="btn btn-danger" onclick="deleteBody({{ @$test_body->id }})"
                                            role="button">ลบ</a>
                                    </th>

                                </thead>

                                {{-- check status other test --}}
                                <thead>
                                    <th scope="col" colspan="3">
                                        @if (@$waitcheck == 0)
                                            @if (@$sumcheck >= 3)
                                                <p class="bor"><span class=" border-2 p-2 mb-2 success"
                                                        style="font-weight: 700">ผ่านการทดสอบ</span></p>
                                                <input type="hidden" value="pass" class="checkstatus">
                                            @elseif (@$sumcheck < 3)
                                                <p class="bor"><span class=" border-2 p-2 mb-2 fail"
                                                        style="font-weight: 700">ไม่ผ่านการทดสอบ</span></p>
                                                <input type="hidden" value="fail" class="checkstatus">
                                            @endif
                                        @elseif(@$waitcheck == 1)
                                            <p class="bor"><span class="border-2 p-2 mb-2 warning"
                                                    style="font-weight: 700">รอการพิจารณา</span></p>
                                            <input type="hidden" value="wait" class="checkstatus">
                                            <?php
                                            $checkyellow = $checkyellow + 1;
                                            ?>
                                        @endif
                                    </th>
                                </thead>

                                {{-- show status test theory pass fail --}}
                                <thead>
                                    <?php
                                    $check_wait = 0;
                                    $sumtotal_traffic_sign = @$test_theory->traffic_sign;
                                    $sumtotal_traffic_lines = @$test_theory->traffic_lines;
                                    $sumtotal_giving_way = @$test_theory->giving_way;
                                    $sumtotal = $sumtotal_traffic_sign + $sumtotal_traffic_lines + $sumtotal_giving_way;
                                    ?>

                                    <tr>
                                        <th scope="col" colspan="2" style="background-color: #e8e8e8;;">
                                            ทดสอบทฤษฎี</th>
                                        <th scope="col" style="background-color:#e8e8e8;;">สถานะ</th>
                                    </tr>
                                </thead>

                                {{-- show status test2 --}}
                                {{-- status test1 --}}
                                <tr>
                                    <th scope="row">1</th>
                                    <td>ป้ายจราจร </td>
                                    <td>
                                        @if (@$test_theory->traffic_sign == null)
                                            <?php
                                            $check_wait = 1;
                                            ?>
                                            <i class="bi bi-dash-circle" style="color: #ffc107;"></i>
                                        @elseif (@$test_theory->traffic_sign >= 40)
                                            <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                        @elseif (@$test_theory->traffic_sign < 40)
                                            <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                        @endif
                                    </td>
                                </tr>

                                {{-- status test2 --}}
                                <tr>
                                    <th scope="row">2</th>
                                    <td>เส้นจราจร</td>
                                    <td>
                                        @if (@$test_theory->traffic_lines == null)
                                            <?php
                                            $check_wait = 1;
                                            ?>
                                            <i class="bi bi-dash-circle" style="color: #ffc107;"></i>
                                        @elseif (@$test_theory->traffic_lines >= 40)
                                            <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                        @elseif (@$test_theory->traffic_lines < 40)
                                            <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                        @endif
                                    </td>
                                </tr>

                                {{-- status test3 --}}
                                <tr>
                                    <th scope="row">3</th>
                                    <td>การให้ทาง</td>
                                    <td>
                                        @if (@$test_theory->giving_way == null)
                                            <?php
                                            $check_wait = 1;
                                            ?>
                                            <i class="bi bi-dash-circle" style="color: #ffc107;"></i>
                                        @elseif (@$test_theory->giving_way >= 40)
                                            <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                        @elseif (@$test_theory->giving_way < 40)
                                            <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>

                            {{-- sum show status test2 --}}
                            <thead>
                                <tr>
                                    <th scope="col" colspan="3" style="">คะแนนรวมทั้งหมด :
                                        {{ $sumtotal }}
                                        คะแนน
                                    </th>
                                </tr>

                                {{-- button save datatable & delete data from database --}}
                                <thead>
                                    <th scope="col" colspan="3" class="editdelete"> <a
                                            href="{{ route('theory', ['id' => $name->id]) }}"
                                            class="btn btn-primary">แก้ไข</a>
                                        <a class="btn btn-danger d-none" role="button"
                                            href="{{ route('deletetheory', ['id' => $name->id]) }}"
                                            id="btn-deletetheory">ลบ</a>
                                        <a class="btn btn-danger" onclick="deleteTheory({{ @$test_theory->id }})"
                                            role="button">ลบ</a>
                                    </th>
                                </thead>

                                {{-- show status test theory pass fail --}}
                                <thead>
                                    <th scope="col" colspan="3">
                                        @if (@$check_wait == 0)
                                            @if (@$sumtotal >= 120)
                                                <p class="bor"><span class="border-2 p-2 mb-2 success"
                                                        style="font-weight: 700">ผ่านการทดสอบ</span></p>
                                                <input type="hidden" value="pass" class="checkstatus">
                                            @elseif (@$sumtotal < 120)
                                                <p class="bor"><span class="border-2 p-2 mb-2 fail"
                                                        style="font-weight: 700">ไม่ผ่านการทดสอบ</span></p>
                                                <input type="hidden" value="fail" class="checkstatus">
                                            @endif
                                        @elseif(@$check_wait == 1)
                                            <p class="bor"><span class="border-2 p-2 mb-2 warning"
                                                    style="font-weight: 700">รอการพิจารณา</span></p>
                                            <input type="hidden" value="wait" class="checkstatus">
                                            <?php
                                            $checkyellow = $checkyellow + 1;
                                            ?>
                                        @endif
                                    </th>
                                </thead>

                            </thead>

                            {{-- show status test3 --}}
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2" style="background-color: #e8e8e8;;">
                                        ทดสอบปฏิบัติ </th>
                                    <th scope="col" style="background-color:#e8e8e8;;">สถานะ</th>
                                </tr>
                            </thead>

                            {{-- status test1 --}}
                            <tr>
                                <th scope="row">1</th>
                                <td>ภาคปฏิบัติ</td>
                                <td>
                                    @if (@$test_operate->check === null)
                                        <i class="bi bi-dash-circle" style="color: #ffc107;"></i>
                                    @elseif (@$test_operate->check == 1)
                                        <i class="bi bi-check-circle" style="color: #4bae4f;"></i>
                                    @elseif (@$test_operate->check == 0)
                                        <i class="bi bi-x-circle" style="color: #f74354;"></i>
                                    @endif
                                    </i>
                                </td>
                            </tr>

                            {{-- button save datatable & delete data from database --}}
                            <thead>
                                <th scope="col" colspan="3" class="editdelete"> <a
                                        href="{{ route('operate', ['id' => $name->id]) }}"
                                        class="btn btn-primary">แก้ไข</a>
                                    <a class="btn btn-danger d-none" role="button"
                                        href="{{ route('deleteoperate', ['id' => $name->id]) }}"
                                        id="btn-deleteoperate">ลบ</a>
                                    <a class="btn btn-danger" onclick="deleteOperate({{ @$test_operate->id }})"
                                        role="button">ลบ</a>
                                </th>
                            </thead>

                            {{-- show status test theory pass fail --}}
                            <thead>
                                <tr>
                                    <th scope="col" colspan="3">
                                        @if (@$test_operate->check === null)
                                            <p class="bor"><span class="border-2 p-2 mb-2 warning"
                                                    style="font-weight: 700">รอการพิจารณา</span></p>
                                            <input type="hidden" value="wait" class="checkstatus">
                                        @elseif (@$test_operate->check == 1)
                                            <p class="bor"><span class="border-2 p-2 mb-2 success"
                                                    style="font-weight: 700">ผ่านการทดสอบ</span></p>
                                            <input type="hidden" value="pass" class="checkstatus">
                                        @elseif (@$test_operate->check == 0)
                                            <p class="bor"><span class="border-2 p-2 mb-2 fail"
                                                    style="font-weight: 700">ไม่ผ่านการทดสอบ</span></p>
                                            <input type="hidden" value="fail" class="checkstatus">
                                            <?php
                                            $checkyellow = $checkyellow + 1;
                                            ?>
                                        @endif
                                    </th>
                                </tr>
                            </thead>

                        </table>
                    </div>


                    {{-- button save data all -> database and show datatable --}}
                    <div class="p-5 text-center">
                        <a class="btn btn-dark " role="button" onclick="saveData()" id="btn-savedata"
                            style="font-weight: 700">บันทึกข้อมูล</a>
                        {{-- button back -> page home --}}
                        <a class="btn btn-light border-dark" style="font-weight: 700" role="button"
                            href="{{ url('/') }}">ย้อนกลับ</a>
                    </div>

                </div>
            </div>
        </section>
    </form>


</body>

</html>


<script>
    {{-- function delete test body alert --}}

    function deleteBody(id) {
        if (typeof id !== "undefined") {
            Swal.fire({
                title: 'คุณแน่ใจจะลบ?',
                text: "คุณต้องการจะลบการทดสอบ!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',

            }).then((result) => {
                if (result.isConfirmed) { //กดยืนยัน
                    window.location.replace("/deletebody/" + id);

                }
            })
        } else {
            Swal.fire({
                title: 'กรุณาทำแบบทดสอบ',
                confirmButtonText: 'ยืนยัน',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        }
    }

    {{-- function delete test theory alert --}}

    function deleteTheory(id) {
        if (typeof id !== "undefined") {
            Swal.fire({
                title: 'คุณแน่ใจจะลบ?',
                text: "คุณต้องการจะลบการทดสอบ!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',

            }).then((result) => {
                if (result.isConfirmed) { //กดยืนยัน
                    window.location.replace("/deletetheory/" + id);

                }
            })
        } else {
            Swal.fire({
                title: 'กรุณาทำแบบทดสอบ',
                confirmButtonText: 'ยืนยัน',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        }
    }

    {{-- function delete test operate alert --}}

    function deleteOperate(id) {
        if (typeof id !== "undefined") {
            Swal.fire({
                title: 'คุณแน่ใจจะลบ?',
                text: "คุณต้องการจะลบการทดสอบ!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',

            }).then((result) => {
                if (result.isConfirmed) { //กดยืนยัน
                    window.location.replace("/deleteoperate/" + id);

                }
            })
        } else {
            Swal.fire({
                title: 'กรุณาทำแบบทดสอบ',
                confirmButtonText: 'ยืนยัน',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        }

    }

    {{-- function save data -> datatable page welcome --}}

    function saveData(id) {

        check = 'can'
        $('.checkstatus').each(function() {
            if (this.value == 'wait') {
                check = 'cant';
            } // console.log(this.value)
        })
        console.log(check)

        if (check == 'can') {
            Swal.fire({
                title: 'คุณต้องการบันทึกการทดสอบ?',
                text: "คุณต้องการบันทึกการทดสอบ!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'บันทึก',
                cancelButtonText: 'ยกเลิก',

            }).then((result) => {
                if (result.isConfirmed) { //กดยืนยัน
                    window.location.replace("/welcome");

                }
            })
        } else {
            Swal.fire({
                text: 'กรุณาทำแบบทดสอบทุกขั้นตอนให้ครบถ้วน!',
                confirmButtonText: 'ยืนยัน',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        }

    }
</script>
