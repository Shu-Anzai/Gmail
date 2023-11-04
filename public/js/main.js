let Tos = document.querySelectorAll("input[name=To]");
let Ccs = document.querySelectorAll("input[name=Cc]");
let Bccs = document.querySelectorAll("input[name=Bcc]");
let ResultTo = document.querySelector("p[name=ResultTo]");
let torow = document.getElementById('torow');

function ConnectTo() {
  let result = '';

  // Tosを通常の配列に変換
  const ToArray = Array.from(Tos);

  ToArray.forEach(To => {
    if (result === '') {
      result = To.value;
    } else if (To.value !== '') {
      result += ',' + To.value;
    }
  });

  ResultTo.textContent = "To: " + result;

}

Tos.forEach(To => {
  To.addEventListener("input", ConnectTo, false);
});


document.querySelector("button[name=tobtn]").addEventListener('click', () => {
    const newForm = document.createElement("input");
    newForm.type = "email";
    newForm.className = "form-contol";
    newForm.name = "To";
    const div = document.querySelector("div");
    div.className = "col";
    torow.appendChild(div);
    div.appendChild(newForm);

//   newForm.addEventListener('input', calc);

  Tos = document.querySelectorAll("input[name=To]");
});
