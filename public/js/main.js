let Tos = document.querySelectorAll("input[name=To]");
const fto = document.getElementById('To');
let ResultTo = document.querySelector("div[name=ResultTo]");
let torow = document.getElementById('torow');
let tobtn = document.querySelector("button[name=tobtn]");
let ToFinResult = document.querySelector("input[name=ToFinResult]");

let Ccs = document.querySelectorAll("input[name=Cc]");
const fcc = document.getElementById('Cc');
let ResultCc = document.querySelector("div[name=ResultCc]");
let ccrow = document.getElementById('ccrow');
let ccbtn = document.querySelector("button[name=ccbtn]");
let CcFinResult = document.querySelector("input[name=CcFinResult]");

let Bccs = document.querySelectorAll("input[name=Bcc]");
const fbcc = document.getElementById('Bcc');
let ResultBcc = document.querySelector("div[name=ResultBcc]");
let bccrow = document.getElementById('bccrow');
let bccbtn = document.querySelector("button[name=bccbtn]");
let BccFinResult = document.querySelector("input[name=BccFinResult]");

let subject = document.querySelector("input[name=subject]");
let letterBody = document.querySelector("textarea[name=letterBody]");

function ConnectTo() {
  let result = "";

  // Tosを通常の配列に変換
  const ToArray = Array.from(Tos);

  ToArray.forEach(To => {
    if (result === "") {
      result = To.value;
    } else if (To.value !== "") {
      result += "," + To.value;
    }
  });

  if (result === "") {
    ResultTo.textContent = result;
  } else {
    ResultTo.textContent = "To: " + result;
  }

  ToFinResult.value = result;
}

tobtn.addEventListener('click', () => {
    const newForm = document.createElement('input');
    newForm.type = 'email';
    newForm.name = 'To';
    newForm.classList.add('form-control');
    newForm.placeholder = 'To';
    newForm.required = true;

    const inputDiv = document.createElement('div');
    inputDiv.setAttribute("name", "inputdiv");
    inputDiv.classList.add('col-sm');
    inputDiv.appendChild(newForm);

    torow.appendChild(inputDiv);

    Tos = document.querySelectorAll("input[name=To]");
    newForm.addEventListener("input", ConnectTo, false);
    ConnectTo();
});

function ConnectCc() {
  let result = "";

  // Ccsを通常の配列に変換
  const CcArray = Array.from(Ccs);

  CcArray.forEach(Cc => {
    if (result === "") {
      result = Cc.value;
    } else if (Cc.value !== "") {
      result += "," + Cc.value;
    }
  });

  if (result === "") {
    ResultCc.textContent = result;
  } else {
    ResultCc.textContent = "Cc: " + result;
  }

  CcFinResult.value = result;
}

ccbtn.addEventListener('click', () => {
    const newForm = document.createElement('input');
    newForm.type = 'email';
    newForm.name = 'Cc';
    newForm.classList.add('form-control');
    newForm.placeholder = 'Cc';
    newForm.required = true;

    const inputDiv = document.createElement('div');
    inputDiv.classList.add('col-sm');
    inputDiv.setAttribute("name", "inputdiv");
    inputDiv.appendChild(newForm);

    ccrow.appendChild(inputDiv);

    Ccs = document.querySelectorAll("input[name=Cc]");
    newForm.addEventListener("input", ConnectCc, false);
    ConnectCc();
});

function ConnectBcc() {
  let result = "";

  // Bccsを通常の配列に変換
  const BccArray = Array.from(Bccs);

  BccArray.forEach(Bcc => {
    if (result === "") {
      result = Bcc.value;
    } else if (Bcc.value !== "") {
      result += "," + Bcc.value;
    }
  });

  if (result === "") {
    ResultBcc.textContent = result;
  } else {
    ResultBcc.textContent = "Bcc: " + result;
  }

  BccFinResult.value = result;
}

bccbtn.addEventListener('click', () => {
    const newForm = document.createElement('input');
    newForm.type = 'email';
    newForm.name = 'Bcc';
    newForm.classList.add('form-control');
    // newForm.classList.add('is-valid');
    newForm.placeholder = 'Bcc';
    newForm.required = true;

    const inputDiv = document.createElement('div');
    inputDiv.setAttribute("name", "inputdiv");
    inputDiv.classList.add('col-sm');
    inputDiv.appendChild(newForm);

    bccrow.appendChild(inputDiv);

    Bccs = document.querySelectorAll("input[name=Bcc]");
    newForm.addEventListener("input", ConnectBcc, false);
    ConnectBcc();
});



