function getUserInput() {
  var plan = tinymce.activeEditor.getContent();
  let inputPerLine = plan.split("\n");
  let clearInput = []; //Array to be filled with clear elements

  //Remove first and last elements which ol or ul tags
  inputPerLine.shift();
  inputPerLine.pop();

  inputPerLine.forEach((input) => {
    input = input.replace("<li>", "");
    input = input.replace("</li>", "");
    //Add clear input to the clearInput array
    clearInput.push(input);

    //Remove nbsp
    if (clearInput[clearInput.length - 1] == "&nbsp;") {
      clearInput.pop();
    }
  });

  return clearInput;
}
