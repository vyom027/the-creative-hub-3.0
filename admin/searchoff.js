$(document).ready(function () {
  $.fn.dataTableExt.sErrMode = "none";
  if ($.fn.dataTable.isDataTable("#subcategoryTable")) {
    $("#subcategoryTable").DataTable().destroy(); // Destroy the existing instance if found
  }

  $("#subcategoryTable").DataTable({
    searching: false, // Disable the search bar
    paging: false, // Optional: Enable/disable pagination as needed
    info: false, // Optional: Enable/disable info display
  });
});
