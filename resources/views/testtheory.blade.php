<!DOCTYPE html>


<html>


<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
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

    h3.mb-5.text-center {
        font-weight: 700;
    }

    button.btn.btn-primary {
        font-weight: 700;
        color: white;
        background: black;
        border-color: black;
    }

    a.btn.btn-primary {
        font-weight: 700;
        color: white;
        background: black;
        border-color: black;
    }

    label.form-label {
        font-size: 16px;
    }

    p {
        color: #508bfc;
        font-size: 17px;
        font-weight: 700;
    }
</style>

<body>

    <form method="POST" class="form-horizontal" action="{{ route('save-test-theory') }}">
        @csrf

        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center ">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                        <div class="text-center">
                            <i class="bi bi-card-checklist" style="font-size: 40px;"></i>
                        </div>
                        <h3 class="mb-5 text-center">ทดสอบทฤษฎี</h3>

                        {{-- form test step 2 input max 50 --}}
                        <div class="card shadow-2-strong p-5" style="border-radius: 1rem;">
                            {{-- test theory 1 --}}
                            <div class="test-traffic-sign">
                                <p><i class="bi bi-sign-stop-lights"></i> ป้ายจราจร
                                </p>
                                {{-- @dd($test_theory->traffic_sign) --}}
                                {{-- max input number 50 --}}
                                <label for="inputscore" class="form-label">คะแนนที่ได้</label>
                                <input type="number" name="traffic_sign" id="inputscore" class="form-control"
                                    aria-describedby="scoreHelpBlock" min="0" max="50"
                                    value="{{ @$test_theory->traffic_sign }}">
                            </div>
                            <br>

                            {{-- test theory 2 --}}
                            <div class="test-traffic-lines">
                                <p><i class="bi bi-sign-intersection-side"></i> เส้นจราจร</p>
                                {{-- max input number 50 --}}
                                <label for="inputscore" class="form-label">คะแนนที่ได้</label>
                                <input type="number" name="traffic_lines" id="inputscore" class="form-control"
                                    aria-describedby="scoreHelpBlock" min="0" max="50"
                                    value="{{ @$test_theory->traffic_lines }}">
                            </div>
                            <br>

                            {{-- test theory 3 --}}
                            <div class="test-giving-way">
                                <p><i class="bi bi-sign-stop"></i> การให้ทาง</p>
                                {{-- max input number 50 --}}
                                <label for="inputscore" class="form-label">คะแนนที่ได้</label>
                                <input type="number" name="giving_way" id="inputscore" class="form-control"
                                    aria-describedby="scoreHelpBlock" min="0" max="50"
                                    value="{{ @$test_theory->giving_way }}">
                            </div>
                            <br>
                            <input type="hidden" name="user_id" value="{{ $id }}">
                            <br>

                            {{-- button save theory database & back page -> list_option --}}
                            <div class=" p-5 text-center">
                                <button type="submit" class="btn btn-primary" role="button">บันทึก</button>
                                <a href="{{ route('option', ['id' => $id]) }}" class="btn btn-primary">ย้อนกลับ</a>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </section>













    </form>


</body>

</html>
