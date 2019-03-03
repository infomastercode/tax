<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>views/assets/jquery.dynatable.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>views/assets/custom.css">
    <title>document</title>
  </head>
  <body>
    <div class="container">
      <br><br>
      <div class="float-right">
        <a href="<?= $add; ?>" class="btn btn-primary" type="button">เพิ่มข้อมูล</a>
      </div>
      <br><br><hr>

      <div class="table-responsive">
        <table id="tbl_list" class="table table-bordered table-hover table-condensed">
          <thead>
            <tr>
              <th data-dynatable-column="row" data-dynatable-no-sort="true" style="text-align:center;">#</th>
              <th data-dynatable-column="name" style="text-align:center;">ชื่อ</th>
              <th data-dynatable-column="card_tax" style="text-align:center;">เลขประจำตัว</th>
              <th data-dynatable-column="number" style="text-align:center;">ลำดับที่</th>
              <th data-dynatable-column="date_add" style="text-align:right;">วันที่สร้าง</th>
              <th data-dynatable-column="option" data-dynatable-no-sort="true" style="text-align:right;">แก้ไข</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>

      <input type="hidden" value="<?= BASE_URL; ?>" id="base_url">
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?= BASE_URL; ?>views/assets/jquery.dynatable.js"></script>
    <script src="<?= BASE_URL; ?>views/assets/custom.js"></script>
  </body>
</html>