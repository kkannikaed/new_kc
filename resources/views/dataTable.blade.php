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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>



<style>
    * {
        font-family: 'Kanit', sans-serif;
        font-weight: 700;
    }
</style>

<body>
    <form method="POST" class="form-horizontal" action="">
        @csrf

        <section class="vh-100">
            <div class="container py-5 ">


                <div class="row d-flex justify-content-center align-items-center h-100">


                    <table class="table" id="tabledrive">
                        <thead>

                            <tr>
                                <th scope="col">ลำดับ</th>
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
                            @foreach ($names as $name)
                                <tr>
                                    <td scope="row">{{ $name->id }}</td>
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


                                    <td>
                                        @if (@$sumtest_body >= 3)
                                            <i class="bi bi-check-circle-fill" style="color: #4bae4f"></i>
                                            <?php
                                            $status_total = $status_total + 1;
                                            ?>
                                        @elseif (@$sumtest_body < 3)
                                            <i class="bi bi-x-circle-fill" style="color: #f74354;"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if (@$sumtest_theory >= 120)
                                            <i class="bi bi-check-circle-fill" style="color: #4bae4f"></i>
                                            <?php
                                            $status_total = $status_total + 1;
                                            ?>
                                        @elseif (@$sumtest_theory < 120)
                                            <i class="bi bi-x-circle-fill" style="color: #f74354;"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if (@$sumtest_operate == 1)
                                            <i class="bi bi-check-circle-fill" style="color: #4bae4f"></i>
                                            <?php
                                            $status_total = $status_total + 1;
                                            ?>
                                        @elseif (@$sumtest_operate == 0)
                                            <i class="bi bi-x-circle-fill" style="color: #f74354;"></i>
                                        @endif
                                    </td>
                                    <td>


                                        @if (@$status_total >= 3)
                                            <p class="font" style="color: #4bae4f;">ผ่านการทดสอบ</p>
                                        @elseif (@$status_total < 3)
                                            <p class="font" style="color: #f74354;">ไม่ผ่านการทดสอบ</p>
                                        @endif


                                    </td>

                                    <td scope="col" colspan="3" class="editdelete"> <a
                                            href="{{ route('body', ['id' => $name->id]) }}"
                                            class="btn btn-primary">แก้ไข</a>
                                        <a class="btn btn-danger d-none" role="button"
                                            href="{{ route('deletebody', ['id' => $name->id]) }}"
                                            id="btn-deletebody">ลบ</a>
                                        <a class="btn btn-danger" onclick="deleteBody({{ @$test_body->id }})"
                                            role="button">ลบ</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <div class=" p-5 text-center">
                    <a class="btn btn-warning" role="button" href="{{ url('/') }}">ย้อนกลับ</a>
                </div>
            </div>

        </section>


    </form>


</body>

</html>
<script>
    $(document).ready(function() {
        $('#tabledrive').DataTable();
    });
</script>
