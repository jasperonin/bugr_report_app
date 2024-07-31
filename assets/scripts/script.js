var number = 10;
var string = 'Hello';
var isRad = true;

document.getElementById('box').innerHTML = isRad;

document.getElementById('box').addEventListener('click', function(){
  alert('I got clicked');
});


function changeDropdownLabel(newLabel) {
     document.getElementById('dropdownMenuButton').textContent = newLabel;
}
 