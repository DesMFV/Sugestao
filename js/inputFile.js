var $input    = document.getElementById("input-file"),
    $fileName = document.getElementById("file-name");

$input.addEventListener("click", function(){
  $fileName.textContent = this.value;
});