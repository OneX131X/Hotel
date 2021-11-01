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

<h2 class="heading"> DATA KAMAR</h2>

<table>
  <tr>
    <th>KODE KAMAR</th>
    <th>NOMOR KAMAR</th>
    <th>LANTAI</th>
    <th>JENIS KAMAR</th>
  </tr>

  @forelse ($kamar as $p)
  <tr>
      <td>{{ $p->kode }}</td>
      <td>{{ $p->no_kamar }}</td>
      <td>{{ $p->lantai }}</td>
      <td>{{ $p->jenis_kamar }}</td>
  </tr>
  @empty
  <tr>
      <td colspan="4">Tidak ada data yang dapat dicetak.</td>
  </tr>
  @endforelse
</table>

</body>
</html>

