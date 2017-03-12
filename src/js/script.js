//Display the form
var create = document.querySelector(".create");
create.addEventListener("click", function(){
  document.querySelector(".form1").classList.remove("invisible");
});

var del = document.querySelector(".submit1");
del.addEventListener("click", function(){
  document.querySelector(".form1").classList.add("invisible");
});
