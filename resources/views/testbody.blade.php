<!DOCTYPE html>


<html>


<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>


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

    p {
        color: #508bfc;
        font-size: 18px;
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
</style>

<body>
    <form method="POST" class="form-horizontal" action="{{ route('save-test-body') }}">
        @csrf

        <section class="vh-100">
            <div class="container py-5 ">
                <div class="row d-flex justify-content-center align-items-center ">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">



                        <div class="text-center">
                            <i class="bi bi-person-fill" style="font-size: 40px;"></i>
                        </div>

                        <h3 class="mb-5 text-center">ทดสอบร่างกาย</h3>

                        <div class="card shadow-2-strong p-5" style="border-radius: 1rem;">
                            <div class="test-eye-colour">
                                <p>ทดสอบตาบอดสี</p>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="eyecolor" id="eyecolor-pass"
                                        value="1">
                                    <label class="form-check-label" for="eyecolor-pass">
                                        ผ่านการทดสอบ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="eyecolor" id="eyecolor-fail"
                                        value="0">
                                    <label class="form-check-label" for="eyecolor-fail">
                                        ไม่ผ่านการทดสอบ
                                    </label>
                                </div>
                            </div>
                            <br>

                            <div class="test-longsighted">
                                <p>ทดสอบตาสายตายาว</p>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="longsighted"
                                        id="longsighted-pass" value="1">
                                    <label class="form-check-label" for="longsighted-pass">
                                        ผ่านการทดสอบ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="longsighted"
                                        id="longsighted-fail" value="0">
                                    <label class="form-check-label" for="longsighted-fail">
                                        ไม่ผ่านการทดสอบ
                                    </label>
                                </div>

                            </div>
                            <br>

                            <div class="test-astigmatism">
                                <p>ทดสอบสายตาเอียง</p>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="astigmatism"
                                        id="astigmatism-pass" value="1">
                                    <label class="form-check-label" for="astigmatism-pass">
                                        ผ่านการทดสอบ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="astigmatism"
                                        id="astigmatism-fail" value="0">
                                    <label class="form-check-label" for="astigmatism-fail">
                                        ไม่ผ่านการทดสอบ
                                    </label>
                                </div>


                            </div>
                            <br>

                            <div class="test-response-body">
                                <p>ทดสอบการตอบสนองของร่างกาย</p>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="response" id="response-pass"
                                        value="1">
                                    <label class="form-check-label" for="response-pass">
                                        ผ่านการทดสอบ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="response" id="response-fail"
                                        value="0">
                                    <label class="form-check-label" for="response-fail">
                                        ไม่ผ่านการทดสอบ
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ $id }}">

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
