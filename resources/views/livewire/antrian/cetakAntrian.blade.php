<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<div class="container">
    @forelse ($detailAntrian as $item)
        <div class="card" style="border: 1px solid black; width: 400px; margin: auto; margin-top: 30px;">
            <div class="card-body text-center">
                <h5 class="card-title fw-bold">PUSKESMAS SAMBI</h5>
                <h6 class="card-subtitle mb-2 text-muted">Nomor Antrian</h6>
                <hr>
                <h1 class="fw-bold">{{ $item->no_antrian }}</h1>
                <hr>
                <div class="card-footer">
                    <h6>"Terima Kasih Atas Kunjungan Anda"</h6>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-warning text-center mt-4">
            Anda belum memiliki antrian aktif.
        </div>
    @endforelse
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>