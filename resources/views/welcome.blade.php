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

    <form method="POST" class="form-horizontal" action="">
        @csrf

        <section class="vh-100">
            <div class="container py-5 ">


                <div class="row d-flex justify-content-center align-items-center h-100">


                    <table class="table" id="tabledrive">
                        <thead>

                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">ชื่อ-นามสกุล</th>
                                <th scope="col">ทดสอบร่างกาย</th>
                                <th scope="col">ทดสอบทฤษฏี</th>
                                <th scope="col">ทดสอบปฎิบัติ</th>
                                <th scope="col">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($names as $name)
                                <tr>
                                    <td scope="row">{{ $name->id }}</td>
                                    <td>{{ $name->fname }} {{ $name->lname }}</td>
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
                                            <p style="color: #4bae4f">ผ่านการทดสอบ</p>
                                            <?php
                                            $status_total = $status_total + 1;
                                            ?>
                                        @elseif (@$sumtest_body < 3)
                                            <p style="color: #f74354;">ไม่ผ่านการทดสอบ</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if (@$sumtest_theory >= 120)
                                            <p style="color: #4bae4f">ผ่านการทดสอบ</p>
                                            <?php
                                            $status_total = $status_total + 1;
                                            ?>
                                        @elseif (@$sumtest_theory < 120)
                                            <p style="color: #f74354;">ไม่ผ่านการทดสอบ</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if (@$sumtest_operate == 1)
                                            <p style="color: #4bae4f">ผ่านการทดสอบ</p>
                                            <?php
                                            $status_total = $status_total + 1;
                                            ?>
                                        @elseif (@$sumtest_operate == 0)
                                            <p style="color: #f74354;">ไม่ผ่านการทดสอบ</p>
                                        @endif
                                    </td>
                                    <td>


                                        @if (@$status_total >= 3)
                                            <button type="button" class="btn btn-success"
                                                style="font-weight: 700">ผ่านการทดสอบ</button>
                                        @elseif (@$status_total < 3)
                                            <button type="button" class="btn btn-danger"
                                                style="font-weight: 700">ไม่ผ่านการทดสอบ</button>
                                        @endif


                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <a class="btn btn-warning" role="button" href="{{ url('/') }}">ย้อนกลับ</a>
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
