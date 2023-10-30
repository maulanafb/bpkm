// Dapatkan elemen tombol dan dropdown
var dropdownBtn = document.getElementById('dropdownBtn');
var dropdownContent = document.getElementById('dropdownContent');
var dropdown = document.querySelector('.dropdown');

// Tambahkan event listener untuk tombol
dropdownBtn.addEventListener('click', function() {
  // Toggle kelas 'active' pada dropdown
  dropdown.classList.toggle('active');
});

// Menutup dropdown jika pengguna mengklik di luar dropdown
window.addEventListener('click', function(event) {
  if (!event.target.matches('.dropbtn')) {
    if (dropdown.classList.contains('active')) {
      dropdown.classList.remove('active');
    }
  }
});
