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