Tos.forEach(To => {
  To.addEventListener("input", ConnectTo, false);
});
Ccs.forEach(Cc => {
  Cc.addEventListener("input", ConnectCc, false);
});
Bccs.forEach(Bcc => {
  Bcc.addEventListener("input", ConnectBcc, false);
});

// 戻る画面ロード時にも実行
window.addEventListener('popstate', ConnectTo);
window.addEventListener('popstate', ConnectCc);
window.addEventListener('popstate', ConnectBcc);

// 編集画面からmypageへのボタンを押した際のアラート機能
document.addEventListener('DOMContentLoaded', function () {
    var mypageButton = document.querySelector(' .TM');

    if (mypageButton) {
        mypageButton.addEventListener('click', function (event) {
            var isConfirmed = confirm('変更内容が破棄されます。よろしいですか？');

            if (!isConfirmed) {
                event.preventDefault(); // ページの移動をキャンセル
            }
        });
    }
});

// backクラスのボタンは戻るボタンと同じ挙動にする
document.addEventListener('DOMContentLoaded', function () {
    var backButton = document.querySelectorAll('.back');

    backButton.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            window.history.back();
        });
    });
});



// document.addEventListener('DOMContentLoaded', function () {
//     var copyUrlButton = document.getElementById('copyUrl');

//     if (copyUrlButton) {
//         copyUrlButton.addEventListener('click', function () {
//             var urlInput = document.getElementById('url');
//             alert('Eventlisner');

//             if (urlInput) {
//                 urlInput.select();
//                 document.execCommand('copy');
//                 alert('URLがクリップボードにコピーされました！');
//             }
//         });
//     }
// });


//　入力ページのバリデーション機能
const forms = document.querySelectorAll('.needs-toccbcc-validation')
Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
        // ConnectTo, ConnectCc, ConnectBcc を実行

        const Tofeedback = document.getElementById('Tofeedback');
        const Ccfeedback = document.getElementById('Ccfeedback');
        const Bccfeedback = document.getElementById('Bccfeedback');
        const feedback = document.getElementById('feedback');

        // console.log(ToFinResult);
        // console.log(CcFinResult);
        // console.log(BccFinResult);

            if (ToFinResult.value === "") {
                for (; torow.firstElementChild !== null ;) {
                    torow.removeChild(torow.firstElementChild);
                }
            }
            if (CcFinResult.value === "") {
                console.log(ccrow);
                for (; ccrow.firstElementChild !== null ;) {
                    ccrow.removeChild(ccrow.firstElementChild);
                }
                console.log(ccrow);
            }
            if (BccFinResult.value === "") {
                for (; bccrow.firstElementChild !== null ;) {
                    bccrow.removeChild(bccrow.firstElementChild);
                }
            }
        // バリデーション(全欄空欄)
        if ( ToFinResult.value == "" && CcFinResult.value == "" && BccFinResult.value == "" && subject.value == "" && letterBody.value == "" ) {
            event.preventDefault();
            event.stopPropagation();
            feedback.textContent = "件名と本文は埋めてください。";
            // バリデーション（形式が不可）
        } else if ( subject.value == "" || letterBody == "") {
            feedback.textContent = "件名と本文は埋めてください。";
        } else if(!form.checkValidity() ) {
            event.preventDefault();
            event.stopPropagation();
            feedback.textContent = "メールアドレスや文章の形式を修正してください。";
            if (Tofeedback) {
                Tofeedback.textContent = "メールアドレスや文章の形式を修正してください。";
            }
            if (Ccfeedback) {
                Ccfeedback.textContent = "メールアドレスや文章の形式を修正してください。";
            }
            if (Bccfeedback) {
                Bccfeedback.textContent = "メールアドレスや文章の形式を修正してください。";
            }
            // console.log(torow)
            // console.log(ccrow)
            // console.log(bccrow)

        }


        console.log(feedback.textContent);
        ConnectTo();
        ConnectCc();
        ConnectBcc();

        form.classList.add('was-validated');


    }, false);
})

