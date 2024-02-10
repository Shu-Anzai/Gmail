document.addEventListener('DOMContentLoaded', function () {
    // DELETE ボタンがクリックされたときの処理
    document.querySelectorAll('.btn.btn-outline-danger').forEach(function (deleteBtn) {
        deleteBtn.addEventListener('click', function (event) {
            // デフォルトの動作（ボタンの submit）を防止
            event.preventDefault();

            // アラートを表示して確認
            var confirmation = confirm("下書きを削除します。よろしいですか？");

            // 確認がOKの場合、フォームをサブミット
            if (confirmation) {
                var form = event.target.closest('form');
                form.submit();
            }
        });
    });
});
