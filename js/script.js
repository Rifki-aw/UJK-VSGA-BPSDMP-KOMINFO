const sideLinks = document.querySelectorAll(
  ".sidebar .side-menu li a:not(.logout)"
);

sideLinks.forEach((item) => {
  const li = item.parentElement;
  item.addEventListener("click", () => {
    sideLinks.forEach((i) => {
      i.parentElement.classList.remove("active");
    });
    li.classList.add("active");
  });
});

const menuBar = document.querySelector(".content nav .bx.bx-menu");
const sidebarToggle = document.getElementById("sidebar-toggle");
const sideBar = document.querySelector(".sidebar");

sidebarToggle.addEventListener("click", () => {
  sideBar.classList.toggle("close");
});

// Event listener tambahan untuk menutup sidebar saat halaman dimuat
window.addEventListener("load", () => {
  sideBar.classList.add("close");
});


// Edit Data
// function editInput(row) {
//   document.getElementById("editId").value = row.id;
//   document.getElementById("editJudul").value = row.judul;
//   document.getElementById("editKeterangan").value = row.keterangan;
// }
