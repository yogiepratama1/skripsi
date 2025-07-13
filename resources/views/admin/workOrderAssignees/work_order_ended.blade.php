<p>Yth. Koordinator,</p>
<p>Work Order berikut telah selesai dan disetujui Koordinator:</p>
<table>
    <tr><td><b>No. Work Order</b></td><td>: {{ $workOrder->code ?? '-' }}</td></tr>
    <tr><td><b>Nama Pelanggan</b></td><td>: {{ $workOrder->customer->name ?? '-' }}</td></tr>
    <tr><td><b>Lokasi</b></td><td>: {{ $workOrder->location ?? '-' }}</td></tr>
    <tr><td><b>Tanggal Instalasi</b></td><td>: {{ $workOrder->installation_date ? \Carbon\Carbon::parse($workOrder->installation_date)->format('Y-m-d') : '-' }}</td></tr>
</table>
<p>Terima kasih.<br>PT Graha Artha</p>
