// 로그인 폼 검사

function check_input() {
    // 아이디 입력칸이 비어 있으면
    if(!document.login_form.id.value) {
        alert("아이디를 입력하세요");     // 알림창 띄움
        document.login_form.id.focus(); // 아이디 입력칸으로 커서 이동
        // 함수 종료
        return;
    }

    // 비밀번호 입력칸이 비어 있으면
    if(!document.login_form.pass.value) {
        alert("비밀번호를 입력하세요");     // 알림창 띄움
        document.login_form.pass.focus(); // 비밀번호 입력칸으로 커서 이동
        // 함수 종료
        return;
    }

    // 아이디와 비밀번호 둘 다 입력했으면 폼 제출
    document.login_form.submit();
}