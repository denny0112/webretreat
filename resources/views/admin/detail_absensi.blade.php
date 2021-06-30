@extends('admin.layout')
@extends('admin.side-nav',["menu"=>"absensi"])
@extends('admin.modal_preview')
@section('body')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h4>Detail Absensi - {{ $sesi->sesi_nama }}</h4>
                </div>
                <div class="card-body p-4">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped" id="tbd">
                        <thead>
                          <tr>
                              <th>NRP</th>
                              <th>Nama Peserta</th>
                              <th>Jam Absen</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail as $p)
                                <tr>
                                    <td>{{ $p->peserta_nrp }}</td>
                                    <td>{{ $p->peserta->peserta_nama }}</td>
                                    <td>{{ $p->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
</section>
@endsection
