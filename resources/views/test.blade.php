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


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100&display=swap" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<style>
    * {
        font-family: 'Kanit', sans-serif;
        font-weight: 700;
    }

    h3 {
        font-size: 18px;
        font-weight: 700;
    }
</style>


<body>
    <form method="POST" class="form-horizontal" action="">
        @csrf
        <div class="container p-5">

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                ทำแบบทดสอบ
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-weight: 700;">
                                ทดสอบใบขออนุญาตขับขี่</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="testbody">
                                <h3>ทดสอบร่างกาย</h3>
                                <div>
                                    <p>
                                        ทดสอบตาบอดสี

                                    <div class="row align-items-start">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="eyecolor"
                                                    id="eyecolor-pass" value="1" required>
                                                <label class="form-check-label" for="eyecolor-pass">
                                                    ผ่านการทดสอบ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="eyecolor"
                                                    id="eyecolor-fail" value="0" required>
                                                <label class="form-check-label" for="eyecolor-fail">
                                                    ไม่ผ่านการทดสอบ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="eyecolor"
                                                    id="eyecolor-wait" value="" required>
                                                <label class="form-check-label" for="eyecolor-wait">
                                                    รอการทดสอบ
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    </p>

                                    <p>
                                        ทดสอบสายตายาว
                                    <div class="row align-items-start">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="longsighted"
                                                    id="longsighted-pass" value="1">
                                                <label class="form-check-label" for="longsighted-pass">
                                                    ผ่านการทดสอบ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="longsighted"
                                                    id="longsighted-fail" value="0">
                                                <label class="form-check-label" for="longsighted-fail">
                                                    ไม่ผ่านการทดสอบ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="longsighted"
                                                    id="longsighted-wait" value="">
                                                <label class="form-check-label" for="longsighted-wait">
                                                    รอการทดสอบ
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    </p>
                                    <p>
                                        ทดสอบสายตาเอียง
                                    <div class="row align-items-start">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="astigmatism"
                                                    id="astigmatism-pass" value="1">
                                                <label class="form-check-label" for="astigmatism-pass">
                                                    ผ่านการทดสอบ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="astigmatism"
                                                    id="astigmatism-fail" value="0">
                                                <label class="form-check-label" for="astigmatism-fail">
                                                    ไม่ผ่านการทดสอบ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="astigmatism"
                                                    id="astigmatism-wait" value="">
                                                <label class="form-check-label" for="astigmatism-wait">
                                                    รอการทดสอบ
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                    <p>
                                        ทดสอบการตอบสนองของร่างกาย
                                    <div class="row align-items-start">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="response"
                                                    id="response-pass" value="1">
                                                <label class="form-check-label" for="response-pass">
                                                    ผ่านการทดสอบ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="response"
                                                    id="response-fail" value="0">
                                                <label class="form-check-label" for="response-fail">
                                                    ไม่ผ่านการทดสอบ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="response"
                                                    id="response-wait" value="0">
                                                <label class="form-check-label" for="response-wait">
                                                    รอการทดสอบ
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    </p>

                                    <h3>ทดสอบทฤษฎี</h3>
                                    <div class="row align-items-start">
                                        <div class="col">
                                            <div class="test-traffic-sign">
                                                <p><i class="bi bi-sign-stop-lights"></i> ป้ายจราจร
                                                </p>

                                                <label for="inputscore" class="form-label">คะแนนที่ได้</label>
                                                <input type="number" name="traffic_sign" id="inputscore"
                                                    class="form-control" aria-describedby="scoreHelpBlock"
                                                    min="1" max="50">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="test-traffic-lines">
                                                <p><i class="bi bi-sign-intersection-side"></i> เส้นจราจร</p>

                                                <label for="inputscore" class="form-label">คะแนนที่ได้</label>
                                                <input type="number" name="traffic_lines" id="inputscore"
                                                    class="form-control" aria-describedby="scoreHelpBlock"
                                                    min="1" max="50">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="test-giving-way">
                                                <p><i class="bi bi-sign-stop"></i> การให้ทาง</p>

                                                <label for="inputscore" class="form-label">คะแนนที่ได้</label>
                                                <input type="number" name="giving_way" id="inputscore"
                                                    class="form-control" aria-describedby="scoreHelpBlock"
                                                    min="1" max="50">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h3>ทดสอบภาคปฏิบัติ</h3>
                                    <p>
                                        ภาคปฏิบัติ
                                    <div class="row align-items-start">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="check"
                                                    id="check-pass" value="1">
                                                <label class="form-check-label" for="operate-pass">
                                                    ผ่านการทดสอบ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="check"
                                                    id="check-fail" value="0">
                                                <label class="form-check-label" for="operate-fail">
                                                    ไม่ผ่านการทดสอบ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="check"
                                                    id="check-fail" value="0">
                                                <label class="form-check-label" for="operate-fail">
                                                    รอการทดสอบ
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>

                        </div>

                        {{-- <input type="hidden" name="user_id" value="{{ $id }}"> --}}
                        <div class="modal-footer">

                            {{-- <a href="{{ route('') }}" class="btn btn-primary">ย้อนกลับ</a> --}}
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" role="button">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
