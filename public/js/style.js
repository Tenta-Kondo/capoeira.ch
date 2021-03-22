function checkSubmit() {
    console.log("e");
    if (window.confirm('投稿してよろしいですか？')) {
        return true;
    } else {
        return false;
    }
}