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

<h2 class="heading"> DATA PENGUNJUNG</h2>

<table>
  <tr>
    <th>ID</th>
    <th>USER ID</th>
    <th>NAMA PENGUNJUNG</th>
    <th>NIK</th>
    <th>TANGGAL LAHIR</th>
    <th>JENIS KELAMIN</th>
    <th>ASAL</th>
    <th>KODE KAMAR</th>
  </tr>
  @php
      $no = 1;
  @endphp
  @foreach ($pengunjung as $p)
  <tr>
      <td>{{ $p->id }}</td>
      <td>{{ $p->user_id }}</td>
      <td>{{ $p->name.' '. $p->last_name }}</td>
      <td>{{ $p->nik }}</td>
      <td>{{ $p->tgl_lahir }}</td>
      <td>{{ $p->jk }}</td>
      <td>{{ $p->asal }}</td>
      <td>{{ $p->kode_kamar }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>

