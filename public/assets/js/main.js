// ###################### WINDOW LOAD #################################
$("img").attr({
  draggable: false,
  loading: "lazy",
});
$(window).on("load", function () {
  $(".preloader").delay(2000).fadeOut(500);
});

// ###################### SIMPLE DATATABLE #################################

var datatable = $(".datatable").DataTable({
  scrollX: true,
  language: {
    sLengthMenu: "Show _MENU_",
  },

  initComplete: function () {
    var tableBody = document.querySelector(".dataTables_scrollBody");
    var headerTable = document.querySelector(".dataTables_scrollHead");
    var curDown = false;
    var oldScrollLeft = 0;
    // var oldScrollTop = 0;
    var curXPos = 0;
    // var curYPos = 0;
    if (tableBody) {
      tableBody.addEventListener("mousemove", function (e) {
        if (curDown === true) {
          tableBody.scrollLeft = oldScrollLeft + (curXPos - e.pageX);
          headerTable.scrollLeft = oldScrollLeft + (curXPos - e.pageX);
          //tableBody.scrollTop = oldScrollTop + (curYPos - e.pageY);
        }
      });
      tableBody.addEventListener("mousedown", function (e) {
        curDown = true;
        // curYPos = e.pageY;
        curXPos = e.pageX;
        oldScrollLeft = tableBody.scrollLeft;
        // oldScrollTop = tableBody.scrollTop;
      });
      tableBody.addEventListener("mouseup", function (e) {
        curDown = false;
      });
      tableBody.addEventListener("scroll", function (e) {
        headerTable.scrollLeft = tableBody.scrollLeft;
      });
    }
  },

  // initComplete: function (settings, json) {
  //   // $("datatable").wrap(
  //   //   "<div class='drag mb-4 user-select-none' style='overflow:auto; width:100%;'></div>"
  //   // );
  // },
});
// ###################### CHECKBOX DATATABLE #################################
var tableCheckbox = $("#datatableCheckbox").DataTable({
  // responsive: true,
  scrollX: true,
  language: {
    sLengthMenu: "Show _MENU_",
  },
  columnDefs: [
    {
      // className: "select-checkbox",
      targets: 0,
      // checkboxes: {
      //   selectRow: true,
      // },
    },
  ],
  // select: {
  //   style: "multi",
  //   selector: "td:first-child input",
  // },

  order: [[1, "asc"]],
  initComplete: function () {
    var tableBody = document.querySelector(".dataTables_scrollBody");
    var headerTable = document.querySelector(".dataTables_scrollHead");
    var curDown = false;
    var oldScrollLeft = 0;
    // var oldScrollTop = 0;
    var curXPos = 0;
    // var curYPos = 0;
    if (tableBody) {
      tableBody.addEventListener("mousemove", function (e) {
        if (curDown === true) {
          tableBody.scrollLeft = oldScrollLeft + (curXPos - e.pageX);
          headerTable.scrollLeft = oldScrollLeft + (curXPos - e.pageX);
          //tableBody.scrollTop = oldScrollTop + (curYPos - e.pageY);
        }
      });
      tableBody.addEventListener("mousedown", function (e) {
        curDown = true;
        // curYPos = e.pageY;
        curXPos = e.pageX;
        oldScrollLeft = tableBody.scrollLeft;
        // oldScrollTop = tableBody.scrollTop;
      });
      tableBody.addEventListener("mouseup", function (e) {
        curDown = false;
      });
      tableBody.addEventListener("scroll", function (e) {
        headerTable.scrollLeft = tableBody.scrollLeft;
      });
    }
  },
  // initComplete: function (settings, json) {
  //   $("#datatableCheckbox").wrap(
  //     "<div class='drag mb-4 user-select-none' style='overflow:auto; width:100%;'></div>"
  //   );
  // },
});

datatable.tables({ visible: true, api: true }).columns.adjust();
// ###################### DASHBOARD TOGGLER #################################
window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});

// ###################### CK EDITOR #################################
var allEditors = document.querySelectorAll(".editor");
for (var i = 0; i < allEditors.length; ++i) {
  ClassicEditor.create(allEditors[i]);
}

// ###################### MULTI DATE PICKER #################################
//########### single data
const todaydatetime = new Date().toLocaleDateString().slice(0, 10);
jQuery(".selectDate").datetimepicker({
  format: "d/m/Y",
  datepicker: true,
  viewMode: "months",
  timepicker: false,
  scrollMonth: false,
  scrollInput: false,
});
jQuery(".selectTime").datetimepicker({
  datepicker: false,
  timepicker: true,
  format: "H:i a",
  step: 45,
  scrollMonth: false,
  scrollInput: false,
});

$(".selectDate").attr("value", todaydatetime);

//############### multi date
jQuery(".startDate").datetimepicker({
  format: "Y/m/d",
  datepicker: true,
  onShow: function (ct) {
    this.setOptions({
      maxDate: jQuery(".endDate").val() ? jQuery(".endDate").val() : false,
    });
  },
  timepicker: false,
  scrollMonth: false,
  scrollInput: false,
});
jQuery(".endDate").datetimepicker({
  format: "Y/m/d",
  datepicker: true,
  onShow: function (ct) {
    this.setOptions({
      minDate: jQuery(".startDate").val() ? jQuery(".startDate").val() : false,
    });
  },
  timepicker: false,
  scrollMonth: false,
  scrollInput: false,
});
