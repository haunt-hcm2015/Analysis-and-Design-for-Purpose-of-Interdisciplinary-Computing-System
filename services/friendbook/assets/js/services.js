var groupService = document.getElementById("groupService");
var groupPopup = document.getElementById("group");
var span = document.getElementsByClassName("close")[0];
groupPopup.onclick = function() {
    groupService.style.display = "block";
}
span.onclick = function() {
    groupService.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == groupService) {
    groupService.style.display = "none";
  }
}
