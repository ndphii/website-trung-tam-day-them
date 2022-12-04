<a href="?mod=hoadon&id=1" type="button" class="btn btn-primary">Hóa Đơn Đã duyệt</a>
<a href="?mod=hoadon&id=0" type="button" class="btn btn-primary">Hóa Đơn Chưa duyệt</a>
<?php if (isset($_COOKIE['msg'])) { ?>
  <div class="alert alert-success">
    <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
  </div>
<?php } ?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">Tên Khách Hàng</th>
      <th scope="col">Ngày đặt hàng</th>
      <th scope="col">Tổng tiền</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">SĐT</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Hành Động</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $row) { ?>
      <tr>
        <td><?= $row['NguoiNhan'] ?></td>
        <td><?= $row['NgayLap'] ?></td>
        <td><?= number_format($row['TongTien']) ?>VNĐ</td>
        <td><?= $row['DiaChi'] ?></td>
        <td><?= $row['SDT'] ?></td>
        <td><?php if($row['TrangThai']==0){
            echo 'Chưa xét duyệt';
        }else{
            echo 'Đã xét duyệt';
        }
        ?></td>
        <td class="text-center butAction">
          <a href="?mod=hoadon&act=chitiet&id=<?= $row['MaHD'] ?>" class="btn btn-success" >Xem Chi Tiết</a>
          <a href="?mod=hoadon&act=delete&id=<?= $row['MaHD'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger"> Xóa Hóa Đơn</a>
        </td>
      </tr>
    <?php } ?>
</table>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>