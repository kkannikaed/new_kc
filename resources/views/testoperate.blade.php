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

    <form method="POST" class="form-horizontal" action="{{ route('save-test-operate') }}">
        @csrf

        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center ">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                class="bi bi-car-front-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                            </svg>
                        </div>

                        <h3 class="mb-5 text-center">ทดสอบภาคปฏิบัติ</h3>

                        <div class="card shadow-2-strong p-5" style="border-radius: 1rem;">
                            <div class="test-eye-colour">
                                <p
                                    style="color: #508bfc;
                                font-size: 17px;
                                font-weight: 700;">
                                    ภาคปฏิบัติ</p>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="check" id="check-pass"
                                        value="1" required>
                                    <label class="form-check-label" for="eyecolor-pass">
                                        ผ่านการทดสอบ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="check" id="check-fail"
                                        value="0" required>
                                    <label class="form-check-label" for="eyecolor-fail">
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
            </div>
        </section>




    </form>

</body>

</html>
