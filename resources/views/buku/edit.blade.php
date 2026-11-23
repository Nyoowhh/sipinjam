@extends('layouts.app')
@section('judul', 'Ubah Buku')

@section('konten')
  <h2>Ubah Buku</h2>

  @if ($errors->any())
    <ul style="color:red">
      @foreach ($errors->all() as $e)
        <li>{{ $e }}</li>
      @endforeach
    </ul>
  @endif

  <form method="POST" action="{{ route('buku.update', $buku) }}">
    @csrf
    @method('PUT')

    <p>
      ISBN:
      <input type="text" name="isbn" value="{{ old('isbn', $buku->isbn) }}">
    </p>
    <p>
      Judul:
      <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}">
    </p>
    <p>
      Penulis:
      <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis) }}">
    </p>
    <p>
      Tahun terbit:
      <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
    </p>
    <p>
      Stok:
      <input type="number" name="stok" value="{{ old('stok', $buku->stok) }}">
    </p>

    <button type="submit">Perbarui</button>
    <a href="{{ route('buku.index') }}">Batal</a>
  </form>
@endsection