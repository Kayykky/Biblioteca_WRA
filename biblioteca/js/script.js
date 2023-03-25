function openTab(evt, tabName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("tab");

  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }

  tablinks = document.getElementsByClassName("tablink");
  
  document.getElementById(tabName).style.display = "block";

  localStorage.setItem("lastTab", tabName);
}
