<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>document</title>
  </head>
  <body>
    <div class="container">
      <form action="<?= $action; ?>" method="post">
        <div class="row">
          <div class="col">
            <label class="control-label">ชื่อ</label>
            <input type="text" name="name" value="<?= $b['name']; ?>" class="form-control">
          </div>
          <div class="col">
            <label class="control-label">เลขประจำตัวผู้เสียภาษีอากร</label>
            <input type="text" name="card_tax" value="<?= $b['card_tax']; ?>" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label class="control-label">ที่อยู่</label>
            <input type="text" name="address" value="<?= $b['address']; ?>" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label class="control-label">ลำดับที่</label>
            <input type="text" name="number" value="<?= $b['number']; ?>" class="form-control">
          </div>
          <div class="col-md-8">
            <label class="control-label"></label>
            <div class="row">
              <div class="col-md-3">
                <input type="checkbox" name="tax_type" value="1" <?= $b['tax_type'] == 1 ? 'checked' : ''; ?> >
                <label class="control-label">(1) ภ.ง.ด.1ก</label>
              </div>
              <div class="col-md-3">
                <input type="checkbox" name="tax_type" value="2" <?= $b['tax_type'] == 2 ? 'checked' : ''; ?> >
                <label class="control-label">(2) ภ.ง.ด.1ก</label>
              </div>
              <div class="col-md-3">
                <input type="checkbox" name="tax_type" value="3" <?= $b['tax_type'] == 3 ? 'checked' : ''; ?> >
                <label class="control-label">(3) ภ.ง.ด.1ก</label>
              </div>
              <div class="col-md-3">
                <input type="checkbox" name="tax_type" value="4" <?= $b['tax_type'] == 4 ? 'checked' : ''; ?> >
                <label class="control-label">(4) ภ.ง.ด.1ก</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <input type="checkbox" name="tax_type" value="5" <?= $b['tax_type'] == 5 ? 'checked' : ''; ?> >
                <label class="control-label">(5) ภ.ง.ด.1ก</label>
              </div>
              <div class="col-md-3">
                <input type="checkbox" name="tax_type" value="6" <?= $b['tax_type'] == 6 ? 'checked' : ''; ?> >
                <label class="control-label">(6) ภ.ง.ด.1ก</label>
              </div>
              <div class="col-md-3">
                <input type="checkbox" name="tax_type" value="7" <?= $b['tax_type'] == 7 ? 'checked' : ''; ?> >
                <label class="control-label">(7) ภ.ง.ด.1ก</label>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ประเภทเงินที่ได้</th>
              <th scope="col">วันเดือนปี</th>
              <th scope="col">จำนวนเงินที่จ่าย</th>
              <th scope="col">ภาษีที่หัก</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1 เงินเดือน ค่าจ้าง</th>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
            </tr>
            <tr>
              <th scope="row">2 ค่าธรรมเนียม</th>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
            </tr>
            <tr>
              <th scope="row">3 ค่าลิขสิทธ์</th>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
            </tr>
            <tr>
              <th scope="row">4 การจ่ายเงินได้</th>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
            </tr>
            <tr>
              <th scope="row">3 อื่นๆ</th>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
            </tr>
          </tbody>
        </table>
        <hr>
        <div class="row">
          <div class="col">
            <label class="control-label">รวมเงินหักภาษีที่หัก (ตัวอักษร)</label>
            <input type="text" name="total_charactor" value="<?= $b['total_charactor']; ?>" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label class="control-label">ผู้จ่ายเงิน</label>
            <div>
              <input type="checkbox" name="pay_type" value="1"> (1) หัก ณ ที่จ่าย
              <input type="checkbox" name="pay_type" value="2"> (2) ออกให้ตลอดไป
              <input type="checkbox" name="pay_type" value="3"> (3) ออกให้ครั้งเดียว
              <input type="checkbox" name="pay_type" value="4"> (4) อื่น ๆ
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col">
            <label class="control-label">ลงชื่อ (ขอรับรองว่าเป็นความจริงทุกประการ)</label>
            <input type="text" name="signal_name" value="<?= $b['signal_name']; ?>" class="form-control">
          </div>
        </div>
        
        <input type="text" name="id_tax" value="<?= $b['id_tax']; ?>">

        <hr>
        <button class="btn btn-primary" type="submit">save</button>
        <a href="<?= $back; ?>" class="btn btn-light" type="button">back</a>
        <a href="<?= $pdf; ?>" target="_blank" class="btn btn-success" type="button">pdf</a>
        <button class="btn btn-warning" type="submit">sent mail</button>
        <hr>
      </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>