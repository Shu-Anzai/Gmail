function copyToClipboard() {
    let copyTarget = document.getElementById("url");

    // コピー対象のテキストを選択する
    copyTarget.select();

    // 選択しているテキストをクリップボードにコピーする
    document.execCommand("copy");

    // テキスト選択を解除する
    window.getSelection().removeAllRanges();
    // コピーをお知らせする
    alert("コピーできました！ : " + copyTarget.value);
}

// ボタンがクリックされたときにコピーする関数を呼び出す
document.getElementById("copyUrl").addEventListener("click", copyToClipboard);
