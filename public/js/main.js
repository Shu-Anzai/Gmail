let Tos = document.querySelectorAll("input[name=To]");
let ResultTo = document.querySelector("p[name=ResultTo]");
let torow = document.getElementById('torow');

let Ccs = document.querySelectorAll("input[name=Cc]");
let ResultCc = document.querySelector("p[name=ResultCc]");
let ccrow = document.getElementById('ccrow');

let Bccs = document.querySelectorAll("input[name=Bcc]");
let ResultBcc = document.querySelector("p[name=ResultBcc]");
let bccrow = document.getElementById('bccrow');

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

  if (result === '') {
    ResultTo.textContent = result;
  } else {
    ResultTo.textContent = "To: " + result;
  }

  ToFinResult.value = result;

//   console.log(result);
}

function ConnectCc() {
  let result = '';

  // Ccsを通常の配列に変換
  const CcArray = Array.from(Ccs);

  CcArray.forEach(Cc => {
    if (result === '') {
      result = Cc.value;
    } else if (Cc.value !== '') {
      result += ',' + Cc.value;
    }
  });

  if (result === '') {
    ResultCc.textContent = result;
  } else {
    ResultCc.textContent = "Cc: " + result;
  }

  CcFinResult.value = result;

//   console.log(result);
}

function ConnectBcc() {
  let result = '';

  // Bccsを通常の配列に変換
  const BccArray = Array.from(Bccs);

  BccArray.forEach(Bcc => {
    if (result === '') {
      result = Bcc.value;
    } else if (Bcc.value !== '') {
      result += ',' + Bcc.value;
    }
  });

  if (result === '') {
    ResultBcc.textContent = result;
  } else {
    ResultBcc.textContent = "Bcc: " + result;
  }

  CcFinResult.value = result;

//   console.log(result);
}


Tos.forEach(To => {
  To.addEventListener("input", ConnectTo, false);
});
Ccs.forEach(Cc => {
  Cc.addEventListener("input", ConnectCc, false);
});
Bccs.forEach(Bcc => {
  Bcc.addEventListener("input", ConnectBcc, false);
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
