// コピーボタン
let copyTarget = document.getElementById("url");
document.getElementById("copyUrl").addEventListener('click', () => {
    if (!navigator.clipboard) {
        alert("このブラウザは対応していません");
        return;
    }

    navigator.clipboard.writeText(copyTarget.value).then(
        () => {
        alert('URLをコピーしました。');
        },
        () => {
        alert('コピーに失敗しました。');
    });
});


document.addEventListener('DOMContentLoaded', function () {
    var backButton = document.querySelectorAll('.back');

    backButton.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            window.history.back();
        });
    });
});

// 編集画面からmypageへのボタンを押した際のアラート機能
document.addEventListener('DOMContentLoaded', function () {
    var mypageButton = this.getElementById('mypageButton');

    if (mypageButton) {
        mypageButton.addEventListener('click', function (event) {
            var isConfirmed = confirm('変更内容が破棄されます。よろしいですか？');

            if (!isConfirmed) {
                event.preventDefault(); // ページの移動をキャンセル
            }
        });
    }
});

//　入力ページのバリデーション機能
const forms = document.querySelectorAll('.needs-toccbcc-validation')
Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
        const title = document.getElementById('title');
        const feedback = document.getElementById('feedback');

        // バリデーション
        if ( !form.checkValidity() || title.value == "" ) {
            event.preventDefault();
            event.stopPropagation();
            console.log(feedback.textContent);
        }

        form.classList.add('was-validated');
    }, false);
})
