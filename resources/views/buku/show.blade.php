@extends('layouts.app')
@section('judul', 'Detail Buku')

@section('konten')
  <h2>Detail Buku</h2>

  <p><strong>ISBN:</strong> {{ $buku->isbn }}</p>
  <p><strong>Judul:</strong> {{ $buku->judul }}</p>
  <p><strong>Penulis:</strong> {{ $buku->penulis }}</p>
  <p><strong>Tahun terbit:</strong> {{ $buku->tahun_terbit }}</p>
  <p><strong>Stok:</strong> {{ $buku->stok }}</p>

  <a href="{{ route('buku.index') }}">Kembali</a>
@endsection