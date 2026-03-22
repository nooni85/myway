<?php
use EdenProject\MyWay\Application;

$app = new Application();

?>
<?php require_once __DIR__ . '/../fragments/header.php'; ?>

<!-- 로그인 화면 -->
<div id="login-screen" class="login-container">
    <div class="line">MYWAY OS v1.0.4 (BOOT DATE: <?= date('Y-m-d') ?>)</div>
    <div class="line">COPYRIGHT (C) 2026 MYWAY CORP. ALL RIGHTS RESERVED.</div>
    <br>
    <div class="line">SYSTEM AUTHENTICATION REQUIRED</div>
    <div class="line">-----------------------------------</div>
    <div class="line">
        <span class="prompt">USER ID:</span>
        <input type="text" id="user-id" autofocus autocomplete="off">
    </div>
    <div class="line">
        <span class="prompt">PASSWORD:</span>
        <input type="password" id="access-password" onkeypress="if(event.keyCode==13) login()">
    </div>
    <div class="line">
        <button onclick="login()">[ LOGIN ]</button>
    </div>
    <br>
    <div id="login-status" class="line"></div>
</div>

<!-- 일기 작성 화면 -->
<div id="diary-screen" class="diary-container">
    <div class="line">LOGGED IN AS: <span id="current-user"></span></div>
    <div class="line">DATE: <?= date('Y-m-d') ?> | STATUS: SYSTEM ONLINE</div>
    <div class="line">-----------------------------------</div>
    <br>
    <div class="line">
        <span class="prompt">TITLE:</span>
        <input type="text" id="diary-title" placeholder="ENTER TITLE..." style="width: 80%;">
    </div>
    <br>
    <div class="line">
        <span class="prompt">>_ 오늘의 기록을 입력하세요:</span>
    </div>
    <div class="line">
        <textarea id="diary-body" placeholder="START TYPING..."></textarea>
    </div>
    
    <div class="line" style="margin-top: 15px;">
        <button onclick="saveDiary()">[ SAVE TO DISK ]</button>
        <button onclick="logout()">[ LOGOUT ]</button>
    </div>
</div>

<?php require_once __DIR__ . '/../fragments/footer.php'; ?>
