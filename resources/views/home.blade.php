<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundryFresh</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- Hero Section -->
    <section style="background-color:rgb(250, 242, 232);" class="py-10">
        <div class="container mx-auto flex flex-col md:flex-row items-center gap-6">
            <!-- Gambar -->
            <div class="md:w-1/2 flex justify-start">
                <img src="{{ asset('assets/img/icon_laundry.png') }}" alt="Laundry Image" class="w-80 md:w-[450px]">
            </div>
            
            <!-- Text -->
            <div class="md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-bold text-blue-700 leading-tight">Welcome to LaundryFresh</h1>

                <p class="text-gray-600 mt-4 text-lg">Mau laundry tapi bingung biaya? Hitung estimasi harga laundry kamu di sini sebelum datang ke outlet!</p>
                
                <button onclick="openProductModal()" class="mt-6 block w-fit bg-blue-500 hover:bg-blue-400 text-white px-4 py-3 rounded-md shadow-md">Estimasi Biaya Laundry</button>
            </div>
        </div>
    </section>


    <!-- About Section -->
    <section id="about" class="py-20 px-6" style="background-color: #A7D7E7;">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-blue-800">About Us</h2>
            <p class="mt-4 text-gray-700">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad autem molestias harum dolore dignissimos dolorum similique maxime eum, minus quia maiores mollitia sit quasi tempora architecto tempore vel modi recusandae.</p>
        </div>
    </section>

    <!-- Search Section -->
    <section id="cari" class="py-10 text-center">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-blue-800">Cari Pesanan Anda</h2>
            <form action="/search" method="GET" class="mt-4 inline-block">
                <input type="text" name="noHp" placeholder="Cari berdasarkan No HP" required class="p-2 border border-gray-300 rounded">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cari</button>
            </form>
        </div>
    </section>

    <!-- Service Section -->
    <section id="service" class="py-20 px-6 bg-blue-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-blue-600">Our Services</h2>
            <div class="mt-6 flex justify-center space-x-10">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="{{ asset('assets/img/washingicon.png') }}" alt="Washing Icon" class="mx-auto">
                    <h3 class="text-xl font-semibold mt-4">Cuci Biasa</h3>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="{{ asset('assets/img/ironingicon.png') }}" alt="Ironing Icon" class="mx-auto">
                    <h3 class="text-xl font-semibold mt-4">Setrika Rapi</h3>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="{{ asset('assets/img/drycleaningicon.png') }}" alt="Dry Cleaning Icon" class="mx-auto">
                    <h3 class="text-xl font-semibold mt-4">Cuci Kering</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 px-6 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-blue-600">Contact Us</h2>
            <p class="mt-4 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </section>

    <!-- Modal Cari -->
    <div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded shadow-lg w-11/12 md:w-1/3 relative" onclick="event.stopPropagation()">
            <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            <h2 class="text-xl font-bold mb-4">Detail Pesanan</h2>
            <hr class="border-gray-300 mb-4">
            <p class="font-bold mt-4">Nama Pemesan: <span class="font-normal" id="nama"></span></p>
            <p class="font-bold mt-4">No Handphone: <span class="font-normal" id="noHp"></span></p>
            <p class="font-bold mt-4">Total Harga: Rp. <span class="font-normal text-blue-600" id="totalHarga"></span></p>
            <p class="font-bold mt-4">Tanggal Pemesanan: <span class="font-normal" id="createdAt"></span></p>
            <p class="font-bold mt-4">Status: <span class="font-normal text-blue-600" id="status"></span></p>
            <hr class="border-gray-300 mb-4 mt-4">
            <button onclick="closeModal()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>

    <!-- Modal Produk -->
    <div id="productModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded shadow-lg w-11/12 md:w-1/3 relative" onclick="event.stopPropagation()">
            <button onclick="closeProductModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            <h2 class="text-xl font-bold mb-4">Estimasi Biaya Laundry</h2>
            <hr class="border-gray-300 mb-4">

            <!-- Pilih Produk -->
            <label class="font-bold">Jenis Laundry:</label>
            <select id="produkLaundry" class="border rounded p-2 w-full mt-2" onchange="updateHarga()">
                <option value="10000">Cuci Kering - Rp. 10.000/kg</option>
                <option value="12000" disabled>Cuci Setrika - Rp. 12.000/kg -- (Belum Tersedia)</option>
                <option value="15000" disabled>Express - Rp. 15.000/kg -- (Belum Tersedia)</option>
            </select>

            <!-- Input Berat -->
            <label class="font-bold mt-4 block">Berat (kg):</label>
            <input type="number" id="berat" class="border rounded p-2 w-full mt-2" value="1" min="1" oninput="updateHarga()">

            <!-- Total Harga -->
            <p class="font-bold mt-4">Total Harga: <span id="hargaEstimasi" class="text-blue-600">Rp. 10.000</span></p>

            <hr class="border-gray-300 my-4">
            <button onclick="closeProductModal()" class="bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        document.querySelector("form").addEventListener("submit", function (event) {
            event.preventDefault();
            let noHp = document.querySelector("[name=noHp]").value;

            fetch(`/search/pesanan?noHp=${noHp}`)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Data tidak ditemukan");
                    }
                    return response.json();
                })
                .then((data) => {
                    console.log(data);
                    // Format harga biar ada titik ribuan
                    let formattedHarga = new Intl.NumberFormat("id-ID").format(data.total_harga);

                    // Format tanggal jadi DD/MM/YYYY
                    let dateObj = new Date(data.created_at);
                    let formattedDate = dateObj.toLocaleDateString("id-ID", {
                        day: "2-digit",
                        month: "2-digit",
                        year: "numeric"
                    });

                    document.getElementById("nama").textContent = data.nama;
                    document.getElementById("noHp").textContent = data.noHp;
                    document.getElementById("totalHarga").textContent = formattedHarga;
                    document.getElementById("createdAt").textContent = formattedDate;
                    document.getElementById("status").textContent = data.status;
                    document.getElementById("detailModal").classList.remove("hidden");
                })
                .catch((error) => {
                    alert(error.message);
                });
        });

        // Biar bisa dipanggil global
        window.closeModal = function () {
            document.getElementById("detailModal").classList.add("hidden");
        };

        // Tutup modal jika klik di luar box modal
        document.getElementById("detailModal").addEventListener("click", function (event) {
            if (event.target === this) {
                closeModal();
            }
        });
    });

    // produk
    function openProductModal() {
        document.getElementById("productModal").classList.remove("hidden");
    }

    function closeProductModal() {
        document.getElementById("productModal").classList.add("hidden");
    }

    function updateHarga() {
        let hargaPerKg = parseInt(document.getElementById("produkLaundry").value);
        let berat = parseInt(document.getElementById("berat").value);
        let total = hargaPerKg * berat;

        // Pastikan elemen yang dituju benar
        let totalHargaElem = document.getElementById("hargaEstimasi");
        
        if (totalHargaElem) {
            totalHargaElem.innerText = `Rp. ${total.toLocaleString()}`;
        } else {
            console.error("Element dengan id 'totalHarga' tidak ditemukan!");
        }
    }

    console.log("Harga Estimasi (Dummy):", data.hargaEstimasi);
    console.log("Harga dari Database:", data.totalHarga);

    </script>
</body>
</html>
