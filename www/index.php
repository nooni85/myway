<!DOCTYPE html>
<html lang="ko">
<head>
    <?php require_once __DIR__ . '/../fragments/scripts.php'; ?>
    <title>MyWay Diary - 추억의 비밀 일기장</title>
</head>
<body>
<div class="window" id="main-window">
    <div class="window-title">
        <div style="display: flex; align-items: center;">
            <div class="floppy-icon"></div>
            <span>MyWay Diary v1.0 - [비밀 일기장]</span>
        </div>
        <div class="window-controls">
            <button onclick="alert('동생은 끌 수 없습니다!')">_</button>
            <button onclick="alert('전체화면 모드')">□</button>
            <button style="background-color: #c0c0c0; color: red;" onclick="location.reload()">X</button>
        </div>
    </div>

    <div class="window-body">
        <!-- 로그인 화면 -->
        <div id="login-screen" class="login-container">
            <p style="margin-top: 0;">시스템에 접근하려면 암호를 입력하십시오.</p>
            <div class="inset-border" style="display: inline-block; padding: 20px;">
                <img src="https://img.icons8.com/color/48/000000/floppy-disk.png" alt="Floppy" style="margin-bottom: 10px;"><br>
                <input type="password" id="access-password" placeholder="비밀번호 입력..." onkeypress="if(event.keyCode==13) login()">
                <br><br>
                <button onclick="login()">접속 (Enter)</button>
            </div>
            <p style="font-size: 12px; color: #555;">* 1.44MB 플로피 디스크 데이터 로딩 중...</p>
        </div>

        <!-- 일기 작성 화면 -->
        <div id="diary-screen" class="diary-container">
            <div class="date-picker">
                날짜: <input type="text" value="<?= date('Y-m-d') ?>" readonly>
                날씨: 
                <select>
                    <option>맑음 ☀️</option>
                    <option>흐림 ☁️</option>
                    <option>비 ☔</option>
                    <option>눈 ❄️</option>
                </select>
            </div>
            
            <div class="inset-border">
                <strong>오늘의 기록:</strong>
                <textarea class="diary-entry" placeholder="오늘은 어떤 일이 있었나요? 동생 몰래 적어보세요..."></textarea>
            </div>
            
            <div style="margin-top: 15px; display: flex; justify-content: space-between;">
                <button onclick="saveDiary()">💾 플로피에 저장</button>
                <button onclick="toggleBgm()">🎵 BGM: <span id="bgm-text">OFF</span></button>
            </div>
        </div>
    </div>

    <div class="status-bar">
        <div class="status-field">A:\> DRIVE READY</div>
        <div class="status-field" id="clock">00:00:00</div>
        <div class="status-field" style="flex-grow: 1;">User: Guest</div>
    </div>
</div>

<script>
    // 시계 업데이트
    function updateClock() {
        const now = new Date();
        document.getElementById('clock').innerText = now.toLocaleTimeString();
    }
    setInterval(updateClock, 1000);
    updateClock();

    // 간단한 로그인 시뮬레이션 (나중에 PHP로 연동)
    function login() {
        const pass = document.getElementById('access-password').value;
        if (pass === "1234") { // 임시 비밀번호
            document.getElementById('login-screen').style.display = 'none';
            document.getElementById('diary-screen').style.display = 'block';
            alert('A:\ 드라이브가 인식되었습니다. 일기를 작성하세요.');
        } else {
            alert('비밀번호가 틀렸습니다! 동생인가요?');
        }
    }

    function saveDiary() {
        alert('지이잉... 드르륵... 플로피 디스크에 저장되었습니다.');
    }

    let bgmOn = false;
    function toggleBgm() {
        bgmOn = !bgmOn;
        document.getElementById('bgm-text').innerText = bgmOn ? "ON (MIDI)" : "OFF";
        if(bgmOn) {
            alert('띠리리리~ 추억의 MIDI 음악이 흐릅니다. (시뮬레이션)');
        }
    }
</script>
<?php require_once __DIR__ . '/../fragments/footer.php'; ?>
</body>

</html>