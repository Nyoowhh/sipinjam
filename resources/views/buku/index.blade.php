@extends('layouts.app')
@section('judul', 'Daftar Buku')

@section('konten')
  <a href='{{ route('buku.create') }}'>+ Tambah Buku</a>

  @if (session('sukses'))
    <p style='color:green'>{{ session('sukses') }}</p>
  @endif

  <table border='1' cellpadding='6'>
    <tr><th>ISBN</th><th>Judul</th><th>Penulis</th><th>Tahun</th><th>Stok</th><th>Aksi</th></tr>
    @forelse ($buku as $b)
      <tr>
        <td>{{ $b->isbn }}</td>
        <td>{{ $b->judul }}</td>
        <td>{{ $b->penulis }}</td>
        <td>{{ $b->tahun_terbit }}</td>
        <td>{{ $b->stok }}</td>
        <td>
          <a href='{{ route('buku.show', $b) }}'>Detail</a>
          <a href='{{ route('buku.edit', $b) }}'>Ubah</a>
          <form method='POST' action='{{ route('buku.destroy', $b) }}'
                style='display:inline'
                onsubmit='return confirm("Hapus buku ini?")'>
            @csrf
            @method('DELETE')
            <button type='submit'>Hapus</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan='6'>Belum ada data buku.</td></tr>
    @endforelse
  </table>

  {{ $buku->links() }}
@endsection