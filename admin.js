// Function to edit a row
function editRow(nomor) {
    // Implement your edit logic here
    console.log('Edit row with nomor:', nomor);
  }

  //Ketika hamburger menu di klik
document.querySelector("#chevron-left").onclick = () => {
  navbarNav.classList.toggle("active");
};
//Klik di luar sidebar untuk menghilangkan nav
const hamburger = document.querySelector("#hamburger-menu");

document.addEventListener("click", function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});
  
  // Function to delete a row
  function deleteRow(nomor) {
    // Implement your delete logic here
    console.log('Delete row with nomor:', nomor);
  }
  