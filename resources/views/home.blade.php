<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        // < link href = "css/styles.css" rel = "stylesheet" >
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Kanit', sans-serif;

        }

        h3.mb-5 {
            font-size: 20px;
            font-weight: 700;
        }

        input.form-control {
            font-weight: 700;
        }

        button.btn.btn-primary {
            font-weight: 700;
        }
    </style>

<body>
    <form method="POST" class="form-horizontal" action="{{ route('savename') }}">
        @csrf


        <section class="vh-100" style="background-color: #508bfc;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                        fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                                    </svg>
                                </div>

                                <h3 class="mb-5">ระบบบันทึกผลการทดสอบขอใบอนุญาตขับขี่</h3>

                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control" name="fname" title="name"
                                        placeholder="ชื่อ" required>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control" name="lname" title="name"
                                        placeholder="นามสกุล" required>

                                    {{-- required จำเป้นต้องกรอก --}}
                                </div>
                                <button type="submit" class="btn btn-primary" role="button">บันทึก</button>
                                <a class="btn btn-danger" role="button" href="{{ url('/welcome') }}"
                                    style="font-weight: 700">ข้อมูลรายงาน</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </form>
</body>

</html>
