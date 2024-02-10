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
