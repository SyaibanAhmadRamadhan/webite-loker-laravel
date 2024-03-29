@extends('layouts.main')

@section('container')

<div>
    <center>
        <h2>Riwayat Apply</h2>
    </center>
</div>
<div>
    <table border="1" cellspacing="0" width="95%" cellpadding="5px" class="tablekeranjang">
        <tr>
            <th align="center">No</th>
            <th align="center">Lowongan kerja</th>
            <th align="center">Nama Perusahaan</th>
            <th align="center">Tanggal apply</th>
            <th align="center">Status</th>
            <th align="center">Interview</th>
            <th align="center">Document</th>
            <th colspan="2" align="center" width="10%">Aksi</th>
        </tr>
        @foreach ($lamaran as $l)
        <tr align="center">
            <td height="40">{{ $loop->iteration }}</td>
            <td align="center">{{ $l->lowongan->judul }}</td>
            <td align="center">{{ $l->lowongan->perusahaan->nama_perusahaan }}</td>
            <td align="center">{{ $l->tgl_lamaran }}</td>
            <td align="center">{{ $l->status_lamaran }}</td>
            <td align="center">{{ $l->tgl_interview }}</td>
            <td align="center">
                <form action="{{ url('/zip') }}" method="get">
                    <input type="hidden" name="lowongan" value="{{ $l->lowongan->judul }}">
                    <input type="hidden" name="perusahaan" value="{{ $l->lowongan->perusahaan->nama_perusahaan }}">
                    <input type="hidden" name="user" value="{{ $l->user->username }}">
                    <input type="hidden" name="download" value="{{ $l->document }}">
                    <input type="submit" class="btn btn-primary" value="download here">

                </form>
            </td>
            <td align="center">
                <form action="{{ route('lamaran.destroy',$l->id) }}" method="POST">
                    <input type="hidden" name="lowongan" value="{{ $l->lowongan->id }}">
                    <input type="hidden" name="perusahaan" value="{{ $l->lowongan->perusahaan->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Batalkan</button>

                </form>

            </td>


            {{-- <td align="center">{{ $l->document }}</td> --}}
            <?php
	if($l->status_lamaran == "Lamar")echo "<td align='center'><a href='?page=dt_transaksi&id={{ $l->id }}'</td>";
	elseif($l->status_lamaran == "Interview") echo "<td align='center' colspan='2'><a href='?page=detail_riwayat&id={{ $l->id }}' id='lik'>Detail</a></td>";

	else echo "&nbsp;";
	?></td>
        </tr>
        @endforeach
    </table>
</div>

@endsection
