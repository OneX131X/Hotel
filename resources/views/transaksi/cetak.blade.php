<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.heading{
    text-align: center;
    text-decoration: underline;
}
</style>
</head>
<body>

<h2 class="heading"> DATA TRANSAKSI</h2>

<table>
  <tr>
    <th>ID</th>
    <th>KODE TRANSAKSI</th>
    <th>PENGUNJUNG ID</th>
    <th>KODE KAMAR</th>
    <th>TANGGAL CHECK IN</th>
    <th>TANGGAL CHECK OUT</th>
    <th>STATUS</th>
    <th>KETERANGAN</th>
  </tr>
  @php
      $no = 1;
  @endphp
  @foreach ($transaksi as $p)
  <tr>
      <td>{{ $p->id }}</td>
      <td>{{ $p->kode_transaksi }}</td>
      <td>{{ $p->pengunjung_id }}</td>
      <td>{{ $p->kode_kamar }}</td>
      <td>{{ $p->tgl_checkin }}</td>
      <td>{{ $p->tgl_checkout }}</td>
      <td>{{ $p->status }}</td>
      <td>{{ $p->keterangan }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>

