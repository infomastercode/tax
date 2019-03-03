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
        <br><br>
        <div class="float-right">
          <button class="btn btn-primary" type="submit">save</button>
          <a href="<?= $back; ?>" class="btn btn-light" type="button">back</a>
          <a href="<?= $pdf; ?>" target="_blank" class="btn btn-success" type="button">pdf</a>
          <a href="<?= $send_mail; ?>" target="_blank" class="btn btn-warning" type="button">sent mail</a>
        </div>
        <br><br><br>
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
            <textarea rows="5" cols="150" name="address"><?= $b['address']; ?></textarea>
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
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ประเภทเงินที่ได้</th>
              <th scope="col"></th>
              <th scope="col">วันเดือนปี</th>
              <th scope="col">จำนวนเงินที่จ่าย</th>
              <th scope="col">ภาษีที่หัก</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1 เงินเดือน ค่าจ้าง</th>
              <td>
                <input type="hidden" name="detail[0][code_tax]" value="S">
                <input type="hidden" name="detail[0][id_tax_detail]" value="<?= $b['detail']['S']['id_tax_detail']; ?>" >
              </td>
              <td><input type="date" name="detail[0][pay_date]" value="<?= $b['detail']['S']['pay_date']; ?>" class="form-control"></td>
              <td><input type="number" name="detail[0][pay_total]" value="<?= $b['detail']['S']['pay_total']; ?>" class="form-control"></td>
              <td><input type="number" name="detail[0][pay_tax]" value="<?= $b['detail']['S']['pay_tax']; ?>" class="form-control"></td>
            </tr>
            <tr>
              <th scope="row">2 ค่าธรรมเนียม</th>
              <td>
                <input type="hidden" name="detail[1][code_tax]" value="F">
                <input type="hidden" name="detail[1][id_tax_detail]" value="<?= $b['detail']['F']['id_tax_detail']; ?>" >
              </td>
              <td><input type="date" name="detail[1][pay_date]" value="<?= $b['detail']['F']['pay_date']; ?>" class="form-control"></td>
              <td><input type="number" name="detail[1][pay_total]" value="<?= $b['detail']['F']['pay_total']; ?>" class="form-control"></td>
              <td><input type="number" name="detail[1][pay_tax]" value="<?= $b['detail']['F']['pay_tax']; ?>" class="form-control"></td>
            </tr>
            <tr>
              <th scope="row">3 ค่าลิขสิทธ์</th>
              <td>
                <input type="hidden" name="detail[2][code_tax]" value="C">
                <input type="hidden" name="detail[2][id_tax_detail]" value="<?= $b['detail']['C']['id_tax_detail']; ?>" >
              </td>
              <td><input type="date" name="detail[2][pay_date]" value="<?= $b['detail']['C']['pay_date']; ?>" class="form-control"></td>
              <td><input type="number" name="detail[2][pay_total]" value="<?= $b['detail']['C']['pay_total']; ?>" class="form-control"></td>
              <td><input type="number" name="detail[2][pay_tax]" value="<?= $b['detail']['C']['pay_tax']; ?>" class="form-control"></td>
            </tr>
            <tr>
              <th scope="row">4 การจ่ายเงินได้</th>
              <td>
                <input type="hidden" name="detail[3][code_tax]" value="I">
                <input type="hidden" name="detail[3][id_tax_detail]" value="<?= $b['detail']['I']['id_tax_detail']; ?>" >
              </td>
              <td><input type="date" name="detail[3][pay_date]" value="<?= $b['detail']['I']['pay_date']; ?>" class="form-control"></td>
              <td><input type="number" name="detail[3][pay_total]" value="<?= $b['detail']['I']['pay_total']; ?>" class="form-control"></td>
              <td><input type="number" name="detail[3][pay_tax]" value="<?= $b['detail']['I']['pay_tax']; ?>" class="form-control"></td>
            </tr>
            <tr>
              <th scope="row">5 อื่นๆ</th>
              <td>
                <input type="hidden" name="detail[4][code_tax]" value="O">
                <input type="hidden" name="detail[4][id_tax_detail]" value="<?= $b['detail']['O']['id_tax_detail']; ?>" >
              </td>
              <td><input type="date" name="detail[4][pay_date]" value="<?= $b['detail']['O']['pay_date']; ?>" class="form-control"></td>
              <td><input type="number" name="detail[4][pay_total]" value="<?= $b['detail']['O']['pay_total']; ?>" class="form-control"></td>
              <td><input type="number" name="detail[4][pay_tax]" value="<?= $b['detail']['O']['pay_tax']; ?>" class="form-control"></td>
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
              <input type="checkbox" name="pay_type" value="1" <?= $b['pay_type'] == 1 ? 'checked' : ''; ?> > (1) หัก ณ ที่จ่าย
              <input type="checkbox" name="pay_type" value="2" <?= $b['pay_type'] == 2 ? 'checked' : ''; ?> > (2) ออกให้ตลอดไป
              <input type="checkbox" name="pay_type" value="3" <?= $b['pay_type'] == 3 ? 'checked' : ''; ?> > (3) ออกให้ครั้งเดียว
              <input type="checkbox" name="pay_type" value="4" <?= $b['pay_type'] == 4 ? 'checked' : ''; ?> > (4) อื่น ๆ
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

        <input type="hidden" name="id_tax" value="<?= $b['id_tax']; ?>">

        <br><br><br>
      </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>