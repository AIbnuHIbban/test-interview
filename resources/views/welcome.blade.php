<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Tiketin - Beli tiket konser sekarang!</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-navbar">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation" data-bs-theme="dark">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <div class="d-flex justify-content-between w-100">
                <a class="navbar-brand text-white fw-bold" href="#">Tiketin</a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{ url('login') }}" id="btn-signin" class="btn btn-outline-light">Masuk</a>
                    </li>
                </ul>
            </div>
          </div>
        </div>
    </nav>
    <div class="bg-navbar d-flex justify-content-center gap-3 pt-2">
        <p class="text-white small">#PesanTiket</p>
        <p class="text-white small">#Konser2023</p>
        <p class="text-white small">#KonserMurah</p>
    </div>

    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://loket-production-sg.s3.ap-southeast-1.amazonaws.com/images/ss/1688307238_rJo0og.jpg"
                                class="d-block w-100" alt="Cover 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://loket-production-sg.s3.ap-southeast-1.amazonaws.com/images/ss/1688307268_29b2L8.jpg"
                                class="d-block w-100" alt="Cover 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://loket-production-sg.s3.ap-southeast-1.amazonaws.com/images/ss/1687344121_u5vg9O.jpg"
                                class="d-block w-100" alt="Cover 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row flex-container mt-3" id="listConcerts">
        </div>
    </div>

    {{-- modal detail concert --}}
    <div class="modal fade" id="modalDetailConcert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="dt_thumbnail" class="img-fluid rounded" src="" alt="">
                            <h5 class="mt-3">Deskripsi</h5>
                            <div id="dt_description"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="div">
                                        <h5 id="dt_name"></h5>
                                        <div class="d-flex flex-column gap-3 mt-3">
                                            <div class="d-flex gap-2 align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                                <p class="m-0 text-muted" id="dt_date"></p>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                                <p class="m-0 text-muted" id="dt_time"></p>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                                <p class="m-0 text-muted" id="dt_venue"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title d-flex gap-2 align-items-center fw-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        Pesan Tiket
                                    </h5>
                                    <form id="customerTicketForm" class="mt-3">
                                        <input type="hidden" name="consert_id" id="concertId">
                                        <div class="mb-3">
                                            <label for="customerName" class="form-label">Nama Lengkap</label>
                                            <input name="name" type="text" class="form-control" id="customerName" required placeholder="Nama Lengkap" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="customerEmail" class="form-label">Email</label>
                                            <input name="email" type="email" class="form-control" id="customerEmail" required placeholder="Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="customerPhone" class="form-label">No. Handphone</label>
                                            <input name="phone" type="text" class="form-control" id="customerPhone" required placeholder="No. Handphone">
                                        </div>
                                        <div class="mb-3">
                                            <label for="ticketType" class="form-label">Jenis Tiket</label>
                                            <select name="ticket_type_id" class="form-select" id="ticketType" required>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-dark w-100 fw-bold">Pesan Sekarang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal success booked --}}
    <div class="modal fade" id="mdSuccessBook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body text-center">
                <h4>Tiket Berhasil Dipesan!</h4>
                <p>Berikut kode tiket anda</p>
                <div class="d-flex align-items-center justify-content-center">
                    <h6 class="m-0" id="txResult"></h6>
                    <button id="copyButton" class="btn btn-outline-dark ms-2 btn-sm">Copy</button>
                </div>
                <small>Screenshoot Halaman ini atau Copy Kode tersebut <br> Untuk nantinya akan digunakan ketika masuk gate</small>
                <button type="button" class="btn w-100 btn-dark btn-sm  mt-3" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


    {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script>
        getConcerts()
        function getConcerts() {
            fetch(window.location.origin+'/concerts')
            .then(response => response.json())
            .then(concerts => {
                let concertsDiv = document.querySelector('#listConcerts');
                concerts.forEach(concert => {
                    // Mengambil harga tiket terendah untuk setiap konser
                    let minPrice = Math.min(...concert.ticket_types.map(ticketType => ticketType.price));

                    let concertDiv = `
                        <div class="col-md-3 flex-item" onclick="getDetailConcert('${concert.id}')">
                            <div class="card h-100">
                                <img src="${concert.thumbnail}" class="card-img-top" alt="">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div>
                                        <p class="card-text title-card mb-2">${concert.name}</p>
                                    </div>
                                    <div>
                                        <p class="card-text text-muted mb-2">${new Date(concert.date).toLocaleDateString()}</p>
                                        <p class="card-text fw-bold">Rp ${toRupiah(minPrice)}</p>
                                        <hr>
                                        <p class="card-text small">${concert.venue}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    concertsDiv.innerHTML += concertDiv;
                });
            });
        }

        function getDetailConcert(id){
            fetch(window.location.origin+`/concerts/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('exampleModalLabel').innerText = data.name;

                document.getElementById('concertId').value = id;
                document.getElementById('dt_thumbnail').src = data.thumbnail;
                document.getElementById('dt_name').innerText = data.name;
                document.getElementById('dt_date').innerText = new Date(data.date).toLocaleDateString();
                document.getElementById('dt_time').innerText = new Date(data.date).toLocaleTimeString();
                document.getElementById('dt_venue').innerText = data.venue;
                document.getElementById('dt_description').innerText = data.description;

                let ticketTypeSelect = document.querySelector('#ticketType');
                data.ticket_types.forEach(ticketType => {
                    let option = document.createElement('option');
                    option.value = ticketType.id;
                    option.textContent = `${ticketType.name} - Rp ${toRupiah(ticketType.price)}`;
                    ticketTypeSelect.appendChild(option);
                });

                let myModal = new bootstrap.Modal(document.getElementById('modalDetailConcert'));
                myModal.show();
            })
        }

        document.querySelector("#customerTicketForm").addEventListener("submit", function(event) {
            event.preventDefault();

            let customerName = document.querySelector("#customerName").value;
            let customerEmail = document.querySelector("#customerEmail").value;
            let customerPhone = document.querySelector("#customerPhone").value;
            let ticketType = document.querySelector("#ticketType").value;
            let concertId = document.querySelector("#concertId").value;

            let formData = {
                name: customerName,
                email: customerEmail,
                phone: customerPhone,
                ticket_type_id: ticketType,
                concert_id: concertId
            };

            fetch(window.location.origin+'/tickets', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                document.querySelector('#txResult').innerText = data.ticket_code

                let modalSuccess = new bootstrap.Modal(document.getElementById('mdSuccessBook'));
                modalSuccess.show();
            })
            .catch((error) => {
                console.log(error);
            });
        });

        document.querySelector("#copyButton").addEventListener("click", function() {
            let txResult = document.querySelector("#txResult").innerText;
            navigator.clipboard.writeText(txResult).then(function() {
                alert('Berhasil copy Kode Tiket!')
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        });

        function toRupiah(bilangan){
            var	reverse     = bilangan.toString().split('').reverse().join(''),
                ribuan 	    = reverse.match(/\d{1,3}/g);
                ribuan	    = ribuan.join('.').split('').reverse().join('');
            return ribuan
        }
    </script>
</body>
</body>

</html>
