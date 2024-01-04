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
    var mypageButton = document.querySelector('a.btn-outline-danger');

    if (mypageButton) {
        mypageButton.addEventListener('click', function (event) {
            var isConfirmed = confirm('変更内容が破棄されます。よろしいですか？');

            if (!isConfirmed) {
                event.preventDefault(); // ページの移動をキャンセル
            }
        });
    }
});
