<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>No. Telpon</th>
            <th>Kategori</th>
            <th>Detail</th>
            <th>Status</th>
            <th>Dibuat pada</th>
            <th>Diupdate pada</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporan as $data)
            <tr>
                <td>{{ $data->id_perbaikan }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->handphone }}</td>
                <td>{{ $data->category->name }}</td>
                <td>{{ $data->detail }}</td>
                <td>{{ $data->status->status }}</td>
                <td>{{ $data->created_at->diffForHumans() }}</td>
                <td>{{ $data->updated_at->diffForHumans() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
