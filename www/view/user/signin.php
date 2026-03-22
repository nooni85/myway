<?php
require_once '../../../vendor/autoload.php';

use EdenProject\MyWay\ApplicationFactory;

$app = ApplicationFactory::create();

?>
<?php require_once '../../../fragments/header.php'; ?>

<!-- 로그인 화면 -->
<div id="login-screen" class="login-container">
    <div class="line">MYWAY OS v1.0.4 (BOOT DATE: <?= date('Y-m-d') ?>)</div>
    <div class="line">COPYRIGHT (C) 2026 MYWAY CORP. ALL RIGHTS RESERVED.</div>
    <br>
    <div class="line">SYSTEM AUTHENTICATION REQUIRED</div>
    <div class="line">-----------------------------------</div>
    
    <!-- 아이디 입력 단계 -->
    <div class="line" id="id-step">
        <span class="prompt">USER ID:</span>
        <input type="text" id="user-id" autofocus autocomplete="off" onkeypress="handleIdEnter(event)">
    </div>

    <!-- 비밀번호 입력 단계 (초기 숨김) -->
    <div class="line" id="password-step" style="display: none;">
        <span class="prompt">PASSWORD:</span>
        <input type="password" id="access-password" autocomplete="off" onkeypress="handlePasswordEnter(event)">
    </div>

    <!-- 로그인 시도 메시지 및 상태 (초기 숨김) -->
    <div class="line" id="login-status"></div>
    
    <div class="line" id="action-step" style="display: none; margin-top: 15px;">
        <button onclick="login()">[ LOGIN ]</button>
    </div>
</div>

<div class="status-bar">
    <div>
        <span class="status-bar-item">SYSTEM: READY</span>
        <span class="status-bar-item" id="terminal-time"><?= date('H:i:s') ?></span>
        <span class="status-bar-item">ENCRYPTION: AES-256</span>
    </div>
    <div>
        <span>UTF-8</span>
    </div>
</div>

<script>
    // 전역 ESC 키 감지 (아이디 수정 모드로 복귀)
    window.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            const idInput = document.getElementById('user-id');
            const pwInput = document.getElementById('access-password');
            const pwStep = document.getElementById('password-step');
            const status = document.getElementById('login-status');

            // 아이디 수정 모드로 복귀
            idInput.readOnly = false;
            pwStep.style.display = 'none';
            pwInput.value = ''; // 비밀번호 초기화
            status.innerHTML = ''; // 상태 메시지 초기화
            idInput.focus();
            idInput.select(); // 전체 선택 (바로 수정 가능하도록)
        }
    });

    // 아이디 입력 후 엔터 처리
    function handleIdEnter(event) {
        if (event.key === 'Enter') {
            const userId = document.getElementById('user-id').value.trim();
            if (userId === '') return;
            
            // 아이디 입력창 비활성화
            document.getElementById('user-id').readOnly = true;
            
            // 비밀번호 단계 표시 및 포커스
            document.getElementById('password-step').style.display = 'block';
            document.getElementById('access-password').focus();
        }
    }

    // 비밀번호 입력 후 엔터 처리
    function handlePasswordEnter(event) {
        if (event.key === 'Enter') {
            login();
        }
    }

    // 로그인 시도 함수
    function login() {
        const userId = document.getElementById('user-id').value;
        const userPw = document.getElementById('access-password').value;
        const status = document.getElementById('login-status');

        if (!userId || !userPw) return;

        status.innerHTML = "<br>AUTHENTICATING... PLEASE WAIT.";
        document.getElementById('access-password').readOnly = true;

        // 실제 로그인 로직은 서버와 연동되어야 함 (현재는 시뮬레이션)
        setTimeout(() => {
            // 여기에 실제 API 호출 로직 추가 예정
            console.log("Login Attempt:", userId, userPw);
            status.innerHTML += "<br>ACCESS DENIED: DATABASE NOT CONNECTED.";
            
            // 실패 시 다시 시도할 수 있도록 처리 (예시)
            setTimeout(() => {
                document.getElementById('access-password').readOnly = false;
                document.getElementById('access-password').value = '';
                document.getElementById('access-password').focus();
            }, 1000);
        }, 800);
    }

    // 상태 바 시간 업데이트
    setInterval(() => {
        const now = new Date();
        const timeStr = now.getHours().toString().padStart(2, '0') + ':' + 
                        now.getMinutes().toString().padStart(2, '0') + ':' + 
                        now.getSeconds().toString().padStart(2, '0');
        document.getElementById('terminal-time').textContent = timeStr;
    }, 1000);
</script>

<?php require_once '../../../fragments/footer.php'; ?>
