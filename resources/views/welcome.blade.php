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
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>



<style>
    * {
        font-family: 'Kanit', sans-serif;
        font-weight: 700;
    }

    input.form-control {
        width: 30%;
        float: right;
    }

    svg.bi.bi-check-circle {
        color: #4bae4f;
    }

    th {
        text-align: center;
    }

    td {
        text-align: center;
    }

    svg.bi.bi-x-circle {
        color: #f74354;
    }
</style>

<body>


    @csrf

    <section class="vh-100">

        {{-- show user pass test / fail test --}}
        <div class="container py-5 ">
            <div class="container text-center">
                <div class="row justify-content-evenly">
                    <div class="col-4 shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                        <p class="text-num">จำนวนผู้ผ่านการทดสอบ</p>
                        <p id="show-sum-pass"></p>
                    </div>
                    <div class="col-4 shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                        <p class="text-num">จำนวนผู้ไม่ผ่านการทดสอบ</p>
                        <p id="show-sum-fail"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-5 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <table class="table" id="tabledrive">
                    <thead>

                        <tr>
                            <th scope="col d-none">ลำดับ</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th scope="col">ทดสอบร่างกาย</th>
                            <th scope="col">ทดสอบทฤษฏี</th>
                            <th scope="col">ทดสอบปฎิบัติ</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col"></th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php
                        $sumpass = 0;
                        $sumfail = 0;
                        ?>

                        @foreach ($names as $name)
                            <tr>
                                <td scope="row d-none">{{ $name->id }}</td>
                                <td>{{ $name->fname }}</td>
                                <td>{{ $name->lname }}</td>
                                <?php
                                $sumtest_body = $name->TestBody->eyecolor + $name->TestBody->longsighted + $name->TestBody->astigmatism + $name->TestBody->response;
                                
                                $sumtest_theory = $name->TestTheory->traffic_sign + $name->TestTheory->traffic_lines + $name->TestTheory->giving_way;
                                // dd($sumtest_theory);
                                $sumtest_operate = $name->TestOperate->check;
                                // dd($sumtest_operate);
                                $status_total = 0;
                                ?>

                                {{-- show pass fail test all --}}
                                <td>
                                    <div class="row justify-content-evenly">
                                        <div class="col-4">
                                            @if (@$sumtest_body >= 3)
                                                <i class="bi bi-check-circle-fill" style="color: #4bae4f"></i>
                                                <?php
                                                $status_total = $status_total + 1;
                                                ?>
                                            @elseif (@$sumtest_body < 3)
                                                <i class="bi bi-x-circle-fill" style="color: #f74354;"></i>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalBody"
                                                onclick="editbody({{ $name->TestBody }})">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>


                                            <div class="modal fade" id="exampleModalBody" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title " id="exampleModalLabel"
                                                                style="font-weight: 700;">
                                                                ทดสอบร่างกาย
                                                            </h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" class="form-horizontal" id="form-body"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="card" style="display: contents;">
                                                                    <div class="test-eye-colour">
                                                                        <p>ทดสอบตาบอดสี</p>
                                                                        <div class="row justify-content-evenly">
                                                                            <div class="col-4">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="radio" name="eyecolor"
                                                                                        id="eyecolor-pass"
                                                                                        value="1" form="form-body">

                                                                                    <label class="form-check-label"
                                                                                        for="eyecolor-pass">
                                                                                        ผ่านการทดสอบ
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="radio" name="eyecolor"
                                                                                        id="eyecolor-fail"
                                                                                        value="0">
                                                                                    <label class="form-check-label"
                                                                                        for="eyecolor-fail">
                                                                                        ไม่ผ่านการทดสอบ
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="test-longsighted">
                                                                        <p>ทดสอบตาสายตายาว</p>
                                                                        <div class="row justify-content-evenly">
                                                                            <div class="col-4">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        name="longsighted"
                                                                                        id="longsighted-pass"
                                                                                        value="1">
                                                                                    <label class="form-check-label"
                                                                                        for="longsighted-pass">
                                                                                        ผ่านการทดสอบ
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        name="longsighted"
                                                                                        id="longsighted-fail"
                                                                                        value="0">
                                                                                    <label class="form-check-label"
                                                                                        for="longsighted-fail">
                                                                                        ไม่ผ่านการทดสอบ
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="test-astigmatism">
                                                                        <p>ทดสอบสายตาเอียง</p>
                                                                        <div class="row justify-content-evenly">
                                                                            <div class="col-4">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        name="astigmatism"
                                                                                        id="astigmatism-pass"
                                                                                        value="1">
                                                                                    <label class="form-check-label"
                                                                                        for="astigmatism-pass">
                                                                                        ผ่านการทดสอบ
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4">

                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        name="astigmatism"
                                                                                        id="astigmatism-fail"
                                                                                        value="0">
                                                                                    <label class="form-check-label"
                                                                                        for="astigmatism-fail">
                                                                                        ไม่ผ่านการทดสอบ
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="test-response-body">
                                                                        <p>ทดสอบการตอบสนองของร่างกาย</p>
                                                                        <div class="row justify-content-evenly">
                                                                            <div class="col-4">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="radio" name="response"
                                                                                        id="response-pass"
                                                                                        value="1">
                                                                                    <label class="form-check-label"
                                                                                        for="response-pass">
                                                                                        ผ่านการทดสอบ
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="radio" name="response"
                                                                                        id="response-fail"
                                                                                        value="0">
                                                                                    <label class="form-check-label"
                                                                                        for="response-fail">
                                                                                        ไม่ผ่านการทดสอบ
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer" style="display: contents;">
                                                                    <div class=" p-5 text-center">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">ปิด</button>
                                                                        <button type="submit" class="btn btn-primary"
                                                                            role="button">บันทึก</button>
                                                                        {{-- <a href="{{ route('option', ['id' => $id]) }}"
                                                                            class="btn btn-primary">ย้อนกลับ</a> --}}
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                                <td>
                                    <div class="row justify-content-evenly">
                                        <div class="col-4">
                                            @if (@$sumtest_theory >= 120)
                                                <i class="bi bi-check-circle-fill" style="color: #4bae4f"></i>
                                                <?php
                                                $status_total = $status_total + 1;
                                                ?>
                                            @elseif (@$sumtest_theory < 120)
                                                <i class="bi bi-x-circle-fill" style="color: #f74354;"></i>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalTheory"
                                                onclick="edittheory({{ $name->TestTheory }})">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                        </div>


                                        <div class="modal fade " id="exampleModalTheory" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered ">
                                                <div class="modal-content ">
                                                    <div class="modal-header ">
                                                        <h4 class="modal-title " id="exampleModalLabel"
                                                            style="font-weight: 700;">
                                                            ทดสอบทฤษฏี
                                                        </h4>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body ">

                                                        <form class="form-horizontal" id="form-theory"
                                                            method="POST">
                                                            @csrf
                                                            <div class="test-traffic-sign">
                                                                <p><i class="bi bi-sign-stop-lights"></i> ป้ายจราจร
                                                                </p>
                                                                {{-- @dd($test_theory->traffic_sign) --}}
                                                                {{-- max input number 50 --}}
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <label for="inputscore"
                                                                            class="form-label">คะแนนที่ได้</label>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="number" name="traffic_sign"
                                                                            id="traffic_sign" class="form-control"
                                                                            aria-describedby="scoreHelpBlock"
                                                                            min="0" max="50"
                                                                            style="width: 100%"
                                                                            value="{{ @$test_theory->traffic_sign }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="test-traffic-lines">
                                                                <p><i class="bi bi-sign-intersection-side"></i>
                                                                    เส้นจราจร</p>
                                                                {{-- max input number 50 --}}
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        <label for="inputscore"
                                                                            class="form-label">คะแนนที่ได้</label>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input form="" type="number"
                                                                            name="traffic_lines" id="traffic_lines"
                                                                            class="form-control"
                                                                            aria-describedby="scoreHelpBlock"
                                                                            min="0" max="50"
                                                                            style="width: 100%"
                                                                            value="{{ @$test_theory->traffic_lines }}">
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="test-giving-way">
                                                                    <p><i class="bi bi-sign-stop"></i> การให้ทาง
                                                                    </p>
                                                                    {{-- max input number 50 --}}
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label for="inputscore"
                                                                                class="form-label">คะแนนที่ได้</label>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <input type="number" name="giving_way"
                                                                                id="giving_way" class="form-control"
                                                                                aria-describedby="scoreHelpBlock"
                                                                                min="0" max="50"
                                                                                style="width: 100%"
                                                                                value="{{ @$test_theory->giving_way }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="modal-footer " style="display: contents;">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">ปิด</button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        role="button">บันทึก</button>

                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </td>

                                <td>
                                    <div class="row justify-content-evenly">
                                        <div class="col-4">
                                            @if (@$sumtest_operate == 1)
                                                <i class="bi bi-check-circle-fill" style="color: #4bae4f"></i>
                                                <?php
                                                $status_total = $status_total + 1;
                                                ?>
                                            @elseif (@$sumtest_operate == 0)
                                                <i class="bi bi-x-circle-fill" style="color: #f74354;"></i>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalOperate"
                                                onclick="editoperate({{ $name->TestOperate }})">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>



                                            <div class="modal fade" id="exampleModalOperate" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title fs-5" id="exampleModalLabel"
                                                                style="font-weight: 700">
                                                                ทดสอบปฏิบัติ
                                                            </h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" id="form-operate"
                                                                method="POST">
                                                                @csrf
                                                                <div class="test-operate-colour">
                                                                    <p>ภาคปฏิบัติ</p>
                                                                    <div class="row justify-content-evenly">
                                                                        <div class="col-4">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="check"
                                                                                    id="check-pass" value="1"
                                                                                    {{ @$test_operate->check == 1 ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="operate-pass">
                                                                                    ผ่านการทดสอบ
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="check"
                                                                                    id="check-fail" value="0"
                                                                                    {{ @$test_operate->check === 0 ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="operate-fail">ไม่ผ่านการทดสอบ
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">ปิด</button>
                                                                        <button type="submit" class="btn btn-primary"
                                                                            role="button">บันทึก</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </td>

                                {{-- show pass fail test drive all --}}
                                <td>
                                    @if (@$status_total >= 3)
                                        <p class="font" style="color: #4bae4f;">ผ่านการทดสอบ</p>
                                        <?php
                                        $sumpass = $sumpass + 1;
                                        ?>
                                    @elseif (@$status_total < 3)
                                        <p class="font" style="color: #f74354;">ไม่ผ่านการทดสอบ</p>
                                        <?php
                                        $sumfail = $sumfail + 1;
                                        ?>
                                    @endif
                                </td>

                                {{-- button edit datatable & delete data from database --}}
                                <td scope="col" colspan="3" class="editdelete"> <a
                                        href="{{ route('option', ['id' => $name->id]) }}" class="btn btn-primary"
                                        style="font-weight: 700">แก้ไข</a>
                                    <a class="btn btn-danger d-none" role="button"
                                        href="{{ route('deleteuser', ['id' => $name->id]) }}" id="btn-deleteuser"
                                        style="font-weight: 700">ลบ</a>
                                    <a class="btn btn-danger" onclick="deleteUser({{ @$name->id }})"
                                        role="button" style="font-weight: 700">ลบ</a>
                                </td>
                            </tr>
                        @endforeach

                        <input type="hidden" id="sumpass" value="{{ $sumpass }}">
                        <input type="hidden" id="sumfail" value="{{ $sumfail }}">

                    </tbody>
                </table>
            </div>



            {{-- button back page home --}}
            <div class=" p-5 text-center">
                <a class="btn btn-warning" role="button" href="{{ url('/') }}"
                    style="font-weight: 700">ย้อนกลับ</a>
            </div>



        </div>
    </section>

</body>

</html>


<script>
    {{-- button delete user test all alert -> delete database --}}
    $(document).ready(function() {
        $('#tabledrive').DataTable();

    });

    function deleteUser(id) {
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
                    window.location.replace("/deleteuser/" + id);

                }
            })
        }
    }

    {{-- ดึงข้อมูลเพื่อโชว์ user pass fail / day  --}}
    sumpass = $('#sumpass').val()
    sumfail = $('#sumfail').val()

    $('#show-sum-pass').text(sumpass)
    $('#show-sum-fail').text(sumfail)

    function editbody(test) {
        console.log(test)
        if (test.eyecolor == 1) {
            $('#eyecolor-pass').click()
        } else {
            $('#eyecolor-fail').click()
        }

        if (test.longsighted == 1) {
            $('#longsighted-pass').click()
        } else {
            $('#longsighted-fail').click()
        }

        if (test.astigmatism == 1) {
            $('#astigmatism-pass').click()
        } else {
            $('#astigmatism-fail').click()
        }

        if (test.response == 1) {
            $('#response-pass').click()
        } else {
            $('#response-fail').click()
        }

        // eyecolor-fail
    }

    function edittheory(test) {
        $('#traffic_sign').val(test.traffic_sign)
        $('#traffic_lines').val(test.traffic_lines)
        $('#giving_way').val(test.giving_way)
    }

    function editoperate(test) {
        // console.log(test.check)

        if (test.check == 1) {
            $('#check-pass').click()
        } else {
            $('#check-fail').click()
        }

    }

    {{-- function submitEditBody() {
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

                $('#real-button-body').click()
            }
        })
    } --}}

    $('#form-body').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        console.log(formData);
        // openLoading();
        Swal.fire({
            title: 'คุณต้องการบันทึก?',
            text: "คุณต้องการจะบันทึกการทดสอบ!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',

        }).then((result) => {
            if (result.isConfirmed) { //กดยืนยัน



                $.ajax({
                    type: "POST",
                    url: "{{ route('update-edit-body') }}",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(res) {

                        console.log(res);
                        // closeLoading();
                        // $('#resetPassModal').close();
                        // $('#resetPassModal').modal('hide');
                        // console.log(res);
                        // Swal.fire(res.title, res.msg, res.status);
                    }
                });
            }
        })
        {{-- --}}
    });
</script>
