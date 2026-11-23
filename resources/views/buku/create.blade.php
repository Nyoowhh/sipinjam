@extends('layouts.app')
@section('judul', 'Tambah Buku')

@section('konten')
  @if ($errors->any())
    <ul style='color:red'>
      @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  @endif

  <form method='POST' action='{{ route('buku.store') }}'>
    @csrf
    <p>ISBN: <input name='isbn' value='{{ old('isbn') }}'></p>
    <p>Judul: <input name='judul' value='{{ old('judul') }}'></p>
    <p>Penulis: <input name='penulis' value='{{ old('penulis') }}'></p>
    <p>Tahun terbit: <input name='tahun_terbit' type='number' value='{{ old('tahun_terbit') }}'></p>
    <p>Stok: <input name='stok' type='number' value='{{ old('stok', 0) }}'></p>
    <button type='submit'>Simpan</button>
    <a href='{{ route('buku.index') }}'>Batal</a>
  </form>
@endsection