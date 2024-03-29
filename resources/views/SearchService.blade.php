<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="{{asset('Customerpage/https://fonts.googleapis.com/css?family=Poppins')}}" rel="stylesheet" />
    <link href="{{asset('Customerpage/css/main.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav>
        <ul class="nav justify-content-end">
            <li class="nav-item">
              {{-- <a class="nav-link active" href="#">Active</a> --}}
            </li>
            <li class="nav-item">
              {{-- <a class="nav-link" href="#">Link</a> --}}
            </li>
            <li class="nav-item">
              {{-- <a class="nav-link" href="#">Link</a> --}}
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="{{url('/Log_in')}}">Login</a>
            </li>
          </ul>
    </nav>
    <div class="s003">
      <form action="{{url('/CekService')}}" method="POST">
        <div class="inner-form">
          <div class="input-field second-wrap">
            <input id="KodeBarang" name="KodeBarang" type="text" placeholder="Enter Kode Barang" />
          </div>
          <div class="input-field third-wrap">
            <button class="btn-search" type="submit">
              <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button>
          </div>
        </div>
      </form>
      <div>
        @if (session()->has('CekService'))
            @foreach (session()->get('CekService') as $data)
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">{{$data->id}}</div>
                                <div class="card-body">
                                    Status:
                                    @if ($data->Status == 0)
                                        <span>Mengunggu Pengerjaan</span>
                                    @elseif ($data->Status == 1)
                                        <span>Sedang dikerjakan</span>
                                    @elseif ($data->Status == 2)
                                        <span>Selesai DiService</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    </div>
    <script src="js/extention/choices.js"></script>
    <script>
        var barcode = '';
                var interval;
                document.addEventListener('keydown', function(evt) {
                    if (interval)
                        clearInterval(interval);
                    if (evt.code == 'Enter') {
                        if (barcode)
                            handleBarcode(barcode);
                        barcode = '';
                        return;
                    }
                    if (evt.key != 'Shift')
                        barcode += evt.key;
                    interval = setInterval(() => barcode = '', 20);
                });

                function handleBarcode(scanned_barcode) {
                    document.querySelector('#KodeBarang').value = scanned_barcode;
                }
    </script>

  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
