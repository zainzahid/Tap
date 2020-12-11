
var input = document.getElementById( 'inputFile' );
var inputLabel = document.getElementById( 'inputFileLabel' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  let input = event.srcElement;

  let fileName = input.files[0].name;

  inputLabel.textContent = 'File name: ' + fileName;
}
