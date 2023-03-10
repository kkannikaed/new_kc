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
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                class="bi bi-card-checklist" viewBox="0 0 16 16">
                                <path
                                    d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                <path
                                    d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                            </svg>
                        </div>


                        <h3 class="mb-5 text-center">ทดสอบทฤษฎี</h3>

                        <div class="card shadow-2-strong p-5" style="border-radius: 1rem;">
                            <div class="test-traffic-sign">
                                <p><i class="bi bi-sign-stop-lights"></i> ป้ายจราจร
                                </p>

                                <label for="inputscore" class="form-label">คะแนนที่ได้</label>
                                <input type="number" name="traffic_sign" id="inputscore" class="form-control"
                                    aria-describedby="scoreHelpBlock" min="1" max="50">
                            </div>
                            <br>

                            <div class="test-traffic-lines">
                                <p><i class="bi bi-sign-intersection-side"></i> เส้นจราจร</p>

                                <label for="inputscore" class="form-label">คะแนนที่ได้</label>
                                <input type="number" name="traffic_lines" id="inputscore" class="form-control"
                                    aria-describedby="scoreHelpBlock" min="1" max="50">
                            </div>

                            <br>
                            <div class="test-giving-way">
                                <p><i class="bi bi-sign-stop"></i> การให้ทาง</p>

                                <label for="inputscore" class="form-label">คะแนนที่ได้</label>
                                <input type="number" name="giving_way" id="inputscore" class="form-control"
                                    aria-describedby="scoreHelpBlock" min="1" max="50">
                            </div>
                            <br>

                            {{-- <div class="test-sum">
                                <label for="inputscore" class="form-label">ผลคะแนนรวม</label>
                                <input type="number" name="summ" id="inputscore" class="form-control"
                                    aria-describedby="scoreHelpBlock" style="border-color: #508bfc;">
                            </div> --}}



                            <input type="hidden" name="user_id" value="{{ $id }}">
                            <br>


                            <div class=" p-5 text-center">
                                <button type="submit" class="btn btn-primary" role="button">บันทึก</button>
                                <a class="btn btn-primary" role="button" href="{{ url('/') }}">ย้อนกลับ</a>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </section>













    </form>


</body>

</html>
